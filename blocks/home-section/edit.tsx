import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function edit() {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ["core/paragraph"],
		template: [["core/paragraph"], ["core/paragraph"]],
		templateLock: "all",
	});
	return <div {...innerBlocksProps}></div>;
}
