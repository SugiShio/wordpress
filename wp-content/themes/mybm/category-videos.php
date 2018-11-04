<?php get_header(); ?>

<section id="news">
    <?php get_template_part('nav') ?>
    <div class="sectionTtl">
        <h2><?php echo single_cat_title(); ?></h2>
    </div>

    <?php if (have_posts()) : ?>
        <ul class="posts">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('post') ?>
                <li class="post">
                    <h3 class="post__ttl"><?php the_title(); ?></h3>
                    <iframe id="ytplayer" type="text/html" width="540" height="303.75" src="https://www.youtube.com/embed/<?php echo post_custom('Video ID') ?>?<?php if($cnt++<1) : ?>autoplay=1&<?php endif; ?>playsinline=1&rel=0&showinfo=0&color=white" frameborder="0" allowfullscreen></iframe>
                    <p><?php the_content() ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    <?php include('_pager.php'); ?>
</section>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>

<?php get_footer(); ?>
