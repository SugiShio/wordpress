<section class="m-top">
  <?php
    $post = get_page_by_path('about-mao');
    setup_postdata( $post );
    $site_title = post_custom('name');
    $site_subtitle = post_custom('title');
  ?>
  <h1 class="m-top__title">
    <span class="m-top__main"><?php echo $site_title; ?></span><br>
    <span class="m-top__sub"><?php echo $site_subtitle; ?></span>
  </h1>
  <nav class="m-top__menuWrapper">
    <ul class="m-top__menu">
      <li class="m-top__menuItem">
        <router-link to='/about-mao'>About Mao</router-link>
      </li>
      <li class="m-top__menuItem">
        <router-link to='/works'>Works</router-link>
      </li>
      <li class="m-top__menuItem">
        <router-link to='/schedule'>Schedule</router-link>
      </li>
      <li class="m-top__menuItem">
        <router-link to='/good-fellows'>Good Fellows</router-link>
      </li>
      <li class="m-top__menuItem">
        <router-link to='/contact'>Contact</router-link>
      </li>
    </ul>
    <ul class="m-top__medias">
      <li class="m-top__media">
        <a href="" target="_blank"><i class="icon-spotify"></i></a>
      </li>
      <li class="m-top__media">
        <a href="" target="_blank"><i class="icon-applemusic"></i></a>
      </li>
      <li class="m-top__media">
        <a href="" target="_blank"><i class="icon-instagram"></i></a>
      </li>
    </ul>
  </nav>
  <?php wp_reset_postdata(); ?>
</section>