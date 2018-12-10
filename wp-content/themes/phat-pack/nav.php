<nav class="menu" id="menu">
    <div class="menu__body">

        <?php wp_nav_menu(array(
            'menu' => 'navigation',
            'menu_class' => 'menuList',
            'container' => false,
        )); ?>


        <div class="contact">
            <h3 class="contact__ttl">Contact</h3>
            <ul class="contact__list">
                <li class="contact__list__item contact__list__item--mail">
                    <a href="mailto:info@phat-pack.jp">info@phat-pack.jp</a>
                </li>
                <li class="contact__list__item contact__list__item--tw">
                    <a href="https://twitter.com/tsutayamae" target="_blank">@tsutayamae</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="menu__btn">
        <div class="menu__btn__bar"></div>
        <div class="menu__btn__bar"></div>
        <div class="menu__btn__bar"></div>
    </div>
</nav>

<div class="menuBg" id="menuBg"></div>

<div class="menuBtn" id="menuBtn">
    <span>
        <div class="menuBtn__bar" id="menuBtn__bar1"></div>
        <div class="menuBtn__bar" id="menuBtn__bar2"></div>
        <div class="menuBtn__bar" id="menuBtn__bar3"></div>
    </span>
</div>

