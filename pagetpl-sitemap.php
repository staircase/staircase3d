<?php
/*
 * Template Name: Sitemap
 */
?>
<?php get_header(); ?>
<main role="main">
    <section class="row" itemscope itemtype="http://schema.org/Article">
        <div class="eight columns centered">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <header class="post-header">
                        <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
                        <h2 class="hero-title"><?php echo _(vp_metabox('metabox_staircase.hero')) ?></h2>
                        <p class="desc-title"><?php echo _(vp_metabox('metabox_staircase.faksymile')) ?></p>
                    </header>
                <?php endwhile; ?>
                    <article class="entry-content">
                        <?php get_template_part('sitemap'); ?>  
                    </article>                               
            <?php else : ?>
                <?php get_template_part('not-found'); ?>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>