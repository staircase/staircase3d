<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- post thumbnail -->
            <?php if (has_post_thumbnail()) : // Check if thumbnail exists ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail(array(120, 120)); // Declare pixel size you need inside the array ?>
                </a>
            <?php endif; ?>
            <!-- /post thumbnail -->
            <!-- post title -->
            <h2>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </h2>
            <!-- /post title -->
            <!-- post details -->
            <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
            <span class="author"><?php _e('Opublikowan', 'staircase3d'); ?> <?php the_author_posts_link(); ?></span>
            <span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link(__('Zostaw komentarz', 'staircase3d'), __('1 komentarz', 'staircase3d'), __('% komentarzy', 'staircase3d')); ?></span>
            <!-- /post details -->
            <?php staircase3d_excerpt('staircase3d_index'); // Build your custom callback length in functions.php ?>
            <?php edit_post_link(); ?>
        </article>
        <!-- /article -->
    <?php endwhile; ?>
<?php else: ?>
    <?php get_template_part('not-found'); ?>
<?php endif; ?>