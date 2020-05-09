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
    <div class="m-container" v-if='isTop'>
      <?php include('pages/top.php'); ?>
    </div>
    <layout-default v-else :menu-items='<?php echo json_encode($menu_items); ?>'>
      <template #about>
        <?php include('pages/about.php'); ?>
      </template>

      <template #works>
        <?php include('pages/works.php'); ?>
      </template>

      <template #schedule>
        <?php include('pages/schedule.php'); ?>
      </template>

      <template #goodfellows>
        <?php include('pages/goodfellows.php'); ?>
      </template>

      <template #contact>
        <?php include('pages/contact.php'); ?>
      </template>
    </layout-default>
  </transition>
</div>
<?php get_footer(); ?>