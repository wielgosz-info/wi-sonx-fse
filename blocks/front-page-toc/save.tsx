import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

import metadata from './block.json';

export function save() {
	const defaultClassName = getBlockDefaultClassName(metadata.name);

	return (
		<div {...useBlockProps.save()}>
			<button></button>
			<nav>
				<ol>
					<li></li>
					<li></li>
					<li></li>
				</ol>
			</nav>
		</div>
	);
}
