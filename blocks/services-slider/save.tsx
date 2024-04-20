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
				activeSlide: 0,
				slides: [],
			})}
			data-wp-init--in-view="callbacks.initInView"
			data-wp-init--slider="callbacks.init"
			data-wp-on-window--resize="callbacks.onResize"
			data-wp-on-document--visibilitychange="callbacks.onVisibilityChange"
			data-wp-watch--interval="callbacks.watchInterval"
			data-wp-watch--intersection="callbacks.watchIntersection"
			data-wp-on--mouseenter="actions.pause"
			data-wp-on--mouseleave="actions.maybePlay"
			data-wp-on--focusin="actions.pause"
			data-wp-on--focusout="actions.maybePlay"
			data-wp-on--touchstart="actions.pause"
		>
			<div
				{...useInnerBlocksProps.save({
					className: `${defaultClassName}-slides`,
				})}
			/>
			<div className={`${defaultClassName}-pagination`}>
				<button
					className={`${defaultClassName}-prev`}
					data-wp-on--click="actions.prevSlide"
					aria-label={__('Previous Slide', 'wi-sonx-fse')}
				>
					<span aria-hidden="true">«</span>
				</button>
				<ol className={`${defaultClassName}-dots`}>
					<template data-wp-each="context.slides">
						<li>
							<button
								className={`${defaultClassName}-dot`}
								data-wp-on--click="actions.goToSlide"
								data-wp-class--is-active="callbacks.isActiveDot"
							>
								<span className="screen-reader-text">
									{__('Go to Slide', 'wi-sonx-fse')}
									<span data-wp-text="callbacks.dotIndex"></span>
								</span>
							</button>
						</li>
					</template>
				</ol>
				<button
					className={`${defaultClassName}-next`}
					data-wp-on--click="actions.nextSlide"
					aria-label={__('Next Slide', 'wi-sonx-fse')}
				>
					<span aria-hidden="true">»</span>
				</button>
			</div>
		</div>
	);
}
