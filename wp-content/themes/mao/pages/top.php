<section class="m-top">
  <h1 class="m-top__title">
    <span class="m-top__main"><?php echo $GLOBALS['site_title'];; ?></span><br>
    <span class="m-top__sub"><?php echo $GLOBALS['subtitle'];; ?></span>
  </h1>
  <nav class="m-top__menuWrapper">
    <ul class="m-top__menu">
      <li class="m-top__menuItem">
        <router-link to='/about'>About Mao</router-link>
      </li>
      <li class="m-top__menuItem">
        <router-link to='/works'>Works</router-link>
      </li>
      <li class="m-top__menuItem">
        <router-link to='/schedule'>Schedule</router-link>
      </li>
      <li class="m-top__menuItem">
        <router-link to='/goodfellows'>Good Fellows</router-link>
      </li>
      <li class="m-top__menuItem">
        <router-link to='/contact'>Contact</router-link>
      </li>
    </ul>
    <ul class="m-top__medias">
      <?php foreach($GLOBALS['medias'] as $media) : ?>
      <li class="m-top__media">
        <a href="<?php echo $media['url']; ?>" target="_blank"><i class="icon-<?php echo $media['name']; ?>"></i></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>
</section>