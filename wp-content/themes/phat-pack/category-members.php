<?php get_header() ?>

<section class="members" id="members">
    <h3 class="sectionTtl"><?php echo get_the_category()[0]->name; ?></h3>

    <?php if(have_posts()) : ?>
        <ul class="members__list">
        <?php while(have_posts()) : ?>
            <?php the_post(); ?>
            <li class="members__list__item member">
                <p class="member__img">
                    <?php if(has_post_thumbnail()) :
                        the_post_thumbnail();
                    endif; ?>
                </p>
                <div class="member__body">
                    <h4 class="member__name"><?php the_title(); ?>
                        <?php $info = [];
                            if (post_custom('name')) : $info += ['name' => post_custom('name')]; endif;
                            if (post_custom('instrument')) : $info += ['instrument' => post_custom('instrument')]; endif;
                            if ($info !== []) : ?>
                            <span>
                                <?php echo join(', ', $info) ?>
                            </span>
                        <?php endif; ?>
                    </h4>
                    <div class="member__desc">
                        <?php the_content(); ?>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
