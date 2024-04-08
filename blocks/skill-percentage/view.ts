import {
	store,
	getContext,
	getElement,
	useEffect,
	useState,
	useRef,
} from '@wordpress/interactivity';
import { ArcElement, DoughnutController, Chart } from 'chart.js';
import ChartDeferred from 'chartjs-plugin-deferred';

Chart.register(ArcElement, DoughnutController, ChartDeferred);

const ANIMATION_DURATION = 1000;
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

const useDoughnutChart = (percentage) => {
	const chartInstance = useRef(null);

	useEffect(() => {
		const { ref: canvas } = getElement();

		if (!canvas) {
			return;
		}

		const primaryColor = window
			.getComputedStyle(canvas)
			.getPropertyValue('--wp--preset--color--primary');
		const dimPrimaryColor = window
			.getComputedStyle(canvas)
			.getPropertyValue('--wp--preset--color--dim-primary');
		const chart = new Chart(canvas, {
			type: 'doughnut',
			data: {
				datasets: [
					{
						data: [percentage, 100 - percentage],
						backgroundColor: [primaryColor, dimPrimaryColor],
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

		chartInstance.current = chart;

		return () => {
			chart.destroy();
			chartInstance.current = null;
		};
	}, [percentage]);

	return chartInstance;
};

store('WISonxFSESkillPercentage', {
	callbacks: {
		runChart: () => {
			const context = getContext();
			const chart = useDoughnutChart(context.percentage);
		},
		runPercentage: () => {
			const context = getContext();
			const inView = useInView();

			const percentage = context.percentage;
			const lastUpdate = useRef(0);
			const raf = useRef(null);
			const delay = useRef(null);

			const updateCounter = () => {
				const now = Date.now();
				const elapsed = now - lastUpdate.current;
				const fraction = elapsed / ANIMATION_DURATION;
				const step = Math.max(1, Math.round(percentage * fraction));

				context.percentageCounter = Math.min(
					context.percentageCounter + step,
					percentage
				);

				lastUpdate.current = now;

				if (context.percentageCounter < percentage) {
					requestAnimationFrame(updateCounter);
				}
			};

			useEffect(() => {
				if (inView && context.percentageCounter < percentage) {
					delay.current = setTimeout(() => {
						lastUpdate.current = Date.now();
						raf.current = requestAnimationFrame(updateCounter);
					}, ANIMATION_DELAY);
				}
			}, [inView, percentage]);
		},
	},
});
