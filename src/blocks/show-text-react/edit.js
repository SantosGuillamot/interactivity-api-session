import { useBlockProps } from '@wordpress/block-editor';

export const BlockEdit = () => {
	const blockProps = useBlockProps();

	return (
		<div {...blockProps}>
			<p>Show Text</p>
		</div>
	);
};
