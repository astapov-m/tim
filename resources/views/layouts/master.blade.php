<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин: Главная</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @yield('css')
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
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border">
    <a class="navbar-brand" href="https://www.timacad.ru/"><img src="/images/img2.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav nmr" style="font-size: 25px">
            <a class="nav-item nav-link  border-bottom @routeactive('index')" href="{{route('index')}}">Главная</a>
            <a class="nav-item nav-link border-bottom @routeactive('categories')" href="{{route('categories')}}">Наша продукция</a>
            <a class="nav-item nav-link border-bottom" href="{{route('index')}}#contact">Контакты</a>
            <a class="nav-item nav-link border-bottom" href="{{route('index')}}#we">О нас</a>
        </div>
    </div>
    @auth <a class="btn btn-outline-success my-2 my-sm-0" href="{{route('login')}}">Админ панель</a> @endauth
</nav>
<div class="container mt-4">
    <div class="starter-template">
        <h1 align="center" style="color: #006400; font-family: franklin gothic medium">Полевая опытная станция</h1>
        <h2 align="center"><a style="color: black">РГАУ -
                МСХА им. К.А. Тимирязева</a></h2>
        <hr style="width: 100%; height: 1px; margin-top: 50px">
        @yield('content')
        <a id="back-to-top" href="#" class="btn btn-outline-success back-to-top" role="button"><i class="fas fa-chevron-up">^</i></a>
    </div>
    <hr style="width: 100%; height: 1px; margin-top: 50px">
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->

        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3"  align="center">
                    <!-- Grid column -->

                    <!-- Links -->
                    <h6 id="contact" class="text-uppercase fw-bold mb-4">
                    </h6>
                    <p width="100%"><iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A553024ca97c21b4f891cc65aece93c56bae826cf1032edb3b6467e96b9749fbe&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe></p>
                    <p><i class="fas fa-home me-3"></i> Тимирязевская ул., 49, Москва</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        tim@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> 8 (800) 222-04-02</p>
                    <p><i class="fas fa-print me-3"></i> 8 (800) 222-04-02</p>
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
