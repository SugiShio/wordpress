<?php get_header(); ?>

<div id="top">
    <header id="header">
        <div></div>
        <ul>
            <li><a href="https://twitter.com/mellowyellow877" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/twitter.svg" alt=""></a></li>
            <li><a href="https://soundcloud.com/py3picqhc9fz" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/soundcloud.svg" alt=""></a></li>
            <li><a href="mailto:mellowyellowbananamoon@yahoo.co.jp"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/mail.svg" alt=""></a></li>
        </ul>
    </header>

    <h1>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"" alt=" メロウ・イエロー・バナナムーン" width="400" height="400">
    </h1>

    <div>
        <section class="news">
            <div class="sectionTtl">
                <h2>News</h2>
            </div>
            <?php if (have_posts()) : ?>
                <ul class="posts">
                <?php while (have_posts()) : the_post(); if($count++ < 3) :?>
                    <li class="post-news">
                        <time><?php echo get_the_date('Y.n.j'); ?></time>
                        <h3><a href="<?php echo get_category_link(get_cat_ID('news')); ?>"><?php the_title(); ?></a></h3>
                    </li>
                <?php endif; endwhile; ?>
                </ul>
                <p class="news__link">
                    <a href="<?php echo get_category_link(get_cat_ID('news')); ?>">more</a>
                </p>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </section>

        <section class="video">
            <?php $video = get_page_by_path('featuredvideo') ?>
            <h2><?php echo $video->post_title ?></h2>
            <iframe id="ytplayer" type="text/html" width="740" height="416.25" src="https://www.youtube.com/embed/<?php echo get_post_meta($video->ID)['Video ID'][0] ?>?autoplay=1&playsinline=1&rel=0&showinfo=0&color=white" frameborder="0" allowfullscreen></iframe>

            <p><?php echo $video->post_content ?></p>
        </section>

        <nav id="menu">
            <ul>
                <li><a href="<?php echo get_category_link(get_cat_ID('schedule')); ?>">SCHEDULE</a></li>
                <li><a href="<?php echo get_category_link(get_cat_ID('videos')) ?>">VIDEOS</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('biography')->ID) ?>">BIOGRAPHY</a></li>
                <li><a href="<?php echo get_category_link(get_cat_ID('discography')) ?>">DISCOGRAPHY</a></li>
                <li><a href="<?php echo get_permalink(get_page_by_path('contact')->ID) ?>">CONTACT</a></li>
            </ul>
        </nav>
    </div>
</div>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>
<?php get_footer(); ?>

