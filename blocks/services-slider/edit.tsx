import { getBlockDefaultClassName } from '@wordpress/blocks';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl, Spinner } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { useSelect } from '@wordpress/data';
import { useMemo } from '@wordpress/element';

import { store as patternsStore } from './patterns-store';
import metadata from './block.json';

import './editor.css';

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

	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(
		{
			className: `${defaultClassName}-slides`,
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
				<PanelBody title={__('Settings')}>
					<RangeControl
						label={__('Interval', 'wi-sonx-fse')}
						value={interval}
						onChange={(value) =>
							setAttributes({
								...attributes,
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
