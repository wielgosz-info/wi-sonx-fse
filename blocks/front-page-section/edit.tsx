import { getBlockDefaultClassName } from '@wordpress/blocks';
import {
	useBlockProps,
	useInnerBlocksProps,
	BlockControls,
} from '@wordpress/block-editor';
import { ToolbarButton } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import './editor.css';

export function edit({ name, attributes, setAttributes }) {
	const defaultClassName = getBlockDefaultClassName(name);
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(
		{
			className: `${defaultClassName}-content`,
		},
		{
			template: [
				[
					'core/group',
					{
						style: {
							padding: {
								top: 'var:preset:spacing:60',
								right: 'var:preset:spacing:30',
								bottom: 'var:preset:spacing:60',
								left: 'var:preset:spacing:30',
							},
						},
					},
				],
			],
		}
	);

	return (
		<>
			<BlockControls group="other">
				<ToolbarButton
					label={__(
						'Uncheck this box to exclude this section from the Table of Contents',
						'wi-sonx-fse'
					)}
					showTooltip={true}
					isPressed={attributes.inToC}
					onClick={() => setAttributes({ inToC: !attributes.inToC })}
				>
					{__('In ToC', 'wi-sonx-fse')}
				</ToolbarButton>
			</BlockControls>

			<section {...blockProps}>
				<div {...innerBlocksProps} />
			</section>
		</>
	);
}
