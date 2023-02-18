<?php
  $breadcrumb = ['Top' => home_url()];
  $page_title = '';
  if ( $_GET['dep'] ) {
    $dep = get_page_by_path($_GET['dep'], 'OBJECT', 'department');
  };

  if(is_page()) {
    $page_title = get_the_title();

  } else if (is_archive()) {
    $post_type = get_post_type();

    if($dep) {
      $label = get_post_type_object($post_type)->label;
      $url = get_post_type_archive_link($post_type);
      $breadcrumb += [$label => $url];
      $page_title = $dep->post_title.'部門';

    } else if ($post_type == 'article' && $_GET['cat']) {
        $category = get_category_by_slug($_GET['cat']);
        $label = get_post_type_object($post_type)->label;
        $url = get_post_type_archive_link($post_type);
        $breadcrumb += [$label => $url];
        $page_title = $category->name;

    } else {
      $page_title = get_post_type_object($post_type)->label;
    };

  } else if (is_single()) {
    $post_type = get_post_type();
    $label = get_post_type_object($post_type)->label;
    $url = get_post_type_archive_link($post_type);
    $breadcrumb += [$label => $url];

    if($post_type == 'article') {
      $category = get_the_category()[0];
      if($category) {
        $label = $category->name;
        $url = add_query_arg('cat', $category->slug, $url);
        $breadcrumb += [$label => $url];
      }

    } else {
      $page_title = get_the_title();
    }
  }
?>
<div class="u-header">
  <ul class="u-header__breadcrumb">
    <?php foreach ($breadcrumb as $key => $value) : ?>
    <li class="u-header__breadcrumb-item"><a href="<?php echo $value; ?>"><?php echo $key; ?></a></li>
    <?php endforeach; ?>
  </ul>
  <?php if($page_title) : ?>
  <h1 class="u-header__title"><?php echo $page_title; ?></h1>
  <?php endif; ?>
</div>