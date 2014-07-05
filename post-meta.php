<div class="post-meta">
    <div class="post-author box" itemscope itemtype="http://data-vocabulary.org/Person">
        <?php userphoto_the_author_photo('<p>', '</p>', array('class' => 'photo', 'itemprop' => 'photo'), get_template_directory_uri() . '/img/nophoto.png') ?>
        <p><?php _e('Autor: ', 'staircase3d'); ?> <span itemprop="name"><a href="<?php echo get_author_posts_url(get_the_author_meta('googleplus')); ?>" class="animated"><?php the_author_meta('display_name'); ?></a></span></br>
            <span itemprop="title"><?php the_author_description(); ?></span></p>
    </div>
    <div class="post-date box">
        <strong><?php _e('Utworzono: ', 'staircase3d'); ?></strong><br/>
        <time class="date"><?php the_time('j F Y'); ?></time>
    </div>
    <div class="categories box">
        <strong><?php _e('W kategorii: ', 'staircase3d'); ?></strong><br/>
        <?php the_category('</br>'); ?>
        <?php
        $categories = get_the_category();
        $separator = ', ';
        $output = '';
        if ($categories) {
            foreach ($categories as $category) {
                echo '<span style="display:none;" itemprop="articleSection">' . $category->cat_name . '</span>';
            }
        }
        ?>
    </div>
    <div class="page-tools box">
        <strong><?php _e('Narzędzia: ', 'staircase3d'); ?></strong><br/>
        <a href="#Print" onclick="window.print();
                return false;" title="<?php _e('Drukuj', 'staircase3d'); ?>"><?php _e('Drukuj', 'staircase3d'); ?></a><i class="icon-print"></i>
    </div>
    <div class="tags box">
        <?php the_tags('<ul><li itemprop="keywords">', '</li><li itemprop="keywords">', '</li></ul>'); ?>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        //$('.post-author img').pixelate();
    });
</script>
