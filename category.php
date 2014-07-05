<?php get_header(); ?>
<main role="main">
    <section class="row">
        <div class="eight columns centered">
            <header class="post-header">
                <h2 class="hero-title"><?php single_cat_title(); ?></h2>                
                <?php if (category_description($category) == '') : ?>
                    <p class="desc-title"><?php _e('Przegladasz wpisy w kategorii', 'staircase3d'); ?> <?php single_cat_title(); ?></p>
                <?php else : ?>
                    <p class="desc-title"><?php echo category_description($category); ?></p>
                <?php endif; ?>                 
            </header>
        </div>
    </section>
    <section class="row">
        <div class="three columns">
            <?php get_sidebar(); ?>
        </div>
        <div class="nine columns">
            <div id="leveled">
                <?php get_template_part('loop'); ?>
            </div>
            <footer>
                <?php get_template_part('pagination'); ?>
            </footer>
        </div>
    </section>
</main>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var columns = 2,
                setColumns = function() {
                    columns = $(window).width() > 640 ? 2 : $(window).width() > 320 ? 1 : 1;
                };
        setColumns();
        $(window).resize(setColumns);
        $('#leveled').masonry({
            itemSelector: '.levels',
            columnWidth: function(containerWidth) {
                return containerWidth / columns;
            }
        });
    });
</script>
<?php get_footer(); ?>