<div
    <?php echo get_block_wrapper_attributes(); ?> 
    data-wp-context='{ "hidden": true }'
>
    <button
        data-wp-effect="effects.sessionPlugin.logShow"
        data-wp-on--click="actions.sessionPlugin.toggle"
    >
        Toggle
    </button>
    <div class="hidden-text" data-wp-bind--hidden="context.hidden">
        <p>Some text!</p>
    </div>
</div>