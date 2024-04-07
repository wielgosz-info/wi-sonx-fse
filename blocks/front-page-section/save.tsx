import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

import metadata from './block.json';

export function save({ attributes }) {
	const defaultClassName = getBlockDefaultClassName(metadata.name);

	return (
		<section {...useBlockProps.save()} data-wi-toc={attributes.inToC}>
			<div
				{...useInnerBlocksProps.save({
					className: `${defaultClassName}-content`,
				})}
			/>
		</section>
	);
}
