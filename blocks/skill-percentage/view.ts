import {
	store,
	getContext,
	getElement,
	useEffect,
	useState,
	useRef,
	withScope,
} from '@wordpress/interactivity';
import { ArcElement, DoughnutController, Chart } from 'chart.js';
import ChartDeferred from 'chartjs-plugin-deferred';

Chart.register(ArcElement, DoughnutController, ChartDeferred);

const ANIMATION_DURATION = 2000;
const ANIMATION_DELAY = 200;

const useInView = () => {
	const [inView, setInView] = useState(false);

	useEffect(() => {
		const { ref } = getElement();
		const observer = new IntersectionObserver(([entry]) => {
			setInView(entry.isIntersecting);
		});
		if (ref) observer.observe(ref);
		return () => ref && observer.unobserve(ref);
	}, []);

	return inView;
};

const { state } = store('WISonxFSESkillPercentage', {
	state: {
		get colors() {
			const { ref } = getElement();
			const computedStyle = window.getComputedStyle(ref);
			const primaryColor = computedStyle.getPropertyValue(
				'--wp--preset--color--primary'
			);
			const dimPrimaryColor = computedStyle.getPropertyValue(
				'--wp--preset--color--dim-primary'
			);

			return [primaryColor, dimPrimaryColor];
		},
		get prefersReducedMotion() {
			return window.matchMedia('(prefers-reduced-motion)').matches;
		},
		get animationDuration() {
			const duration = getContext().animation.duration;

			if (state.prefersReducedMotion) {
				return 0;
			}
			return Number.isInteger(duration) ? duration : ANIMATION_DURATION;
		},
		get animationDelay() {
			const delay = getContext().animation.delay;

			if (state.prefersReducedMotion) {
				return 0;
			}

			return Number.isInteger(delay) ? delay : ANIMATION_DELAY;
		},
	},
	callbacks: {
		initChart() {
			const { percentage } = getContext();
			const { ref: canvas } = getElement();

			const chart = new Chart(canvas, {
				type: 'doughnut',
				data: {
					datasets: [
						{
							data: [percentage, 100 - percentage],
							backgroundColor: state.colors,
							borderWidth: 0,
						},
					],
				},
				plugins: state.prefersReducedMotion ? [] : [ChartDeferred],
				options: {
					cutout: '95%',
					responsive: true,
					plugins: {
						legend: {
							display: false,
						},
						deferred: {
							delay: state.animationDelay,
						},
					},
					animation: {
						animateRotate: !state.prefersReducedMotion,
						duration: state.animationDuration,
					},
				},
			});

			return () => {
				chart.destroy();
			};
		},
		runAnimatePercentage() {
			const inView = useInView();

			const lastUpdate = useRef(null);
			const raf = useRef(null);
			const delay = useRef(null);

			// TODO: useCallback when fixed in Gutenberg 18.2
			const updateCounter = withScope(() => {
				const context = getContext();
				const { percentage, percentageCounter } = context;
				const now = Date.now();
				const elapsed = now - lastUpdate.current;
				const fraction = elapsed / state.animationDuration;
				const step = Math.round(percentage * fraction);

				if (step > 0) {
					context.percentageCounter = Math.min(
						percentageCounter + step,
						percentage
					);

					lastUpdate.current = now;
				}

				if (context.percentageCounter < percentage) {
					raf.current = requestAnimationFrame(updateCounter);
				}
			});

			useEffect(() => {
				if (state.prefersReducedMotion) {
					const context = getContext();
					context.percentageCounter = context.percentage;
				}
			}, []);

			useEffect(() => {
				const { percentage, percentageCounter } = getContext();

				if (!inView || percentageCounter >= percentage) {
					return;
				}

				delay.current = setTimeout(
					() => {
						lastUpdate.current = Date.now();
						updateCounter();
					},
					percentageCounter > 0 ? 0 : state.animationDelay
				);

				return () => {
					cancelAnimationFrame(raf.current);
					clearTimeout(delay.current);
				};
			}, [inView, updateCounter]);
		},
	},
});
