import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

export function edit({name}) {
	const defaultClassName = getBlockDefaultClassName(name);
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(
		{
			className: `${defaultClassName}-content`,
		},
		{
			allowedBlocks: ['core/paragraph'],
			template: [['core/paragraph']],
		}
	);

	return (
		<section {...blockProps}>
			<div {...innerBlocksProps} />
		</section>
	);
}
