<?php get_header() ?>

<section class="bio" id="bio">
    <div class="bio__img">
    </div>
    <?php while(have_posts()) : ?>
        <?php the_post(); ?>
        <div class="bio__body">
            <h3 class="sectionTtl"><?php the_title(); ?></h3>
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</section>

<?php get_footer(); ?>
