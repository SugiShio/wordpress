<?php
$title = get_the_title();
if(mb_strlen($title) > 20) {
  $title = mb_substr($title, 0, 20)."...";
}
$description = WPCom_Markdown::get_instance()->transform( get_the_content(), array('id'=>false,'unslash'=>false));
$description = strip_tags($description);
$description = str_replace("\r\n", "", $description);
if(mb_strlen($description) > 40) {
  $description = mb_substr($description, 0, 40)."...";
}
$category = get_the_category()[0]->name;
$category_slug = get_the_category()[0]->slug;
?>
<li class="u-articleitem">
  <a class="u-articleitem__link" href="<?php echo get_the_permalink(); ?>">
    <div class="u-articleitem__image">
      <?php if($category) : ?>
      <span
        class="u-articleitem__category u-articleitem__category--<?php echo $category_slug ?>"><?php echo $category; ?></span>
      <?php endif; ?>
      <?php if(has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('thumbnail'); ?>
      <?php else : ?>
      <img src="<?php echo get_template_directory_uri()."/assets/images/article/noimage.jpg" ?>" alt="">
      <?php endif; ?>
    </div>

    <div>
      <h2 class="u-articleitem__title"><?php echo $title; ?></h2>
      <p class="u-articleitem__content"><?php echo $description; ?></p>
      <time datetime="<?php echo get_the_date(DATE_W3C); ?>"
        class="u-articleitem__date"><?php echo get_the_date(); ?></time>
    </div>
  </a>
</li>