<?php get_header(); ?>
<main role="main">
    <section class="row">
        <div class="eight columns centered">
            <h1><?php echo sprintf(__('% Wyników wyszukiwania dla', 'staircase3d'), $wp_query->found_posts); echo get_search_query(); ?></h1>
            <?php get_template_part('loop'); ?>
            <?php get_template_part('pagination'); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>