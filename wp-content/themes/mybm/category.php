<?php get_header(); ?>

<section id="schedule">
    <nav id="nav">
        <?php wp_nav_menu( array('menu' => 'grobalNav' )); ?>
    </nav>

    <h2 class="sectionTtl"><?php echo single_cat_title(); ?></h2>

    <?php if (have_posts()) : ?>
        <ul class="posts">
            <?php while (have_posts()) : the_post(); ?>
                <li class="post">
                    <header>
                        <h3 class="post__ttl"><?php the_title(); ?></h3>
                        <?php if(!empty(post_custom('event URL'))) : ?>
                            <p><a href="<?php echo post_custom('event URL'); ?>">
                                <?php echo shortenUrl(post_custom('event URL')); ?>
                            </a></p>
                        <?php endif ?>
                        <?php if(!empty(post_custom('place'))) : ?>
                            <p>
                            <?php if(!empty(post_custom('place URL'))) : ?>
                                @ <a href="<?php echo post_custom('place URL'); ?>"><?php echo post_custom('place'); ?></a>
                            <?php else : ?>
                                @ <?php echo post_custom('place'); ?>
                            <?php endif; ?>
                            </p>
                        <?php endif ?>

                        <a href=""></a>
                    </header>

                    <div class="post__body">
                        <?php the_content(); ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</section>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>

<?php get_footer(); ?>
