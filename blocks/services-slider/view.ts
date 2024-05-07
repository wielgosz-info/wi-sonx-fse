import {
	store,
	getContext,
	getElement,
	withScope,
	useRef,
} from '@wordpress/interactivity';
import { inViewMixin } from '@mixins/in-view';
import { reducedMotionMixin } from '@mixins/reduced-motion';

const INTERVAL = 5000;
const ACTIVE_CLASS = 'is-active';

const { state, actions, callbacks } = store('wi-sonx-fse/services-slider', {
	state: {
		...reducedMotionMixin.state,
		get slideWidth(): number {
			const { slides, activeSlide } = getContext();
			return slides[activeSlide].offsetWidth;
		},
		get shouldInitialize(): boolean {
			const { slides, visibleCount } = getContext();
			return slides && slides.length > visibleCount;
		},
		get interval(): number {
			const { prefersReducedMotion } = state;
			const { autoPlay, interval, paused, inView } = getContext();

			return !prefersReducedMotion && autoPlay && inView && !paused
				? interval || INTERVAL
				: 0;
		},
	},
	actions: {
		goToSlide(nextSlide: HTMLLIElement = null) {
			const { item, slides, activeSlide } = getContext();

			if (!nextSlide) {
				nextSlide = item;
			}

			const xDiff = nextSlide.offsetLeft - slides[activeSlide].offsetLeft;

			nextSlide.parentElement.scrollBy({
				left: xDiff,
				behavior: 'smooth',
			});
		},
		shiftSlide(direction: number = 1) {
			const { slides, activeSlide } = getContext();
			const nextSlide = slides[(activeSlide + direction) % slides.length];

			actions.goToSlide(nextSlide);
		},
		prevSlide() {
			actions.shiftSlide(-1);
		},
		nextSlide() {
			actions.shiftSlide(1);
		},
		pause() {
			getContext().paused = true;
		},
		maybePlay() {
			getContext().paused = false;
		},
	},
	callbacks: {
		...inViewMixin.callbacks,
		run() {
			const { ref } = getElement();
			const context = getContext();
			context.intervalHandle = useRef();

			// Bug? Sometimes init is not triggered but run is, and ref is available.
			// We're taking advantage of that to "fix" disappearing dots / missing slides issue.
			if (ref) {
				context.slides = Array.from(
					ref.querySelectorAll('.wp-block-post')
				);
			}
		},
		init() {
			const { ref } = getElement();
			const context = getContext();

			context.slides = Array.from(ref.querySelectorAll('.wp-block-post'));
			context.activeSlide = 0;
			context.visibleCount = 1;
			context.paused = false;

			callbacks.onResize();

			if (!state.shouldInitialize) {
				return;
			}

			ref.classList.add('is-initialized');

			return () => {
				ref.classList.remove('is-initialized');
			};
		},
		onResize() {
			const { ref } = getElement();
			const { slideWidth } = state;
			const context = getContext();

			const slideWidthPercent = (slideWidth / ref.offsetWidth) * 100;

			let marginLeft = 0;
			let marginRight = 0;
			const visibleCount = Math.max(
				Math.floor(100 / slideWidthPercent),
				1
			);

			if (visibleCount > 1) {
				marginRight =
					Math.max(visibleCount - 2.5, 0.5) * slideWidthPercent;
			}

			if (visibleCount > 2) {
				marginLeft = slideWidthPercent / 2;
			}

			context.marginLeft = marginLeft;
			context.marginRight = marginRight;
			context.visibleCount = visibleCount;
		},
		onVisibilityChange() {
			if (document.hidden) {
				actions.pause();
			} else {
				actions.maybePlay();
			}
		},
		watchInterval() {
			const { interval, shouldInitialize } = state;

			if (!shouldInitialize || !interval) {
				return;
			}

			const { intervalHandle } = getContext();
			intervalHandle.current = setInterval(
				withScope(() => {
					actions.nextSlide();
				}),
				interval
			);

			return () => {
				clearInterval(intervalHandle.current);
			};
		},
		watchIntersection() {
			const { shouldInitialize } = state;

			if (!shouldInitialize) {
				return;
			}

			const { slides, marginLeft, marginRight } = getContext();
			const { ref } = getElement();
			const observer = new IntersectionObserver(
				withScope((entries) => {
					entries.forEach((entry) => {
						entry.target.classList.toggle(
							ACTIVE_CLASS,
							entry.isIntersecting
						);

						if (entry.isIntersecting) {
							const index = slides.indexOf(entry.target);
							getContext().activeSlide = index;
						}
					});
				}) as IntersectionObserverCallback,
				{
					root: ref,
					rootMargin: `0px -${marginRight}% 0px -${marginLeft}%`,
					threshold: 1,
				}
			);

			slides.forEach((slide) => observer.observe(slide));

			return () =>
				slides &&
				slides.forEach((slide) => {
					slide.classList.remove('is-active');
					observer.unobserve(slide);
				});
		},
		isActiveDot(className): boolean {
			const { item, slides, activeSlide } = getContext();
			return slides.indexOf(item) === activeSlide;
		},
		dotIndex(): string {
			const { item, slides } = getContext();
			return String(slides.indexOf(item) + 1);
		},
	},
});
