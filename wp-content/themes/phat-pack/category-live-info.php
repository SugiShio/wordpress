<?php get_header() ?>

<section class="live-info" id="live-info">
    <h3 class="sectionTtl"><?php echo get_the_category()[0]->name; ?></h3>

    <?php if(have_posts()) : ?>
        <ul class="live-info__list">
        <?php while(have_posts()) : ?>
            <?php the_post(); ?>
            <li class="live-info__list__item infoItem">
                <time class="infoItem__date"><?php echo date_format(new DateTime(post_custom('date')), 'Y.m.d D') ?></time>
                <h4 class="infoItem__ttl"><?php the_title(); ?></h4>
                <div><?php the_content(); ?></div>

                <?php if (post_custom('place')) : ?>
                <p class="infoItem__place">
                    <?php if (post_custom('place_url')) : ?>
                        <a href="<?php echo post_custom('place_url') ?>" target="_blank">@ <?php echo post_custom('place'); ?></a>
                    <?php else : ?>
                        @ <?php post_custom('place'); ?>
                    <?php endif; ?>
                </p>
                <?php endif; ?>

                <?php if (post_custom('start')) : ?>
                    <p class="infoItem__txt">Start <?php echo post_custom('start') ?></p>
                <?php endif; ?>

                <?php if (post_custom('open')) : ?>
                    <p class="infoItem__txt">Open <?php echo post_custom('open') ?></p>
                <?php endif; ?>

                <?php if (post_custom('music_charge')) : ?>
                    <p class="infoItem__txt">MC <?php echo post_custom('music_charge') ?></p>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
