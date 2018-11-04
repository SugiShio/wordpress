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
                    <time><?php echo get_post_time('Y.n.j D'); ?></time>
                    <h3 class="post__ttl"><?php the_title(); ?></h3>
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
