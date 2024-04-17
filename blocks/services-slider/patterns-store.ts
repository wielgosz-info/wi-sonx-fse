import apiFetch from '@wordpress/api-fetch';
import { createReduxStore, register } from '@wordpress/data';

// no patterns
const DEFAULT_STATE = {};

const actions = {
	setPattern(postType, pattern) {
		return {
			type: 'SET_PATTERN',
			postType,
			pattern,
		};
	},

	fetchFromAPI(path) {
		return {
			type: 'FETCH_FROM_API',
			path,
		};
	},
};

const store = createReduxStore('wi-sonx-fse/services-slider', {
	reducer(state = DEFAULT_STATE, action) {
		switch (action.type) {
			case 'SET_PATTERN':
				return {
					...state,
					[action.postType]: action.pattern,
				};
		}

		return state;
	},

	actions,

	selectors: {
		getPattern(state, postType) {
			return state[postType];
		},
	},

	controls: {
		FETCH_FROM_API(action) {
			return apiFetch({ path: action.path });
		},
	},

	resolvers: {
		*getPattern(postType) {
			const patternSuffix =
				{
					'wi-service': 'service',
				}[postType] || 'default';

			const pattern = yield actions.fetchFromAPI(
				`/wi-sonx-fse/v1/patterns/loop-post-preview-${patternSuffix}`
			);

			return actions.setPattern(postType, pattern.blocks);
		},
	},
});

register(store);

export { store };
