<?php

    //inherit parent theme styles
    add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', PHP_INT_MAX);
    function my_theme_enqueue_styles()
    {
        $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
        $theme = wp_get_theme();
        wp_enqueue_style(
            $parenthandle,
            get_template_directory_uri() . '/style.css',
            array(),  // if the parent theme code has a dependency, copy it to here
            $theme->parent()->get('Version')
        );
        wp_enqueue_style(
            'child-style',
            get_stylesheet_uri(),
            array($parenthandle),
            $theme->get('Version') // this only works if you have Version in the style header
        );
    }

    function my_scripts()
    {
        wp_enqueue_style('bootstrap4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css');
        wp_enqueue_script('boot1', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array('jquery'), '', true);
        wp_enqueue_script('boot2', 'https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js', array('jquery'), '', true);
        wp_enqueue_script('boot3', 'https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js', array('jquery'), '', true);
    }
    add_action('wp_enqueue_scripts', 'my_scripts');


    /**
     * Register Custom Navigation Walker
     */
    function register_navwalker()
    
    {
        require_once get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    add_action('after_setup_theme', 'register_navwalker');
