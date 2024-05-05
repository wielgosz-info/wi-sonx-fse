import { getBlockDefaultClassName } from '@wordpress/blocks';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	PanelBody,
	RangeControl,
	ToggleControl,
	Spinner,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { useSelect } from '@wordpress/data';
import { useMemo } from '@wordpress/element';
import { getCSSRules } from '@wordpress/style-engine';

import { store as patternsStore } from './patterns-store';
import metadata from './block.json';

export function Edit({ name, attributes, setAttributes, context }) {
	const defaultClassName = getBlockDefaultClassName(name);
	const {
		previewPostType,
		query: { postType },
	} = context;
	const { columnCount, blockGap, autoPlay, interval } = attributes;

	// get pattern from REST API
	const postPreviewPattern = useSelect(
		(select) => {
			return select(patternsStore).getPattern(
				previewPostType || postType
			);
		},
		[postType, previewPostType]
	);
	const template = useMemo(
		() => [
			[
				'core/post-template',
				{
					style: {
						spacing: {
							blockGap,
						},
					},
					layout: {
						type: 'grid',
						columnCount,
						minimumColumnWidth: null,
					},
					templateLock: false,
					lock: { move: false, remove: false },
				},
				postPreviewPattern || [],
			],
		],
		[postPreviewPattern, columnCount, blockGap]
	);

	const parsedBlockGap = getCSSRules({
		dimensions: {
			minHeight: `${blockGap}`, // use minHeight since blockGap is not supported by the style engine yet :D
		},
	})[0].value;

	const blockProps = useBlockProps({
		style: {
			'--wi--services-slider--columns': `${columnCount}`,
			'--wi--services-slider--gap': `${parsedBlockGap}`,
		},
	});
	const innerBlocksProps = useInnerBlocksProps(
		{
			className: `${defaultClassName}__slides`,
		},
		{
			template,
			templateLock: 'all',
		}
	);

	if (!postPreviewPattern) {
		return <Spinner />;
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Layout')}>
					<RangeControl
						label={__('Columns', 'wi-sonx-fse')}
						help={__(
							'Number of columns to display. Please use this control instead of modifying inner Post Template ones.',
							'wi-sonx-fse'
						)}
						value={columnCount}
						onChange={(value) =>
							setAttributes({
								columnCount: value,
							})
						}
						min={metadata.attributes.columnCount.minimum}
						max={metadata.attributes.columnCount.maximum}
						withInputField
					/>
				</PanelBody>
				<PanelBody title={__('Auto Play')}>
					<ToggleControl
						label={__('Enabled?', 'wi-sonx-fse')}
						checked={autoPlay}
						onChange={(value) => {
							setAttributes({
								autoPlay: value,
							});
						}}
					/>
					<RangeControl
						label={__('Interval', 'wi-sonx-fse')}
						value={interval}
						onChange={(value) =>
							setAttributes({
								interval: value,
							})
						}
						min={metadata.attributes.interval.minimum}
						max={metadata.attributes.interval.maximum}
						step={metadata.attributes.interval.step}
						shiftStep={10}
						isShiftStepEnabled={true}
						withInputField
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<div {...innerBlocksProps} />
			</div>
		</>
	);
}
