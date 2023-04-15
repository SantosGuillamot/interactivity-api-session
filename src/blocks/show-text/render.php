<div <?php echo get_block_wrapper_attributes(); ?> data-wp-context='{ "hidden": true }'>
    <button data-wp-on.click="actions.sessionPlugin.toggle" data-wp-effect="effects.sessionPlugin.logShow"> Toggle </button>
    <div class="hidden-text" data-wp-bind.hidden="context.hidden">
        <p>Some text!</p>
    </div>
</div>