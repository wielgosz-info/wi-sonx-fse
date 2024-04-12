import { registerBlockType } from '@wordpress/blocks';

import './style.css';

import { Edit } from './edit';
import { save } from './save';
import metadata from './block.json';
import variations from './variations';

registerBlockType( metadata.name, {
	edit: Edit,
	save,
	variations,
} );
