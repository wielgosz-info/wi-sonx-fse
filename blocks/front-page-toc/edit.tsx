import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import { SVG, Path } from '@wordpress/primitives';
import { __ } from '@wordpress/i18n';

export function edit({name}) {
	const defaultClassName = getBlockDefaultClassName(name);
	const blockProps = useBlockProps();

	// TODO: Hardcoded for now, get back to it later
	const anchors: [string, string | false][] = [
		['hello', false],
		['about', 'About me'],
		['services', 'Services'],
		['portfolio', 'Projects'],
		['experience', 'Experience'],
		['blog', 'Blog'],
		['contact', 'Contact'],
	];

	return (
		<nav
			{...blockProps}
			aria-label={__('Table of contents', 'wi-sonx-fse')}
		>
			<button
				className={`${defaultClassName}-button`}
				aria-label={__('Open table of contents', 'wi-sonx-fse')}
				aria-controls={`${defaultClassName}-list`}
				aria-expanded="true"
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
			>
				{anchors.map(([anchor, title]) =>
					title ? (
						<li key={anchor} className={`${defaultClassName}-item`}>
							<a
								className={`${defaultClassName}-link`}
								href={`#${anchor}`}
							>
								<span className={`${defaultClassName}-label`}>
									{title}
								</span>
							</a>
						</li>
					) : null
				)}
			</ol>
		</nav>
	);
}
