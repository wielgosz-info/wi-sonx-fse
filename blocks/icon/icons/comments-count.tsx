import { SVG, Path } from '@wordpress/primitives';

function CommentsCountIcon() {
	return (
		<SVG viewBox="0 0 24 24" version="1.1">
			<Path d="m2 6c0-1.656 1.344-3 3-3h14c1.656 0 3 1.344 3 3v8c0 1.656-1.344 3-3 3h-3l2 5-6-5h-7c-1.656 0-3-1.344-3-3z" />
		</SVG>
	);
}

CommentsCountIcon.displayName = 'Comments count';

export default CommentsCountIcon;
