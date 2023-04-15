<?php

function add_class_to_show_text_blocks($block_content, $block)
{
	if ($block['blockName'] === "session/show-text" || $block['blockName'] === "session/show-text-react") {
		$w = new WP_HTML_Tag_Processor($block_content);
		while ($w->next_tag('div')) {
			$classes = $w->get_attribute('class');
			if (
				str_contains($classes, 'hidden-text')
			) {
				$w->add_class('red-text');
			}
		}
		return (string) $w;
	}
	return $block_content;
}

add_filter('render_block', 'add_class_to_show_text_blocks', 10, 2);
