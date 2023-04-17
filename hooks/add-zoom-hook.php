<?php

function add_zoom_to_images($block_content, $block)
{
    $w = new WP_HTML_Tag_Processor($block_content);
    while ($w->next_tag('figure')) {
        $w->set_attribute('data-wp-context', '{ "isZooming": false }');
        $w->add_class('zoom-image-wrapper');
        while ($w->next_tag('img')) {
            $w->set_attribute('data-wp-on.mousemove', 'actions.sessionPlugin.zoom');
            $w->set_attribute('data-wp-on.mouseout', 'actions.sessionPlugin.resetZoom');
        }
    }


    add_action('wp_enqueue_scripts', 'zoom_assets');

    return (string) $w;
}

add_filter('render_block_core/post-featured-image', 'add_zoom_to_images', 10, 2);


// Enqueue the JS file
function zoom_assets()
{
    wp_register_script(
        'zoom-script',
        plugin_dir_url(__FILE__) . '/zoom.js',
        array('wp-directive-runtime'),
        '1.0.0',
        true
    );
    wp_enqueue_script('zoom-script');

    wp_register_style(
        'zoom-style',
        plugin_dir_url(__FILE__) . '/zoom.css',
    );
    wp_enqueue_style('zoom-style');
}
