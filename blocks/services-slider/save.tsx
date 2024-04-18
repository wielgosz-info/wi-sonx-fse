import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

import metadata from './block.json';

export function save({ attributes }) {
	const defaultClassName = getBlockDefaultClassName(metadata.name);

	return (
		<div
			{...useBlockProps.save()}
			{...useInnerBlocksProps.save()}
			data-wp-interactive="WISonxFSEServicesSlider"
			data-wp-run="callbacks.runActiveSlide"
		/>
	);
}
