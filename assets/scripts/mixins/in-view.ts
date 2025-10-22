import { getContext, getElement, withScope } from '@wordpress/interactivity';

const inViewMixin = {
	callbacks: {
		initInView() {
			const { ref } = getElement();
			const observer = new IntersectionObserver(
				withScope(([entry]) => {
					getContext().inView = entry.isIntersecting;
				}) as IntersectionObserverCallback
			);

			if (ref) {
				observer.observe(ref);
			}

			return () => ref && observer.unobserve(ref);
		},
	},
};

export { inViewMixin };
