import { registerBlockType, registerBlockVariation } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

import metadata from './block.json';
import { Edit } from './edit';
import { save } from './save';

import './style.css';

registerBlockType(metadata.name, {
	edit: Edit,
	save,
	icon: 'slides',
});

registerBlockVariation('core/query', {
	name: 'wi-service-slider',
	title: __('Services slider', 'wi-sonx-fse'),
	description: __('Display a list of services as a simple slider.'),
	icon: {
		foreground: '#5ac3b4',
		src: 'slides',
	},
	attributes: {
		namespace: 'wi-sonx-fse/wi-service-slider',
		query: {
			perPage: 12,
			pages: 1,
			offset: 0,
			postType: 'wi-service',
			order: 'asc',
			orderBy: 'title',
			author: '',
			search: '',
			sticky: '',
			inherit: false,
		},
		enhancedPagination: false,
	},
	scope: ['inserter'],
	isActive: ({ namespace, query }) => {
		return (
			namespace === 'wi-sonx-fse/wi-service-slider' &&
			query.postType === 'wi-service'
		);
	},
	innerBlocks: [['wi-sonx-fse/services-slider']],
});
