import { useBlockProps } from '@wordpress/block-editor';

import icons from './icons';

export function save({ attributes }) {
	const IconComponent = icons[attributes.icon];

	return (
		<span {...useBlockProps.save()} data-wp-interactive="WISonxFSEIcon">
			<IconComponent />
		</span>
	);
}
