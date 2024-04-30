import { store, getContext, getElement } from '@wordpress/interactivity';

const { state } = store('wi-sonx-fse/front-page-toc', {
	state: {
		sections: [],
		isOpen: false,

		get href() {
			return `#${getContext().item.anchor}`;
		},
	},
	actions: {
		open() {
			state.isOpen = true;
		},
	},
	callbacks: {
		/**
		 * If hash is present in the URL, open the TOC and scroll to the section.
		 * We're using watch instead of init because the init callback is called before the blocks are registered.
		 */
		watch() {
			const { hash } = window.location;

			if (hash) {
				state.isOpen = true;

				const section = state.sections.find(
					({ anchor }) => `#${anchor}` === hash
				);

				if (section) {
					section.ref.scrollIntoView({ behavior: 'smooth' });
				}
			}
		},

		/**
		 * Called by wi-sonx-fse/front-page-section blocks on init to register themselves.
		 */
		register() {
			const { ref } = getElement();
			const heading = ref.querySelector(':is(h1, h2, h3, h4, h5, h6)');

			if (ref.id && heading) {
				state.sections.push({
					anchor: ref.id,
					title: heading.textContent,
					ref,
				});
			}
		},
	},
});
