<?php get_header(); ?>
<main role="main">
    <!-- section -->
    <section>
        <!-- article -->
        <article id="post-404">
            <h1><?php _e('Nie znaleziono strony', 'staircase3d'); ?></h1>
            <h2><a href="<?php echo home_url(); ?>"><?php _e('Powrót do strony głównej?', 'staircase3d'); ?></a></h2>            
        </article>
        <!-- /article -->
    </section>
    <!-- /section -->
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>