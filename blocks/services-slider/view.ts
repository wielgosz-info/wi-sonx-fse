import {
	store,
	getContext,
	getElement,
	withScope,
} from '@wordpress/interactivity';

const INTERVAL = 5000;

const { state, actions, callbacks } = store('WISonxFSEServicesSlider', {
	state: {
		get activeSlide(): number {
			return getContext().activeSlide || 0;
		},
		set activeSlide(index: number) {
			getContext().activeSlide = index;
		},
		get visibleCount(): number {
			return getContext().visibleCount || 1;
		},
		set visibleCount(count: number) {
			getContext().visibleCount = count;
		},
		get marginLeft(): number {
			return getContext().marginLeft || 0;
		},
		set marginLeft(value: number) {
			getContext().marginLeft = value;
		},
		get marginRight(): number {
			return getContext().marginRight || 0;
		},
		set marginRight(value: number) {
			getContext().marginRight = value;
		},
		get slides(): NodeListOf<HTMLLIElement> {
			return getElement().ref.querySelectorAll(
				'.wp-block-post:not(.is-virtual)'
			);
		},
		get slideWidth(): number {
			return state.slides[state.activeSlide].offsetWidth;
		},
		get shouldInitialize(): boolean {
			return state.slides && state.slides.length > state.visibleCount;
		},
		get initialAutoPlay(): boolean {
			return getContext().initialAutoPlay || false;
		},
		set initialAutoPlay(value: boolean) {
			getContext().initialAutoPlay = value;
		},
		get interval(): number {
			const { autoPlay, interval } = getContext();

			return autoPlay ? interval || INTERVAL : 0;
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
		nextSlide() {
			const { slides, activeSlide } = state;
			const nextSlide = (activeSlide + 1) % slides.length;
			const xDiff =
				slides[nextSlide].offsetLeft - slides[activeSlide].offsetLeft;

			slides[nextSlide].parentElement.scrollBy({
				left: xDiff,
				behavior: 'smooth',
			});
		},
		disableAutoPlay() {
			getContext().autoPlay = false;
		},
		enableAutoPlay() {
			getContext().autoPlay = state.initialAutoPlay;
		},
	},
	callbacks: {
		onResize() {
			const { ref } = getElement();
			const { slideWidth } = state;

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

			state.marginLeft = marginLeft;
			state.marginRight = marginRight;
			state.visibleCount = visibleCount;
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
			const { ref } = getElement();
			const { slides, marginLeft, marginRight, shouldInitialize } = state;

			if (!shouldInitialize) {
				return;
			}

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
							state.activeSlide = index;
						}
					});
				}),
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
			callbacks.onResize();

			if (!state.shouldInitialize) {
				return;
			}

			state.initialAutoPlay = getContext().autoPlay;

			getElement().ref.classList.add('is-initialized');

			return () => {
				getElement().ref.classList.remove('is-initialized');
			};
		},
	},
});
