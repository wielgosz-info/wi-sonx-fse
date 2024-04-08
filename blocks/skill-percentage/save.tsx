import { getBlockDefaultClassName } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';

import metadata from './block.json';

export function save({ attributes }) {
	const defaultClassName = getBlockDefaultClassName(metadata.name);
	const { percentage, caption, anchor, clientId } = attributes;
	const key = anchor || clientId;
	const canvasId = `${key}-canvas`;

	return (
		<figure
			{...useBlockProps.save()}
			data-wp-interactive="WISonxFSESkillPercentage"
			data-wp-context={JSON.stringify({
				percentage,
				percentageCounter: 0,
			})}
		>
			<canvas
				id={canvasId}
				className={`${defaultClassName}-canvas`}
				data-wp-run="callbacks.runChart"
			></canvas>
			<div className={`${defaultClassName}-percentage`}>
				<span
					className={`${defaultClassName}-value`}
					data-wp-run="callbacks.runPercentage"
					data-wp-text="context.percentageCounter"
				>
					{percentage}
				</span>
				<span className={`${defaultClassName}-suffix`}>%</span>
			</div>
			{!RichText.isEmpty(caption) && (
				<RichText.Content
					className={`wp-element-caption ${defaultClassName}-caption`}
					tagName="figcaption"
					value={caption}
				/>
			)}
		</figure>
	);
}
