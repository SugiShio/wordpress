<?php get_header(); ?>
<div class="header-vertical" id="nav">
    <header>
        <div class="menu-trigger" id="nav_btn"><span></span><span></span><span></span></div>
        <h1><img src="<?php echo get_template_directory_uri(); ?>/public/img/logo_white.svg" alt="mimhhs" width="130" height="26"></h1>
        <?php get_template_part('partials/nav-default'); ?>
    </header>
    <?php get_template_part('partials/footer'); ?>
</div>

<div class="body">
<?php while (have_posts()) : the_post() ?>
    <h2 class="title"><?php the_title(); ?></h2>
    <div class="content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>
</div>

<?php get_footer(); ?>
