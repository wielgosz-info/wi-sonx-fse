import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

export function save() {
	// const defaultClassName = getBlockDefaultClassName(name);
	return (
		<section {...useBlockProps.save()}>
			<div
				{...useInnerBlocksProps.save()}
			/>
		</section>
	);
}
