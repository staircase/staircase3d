<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/Organization"> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        
        <title><?php wp_title(''); if (wp_title('', false)) { echo ' | '; } bloginfo('name'); ?></title>
        
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon.ico"/>
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/img/favicons/AppIcon60x60.png"/><!-- 60x60 -->
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri() ?>/img/favicons/AppIcon76x76.png"/><!-- 76x76 -->
        <link rel="apple-touch-icon" sizes="512x512" href="<?php echo get_template_directory_uri() ?>/img/favicons/iTunesArtwork.png"/><!-- 512x512 -->
        <link rel="apple-touch-icon" sizes="1024x1024" href="<?php echo get_template_directory_uri() ?>/img/favicons/iTunesArtwork@2x.png"/><!-- 1024x1024 -->

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/gumby.css">

        <?php
        wp_enqueue_script('jquery');
        wp_enqueue_script('gumby', get_template_directory_uri() . '/js/gumby.min.js', '', null, true);
        wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', '', null, true);
        wp_enqueue_script('gumby-main', get_template_directory_uri() . '/js/main.js', '', null, true);
        wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', '', null, false);
        if (is_home() || is_front_page()) {    
            wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', '', null, false);
        }
        if (is_single()) {
            
        }
        if (is_page()) {
            
        }
        if (is_category() || is_archive() || is_search()) {
            
        }
        wp_head();
        ?>

    </head>
    <body <?php body_class(); ?>>        
        <script type="text/javascript">
            //<![CDATA[
            (function() {
                var c = document.body.className;
                c = c.replace(/no-js/, 'js');
                document.body.className = c;
            })();
            //]]>
        </script>
        <div class="navcontain">
            <header id="header" class="navbar" gumby-fixed="top" role="banner">
                <div class="row">
                    <div class="three columns logo" >
                        <?php if (is_home() || is_front_page()) : ?>
                            <h1 class="site-name"><a itemprop="url" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> | <?php echo get_bloginfo('description'); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a></h1>  
                        <?php else: ?>
                            <span class="site-name"><a itemprop="url" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> | <?php echo get_bloginfo('description'); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a></span>
                        <?php endif ?>                    
                    </div>
                    <nav class="nine columns">
                          <?php
                        if (function_exists('wp_nav_menu')) {
                            wp_nav_menu(array('sort_column' => 'menu_order', 'menu_class' => 'sf-menu', 'theme_location' => 'main-menu'));
                        } else {

                        }
                        ?>
                    </nav>           
                    <a class="toggle" gumby-trigger=".sf-menu" href="#"><i class="icon-menu"></i></a>
                </div>
            </header>
        </div>