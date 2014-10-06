<?php
// Wywołuje Vafpress Framework  http://vafpress.com/documentation/vafpress-framework/getting-started/installation.html
require_once 'vafpress/bootstrap.php';

// Obrazki 
add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
    add_image_size('testimonial-thumb', 80, 80, true);
    add_image_size('entry-thumb', 440, 248, true);
}

// Wypis automatyczny
function custom_excerpt_length($length) {
    return 10;
}

// Custom Excerpts
function staircase3d_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Formaty postów
add_theme_support('post-formats', array(
    'link',
    'quote',
    'media',
    'video',
    'aside'
));

if (function_exists('add_theme_support')) {
    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
    // Localisation Support
    load_theme_textdomain('staircase3d', get_template_directory() . '/languages');
}

// Podmienia wbudowane jquery na wersję 2.1.0
if (!is_admin())
    add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}

// Rejestruje mneu główne i górne
register_nav_menus(array(
    'main-menu' => 'Menu główne',
    'top-menu' => 'Menu górne',
    'sidebar-menu' => 'Menu sidebar' // Sidebar Navigation
));

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'staircase3d'),
        'description' => __('Description for this widget-area...', 'staircase3d'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'staircase3d'),
        'description' => __('Description for this widget-area...', 'staircase3d'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Paginacja
function staircase3d_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Drugie post thumbnails
if (class_exists('MultiPostThumbnails')) {
    $types = array('post');
    foreach ($types as $type) {
        new MultiPostThumbnails(array(
            'label' => 'Druga ikona wpisu',
            'id' => 'secondary-image',
            'post_type' => $type
                )
        );
    }
}

// Podmienia ikonę na stronie logowania do panelu
function new_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_option('siteurl') . '/wp-content/themes/' . get_option('template') . '/login.css" />' . "\n";
}

add_action('login_head', 'new_login');

// Ikona na stronie logowania do panelu Staircase kieruje do strony głównej
function new_login_headerurl($url) {
    return get_bloginfo('siteurl');
}

add_filter("login_headerurl", "new_login_headerurl");

// Podmienia atrybut title dla ikony na stronie logowania do panelu
function new_login_headertitle($message) {
    return get_bloginfo('name');
}

add_filter("login_headertitle", "new_login_headertitle");

// customize admin footer text
function custom_admin_footer() {
    echo 'Dziękujemy za korzystanie z usług <a href="http://staircase.pl/">Staircase</a>';
}

add_filter('admin_footer_text', 'custom_admin_footer');

/**
 * Load options, metaboxes, and shortcode generator array templates.
 */
/**
 * Include Custom Data Sources
 */
require_once 'admin/data_sources.php';

// options
$tmpl_opt = get_template_directory() . '/admin/option/option.php';

// metaboxes
$tmpl_mb1 = get_template_directory() . '/admin/metabox/metabox_staircase.php';
$tmpl_mb2 = get_template_directory() . '/admin/metabox/metabox_st.php';
$mb1 = new VP_Metabox($tmpl_mb1);
$mb2 = new VP_Metabox($tmpl_mb2);

// shortocode generators
$tmpl_sg1 = get_template_directory() . '/admin/shortcode_generator/shortcodes1.php';

/**
 * Create instance of Options
 */
$theme_options = new VP_Option(array(
    'is_dev_mode' => false, // dev mode, default to false
    'option_key' => 'vpt_option', // options key in db, required
    'page_slug' => 'vpt_option', // options page slug, required
    'template' => $tmpl_opt, // template file path or array, required
    'menu_page' => 'themes.php', // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
    'use_auto_group_naming' => true, // default to true
    'use_util_menu' => true, // default to true, shows utility menu
    'minimum_role' => 'edit_theme_options', // default to 'edit_theme_options'
    'layout' => 'fixed', // fluid or fixed, default to fixed
    'page_title' => __('Staircase 3D', 'vp_textdomain'), // page title
    'menu_label' => __('Staircase 3D', 'vp_textdomain'), // menu label
        ));

/**
 * Create instances of Shortcode Generator
 */
$tmpl_sg1 = array(
    'name' => 'sg_1', // unique name, required
    'template' => $tmpl_sg1, // template file or array, required
    'modal_title' => __('Staircase Shortcodes 1', 'vp_textdomain'), // modal title, default to empty string
    'button_title' => __('Staircase', 'vp_textdomain'), // button title, default to empty string
    'types' => array('post', 'page'), // at what post types the generator should works, default to post and page
    'included_pages' => array('appearance_page_vpt_option'), // or to what other admin pages it should appears
);

$sg1 = new VP_ShortcodeGenerator($tmpl_sg1);

// Breadcrumby
function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> | </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> | </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> | </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if ($post->post_parent) {
                $anc = get_post_ancestors($post->ID);
                $title = get_the_title();
                foreach ($anc as $ancestor) {
                    $output = '<li><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="' . $title . '"> ' . $title . '</strong>';
            } else {
                echo '<li><strong>' . get_the_title() . '</strong></li>';
            }
        }
    } elseif (is_tag()) {
        single_tag_title();
    } elseif (is_day()) {
        echo"<li>";
        the_time('F jS, Y');
        echo'</li>';
    } elseif (is_month()) {
        echo"<li>";
        the_time('F, Y');
        echo'</li>';
    } elseif (is_year()) {
        echo"<li>";
        the_time('Y');
        echo'</li>';
    } elseif (is_author()) {
        echo"<li>";
        echo'</li>';
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
        echo "<li>";
        echo'</li>';
    } elseif (is_search()) {
        echo"<li>";
        echo'</li>';
    }
    echo '</ul>';
}

// Referencje

add_action('init', 'testimonials_post_type');

function testimonials_post_type() {
    $labels = array(
        'name' => 'Referencje',
        'singular_name' => 'Referencja',
        'add_new' => 'Dodaj nowe',
        'add_new_item' => 'Dodaj nowe referencje',
        'edit_item' => 'Edytuj referencje',
        'new_item' => 'Nowe referencje',
        'view_item' => 'Zobacz',
        'search_items' => 'Szukaj referencji',
        'not_found' => 'Nie znaleziono referencji',
        'not_found_in_trash' => 'Żadnych referencji w koszu',
        'parent_item_colon' => '',
    );

    register_post_type('testimonials', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array('editor', 'thumbnail', 'title'),
        'register_meta_box_cb' => 'testimonials_meta_boxes', // Callback function for custom metaboxes
    ));
}

function testimonials_meta_boxes() {
    add_meta_box('testimonials_form', 'Szczegóły referencji', 'testimonials_form', 'testimonials', 'normal', 'high');
}

function testimonials_form() {
    $post_id = get_the_ID();
    $testimonial_data = get_post_meta($post_id, '_testimonial', true);
    $client_name = ( empty($testimonial_data['client_name']) ) ? '' : $testimonial_data['client_name'];
    $source = ( empty($testimonial_data['source']) ) ? '' : $testimonial_data['source'];
    $link = ( empty($testimonial_data['link']) ) ? '' : $testimonial_data['link'];

    wp_nonce_field('testimonials', 'testimonials');
    ?>
    <p>
        <label>Imię i nazwisko</label><br />
        <input type="text" value="<?php echo $client_name; ?>" name="testimonial[client_name]" size="40" />
    </p>
    <p>
        <label>Nazwa firmy/Strony</label><br />
        <input type="text" value="<?php echo $source; ?>" name="testimonial[source]" size="40" />
    </p>
    <p>
        <label>Link</label><br />
        <input type="text" value="<?php echo $link; ?>" name="testimonial[link]" size="40" />
    </p>
    <?php
}

add_action('save_post', 'testimonials_save_post');

function testimonials_save_post($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!empty($_POST['testimonials']) && !wp_verify_nonce($_POST['testimonials'], 'testimonials'))
        return;

    if (!empty($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return;
    } else {
        if (!current_user_can('edit_post', $post_id))
            return;
    }

    if (!wp_is_post_revision($post_id) && 'testimonials' == get_post_type($post_id)) {
        remove_action('save_post', 'testimonials_save_post');

        wp_update_post(array(
            'ID' => $post_id
        ));

        add_action('save_post', 'testimonials_save_post');
    }

    if (!empty($_POST['testimonial'])) {
        $testimonial_data['client_name'] = ( empty($_POST['testimonial']['client_name']) ) ? '' : sanitize_text_field($_POST['testimonial']['client_name']);
        $testimonial_data['source'] = ( empty($_POST['testimonial']['source']) ) ? '' : sanitize_text_field($_POST['testimonial']['source']);
        $testimonial_data['link'] = ( empty($_POST['testimonial']['link']) ) ? '' : esc_url($_POST['testimonial']['link']);

        update_post_meta($post_id, '_testimonial', $testimonial_data);
    } else {
        delete_post_meta($post_id, '_testimonial');
    }
}

add_filter('manage_edit-testimonials_columns', 'testimonials_edit_columns');

function testimonials_edit_columns($columns) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Tytuł',
        'testimonial' => 'Referencje',
        'testimonial-client-name' => 'Klient',
        'testimonial-source' => 'Nazwa firmy/Strony',
        'testimonial-link' => 'Link',
        'author' => 'Dadane',
        'date' => 'Data'
    );

    return $columns;
}

add_action('manage_posts_custom_column', 'testimonials_columns', 10, 2);

function testimonials_columns($column, $post_id) {
    $testimonial_data = get_post_meta($post_id, '_testimonial', true);
    switch ($column) {
        case 'testimonial':
            the_excerpt();
            break;
        case 'testimonial-client-name':
            if (!empty($testimonial_data['client_name']))
                echo $testimonial_data['client_name'];
            break;
        case 'testimonial-source':
            if (!empty($testimonial_data['source']))
                echo $testimonial_data['source'];
            break;
        case 'testimonial-link':
            if (!empty($testimonial_data['link']))
                echo $testimonial_data['link'];
            break;
    }
}

/**
 * Display a testimonial
 *
 * @param  int $post_per_page  The number of testimonials you want to display
 * @param  string $orderby  The order by setting  https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters
 * @param  array $testimonial_id  The ID or IDs of the testimonial(s), comma separated
 *
 * @return  string  Formatted HTML
 */
function get_testimonial($posts_per_page = 1, $orderby = 'none', $testimonial_id = null) {
    $args = array(
        'posts_per_page' => (int) $posts_per_page,
        'post_type' => 'testimonials',
        'orderby' => $orderby,
        'no_found_rows' => true,
    );
    if ($testimonial_id)
        $args['post__in'] = array($testimonial_id);

    $query = new WP_Query($args);

    $testimonials = '';
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            $post_id = get_the_ID();
            $testimonial_data = get_post_meta($post_id, '_testimonial', true);
            $client_name = ( empty($testimonial_data['client_name']) ) ? '' : $testimonial_data['client_name'];
            $source = ( empty($testimonial_data['source']) ) ? '' : ' ' . $testimonial_data['source'];
            $link = ( empty($testimonial_data['link']) ) ? '' : $testimonial_data['link'];
            $cite = ( $link ) ? '<a href="' . esc_url($link) . '" target="_blank" itemprop="url">' . $source . '</a>' : $client_name;

            $testimonials .= '<div class="testimonial" itemscope itemtype="http://schema.org/Review">';
            $testimonials .= '<div itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing" style="display:none;"><span itemprop="name">Staircase.pl</span></div>';
            $testimonials .= '<div class="testimonial-inner">';
            $testimonials .= '<div class="testimonial-image" itemprop="image">';
            $testimonials .= get_the_post_thumbnail($post->ID, 'testimonial-thumb');
            $testimonials .= '</div>';
            $testimonials .= '<div class="testimonial-content" itemprop="description"><p>"' . get_the_content() . '"</p></div>';
            $testimonials .= '<div class="testimonial-meta" itemprop="author" itemscope itemtype="http://schema.org/Person">';
            $testimonials .= '<strong itemprop="name">' . $client_name . '</strong>';
            $testimonials .= '<span>' . $cite . '</span>';
            $testimonials .= '</div>';
            $testimonials .= '</div>';
            $testimonials .= '</div>';

        endwhile;
        wp_reset_postdata();
    }

    return $testimonials;
}

add_shortcode('testimonial', 'testimonial_shortcode');

/**
 * Shortcode to display testimonials
 *
 * [testimonial posts_per_page="1" orderby="none" testimonial_id=""]
 */
function testimonial_shortcode($atts) {
    extract(shortcode_atts(array(
        'posts_per_page' => '1',
        'orderby' => 'none',
        'testimonial_id' => '',
                    ), $atts));

    return get_testimonial($posts_per_page, $orderby, $testimonial_id);
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Custom Gravatar in Settings > Discussion
function staircase3dgravatar($avatar_defaults) {
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function staircase3dcomments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['180']); ?>
            <?php printf(__('<cite class="fn">%s</cite> <span class="says">napisał:</span>'), get_comment_author_link()) ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Twój komentarz oczekuje na moderację.') ?></em>
            <br />
        <?php endif; ?>

        <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
                <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '  ', '');
                ?>
        </div>

        <?php comment_text() ?>

        <div class="reply">
            <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
        <?php if ('div' != $args['style']) : ?>
        </div>
    <?php endif; ?>
    <?php
}

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()


/* End of file functions.php */
/* Location: ./functions.php */