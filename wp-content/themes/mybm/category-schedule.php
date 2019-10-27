<?php get_header(); ?>

<section id="schedule">
    <?php get_template_part('nav') ?>
    <div class="sectionTtl">
        <h2><?php echo single_cat_title(); ?></h2>
    </div>
    <ul class="posts">
        <?php
        $the_query = new WP_Query(array(
            'paged' => $paged,
            'meta_key' => 'date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
        ));

        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            ?>
            <li class="post">
                <header>
                    <time><?php echo date('Y.m.d D', strtotime(get_field('date'))); ?></time>
                    <h3 class="post__ttl"><?php the_title(); ?></h3>
                    <?php if(!empty(get_field('event_url'))) : ?>
                        <p><a href="<?php echo post_custom('event_url'); ?>">
                            <?php echo shortenUrl(post_custom('event_url')); ?>
                        </a></p>
                    <?php endif; ?>
                    <?php if(!empty(get_field('place'))) : ?>
                        <p>
                        <?php if(!empty(get_field('place_url'))) : ?>
                            @ <a href="<?php echo get_field('place_url'); ?>"><?php echo get_field('place'); ?></a>
                            <?php else : ?>
                                @ <?php echo get_field('place'); ?>
                            <?php endif; ?>
                            </p>
                        <?php endif; ?>
                    </header>

                    <div class="post__body">
                        <?php the_content(); ?>
                    </div>
                </li>
                <?php
                wp_reset_postdata();
            endwhile;
            ?>
        </ul>

    <?php include('_pager.php'); ?>
</section>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>

<?php get_footer(); ?>
