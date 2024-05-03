import {
	store,
	getContext,
	getElement,
	useRef,
	withScope,
} from '@wordpress/interactivity';
import { inViewMixin } from '@mixins/in-view';
import { reducedMotionMixin } from '@mixins/reduced-motion';

import { ArcElement, DoughnutController, Chart } from 'chart.js';
import ChartDeferred from 'chartjs-plugin-deferred';

Chart.register(ArcElement, DoughnutController, ChartDeferred);

const ANIMATION_DURATION = 2000;
const ANIMATION_DELAY = 200;

const { state, callbacks } = store('wi-sonx-fse/skill-percentage', {
	state: {
		...reducedMotionMixin.state,
		get colors() {
			const { ref } = getElement();
			const computedStyle = window.getComputedStyle(ref);
			const accentColor = computedStyle.getPropertyValue(
				'--wp--preset--color--accent'
			);
			const dimaccentColor = computedStyle.getPropertyValue(
				'--wp--preset--color--accent-2'
			);

			return [accentColor, dimaccentColor];
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
		...inViewMixin.callbacks,
		runCounter() {
			const context = getContext();
			context.lastUpdate = useRef();
			context.raf = useRef();
			context.delay = useRef();
		},
		initReducedMotion() {
			if (state.prefersReducedMotion) {
				const context = getContext();
				context.percentageCounter = context.percentage;
			}
		},
		updateCounter() {
			const context = getContext();
			const { percentage, percentageCounter, lastUpdate, raf } = context;
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
				raf.current = requestAnimationFrame(
					withScope(callbacks.updateCounter) as FrameRequestCallback
				);
			}
		},
		watchInView() {
			const {
				percentage,
				percentageCounter,
				inView,
				delay,
				lastUpdate,
				raf,
			} = getContext();

			if (!inView || percentageCounter >= percentage) {
				return;
			}

			delay.current = setTimeout(
				withScope(() => {
					lastUpdate.current = Date.now();
					callbacks.updateCounter();
				}),
				percentageCounter > 0 ? 0 : state.animationDelay
			);

			return () => {
				cancelAnimationFrame(raf.current);
				clearTimeout(delay.current);
			};
		},
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
	},
});
