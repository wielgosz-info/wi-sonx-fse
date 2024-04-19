import {
	store,
	getContext,
	getElement,
	withScope,
} from '@wordpress/interactivity';

const INTERVAL = 5000;

const { state, actions, callbacks } = store('WISonxFSEServicesSlider', {
	state: {
		get slideWidth(): number {
			const { slides, activeSlide } = getContext();
			return slides[activeSlide].offsetWidth;
		},
		get shouldInitialize(): boolean {
			const { slides, visibleCount } = getContext();
			return slides && slides.length > visibleCount;
		},
		get interval(): number {
			const { currentAutoPlay, interval } = getContext();

			return currentAutoPlay ? interval || INTERVAL : 0;
		},
		// TODO: somehow this seems wrong... how to store refs?
		get intervalHandle(): number {
			return getContext().intervalHandle;
		},
		set intervalHandle(value: number) {
			getContext().intervalHandle = value;
		},
	},
	actions: {
		shiftSlide(direction: number = 1) {
			const { slides, activeSlide } = getContext();
			const nextSlide = (activeSlide + direction) % slides.length;
			const xDiff =
				slides[nextSlide].offsetLeft - slides[activeSlide].offsetLeft;

			slides[nextSlide].parentElement.scrollBy({
				left: xDiff,
				behavior: 'smooth',
			});
		},
		prevSlide() {
			actions.shiftSlide(-1);
		},
		nextSlide() {
			actions.shiftSlide(1);
		},
		disableAutoPlay() {
			getContext().currentAutoPlay = false;
		},
		enableAutoPlay() {
			const context = getContext();
			context.currentAutoPlay = context.autoPlay;
		},
	},
	callbacks: {
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
				actions.disableAutoPlay();
			} else {
				actions.enableAutoPlay();
			}
		},
		watchInterval() {
			const { interval, shouldInitialize } = state;

			if (!shouldInitialize || !interval) {
				return;
			}

			const intervalHandle = setInterval(
				withScope(() => {
					actions.nextSlide();
				}),
				interval
			);

			state.intervalHandle = intervalHandle;

			return () => {
				clearInterval(intervalHandle);
			};
		},
		watchIntersection() {
			const { slides } = getContext();
			const { shouldInitialize } = state;

			if (!shouldInitialize) {
				return;
			}

			const { ref } = getElement();
			const { marginLeft, marginRight } = getContext();
			const observer = new IntersectionObserver(
				withScope((entries) => {
					entries.forEach((entry) => {
						entry.target.classList.toggle(
							'is-active',
							entry.isIntersecting
						);

						if (entry.isIntersecting) {
							const index = Array.from(slides).indexOf(
								entry.target
							);
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
		init() {
			const { ref } = getElement();
			const context = getContext();

			context.slides = ref.querySelectorAll('.wp-block-post');
			context.activeSlide = 0;
			context.visibleCount = 1;
			context.currentAutoPlay = context.autoPlay;

			callbacks.onResize();

			if (!state.shouldInitialize) {
				return;
			}

			ref.classList.add('is-initialized');

			return () => {
				ref.classList.remove('is-initialized');
			};
		},
	},
});
