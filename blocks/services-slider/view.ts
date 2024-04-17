import {
	store,
	getContext,
	getElement,
	useEffect,
	useState,
	useRef,
	withScope
} from '@wordpress/interactivity';

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
