<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <title>Главная</title>
    @yield('title', '')
</head>
<body>
<header>
    <div class="header-wrapper">
        <div class="header-top">
            <div>
                <a href="/" class="logo">
                    <img src="img/icons/lightning.svg" alt="Молния">
                    <h1>Господин Ребёнок</h1>
                </a>

                <form>
                    <input type="search" name="search_toys" id="search_toys" placeholder="Поиск игрушек...">
                </form>
            </div>

            <div>
                <nav>
                    <a href="/">Главная</a>
                    <a href="/categories">Категории</a>
                    <a href="/contacts">Контакты</a>
                </nav>

                <div class="cart" id="cart">
                    <img src="img/icons/cart.svg" alt="Корзина">
                    <p>Корзина</p>
                    <div class="quantity-of-products"></div>
                </div>
            </div>
        </div>

        <hr>

        @yield('categories')
    </div>
</header>
@yield('banner', '')
<main>
    @yield('content', '')

    <section class="location">
        <div class="title">
            <h2>Наш магазин на карте</h2>
        </div>

        <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae97d04ecca3b2176d10d0e7ac423037cfc2e1cde81cfa29517d25b2886fe37bf&amp;width=100%25&amp;height=599&amp;lang=ru_RU&amp;scroll=true"></script>
    </section>
</main>

<footer>
    <div class="footer-wrapper">
        <div class="footer-top">
            <div>
                <a href="/">
                    <h3>Господин Ребёнок</h3>
                </a>

                <p>Лучшие игрушки для ваших детей</p>
            </div>

            <div>
                <h3>Контакты</h3>
                <a href="tel:+79999999999">📞 +7 (999) 999-99-99</a>
                <a href="mailto:info@gospodinrebenok.ru">✉️ info@gospodinrebenok.ru</a>
                <p>📍 Абакан, ул. Щетинкина, д. 76</p>
            </div>

            <div>
                <h3>Часы работы</h3>
                <p>Пн-Пт: 10:00 - 20:00</p>
                <p>Сб-Вс: 10:00 - 22:00</p>
            </div>
        </div>

        <hr>

        <div class="footer-bottom">
            <p>&copy; 2025 Господин Ребёнок. Все права защищены.</p>
        </div>
    </div>
</footer>
@yield('js', '')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('/js/script.js')}}"></script>
</body>
</html>
