import { getBlockDefaultClassName } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';

import metadata from './block.json';

export function save({ attributes }) {
	const defaultClassName = getBlockDefaultClassName(metadata.name);
	const { percentage, caption, anchor, clientId, animation } = attributes;
	const key = anchor || clientId;
	const canvasId = `${key}-canvas`;

	return (
		<figure
			{...useBlockProps.save()}
			data-wp-interactive="WISonxFSESkillPercentage"
			data-wp-context={JSON.stringify({
				percentage,
				percentageCounter: 0,
				animation
			})}
			data-wp-run="callbacks.runAnimatePercentage"
		>
			<canvas
				id={canvasId}
				className={`${defaultClassName}-canvas`}
				data-wp-init="callbacks.initChart"
			></canvas>
			<div className={`${defaultClassName}-percentage`}>
				<span
					className={`${defaultClassName}-value`}
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
