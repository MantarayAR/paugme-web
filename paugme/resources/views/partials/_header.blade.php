<header id="header" class="header">
    <div class="header__logo">
        <a href="/">
            <img class="header__logo_image" src="/images/logo.png"/>
            &nbsp;Paugme Packs
        </a>
    </div>

    <div class="header__links">
        <ul>
            <li class="{{Request::path() == 'about' ? 'active' : ''}}"><a href="/about">About</a></li>
            <li class="{{Request::path() == 'contact-us' ? 'active' : ''}}"><a href="/contact-us">Contact Us</a></li>
        </ul>

    </div>
</header>