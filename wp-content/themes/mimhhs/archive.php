<?php get_header(); ?>
<div class="header-vertical" id="nav">
    <div class="menu-trigger" id="nav_btn"><span></span><span></span><span></span></div>
    <header>
        <h1><img src="<?php echo get_template_directory_uri(); ?>/public/img/logo_white.svg" alt="mimhhs" width="130" height="26"></h1>
        <?php get_template_part('partials/nav-default'); ?>
    </header>
    <?php get_template_part('partials/footer'); ?>
</div>

<div class="body">
    <h2 class="title"><?php the_archive_title(); ?></h2>
    <?php if (have_posts()) : ?>
        <ul class="posts">
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <time datetime="<?php echo get_the_date(DATE_W3C); ?>"><?php echo get_the_date(); ?></time>
                    <p><?php the_title(); ?></p>
                </a>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php
       the_posts_pagination(array(
           'mid_size'           => 2,
           'prev_text'          => '←',
           'next_text'          => '→',
           'screen_reader_text' => ' ',
           ));
    ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>