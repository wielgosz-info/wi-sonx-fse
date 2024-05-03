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
			data-wp-interactive="wi-sonx-fse/skill-percentage"
			data-wp-context={JSON.stringify({
				percentage,
				percentageCounter: 0,
				animation,
			})}
			data-wp-run="callbacks.runCounter"
			data-wp-init--in-view="callbacks.initInView"
			data-wp-init--reduced-motion="callbacks.initReducedMotion"
			data-wp-watch--in-view="callbacks.watchInView"
		>
			<canvas
				id={canvasId}
				className={`${defaultClassName}__canvas`}
				data-wp-init="callbacks.initChart"
			></canvas>
			<div className={`${defaultClassName}__percentage`}>
				<span
					className={`${defaultClassName}__value`}
					data-wp-text="context.percentageCounter"
				>
					{percentage}
				</span>
				<span className={`${defaultClassName}__suffix`}>%</span>
			</div>
			{!RichText.isEmpty(caption) && (
				<RichText.Content
					className={`wp-element-caption ${defaultClassName}__caption`}
					tagName="figcaption"
					value={caption}
				/>
			)}
		</figure>
	);
}
