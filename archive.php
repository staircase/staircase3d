<?php get_header(); ?>
<main role="main">
    <section class="row">
        <div class="eight columns centered">
            <header class="post-header">
                <h2 class="hero-title"><?php _e('Archiwa', 'staircase3d'); ?></h2>
                <p class="desc-title"><?php echo wp_title(''); ?></p>
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