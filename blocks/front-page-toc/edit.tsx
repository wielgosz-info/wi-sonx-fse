import { getBlockDefaultClassName } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

export function edit({name}) {
	const defaultClassName = getBlockDefaultClassName(name);
	const blockProps = useBlockProps();

	return (
		<div {...blockProps}>
			<button></button>
			<nav>
				<ol>
					<li></li>
					<li></li>
					<li></li>
				</ol>
			</nav>
		</div>
	);
}
