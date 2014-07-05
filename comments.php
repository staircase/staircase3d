<div class="comments">
    <?php if (post_password_required()) : ?>
        <p><?php _e('Wpis zabezpieczony hasłem. Wpisz hasło aby zobaczyć komentarze.', 'staircase3d'); ?></p>
    </div>
    <?php return; endif; ?>
    <?php if (have_comments()) : ?>
    <h2><?php comments_number(); ?></h2>
    <ul>
        <?php wp_list_comments('type=comment&callback=staircase3dcomments');   ?>
    </ul>
    <?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>