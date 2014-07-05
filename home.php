<?php get_header(); ?>
<main role="main">
    <section id="slider">
        <ul class="carousel">
            <li class="slide1 item tcenter white">
                <div class="row">
                    <hgroup class="eight columns centered">
                        <h2><?php _e('Witamy', 'staircase3d'); ?></h2>
                        <h1><?php _e('Jesteśmy Staircase', 'staircase3d'); ?></h1>
                        <p><?php _e('Agencja interaktywna wyspecjalizowana w budowaniu strategii komunikacji i interakcji ze szczególnym naciskiem w kierunku estetyki oraz innowacji.', 'staircase3d'); ?></p>   
                        <div class="btn"><a href="<?php bloginfo('url'); ?>/co-oferujemy"><?php _e('Co oferujemy', 'staircase3d'); ?></a></div>
                        <div class="btn"><a href="<?php bloginfo('url'); ?>/masz-ciekawy-projekt"><?php _e('Kontakt z nami', 'staircase3d'); ?></a></div>
                    </hgroup>
                </div>
            </li>
            
        </ul>
    </section>
</main>
<?php get_footer(); ?>