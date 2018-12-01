<?php get_header(); ?>

<section id="discography">
    <?php get_template_part('nav') ?>
    <div class="sectionTtl">
        <span><?php if(!empty(post_custom('Sub Title'))) : echo post_custom('Sub Title'); endif;?></span>
        <h2><?php the_title(); ?></h2>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post">
            <p class="post__img">
            <?php if(!empty(post_custom('artwork'))) : ?>
                <?php echo wp_get_attachment_image(post_custom('artwork'), 'large'); ?>
            <?php else : ?>
                <img src="" alt="">
            <?php endif; ?>
            </p>
            <div class="post__cont">
                <div class="post__desc">
                    <?php the_content(); ?>
                    <?php if(!empty(post_custom('songs'))) : ?>
                        <h4>Track List</h4>
                        <ul class="post__songList">
                        <?php
                            $songList = split(',', post_custom('songs'));
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
        </div>
    <?php endwhile; else: ?>
        <p>
            お探しの記事は見つかりませんでした。
        </p>
    <?php endif; ?>
</section>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>
<?php get_footer(); ?>
