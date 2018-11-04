<?php get_header(); ?>

<section id="biography">
    <?php get_template_part('nav') ?>
    <div class="sectionTtl">
        <h2><?php echo the_title(); ?></h2>
    </div>

    <?php if(have_posts()): while(have_posts()): the_post();?>
        <h2 class="image">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php endif ; ?>
        </h2>
        <div class="body">
            <?php the_content(); ?>
        </div>
    <?php endwhile; endif; ?>
</secction>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>

<?php get_footer(); ?>
