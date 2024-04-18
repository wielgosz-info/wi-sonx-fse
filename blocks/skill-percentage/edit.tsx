import { getBlockDefaultClassName } from '@wordpress/blocks';
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';
import { useEffect } from '@wordpress/element';
import classnames from 'classnames';
import { __ } from '@wordpress/i18n';

import metadata from './block.json';

export function Edit({
	name,
	clientId,
	attributes,
	setAttributes,
	isSelected,
}) {
	const defaultClassName = getBlockDefaultClassName(name);
	const { percentage, caption, animation, anchor } = attributes;
	const durationProps = metadata.attributes.animation.properties.duration;
	const delayProps = metadata.attributes.animation.properties.delay;
	const blockProps = useBlockProps();

	useEffect(() => {
		if (!anchor) {
			setAttributes({ anchor: clientId });
		}
	}, [clientId, setAttributes, anchor]);

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings')}>
					<RangeControl
						label={__('Animation duration', 'wi-sonx-fse')}
						value={animation.duration}
						onChange={(value) =>
							setAttributes({
								animation: {
									...attributes.animation,
									duration: value,
								},
							})
						}
						min={durationProps.minimum}
						max={durationProps.maximum}
						step={durationProps.step}
						shiftStep={10}
						isShiftStepEnabled={true}
						withInputField
					/>
					<RangeControl
						label={__('Animation delay', 'wi-sonx-fse')}
						value={animation.delay}
						onChange={(value) =>
							setAttributes({
								animation: {
									...attributes.animation,
									delay: value,
								},
							})
						}
						min={delayProps.minimum}
						max={delayProps.maximum}
						step={delayProps.step}
						shiftStep={10}
						isShiftStepEnabled={true}
						withInputField
					/>
				</PanelBody>
			</InspectorControls>

			<figure {...blockProps}>
				<div className={classnames(`${defaultClassName}-canvas`)}>
					<RangeControl
						label={__('Skill percentage', 'wi-sonx-fse')}
						value={percentage}
						onChange={(value) =>
							setAttributes({ percentage: value })
						}
						min={metadata.attributes.percentage.minimum}
						max={metadata.attributes.percentage.maximum}
						step={metadata.attributes.percentage.step}
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
							`${defaultClassName}-caption`
						)}
						aria-label={__('Skill caption', 'wi-sonx-fse')}
						placeholder={__('Skill', 'wi-sonx-fse')}
						value={caption}
						onChange={(value) => setAttributes({ caption: value })}
						inlineToolbar
					/>
				)}
			</figure>
		</>
	);
}
