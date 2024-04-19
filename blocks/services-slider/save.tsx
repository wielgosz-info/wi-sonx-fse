import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

import metadata from './block.json';

export function save({ attributes }) {
	const defaultClassName = getBlockDefaultClassName(metadata.name);

	return (
		<div
			{...useBlockProps.save()}
			data-wp-interactive="WISonxFSEServicesSlider"
			data-wp-context={JSON.stringify({
				autoPlay: attributes.autoPlay,
				interval: attributes.interval,
			})}
			data-wp-init="callbacks.init"
			data-wp-on-window--resize="callbacks.onResize"
			data-wp-on-document--visibilitychange="callbacks.onVisibilityChange"
			data-wp-watch--interval="callbacks.watchInterval"
			data-wp-watch--intersection="callbacks.watchIntersection"
		>
			<div
				{...useInnerBlocksProps.save({
					className: `${defaultClassName}-slides`,
				})}
				data-wp-on--mouseenter="actions.disableAutoPlay"
				data-wp-on--mouseleave="actions.enableAutoPlay"
				data-wp-on--focusin="actions.disableAutoPlay"
				data-wp-on--focusout="actions.enableAutoPlay"
				data-wp-on--touchstart="actions.disableAutoPlay"
			/>
		</div>
	);
}
