import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

import './editor.css';

export function edit({name}) {
	const defaultClassName = getBlockDefaultClassName(name);
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(
		{
			className: `${defaultClassName}-content`,
		},
		{
			template: [['core/group']],
		}
	);

	return (
		<section {...blockProps}>
			<div {...innerBlocksProps} />
		</section>
	);
}
