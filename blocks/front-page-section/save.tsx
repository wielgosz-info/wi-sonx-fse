import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

import metadata from './block.json';

export function save({ attributes }) {
	const defaultClassName = getBlockDefaultClassName(metadata.name);

	return (
		<section
			{...useBlockProps.save()}
			data-wp-interactive="wi-sonx-fse/front-page-section"
			data-wp-init={
				attributes.inToC
					? 'wi-sonx-fse/front-page-toc::callbacks.register'
					: null
			}
		>
			<div
				{...useInnerBlocksProps.save({
					className: `${defaultClassName}-content`,
				})}
			/>
		</section>
	);
}
