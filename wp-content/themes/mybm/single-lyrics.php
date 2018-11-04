<?php get_header(); ?>

<section id="single">
    <?php get_template_part('nav') ?>
    <div class="sectionTtl">
        <?php if(!empty(post_custom('Album id'))) : ?>
        <p class="sectionTtl__sub">
            <a href="<?php echo get_permalink(post_custom('Album id')); ?>">
                <?php echo get_the_title(post_custom('Album id')); ?>
            </a>
        </p>
        <?php endif ?>

        <h2>
            <?php if(!empty(post_custom('Track No'))) :
                echo post_custom('Track No') . ' ';
            endif;
            the_title(); ?>
        </h2>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="content">
            <?php if(!empty(post_custom('Composer')) and !empty(post_custom('Lyricist'))) : ?>
                <dl class="table">
                    <?php if(!empty(post_custom('Composer'))) : ?>
                        <dt>作曲</dt>
                        <dd><?php echo post_custom('Composer'); ?></dd>
                    <?php endif; ?>
                    <?php if(!empty(post_custom('Lyricist'))) : ?>
                        <dt>作詞</dt>
                        <dd><?php echo post_custom('Lyricist'); ?></dd>
                    <?php endif; ?>
                </dl>
            <?php endif; ?>

            <?php the_content(); ?>
        </div>
    <?php endwhile; else: ?>
        <p>
            お探しの記事は見つかりませんでした。
        </p>
    <?php endif; ?>
</section>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>
<?php get_footer(); ?>
