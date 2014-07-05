<form method="get" class="append field center" action="<?php bloginfo('url'); ?>/">
    <input type="text" value="<?php
    if ('' == get_search_query()) {
        _e('Wpisz szukaną frazę...', 'staircase3d');
    } else {
        the_search_query();
    }
    ?>" name="s" class="wide text input" onfocus="this.value = ''" />
    <div class="medium primary btn"><input type="submit" class="searchsubmit" value="<?php _e('Szukaj', 'staircase3d') ?>" title="<?php printf(__('Przeszukaj %s', 'staircase3d'), esc_html(get_bloginfo('name'), 1)) ?>" /></div>
</form>
