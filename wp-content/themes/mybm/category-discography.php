<?php get_header(); ?>

<section id="discography">
    <?php get_template_part('nav') ?>
    <div class="sectionTtl">
        <h2><?php echo single_cat_title(); ?></h2>
    </div>

    <?php if (have_posts()) : ?>
        <ul class="posts">
            <?php while (have_posts()) : the_post(); ?>
                <li class="post">
                    <p class="post__img">
                    <?php if(!empty(post_custom('artwork'))) : ?>
                        <?php echo wp_get_attachment_image(post_custom('artwork'), 'large'); ?>
                    <?php else : ?>
                        <img src="" alt="">
                    <?php endif; ?>
                    </p>
                    <div class="post__cont">
                        <h3 class="post__ttl"><?php the_title(); ?></h3>
                        <h4><?php if(!empty(post_custom('Sub Title'))) : echo post_custom('Sub Title'); endif;?></h4>
                        <div class="post__desc">
                            <?php the_content(); ?>
                            <?php if(!empty(post_custom('songs'))) : ?>
                                <h4>Track List</h4>
                                <ul class="post__songList">
                                <?php
                                    $songList = preg_split('/,/', post_custom('songs'));
                                    foreach ($songList as $item) : ?>
                                    <li>
                                        <a href="<?php echo get_permalink($item.value); ?>">
                                            <?php echo get_the_title($item.value); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
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

