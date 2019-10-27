<?php get_header(); ?>
<header class="header-top">
    <h1><img src="<?php echo get_template_directory_uri(); ?>/public/img/logo_white.svg" alt="mimhhs" width="240" height="48"></h1>
    <?php get_template_part('partials/nav-top'); ?>
</header>

<div class="body">
    <?php
        $cat_id = get_cat_ID('portfolio');
        $my_posts = get_posts(array('posts_per_page' => 9, 'category' => $cat_id));
    ?>
    <?php if ($my_posts) : $cnt = 0;?>
        <ul class="posts">
        <?php foreach ($my_posts as $post) : ?>
            <?php if ($cnt++ < 8) :  setup_postdata($post); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php else : ?>
                        <span><?php the_title(); ?></span>
                    <?php endif; ?>
                    </a>
                </li>
            <?php else : ?>
                <li><a href="<?php echo esc_url(get_category_link($cat_id)); ?>"><span>more &gt;</span></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ul>
    <?php else : ?>
        No Post
    <?php endif; ?>
</div>

<?php get_template_part('partials/footer'); ?>
<?php get_footer(); ?>