import {
	store,
	getContext,
	getElement,
	useEffect,
	useState,
	useRef,
	withScope
} from '@wordpress/interactivity';
import { ArcElement, DoughnutController, Chart } from 'chart.js';
import ChartDeferred from 'chartjs-plugin-deferred';

Chart.register(ArcElement, DoughnutController, ChartDeferred);

const ANIMATION_DURATION = 10000;
const ANIMATION_DELAY = 2000;

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
				plugins: [ChartDeferred],
				options: {
					cutout: '95%',
					responsive: true,
					plugins: {
						legend: {
							display: false,
						},
						deferred: {
							delay: ANIMATION_DELAY,
						},
					},
					animation: {
						duration: ANIMATION_DURATION,
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
				const fraction = elapsed / ANIMATION_DURATION;
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
				const { percentage, percentageCounter } = getContext();

				if (!inView || percentageCounter >= percentage) {
					return;
				}

				delay.current = setTimeout(
					() => {
						lastUpdate.current = Date.now();
						updateCounter();
					},
					percentageCounter > 0 ? 0 : ANIMATION_DELAY
				);

				return () => {
					cancelAnimationFrame(raf.current);
					clearTimeout(delay.current);
				};
			}, [inView]);
		},
	},
});
