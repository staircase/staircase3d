<?php
/*
 * Template Name: Archiwum Case Studies
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
                    <article class="entry-content">
                        <?php the_content(__('<p>Przeczytaj resztę tego wpisu &raquo;</p>', 'staircase')); ?>                    
                    </article>                               
                <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('not-found'); ?>
            <?php endif; ?>
        </div>
    </section>
    <section class="case row" itemscope itemtype="http://schema.org/CreativeWork">
        <div class="study-container">

            <a title="" class="study-thumbnail zakuski" href="<?php bloginfo('url'); ?>/category/levels/produkty-i-uslugi/">
                <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/zakuski_bg.jpg');" class="oneofthree"></div>
                <div class="container">
                    <div class="inner">
                        <div class="element">
                            <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/zakuski-logo.png'); width:50%; padding-bottom: 19%;" class="logo"></div>                     
                        </div>
                    </div>
                </div>
                <div class="desctime">
                    <p><?php _e('Dostępne za:', 'staircase3d'); ?></p>
                    <div class="counter" data-date="2014-06-30 12:00:00"></div>
                    <p><?php _e('tymczasem sprawdź sekcję Produkty i usługi', 'staircase3d'); ?></p>
                </div>
            </a>

            <a title="" class="study-thumbnail otolinski" href="<?php bloginfo('url'); ?>/category/levels/produkty-i-uslugi/">
                <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/otolinski_bg.jpg');" class="oneofthree"></div>
                <div class="container">
                    <div class="inner">
                        <div class="element">
                            <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/otolinski-logo.png'); width:41%; padding-bottom: 26%;" class="logo"></div>                     
                        </div>
                    </div>
                </div>
                <div class="desctime">
                    <p><?php _e('Dostępne za:', 'staircase3d'); ?></p>
                    <div class="counter" data-date="2014-07-30 12:00:00"></div>
                    <p><?php _e('tymczasem sprawdź sekcję Produkty i usługi', 'staircase3d'); ?></p>
                </div>
            </a>

            <a title="" class="study-thumbnail grt" href="<?php bloginfo('url'); ?>/category/levels/produkty-i-uslugi/">
                <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/grt_bg.jpg');" class="oneofthree"></div>
                <div class="container">
                    <div class="inner">
                        <div class="element">
                            <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/grt-logo.png'); width:43.5%; padding-bottom: 17.95%;" class="logo"></div>                     
                        </div>
                    </div>
                </div>
                <div class="desctime">
                    <p><?php _e('Dostępne za:', 'staircase3d'); ?></p>
                    <div class="counter" data-date="2014-08-30 12:00:00"></div>
                    <p><?php _e('tymczasem sprawdź sekcję Produkty i usługi', 'staircase3d'); ?></p>
                </div>
            </a>

            <a title="" class="study-thumbnail promesa" href="<?php bloginfo('url'); ?>/category/levels/produkty-i-uslugi/">
                <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/promesa_bg.jpg');" class="oneofthree"></div>
                <div class="container">
                    <div class="inner">
                        <div class="element">
                            <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/promesa-logo.png'); width:55%; padding-bottom: 13.4%;" class="logo"></div>                     
                        </div>
                    </div>
                </div>
                <div class="desctime">
                    <p><?php _e('Dostępne za:', 'staircase3d'); ?></p>
                    <div class="counter" data-date="2014-09-30 12:00:00"></div>
                    <p><?php _e('tymczasem sprawdź sekcję Produkty i usługi', 'staircase3d'); ?></p>
                </div>
            </a>

            <a title="" class="study-thumbnail forsello" href="<?php bloginfo('url'); ?>/category/levels/produkty-i-uslugi/">
                <div style="background-image: url('<?php echo get_template_directory_uri() ?>/img/forsello_bg.jpg');" class="oneofthree"></div>
                <div class="container">
                    <div class="inner">
                        <div class="element">
                            <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/forsello-logo.png'); width:50%; padding-bottom: 14.95%;" class="logo"></div>                     
                        </div>
                    </div>
                </div>
                <div class="desctime">
                    <p><?php _e('Dostępne za:', 'staircase3d'); ?></p>
                    <div class="counter" data-date="2014-10-30 12:00:00"></div>
                    <p><?php _e('tymczasem sprawdź sekcję Produkty i usługi', 'staircase3d'); ?></p>
                </div>
            </a>

            <a title="" class="study-thumbnail atthost" href="<?php bloginfo('url'); ?>/category/levels/produkty-i-uslugi/">
                <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/atthost_bg.jpg');" class="oneofthree"></div>
                <div class="container">
                    <div class="inner">
                        <div class="element">
                            <div style="background-image:url('<?php echo get_template_directory_uri() ?>/img/atthost-logo.png'); width:55%; padding-bottom: 10.55%;" class="logo"></div>                     
                        </div>
                    </div>
                </div>
                <div class="desctime">
                    <p><?php _e('Dostępne za:', 'staircase3d'); ?></p>
                    <div class="counter" data-date="2014-11-30 12:00:00"></div>
                    <p><?php _e('tymczasem sprawdź sekcję Produkty i usługi', 'staircase3d'); ?></p>
                </div>
            </a>

        </div>
    </section> 
</main>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/TimeCircles.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".counter").TimeCircles({
            time: {
                Days: {color: "#338ece", text: "Dni"},
                Hours: {color: "#76bd22", text: "Godzin"},
                Minutes: {color: "#ffa632", text: "Minut"},
                Seconds: {color: "#ff5539", text: "Sekund"}
            },
            animation: "smooth",
            circle_bg_color: "#ffffff",
            fg_width: 0.05,
            bg_width: 0.5,
            direction: "Counter-clockwise"
        });
    });
</script>
<?php get_footer(); ?>