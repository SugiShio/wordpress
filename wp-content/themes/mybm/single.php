<?php if(in_category('lyrics')) :
    include(TEMPLATEPATH.'/single-lyrics.php');
elseif(in_category('discography')) :
    include(TEMPLATEPATH.'/single-discography.php');
else : ?>
<?php get_header(); ?>

<section id="single">
    <?php get_template_part('nav') ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="sectionTtl">
            <h2><?php the_title(); ?></h2>
            <?php if(!empty(post_custom('Composer')) and !empty(post_custom('Lyricist'))) : ?>
                <dl class="table">
                    <?php if(!empty(post_custom('Composer'))) : ?>
                        <dt>作曲</dt>
                        <dd><?php echo shortenUrl(post_custom('Composer')); ?></dd>
                    <?php endif; ?>
                    <?php if(!empty(post_custom('Lyricist'))) : ?>
                        <dt>作詞</dt>
                        <dd><?php echo shortenUrl(post_custom('Lyricist')); ?></dd>
                    <?php endif; ?>
                </dl>
            <?php endif; ?>
        </div>

        <h2><?php the_title(); ?></h2>
        <div>
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
<?php endif; ?>