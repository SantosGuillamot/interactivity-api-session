import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';

import { BlockEdit } from './edit';
import metadata from './block.json';
import './style.css';

registerBlockType(metadata, {
	edit: BlockEdit,
	save: () => {
		return <InnerBlocks.Content />;
	},
});
