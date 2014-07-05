<?php get_header(); ?>
<main role="main">
    <section class="row">
        <div class="eight columns centered">
            <header class="post-header">
                <h1 class="entry-title"><?php _e('Ups...', 'staircase3d'); ?></h1>
                <span class="hero-title"><?php _e('Błąd 404', 'staircase3d'); ?></span>
                <p class="desc-title"><?php _e('Strona, której szukasz, nie istnieje lub została przeniesiona.', 'staircase3d'); ?></p>
            </header>
            <article class="entry-content">
                <?php get_search_form(); ?>
            </article>
        </div>
    </section>
</main>
<?php get_footer(); ?>
