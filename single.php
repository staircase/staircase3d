<?php get_header(); ?>
<main role="main">
    <!-- section -->
    <section>
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <!-- post thumbnail -->
                    <?php if (has_post_thumbnail()) : // Check if Thumbnail exists ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                        </a>
                    <?php endif; ?>
                    <!-- /post thumbnail -->
                    <!-- post title -->
                    <h1>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </h1>
                    <!-- /post title -->
                    <!-- post details -->
                    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                    <span class="author"><?php _e('Opublikowano', 'staircase3d'); ?> <?php the_author_posts_link(); ?></span>
                    <span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link(__('Zostaw komentarz', 'staircase3d'), __('1 komentarz', 'staircase3d'), __('% komentarzy', 'staircase3d')); ?></span>
                    <!-- /post details -->
                    <?php the_content(); // Dynamic Content ?>
                    <?php the_tags(__('Tags: ', 'staircase3d'), ', ', '<br>'); // Separated by commas with a line break at the end ?>
                    <p><?php _e('W kategorii: ', 'staircase3d'); the_category(', '); // Separated by commas   ?></p>
                    <p><?php _e('Napisał ', 'staircase3d'); the_author(); ?></p>
                    <?php edit_post_link(); // Always handy to have Edit Post Links available    ?>
                    <?php comments_template(); ?>
                </article>
                <!-- /article -->
            <?php endwhile; ?>
        <?php else: ?>
            <?php get_template_part('not-found'); ?>
    <?php endif; ?>
    </section>
    <!-- /section -->
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>