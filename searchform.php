<?php $unique_id = esc_attr(uniqid('search-form-')); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <label for="<?php echo $unique_id; ?>">
    <span class="screen-reader-text"><?php echo _x('Pesquisar Por:', 'label', 'leowps-starter'); ?></span>
  </label>
  <div class="form-group">
  <input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="<?php echo esc_attr_x('Pesquisar &hellip;', 'placeholder', 'leowps-starter'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  </div>
  <button type="submit" class="search-submit btn btn-primary"><span class="screen-reader-text"><?php echo _x('Pesquisar', 'submit button', 'leowps-starter'); ?></span></button>
</form>