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
		open: () => {
			state.isOpen = true;
		},
	},
	callbacks: {
		register: () => {
			const { ref } = getElement();
			const heading = ref.querySelector(':is(h1, h2, h3, h4, h5, h6)');

			if (heading) {
				state.sections.push({
					anchor: ref.id,
					title: heading.textContent,
				});
			}
		},
	},
});
