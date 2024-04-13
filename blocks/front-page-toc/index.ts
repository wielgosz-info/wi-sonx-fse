import { registerBlockType } from '@wordpress/blocks';

import metadata from './block.json';
import { Edit } from './edit';
import { save } from './save';

import './style.css';

registerBlockType(metadata.name, {
	edit: Edit,
	save,
	icon: {
		foreground: '#5ac3b4',
		src: 'list-view',
	},
});
