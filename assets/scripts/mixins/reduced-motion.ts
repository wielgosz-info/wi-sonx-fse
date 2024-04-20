const reducedMotionMixin = {
	state: {
		get prefersReducedMotion() {
			return window.matchMedia('(prefers-reduced-motion)').matches;
		},
	},
};

export { reducedMotionMixin };
