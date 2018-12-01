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
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"" alt="メロウ・イエロー・バナナムーン">
    </h1>

    <section class="news">
        <h2 class="sectionTtl">News</h2>
        <ul>
            <li>
                <time>2017.8.28</time>
                <p>宮田泰介さんの誕生日はたしかこの辺りだった気がします</p>
            </li>
            <li>
                <time>2017.8.28</time>
                <p>宮田泰介さんの誕生日はたしか</p>
            </li>
        </ul>
    </section>

    <nav id="menu">
        <ul>
            <li><a href="<?php echo get_category_link(get_cat_ID('schedule')); ?>">SCHEDLUE</a></li>
            <li><a href="./biography/">BIOGRAPHY</a></li>
            <li><a href="">DISCOGRAPHY</a></li>
            <li><a href="./contact/">CONTACT</a></li>
        </ul>
    </nav>
</div>

<footer id="footer">
    <small>&copy; 2017 Mellow Yellow Banana Moon</small>
</footer>
<?php get_footer(); ?>
