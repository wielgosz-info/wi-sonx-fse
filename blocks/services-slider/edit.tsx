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

export function Edit({ name, attributes, setAttributes }) {
	const defaultClassName = getBlockDefaultClassName(name);
	const { animation } = attributes;

	// TODO: create variants for post types?
	const postType = 'wi-service';

	// TODO: allow to set post template block vars in attributes instead of hardcoded values
	// How to ensure that user can't change them directly on the Post Template block later?
	const columnCount = 3;
	const blockGap = 'var:preset|spacing|60';

	// get pattern from REST API
	const postPreviewPattern = useSelect(
		(select) => {
			return select(patternsStore).getPattern(postType);
		},
		[postType]
	);
	const template = useMemo(
		() => [
			[
				'core/query',
				{
					queryId: 0,
					query: {
						perPage: '12',
						pages: '1',
						offset: 0,
						postType,
						order: 'asc',
						orderBy: 'title',
						author: '',
						search: '',
						exclude: [],
						sticky: '',
						inherit: false,
						parents: [],
					},
					enhancedPagination: true,
					layout: {
						type: 'default',
					},
				},
				[
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
			],
		],
		[postPreviewPattern, postType, columnCount, blockGap]
	);

	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		template,
		templateLock: 'all',
	});

	if (!postPreviewPattern) {
		return <Spinner />;
	}

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
						min={
							metadata.attributes.animation.properties.duration
								.minimum
						}
						max={
							metadata.attributes.animation.properties.duration
								.maximum
						}
						step={
							metadata.attributes.animation.properties.duration
								.step
						}
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
						min={
							metadata.attributes.animation.properties.delay
								.minimum
						}
						max={
							metadata.attributes.animation.properties.delay
								.maximum
						}
						step={
							metadata.attributes.animation.properties.delay.step
						}
						shiftStep={10}
						isShiftStepEnabled={true}
						withInputField
					/>
				</PanelBody>
			</InspectorControls>

			<div {...innerBlocksProps} />
		</>
	);
}
