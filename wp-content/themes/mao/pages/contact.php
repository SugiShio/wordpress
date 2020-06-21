<section class="m-contact" key="contact">
  <?php
    $post = get_page_by_path('contact');
    setup_postdata( $post );
    the_content();
    wp_reset_postdata();
  ?>
</section>