import { store, getContext } from '@wordpress/interactivity';

store('WISonxFSEFrontPageTOC', {
	actions: {
		open: () => {
			const context = getContext();
			context.isOpen = true;
		},
	},
});
