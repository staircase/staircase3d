<?php get_header(); ?>
<main role="main" class="single-post" itemscope itemtype="http://schema.org/Article">
    <?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'secondary-image')) { ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                BackgroundCheck.init({
                    targets: '.post-header',
                    images: '#main-pt'
                });
            }); 
            jQuery(document).ready(function($) {
                $("#img-id img").each(function(i, elem) {
                    var img = $(elem);
                    var div = $("<div class='parralax'/>").attr('id', 'main-pt').attr('itemprop', 'image').css({
                        background: "url(" + img.attr("src") + ") 50% 50% fixed no-repeat"
                    });
                    img.replaceWith(div);
                });
                $('#main-pt').css({'height': (($(window).height() * 0.88) - 70) + 'px'});
                $(window).resize(function() {
                    $('#main-pt').css({'height': (($(window).height() * 0.88) - 70) + 'px'});
                });
                $('.post-header').css({'margin-bottom': (($('#main-pt').height() * .55) - ($('.post-header').height() * .45)) + 'px'});
                $(window).resize(function() {
                    $('.post-header').css({'margin-bottom': (($('#main-pt').height() * .55) - ($('.post-header').height() * .45)) + 'px'});
                });
                $('.thumbrow').css({'margin-top': -(($('#main-pt').height() * .55) + ($('.post-header').height() * .45)) + 'px'});
                $(window).resize(function() {
                    $('.thumbrow').css({'margin-top': -(($('#main-pt').height() * .55) + ($('.post-header').height() * .45)) + 'px'});
                });
            });
        </script>
        <div id="img-id" class="clearfix">
            <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'); ?>
        </div>
        <section class="row thumbrow">
    <?php } else { ?>
        <section>
    <?php } ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="row">
                <div class="eight columns centered">
                    <header class="post-header">
                        <h1 class="entry-title"><?php $category = get_the_category();  echo $category[0]->cat_name; ?></h1>
                        <h2 class="hero-title"><span itemprop="name"><?php the_title(); ?></span></h2>
                        <?php edit_post_link(); ?>  
                    </header>
                </div>
            </div>
            <span style="display:none;"><?php the_post_thumbnail('entry-thumb', array('itemprop' => 'image')); ?></span>
            <?php if( empty( $post->post_content) ) { } else { ?>
            <div class="row content-container">
                <aside class="two columns">                    
                    <?php get_template_part('post-meta'); ?>
                </aside>
                <article class="ten columns entry-content" itemprop="articleBody">
                    <?php the_content(__('<p>Przeczytaj resztę tego wpisu &raquo;</p>', 'staircase3d')); ?>                    
                </article>
            </div>
            <div class="row">
                <footer class="eight columns centered">
                    <?php comments_template(); ?>                    
                </footer>
            </div>
            <?php } ?>
            
                <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('not-found'); ?>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>