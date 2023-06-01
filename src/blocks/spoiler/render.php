<?php
$inner_blocks = $block->inner_blocks;
$inner_blocks_html = '';
foreach ($inner_blocks as $inner_block) {
    $inner_blocks_html .= $inner_block->render();
}

?>

<div data-wp-context='{ "hidden": true }' <?php echo get_block_wrapper_attributes(); ?>>
    <div class="show-media-button" data-wp-on--click="actions.sessionPlugin.showSpoiler">
        <span>Show Content</span>
        <i class="arrow-down"></i>
    </div>
    <div data-wp-bind--hidden="context.hidden">
        <?php echo $inner_blocks_html; ?>
    </div>
</div>