import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

export const BlockEdit = () => {
	const blockProps = useBlockProps();

	return (
		<div {...blockProps}>
			<InnerBlocks />
		</div>
	);
};
