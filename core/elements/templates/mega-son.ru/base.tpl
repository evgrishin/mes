<!DOCTYPE html>
<html lang="{$_modx->config.cultureKey}">
<head>
{include 'file:templates/mega-son.ru/head_meta.tpl'}
{include 'file:templates/mega-son.ru/head_scripts.tpl'}
</head>
<body>
<main>
    <header>
        <section class="header-main shadow-sm">
            <div class="container">
                <div class="row head-adv"></div>
                <div class="row head-main">
                    <div class="col-lg-3 header-logo">Мега-Сон</div>
                    <div class="col-lg-2 header-city">г. Нижний Новгород</div>
                    <div class="col-lg-2 header-phone">88006005734</div>
                    <div class="col-lg-2 header-time">Пн.–вс. с 8:00 до 23:00</div>
                    <div class="col-lg-3 header-cart">
                        {$_modx->runSnippet("!msMiniCart", [
                            'tpl' => '@FILE chunks/miniCart.tpl'
                        ])}

                    </div>
                </div>
                <div class="row head-menu-top">
                    <div class="col-sm">
                        <ul class="nav">
                            <li class="nav-item"><a href="#" class="nav-link">Матрасы</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Детские матрасы</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Наматрасники</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Кровати</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Подушки</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <a href="/">сайт.ру</a> › <a href="/">Категория товара</a> › <span>Товар</span>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <aside>
                        <nav>
                            <ul class="nav vertical-menu-list">
                                <li class="nav-item"><a href="#" class="nav-link">Пункт 1</a></li>
                                <li  class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" id="navbarDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Пункт 2</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                        <li class="nav-item"><a href="#" class="nav-link">Подпункт Пункт 1</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Подпункт Пункт 1</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Подпункт Пункт 1</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Подпункт Пункт 1</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link">Пункт 3</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Пункт 4</a></li>
                            </ul>
                        </nav>
                    </aside>
                </div>
                <div class="col-sm-10">
                    <section>
                        {block 'content'}
                            main content
                        {/block}
                    </section>
                </div>
            </div>
        </div>
    </article>
    <footer>
        <div class="footer-menu">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        menu col 1
                    </div>
                    <div class="col-sm-3">
                        menu col 2
                    </div>
                    <div class="col-sm-3">
                        menu col 3
                    </div>
                    <div class="col-sm-3">
                        menu col 4
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        (payment) (SMM)
                    </div>
                    <div class="col-sm-6">
                        (copyright)
                    </div>
                    <div class="col-sm-3">
                        (contact)
                    </div>
                </div>
            </div>
        </div>
    </footer>
</main>
</body>
</html>
