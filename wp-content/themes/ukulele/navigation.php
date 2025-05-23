<div id="navigation">
  <trigger-button v-if='!isWide'></trigger-button>
  <navigation>
    <h1 class="u-navigation__logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="The Ukulele Contest 4 All">
      </a>
    </h1>

    <?php
      $post = get_page_by_path('entry-button');
      setup_postdata( $post );
      $state = post_custom('state');
      $text = post_custom($state.'_text');
      wp_reset_postdata();
    ?>
    <entry-button
    url="<?php echo get_permalink(get_page_by_path('entry')->ID); ?>"
    text="<?php echo $text ?>"
    state="<?php echo $state ?>"
     ></entry-button>

    <?php
    $posts = get_posts(array(
      'post_type' => 'menu',
      'meta_key' => 'order',
      'orderby' => 'meta_value_num',
      'order' => 'ASC',
      'posts_per_page' => 20,
    ));
    foreach($posts as $post) {
      setup_postdata( $post );
      $item = [];
      $item['label'] = get_the_title();
      switch (post_custom('type')) {
        case 'url':
          $item['url'] = post_custom('url');
          break;

        case 'slug':
          $id = get_page_by_path(post_custom('slug'));
          $item['url'] = get_permalink($id);
          break;

        case 'posttype':
          $item['url'] = get_post_type_archive_link(post_custom('post_type'));
          break;

        case 'accordion':
          $item['type'] = 'accordion';
          $accordion_items = json_decode(post_custom('config'))->items;
          foreach($accordion_items as $accordion_item) {
            $url = get_post_type_archive_link($accordion_item->post_type);
            $url = remove_query_arg('paged', $url);
            $item['labels'][] = $accordion_item->label;
            foreach($accordion_item->query as $key => $value) {
              $url = add_query_arg($key, $value, $url);
            }
            $item['urls'][] = $url;
          }
          break;
      }
      $item['disabled'] = (bool)post_custom('disabled');
      $item['new_tab'] = (bool)post_custom('new_tab');
      $menu_items[] = $item;
      wp_reset_postdata();
    };
    $menu_items = htmlspecialchars(json_encode($menu_items));
    ?>
    <ukulele-menu
    disabled-label="準備中"
    :items="<?php echo $menu_items ?>"
    ></ukulele-menu>

    <?php /*
    <language-selector
    :languages='<?php echo htmlspecialchars(json_encode($GLOBALS['langs'])); ?>'
    current-language='<?php echo $GLOBALS['lang']['value']; ?>'
    ></language-selector>
    */ ?>
  </navigation>
</div>
