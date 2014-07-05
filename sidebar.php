<?php $category_id = get_cat_ID( 'Levels' ); $category_link = get_category_link( $category_id ); ?>
<aside class="sidebar" role="complementary">
    <div class="half">
        <strong><a href="<?php echo esc_url( $category_link ); ?>" class="animated"><?php _e('Levels:', 'staircase3d'); ?></a></strong>
        <ul class="archive">
            <?php wp_list_categories('orderby=id&show_count=0&use_desc_for_title=0&child_of=1&title_li='); ?>
        </ul>
    </div>
    <div class="half">
        <strong><?php _e('Archiwa:', 'staircase3d'); ?></strong>
        <ul class="archive">
            <?php wp_get_archives('type=yearly'); ?>
        </ul>
    </div>
</aside>
