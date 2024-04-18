import {
	store,
	getContext,
	getElement,
	useEffect,
	useState,
	withScope,
} from '@wordpress/interactivity';

const INTERVAL = 2000;

const { state } = store('WISonxFSEServicesSlider', {
	state: {
		get slides(): NodeListOf<HTMLLIElement> {
			return getElement().ref.querySelectorAll(
				'.wp-block-post:not(.is-virtual)'
			);
		},
	},
	callbacks: {
		runActiveSlide() {
			const [marginLeft, setMarginLeft] = useState(0);
			const [marginRight, setMarginRight] = useState(0);
			const [visibleCount, setVisibleCount] = useState(1);

			// TODO: useCallback when it is fixed
			const onResize = withScope(() => {
				const { ref } = getElement();
				const slideWidth =
					(state.slides[0].offsetWidth / ref.offsetWidth) * 100;

				let ml = 0;
				let mr = 0;
				const vc = Math.max(Math.floor(100 / slideWidth), 1);

				if (vc > 1) {
					mr = Math.max(vc - 2.5, 0.5) * slideWidth;
				}

				if (vc > 2) {
					ml = slideWidth / 2;
				}

				setMarginLeft(ml);
				setMarginRight(mr);
				setVisibleCount(vc);
			});

			useEffect(() => {
				window.addEventListener('resize', onResize, {
					passive: true,
				});

				onResize();

				return () => {
					window.removeEventListener('resize', onResize);
				};
			}, [onResize]);

			useEffect(() => {
				const { ref } = getElement();
				const { slides } = state;

				if (!slides || slides.length <= visibleCount) {
					return;
				}

				const observer = new IntersectionObserver(
					(entries) => {
						entries.forEach((entry) => {
							entry.target.classList.toggle(
								'is-active',
								entry.isIntersecting
							);
						});
					},
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
			}, [marginLeft, marginRight, visibleCount]);
		},
	},
});
