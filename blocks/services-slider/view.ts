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
			const { slides, activeSlide, visibleCount } = state;
			const nextSlide = (activeSlide + 1) % slides.length;

			slides[nextSlide].parentElement.scrollTo({
				left:
					slides[nextSlide].offsetLeft -
					(visibleCount - 2) * slides[0].offsetWidth,
				behavior: 'smooth',
			});
		},
	},
	callbacks: {
		disableAutoPlay() {
			getContext().autoPlay = false;
		},
		enableAutoPlay() {
			getContext().autoPlay = state.initialAutoPlay;
		},
		onResize() {
			const { ref } = getElement();
			const { slides } = state;

			const slideWidth = (slides[0].offsetWidth / ref.offsetWidth) * 100;

			let marginLeft = 0;
			let marginRight = 0;
			const visibleCount = Math.max(Math.floor(100 / slideWidth), 1);

			if (visibleCount > 1) {
				marginRight = Math.max(visibleCount - 2.5, 0.5) * slideWidth;
			}

			if (visibleCount > 2) {
				marginLeft = slideWidth / 2;
			}

			state.marginLeft = marginLeft;
			state.marginRight = marginRight;
			state.visibleCount = visibleCount;
		},
		watchInterval() {
			const { interval } = state;

			if (!interval) {
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
			const { slides, marginLeft, marginRight, visibleCount } = state;

			if (!slides || slides.length <= visibleCount) {
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
			state.initialAutoPlay = getContext().autoPlay;
			callbacks.onResize();
		},
	},
});
