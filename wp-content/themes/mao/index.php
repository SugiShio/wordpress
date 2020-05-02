<?php get_header(); ?>
<?php
  $menu_items = [
    ['label' => 'Top', 'to' => '/'],
    ['label' => 'About Mao', 'to' => '/about/'],
    ['label' => 'Works', 'to' => '/works/'],
    ['label' => 'Schedule', 'to' => '/schedule/'],
    ['label' => 'Good Fellows', 'to' => '/goodfellows/'],
    ['label' => 'Contact', 'to' => '/contact/'],
  ];
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