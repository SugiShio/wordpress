<?php get_header(); ?>
<div class="header-vertical header-white" id="nav">
    <div class="menu-trigger" id="nav_btn"><span></span><span></span><span></span></div>
    <header>
        <h1><img src="<?php echo get_template_directory_uri(); ?>/public/img/logo.svg" alt="mimhhs" width="130" height="26"></h1>
        <?php get_template_part('partials/nav-default'); ?>
    </header>
    <?php get_template_part('partials/footer'); ?>
</div>

<div class="body">
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <article>
            <header>
                <h2 class="title"><?php the_title(); ?></h2>
                <time class="time" datetime="<?php echo get_the_date(DATE_W3C); ?>"><?php echo get_the_date(); ?></time>
            </header>
            <div class="content">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>

                <?php the_content(); ?>

                <?php if(post_custom('fileUpload')) : ?>
                    <?php foreach (post_custom('fileUpload') as $item) : ?>
                        <p>
                            <?php echo wp_get_attachment_image($item, 'large'); ?>
                        </p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>