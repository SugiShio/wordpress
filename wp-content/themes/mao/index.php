<?php get_header(); ?>
<div id="app" class="m-wrapper">
  <?php bloginfo( 'name' ); ?>
  <component :is='layout'>
    <router-view></router-view>
  </component>
</div>
<?php get_footer(); ?>