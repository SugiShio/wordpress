<?php get_header(); ?>
<div id="app">
  <?php bloginfo( 'name' ); ?>
  <component :is='layout'>
    <router-view></router-view>
  </component>
  <ul>
    <li>
      <router-link to='/'>Top</router-link>
    </li>
    <li>
      <router-link to='/about_mao'>About Mao</router-link>
    </li>
    <li>
      <router-link to='/works'>Works</router-link>
    </li>
    <li>
      <router-link to='/schedule'>Schedule</router-link>
    </li>
    <li>
      <router-link to='/good_fellows'>Good Fellows</router-link>
    </li>
    <li>
      <router-link to='/contact'>Contact</router-link>
    </li>
  </ul>
</div>
<?php get_footer(); ?>