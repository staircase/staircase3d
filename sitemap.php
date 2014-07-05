<div class="row">
    <div class="six columns">
        <h5><?php _e('Artykuły:', 'staircase3d'); ?></h5>
        <ul>
            <?php
            $cats = get_categories('exclude=');
            foreach ($cats as $cat) {
                echo "<li><strong>" . $cat->cat_name . "</strong>";
                echo "<ul>";
                query_posts('posts_per_page=-1&cat=' . $cat->cat_ID);
                while (have_posts()) {
                    the_post();
                    $category = get_the_category();
                    if ($category[0]->cat_ID == $cat->cat_ID) {
                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                }
                echo "</ul>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
    <div class="six columns">
        <h5><?php _e('Strony:', 'staircase3d'); ?></h5>
        <ul>
            <?php
            wp_list_pages(
                    array(
                        'exclude' => '',
                        'title_li' => '',
                    )
            );
            ?>
        </ul>
        <h5><?php _e('Autorzy:', 'staircase3d'); ?></h5>
        <ul>
            <?php
            wp_list_authors(
                    array(
                        'exclude_admin' => false,
                    )
            );
            ?>
        </ul>
        <h5><?php _e('Mapa XML:', 'staircase3d'); ?></h5>
        <a href="<?php bloginfo('url'); ?>/sitemap.xml" rel="bookmark"><?php bloginfo('url'); ?>/sitemap.xml</a>
    </div>
</div>