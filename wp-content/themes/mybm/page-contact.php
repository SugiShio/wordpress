<?php get_header(); ?>

<section id="contact">
    <?php get_template_part('nav') ?>
    <div class="sectionTtl">
        <h2><?php echo the_title(); ?></h2>
    </div>

    <?php if(have_posts()): while(have_posts()): the_post();?>
        <div class="text"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>

    <ul class="link">
        <li class="link__mail"><a href="mailto:mellowyellowbananamoon@yahoo.co.jp">mellowyellowbananamoon@yahoo.co.jp</a></li>
        <li class="link__twitter"><a href="https://twitter.com/mellowyellow877" target="_blank">@mellowyellow877</a></li>
    </ul>
</section>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>
<?php get_footer(); ?>
