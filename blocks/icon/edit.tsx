import { useBlockProps } from '@wordpress/block-editor';

import icons from './icons';

export function Edit({ attributes }) {
	const IconComponent = icons[attributes.icon];

	return (
		<>
			<span {...useBlockProps()}>
				<IconComponent />
			</span>
		</>
	);
}
