import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import { SVG, Path } from '@wordpress/primitives';
import { __ } from '@wordpress/i18n';

import metadata from './block.json';

export function save() {
	const defaultClassName = getBlockDefaultClassName(metadata.name);

	return (
		<nav
			{...useBlockProps.save()}
			aria-label={__('Table of contents', 'wi-sonx-fse')}
			data-wp-interactive="wi-sonx-fse/front-page-toc"
			data-wp-watch="callbacks.watch"
		>
			<button
				className={`${defaultClassName}-button`}
				aria-label={__('Open table of contents', 'wi-sonx-fse')}
				aria-controls={`${defaultClassName}-list`}
				aria-expanded="false"
				data-wp-on--click="actions.open"
				data-wp-bind--aria-expanded="state.isOpen"
			>
				<SVG
					viewBox="0 0 31 18"
					aria-hidden="true"
					focusable="false"
					version="1.1"
				>
					<Path d="m6 0h24v.75h-24z" />
					<Path d="m6 16.5h24v.75h-24z" />
					<Path d="m0 8.25h24v.75h-24z" />
				</SVG>
			</button>
			<ol
				className={`${defaultClassName}-list`}
				id={`${defaultClassName}-list`}
				data-wp-bind--hidden="!state.isOpen"
			>
				<template
					data-wp-each="state.sections"
					data-wp-each-key="context.item.anchor"
				>
					<li className={`${defaultClassName}-item`}>
						{/* eslint-disable-next-line jsx-a11y/anchor-is-valid */}
						<a
							className={`${defaultClassName}-link`}
							data-wp-bind--href="state.href"
						>
							<span
								className={`${defaultClassName}-label`}
								data-wp-text="context.item.title"
							/>
						</a>
					</li>
				</template>
			</ol>
		</nav>
	);
}
