<form method="get" action="<?php echo esc_url(home_url()); ?>" class="form-search">
    <input type="text"
        placeholder="<?php esc_attr_e('Search...', 'intothedark'); ?>"
        name="s">
    <button type="submit">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/search-outline.svg" alt="search" class="icon-white">
    </button>
</form>