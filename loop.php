<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('levels'); ?> itemscope itemtype="http://schema.org/Article">
            <time class="time" itemprop="datePublished" content="<?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?>" title="<?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?>"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></time>
            <time style="display:none;" class="entry-date updated" datetime="<?php the_modified_time('d F Y') ?>"><?php the_modified_time('d F Y') ?></time>
            <span class="vcard" style="display:none;" itemprop="author" itemscope itemtype="http://schema.org/Person">
                <a href="<?php echo get_the_author_meta( $field = 'googleplus' ); ?>" class="url"><span class="fn" itemprop="name"><?php the_author_meta('display_name'); ?></span></a>
                <span class="org"><?php bloginfo('name'); ?></span>
            </span>
            <?php if (has_post_format('quote')) { ?>
                <blockquote cite="<?php echo _(vp_metabox('metabox_st.citelink')) ?>">
                    <i class="icon-quote"></i><br/>
                    <?php the_title(); ?>
                    <cite><?php echo _(vp_metabox('metabox_st.authorname')) ?></cite>
                </blockquote>
            <?php } else if (has_post_format('video')) { ?>
                <?php
                $parsedUrl = parse_url(vp_metabox('metabox_st.citelink'));
                $embed = $parsedUrl['query'];
                parse_str($embed, $out);
                $embedUrl = $out['v'];
                ?>
                <iframe src="http://www.youtube.com/embed/<?php echo $embedUrl; ?>" frameborder="0" allowfullscreen></iframe>
                <div class="entry-box">
                    <span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" title="Przeczytaj <?php the_title(); ?>" class="animated read-more"><?php _e('Czytaj więcej', 'staircase3d'); ?></a>
                    </div>                
                </div>
            <?php } else if (has_post_format('link')) { ?>  
                <div class="row valign">
                    <div>
                        <h2 class="link-title">
                            <i class="icon-link"></i><br/>
                            <a href="<?php the_title(); ?>" class="animated" title="<?php printf(esc_attr__('Link bezpośredni do %s'), the_title_attribute('echo=0')); ?>" rel="bookmark" target="_blank"><?php the_title(); ?></a>
                        </h2>
                        <div class="link-content">
                            <?php echo get_the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>               
                <?php if (has_post_thumbnail()) : ?>
                    <a class="entry-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url">
                        <?php the_post_thumbnail('entry-thumb', array('itemprop' => 'image')); ?>
                    </a>
                <?php endif; ?>
                <div class="entry-box">
                    <span itemprop="articleSection"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                    <h2 class="entry-title" itemprop="name headline">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url" rel="bookmark"><?php the_title(); ?></a>
                    </h2>
                    <div class="entry-content">
                        <span itemprop="description"><?php the_excerpt(); ?></span>
                        <a href="<?php the_permalink(); ?>" title="Przeczytaj <?php the_title(); ?>" class="animated read-more"><?php _e('Czytaj więcej', 'staircase3d'); ?></a>
                    </div>                
                </div>                
            <?php } ?>
        </article>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_template_part('not-found'); ?>
<?php endif; ?>
