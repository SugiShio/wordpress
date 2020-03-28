<?php
if(have_posts()):
while(have_posts()):
the_post();
?>

<h3 class="o-biography__name">
  <?php echo post_custom('name'); ?>
  <span class="o-biography__en"><?php echo post_custom('name_en'); ?></span>
</h3>

<article class="o-content o-biography__content">
  <?php the_content();?>
</article>
<?php endwhile; endif; ?>

<?php include 'snslist.php' ?>