<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Главная</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/nav.css" rel="stylesheet">
    @yield('css')
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
    .back-to-top {
        position: fixed;
        bottom: 25px;
        right: 25px;
        display: none;
    }
</style>
<body style="background-color: #f5fff2">
<div class="header2 bg-success-gradiant"style="border-radius: 3px">
    <div class="mt-1" style="text-align: center">
        <div style="display: inline-block;vertical-align: top">
            <a style="margin: 0" href="https://www.timacad.ru/"><img src="/images/img2.png"></a>
        </div>
        <div style="display: inline-block;vertical-align: top">
            <h1  style="color: #006400; font-family: franklin gothic medium">Полевая опытная станция</h1>
            <h2><a style="color: black">РГАУ -
                    МСХА им. К.А. Тимирязева</a></h2>
        </div>
    </div>
    <hr class="container" style="width: 100%; height: 3px; margin-top: 10px;margin-bottom: 10px ;color: black">
<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse w-100 justify-content-center mb-3" id="navbarNavAltMarkup">
        <div class="navbar-nav nmr" style="font-size: 25px;">
            <a class="nav-item btn rounded-pill btn-success py-2 px-4 @routeactive('index')" href="{{route('index')}}">Главная</a>
            <a class="nav-item btn rounded-pill btn-success  py-2 px-4 @routeactive('categor*') @routeactive('product')" href="{{route('categories')}}">Наша продукция</a>
            <a class="nav-item btn rounded-pill btn-success  py-2 px-4" href="{{route('index')}}#contact">Контакты</a>
            <a class="nav-item btn rounded-pill btn-success  py-2 px-4" href="{{route('index')}}#we">О нас</a>
        </div>
    </div>
    @auth <a class="nav-item btn rounded-pill btn-dark  py-2 px-4" href="{{route('login')}}">Админ панель</a> @endauth
</nav>
</div>
<div class="container mt-3">
    <div class="starter-template">
        <hr style="width: 100%; height: 1px;">
        @yield('content')
        <a id="back-to-top" href="#" class="btn btn-outline-success back-to-top" role="button"><i class="fas fa-chevron-up">^</i></a>
    </div>
    <hr style="width: 100%; height: 1px">
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->

        <section class="">
            <div class="container text-center text-md-start">
                <!-- Grid row -->
                <div class="row"  align="center">
                    <!-- Grid column -->

                    <!-- Links -->
                    <h6 id="contact" class="text-uppercase fw-bold">
                    </h6>
                    <p width="100%"><iframe style="border-radius: 5px" src="https://yandex.ru/map-widget/v1/?um=constructor%3A03eeb54220602f07cc38803b8863624b1244a28113e0b5a7836271283c2127c4&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe></p>
                    <p><i class="fas fa-home me-3"></i>Россия, Москва, улица Прянишникова, 37с9</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        pole-st@rgau-msha.ru
                    </p>
                    <p><i class="fas fa-phone me-3"></i> 8 (499) 976-11-82</p>
                </div>
                <!-- Grid column -->

                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022:
            <a class="text-reset fw-bold">Полевая станция</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>
<script>
    $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });
    });
</script>
</body>
</html>
