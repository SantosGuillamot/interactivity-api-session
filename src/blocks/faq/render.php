<div data-wp-context='{ "hiddenQuestion": true }' <?php echo get_block_wrapper_attributes(); ?>>
	<p data-wp-effect="effects.bifrost.closeQuestion" data-wp-on.click="actions.bifrost.toggleQuestion" class="faq-question"><?php echo $attributes['question'] ?></p>
	<p data-wp-bind.hidden="context.hiddenQuestion" class="faq-answer"><?php echo $attributes['answer'] ?></p>
</div>