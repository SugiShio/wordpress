<?php get_header(); ?>
<?php
  foreach($GLOBALS['page_config'] as $page) {
    $to = $page['id'] == 'top'
      ? '/'
      : '/' . $page['id'] . '/';
    $menu_items[] = ['label' => $page['label'], 'to' => $to];
  };
  foreach($GLOBALS['medias'] as $media) {
    $menu_items[] = [
      'label' => $media['label'],
      'iconName' => $media['name'],
      'href' => $media['url']
    ];
  };
?>

<div id="app" class="m-wrapper">
  <transition name='fade'>
    <div class="m-container top" v-if='isTop'>
      <?php include('pages/top.php'); ?>
    </div>
    <layout-default v-else :menu-items='<?php echo json_encode($menu_items); ?>'>
    <?php foreach(array_slice($GLOBALS['page_config'], 1) as $page) : ?>
      <template #<?php echo $page['id']; ?>>
        <?php include('pages/' . $page['id'] . '.php'); ?>
      </template>
    <?php endforeach; ?>
    </layout-default>
  </transition>
</div>
<?php get_footer(); ?>