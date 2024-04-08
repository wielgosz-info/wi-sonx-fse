import {
	useBlockProps,
	__experimentalGetElementClassName,
	RichText,
} from '@wordpress/block-editor';
import { RangeControl } from '@wordpress/components';
import classnames from 'classnames';
import { __ } from '@wordpress/i18n';

export function edit({
	clientId,
	attributes,
	setAttributes,
	isSelected
}) {
	const { percentage, caption } = attributes;
	const blockProps = useBlockProps();

	setAttributes({ clientId });

	return (
		<figure {...blockProps}>
			<div
				className={classnames(
					__experimentalGetElementClassName('canvas')
				)}
			>
				<RangeControl
					label={__('Skill percentage', 'wi-sonx-fse')}
					value={percentage}
					onChange={(value) => setAttributes({ percentage: value })}
					min={0}
					max={100}
					step={1}
					shiftStep={10}
					isShiftStepEnabled={true}
					withInputField
				/>
			</div>
			{(!RichText.isEmpty(caption) || isSelected) && (
				<RichText
					identifier="caption"
					tagName="figcaption"
					className={classnames(
						'wp-element-caption',
						__experimentalGetElementClassName('caption')
					)}
					aria-label={__('Skill caption', 'wi-sonx-fse')}
					placeholder={__('Skill', 'wi-sonx-fse')}
					value={caption}
					onChange={(value) => setAttributes({ caption: value })}
					inlineToolbar
				/>
			)}
		</figure>
	);
}
