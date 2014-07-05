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
        
        <title><?php wp_title(''); if (wp_title('', false)) { echo ' |'; } bloginfo('name'); ?></title>
                
        <meta property="fb:page_id" content="172078376150876" />
        <meta name="twitter:card" content="summary">
        
        <meta property="og:url" content="<?php echo get_permalink( $post->ID ); ?>"/>
        <meta name="twitter:url" content="<?php echo get_permalink( $post->ID ); ?>">
        
        <meta property="og:title" content="<?php wp_title(''); if (wp_title('', false)) { echo ' |'; } bloginfo('name'); ?>"/>
        <meta name="twitter:title" content="<?php wp_title(''); if (wp_title('', false)) { echo ' |'; } bloginfo('name'); ?>">
        
        <meta property="og:description" content="<?php bloginfo('description'); ?>"/>
        <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
                        
        <meta itemprop="image" content="<?php echo get_template_directory_uri() ?>/img/favicons/icon.png">
        <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/img/favicons/icon.png"/>
        <meta name="twitter:image" content="<?php echo get_template_directory_uri() ?>/img/favicons/icon.png">
        
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon.ico"/>
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/img/favicons/AppIcon60x60.png"/><!-- 60x60 -->
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri() ?>/img/favicons/AppIcon76x76.png"/><!-- 76x76 -->
        <link rel="apple-touch-icon" sizes="512x512" href="<?php echo get_template_directory_uri() ?>/img/favicons/iTunesArtwork.png"/><!-- 512x512 -->
        <link rel="apple-touch-icon" sizes="1024x1024" href="<?php echo get_template_directory_uri() ?>/img/favicons/iTunesArtwork@2x.png"/><!-- 1024x1024 -->

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/gumby.css">

        <?php
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-effects-slide');
        wp_enqueue_script('gumby', get_template_directory_uri() . '/js/gumby.min.js', '', null, true);
        wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', '', null, true);
        wp_enqueue_script('gumby-main', get_template_directory_uri() . '/js/main.js', '', null, true);
        wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', '', null, false);
        wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', '', null, false);
        wp_enqueue_script('floatlabels', get_template_directory_uri() . '/js/floatlabels.min.js', '', null, false);
        if (is_single()) {
            wp_enqueue_script('background-check', get_template_directory_uri() . '/js/background-check.min.js', '', null, false);
            wp_enqueue_script('pixelate', get_template_directory_uri() . '/js/pixelate.min.js', '', null, false);
        }
        if (is_page()) {
            wp_enqueue_script('roundabout', get_template_directory_uri() . '/js/jquery.roundabout.min.js', '', null, true);
            wp_enqueue_script('roundabout-shapes', get_template_directory_uri() . '/js/jquery.roundabout-shapes2.js', '', null, true);
            wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js', '', null, true);
        }
        if (is_category() || is_archive() || is_search()) {
            wp_enqueue_script('jquery-masonry');
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
        <header id="header" class="navigate fixed" gumby-fixed="top" role="banner">
            <div class="row">
                <div class="three columns logo" >
                    <?php if (is_home() || is_front_page()) : ?>
                        <h1 class="site-name"><a itemprop="url" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> | <?php echo get_bloginfo('description'); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a></h1>  
                    <?php else: ?>
                        <span class="site-name"><a itemprop="url" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> | <?php echo get_bloginfo('description'); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a></span>
                    <?php endif ?>                    
                </div>
                <nav class="six columns">
                    <?php
                    if (function_exists('wp_nav_menu')) {
                        wp_nav_menu(array('sort_column' => 'menu_order', 'menu_class' => 'sf-menu', 'theme_location' => 'main-menu'));
                    } else {
                        
                    }
                    ?>  
                </nav>
                <div class="three columns">
                    <a href="<?php bloginfo('url'); ?>/masz-ciekawy-projekt" class="intouch"><?php _e('Kontakt z nami', 'staircase3d'); ?></a>
                </div>
                <a class="toggle" gumby-trigger=".sf-menu" href="#"><i class="icon-menu"></i></a>
            </div>
        </header>
        <div class="social-nav">
            <a class="toogler" href=""><span><i class="icon-link"></i></span></a>
            <ul class="social-icon">
                <li><a target="_blank" href="https://twitter.com/superstaircase"><i class="icon-twitter"></i></a></li>
                <li><a target="_blank" href="https://www.facebook.com/klatkaschodowa"><i class="icon-facebook"></i></a></li>
                <!--<li><a target="_blank" href="http://www.behance.net/klatkaschodowa"><i class="icon-behance"></i></a></li>-->
            </ul>
        </div>
        <section class="wrapper clearfix">