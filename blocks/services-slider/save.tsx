import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import { getCSSRules } from '@wordpress/style-engine';
import { __ } from '@wordpress/i18n';

import metadata from './block.json';

export function save({ attributes }) {
	const defaultClassName = getBlockDefaultClassName(metadata.name);
	const { columnCount, blockGap } = attributes;
	const parsedBlockGap = getCSSRules({
		dimensions: {
			minHeight: `${blockGap}`, // use minHeight since blockGap is not supported by the style engine yet :D
		},
	})[0].value;

	return (
		<div
			{...useBlockProps.save({
				style: {
					'--wi--services-slider--columns': `${columnCount}`,
					'--wi--services-slider--gap': `${parsedBlockGap}`,
				},
			})}
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
			<div className={`${defaultClassName}-pagination`}>
				<button
					className={`${defaultClassName}-prev`}
					data-wp-on--click="actions.prevSlide"
				>
					{__('Previous item', 'wi-sonx-fse')}
				</button>
				<button
					className={`${defaultClassName}-next`}
					data-wp-on--click="actions.nextSlide"
				>
					{__('Next item', 'wi-sonx-fse')}
				</button>
			</div>
		</div>
	);
}
