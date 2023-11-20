<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PRO тренировки</title>
    <meta name="description" content="Фитнес-сервис №1: все полезные инструменты в одном месте.">
    <meta name="keywords" content="фитнес, fitnes, sport, спорт, protrenirovki, протренировки" >
    <link rel="canonical" href="http://protrenerovki.ru/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:locale:alternate" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Для тех, кто занимается бодибилдингом, пауэрлифтингом, фитнесом и ведет здоровый образ жизни">
    <meta property="og:description" content="Фитнес-сервис №1: все полезные инструменты в одном месте.">
    <meta property="og:url" content="http://protrenerovki.ru/">
    <meta property="og:site_name" content="protrenerovki">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicons -->
    <link href="{{asset('assets/img/logo/Logo.png')}}" rel="icon">
    <link href="{{asset('assets/img/logo/Logo.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/slider/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/slider/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/noty/noty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/noty/themes/mint.scss')}}">
    <script src="https://use.fontawesome.com/96d823b9e3.js"></script>
    <link href="{{asset('assets/css/star-rating.min.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header">
    <div class="container d-flex align-items-center">

        <h1 class="logo"><a href="#"><img src="assets/img/logo/Logo.png"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Что получаешь?</a></li>
                <li><a class="nav-link scrollto" href="#skillsw">Как пользоваться?</a></li>
                <li><a class="nav-link scrollto" href="#trainers">Тренеры</a></li>
                <!--<li><a class="nav-link scrollto" href="#rates">Тарифы</a></li>-->
                <li><a class="nav-link scrollto" href="#comments">Отзывы</a></li>

            </ul>
            <i class="bi bi-list text-dark mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->

<!-- BEGIN: Notification Content -->

@if ($message = Session::get('success'))

    <div class="alert-success">
        <h5 class="text-center text-success" id="exampleModalCenterTitle">{{ $message }}</h5>
    </div>

@endif

<!-- END: Notification Content -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="ftxt col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                 data-aos="fade-up" data-aos-delay="200">
                <p class="smalltxt">Для тех, кто занимается бодибилдингом,
                    пауэрлифтингом, фитнесом
                    и ведет здоровый образ жизни</p>
                <h1 class="smaltxt2">Фитнес-сервис №1:
                    все полезные инструменты
                    в одном месте</h1>
                <p class="smalltxt2">Получи персональную программу тренировок
                    на месяц по цене 1 тренировки в зале или используй
                    бесплатные возможности сервиса для достижения
                    бомбических результатов.</p>
                <p class="smalltxt3">Что внутри?</p>

            </div>

            <div class="d-flex justify-content-center flex-wrap order-3 align-items-center">
                <div class="block-hero" data-aos="fade-up" data-aos-delay="250"><span class="block-hero-txt">Программы тренировок для зала и дома</span>
                </div>
                <div class="block-hero" data-aos="fade-up" data-aos-delay="250"><span class="block-hero-txt">Личный тренер и диетолог</span>
                </div>
                <div class="block-hero" data-aos="fade-up" data-aos-delay="250"><span class="block-hero-txt">База упражнений с описанием</span>
                </div>

                <div class="block-hero" data-aos="fade-up" data-aos-delay="250">
                    <div class="free-icon" data-aos="fade-up" data-aos-delay="250"></div>
                    <span class="block-hero-txt">Дневник тренировок и питания</span>
                </div>
                <div class="block-hero" data-aos="fade-up" data-aos-delay="250">
                    <div class="free-icon" data-aos="fade-up" data-aos-delay="250"></div>
                    <span class="block-hero-txt">Статистика прогресса</span>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center pt-4 pt-lg-0 order-4 order-lg-4" data-aos="fade-up"
                 data-aos-delay="300">
                <a class="btn hero-btn" href="#contact">Получить персональную программу</a>
                @guest
                <button class="hero-btn-tr" data-bs-toggle="modal" data-bs-target="#Modalregistr">Зарегистрироваться
                </button>
                <button class="hero-btn-tr" data-bs-toggle="modal" data-bs-target="#ModalLogin">Авторизоваться
                </button>
                @endguest
                @auth
                <a class="hero-btn-tr" href="{{ route('progress') }}">Личный кабинет</a>
                @endauth
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Clients Section ======= -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title d-flex justify-content-center col-xs-12 col-sm-6 mx-auto">
                <h1 class="section2-txt">Легко достигай<br>
                    своих целей с сервисом <br><img src="assets/img/section2/pro.png"> тренировки</h1>

            </div>
            <div class="row content col-xs-12 col-sm-10 d-flex justify-content-center mx-auto ">
                <!--line1-->
                <div class="row content col-xs-12 col-sm-10 d-flex justify-content-center mx-auto ">
                    <div class="col-sm s2-bl">
                        <img src="assets/img/section2/hand.png" class="s2-img">
                        <p class="section2-block-h">Набирай мышечную массу</p>
                        <p class="section2-block">Наши профессиональные тренера составят
                            для тебя программу с учётом твоих целей, опыта
                            и возможных травм.</p>

                        <p class="section2-block">Занимайся в зале или дома и отслеживай свой
                            прогресс в личном кабинете.</p>
                    </div>
                    <div class="col-sm s2-bl">
                        <img src="assets/img/section2/box.png" class="s2-img">
                        <p class="section2-block-h">Теряй лишние килограммы</p>
                        <p class="section2-block">Худей легко с <img src="assets/img/section2/pro.png" width="35px">
                            тренировки.</p>

                        <p class="section2-block">Получи стандартную или персональную программу
                            питания с учетом твоих особенности, веди
                            дневник питания и худей правильно без голода
                            и жестких диет.</p>
                    </div>

                </div>
                <!--line2-->
                <div class="row content col-xs-12 col-sm-10 d-flex justify-content-center mx-auto ">
                    <div class="col-sm s2-bl">
                        <img src="assets/img/section2/heart.png" class="s2-img">
                        <p class="section2-block-h">Веди здоровый образ жизни</p>
                        <p class="section2-block">Зарегистрируйся и получи бесплатный
                            доступ к 10+ калькуляторам, которые помогут
                            понять твой уровень тренированности,
                            оптимальную калорийность рациона и подобрать
                            программу тренинга.</p>

                    </div>
                    <div class="col-sm s2-bl">
                        <img src="assets/img/section2/gant.png" class="s2-img">
                        <p class="section2-block-h">Отслеживай свой прогресс</p>
                        <p class="section2-block">Веди дневник тренировок и питания, ставь цели
                            и отслеживай прогресс в личном кабинете.</p>

                    </div>

                </div>
            </div>
        </div>
    </section><!-- End About Us Section -->
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="row d-flex align-items-center mg-auto d-flex justify-content-center aos-init aos-animate">
                <div class="col-lg-4 text-end txt-c align-middle">
                    <h3>Уже тренируются с нами +10 835</h3>

                </div>
                <div class="col-lg-4 text-center align-middle">
                    <a class="btn hero-btn mx-tel" href="#" data-bs-toggle="modal" data-bs-target="#Modalregistr">Присоединиться</a>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->
    <!-- ======= Why Us Section ======= -->
    <!--<section id="why-us" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row why-us-row">

                    <div
                        class="col-xs-12 col-sm-6 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>Получи свою персональную программу тренировок прямо сейчас!</h3>
                            <p>
                                По цене 1 тренировки в зале получишь программу тренировок и питания на 1 месяц от
                                профессионального тренера.
                            </p>
                            <a class="btn hero-btn mx-tel" href="#" data-bs-toggle="modal" data-bs-target="#Modalregistr">Получить программу</a>
                        </div>


                    </div>

                    <div class="col-xs-12 col-sm-5 order-3 order-lg-2" data-aos="zoom-in" data-aos-delay="150"><img
                            src="assets/img/section4/girl.png"></div>

            </div>
        </div>
    </section>--><!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">
            <div class="section-title d-flex justify-content-center col-xs-12 col-sm-8 mx-auto">
                <h1 class="section2-txt"><img src="assets/img/section2/pro.png"> тренировки — лёгкий путь<br> к телу
                    мечты и достижения
                    спортивных целей</h1>
            </div>
            <p class="s5-txt">Что ты получаешь, регистрируясь в сервисе?</p>
            <div class="row">
                <div class="container-fluid">


                <!--line1-->
            <div class="row content col-xs-12 col-sm-8 d-flex justify-content-center mx-auto" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-sm s5-padding">

                        <p class="s5-bl-h">Программа тренировок</p>
                        <p class="s5-bl-txt">Получи профессионально
                            составленную программу от наших
                            тренеров и достигай поставленных
                            целей еще быстрее.</p>

                    </div>
                    <div class="col-sm s5-padding">

                        <p class="s5-bl-h">Программа питания</p>
                        <p class="s5-bl-txt">Правильное питание — 80%
                            твоего успеха. Диетологи сервиса
                            <span class="s5-span"><img src="assets/img/section2/pro.png" width="30px"> тренировки</span>
                            составят для тебя
                            персональную сбалансированную
                            программу питания с учётом твоего
                            образа жизни, веса и целей.</p>

                    </div>
                </div>
                <!--line2-->
                <div class="row content col-xs-12 col-sm-8 d-flex justify-content-center mx-auto" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-sm s5-padding">

                        <p class="s5-bl-h">База упражнений</p>
                        <p class="s5-bl-txt">Получи доступ к базе упражнений
                            для зала и дома с описанием
                            правильной техники выполнения
                            и составь собственную программу.</p>

                    </div>
                    <div class="col-sm s5-padding">

                        <p class="s5-bl-h">Дневник тренировок</p>
                        <p class="s5-bl-txt">Фиксируй количество подходов,
                            повторений и отслеживай свой
                            прогресс в силовых показателях.</p>

                    </div>
                </div>
                <!--line3-->
                <div class="row content col-xs-12 col-sm-8 d-flex justify-content-center mx-auto" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-sm s5-padding">

                        <p class="s5-bl-h">Дневник питания</p>
                        <p class="s5-bl-txt">Абсолютно необходимый инструмент
                            для всех, кто занимается спортом
                            и следит за фигурой.</p>

                    </div>
                    <div class="col-sm s5-padding">

                        <p class="s5-bl-h">Твой прогресс в режиме online</p>
                        <p class="s5-bl-txt">Ставь цели, отмечай результаты
                            и оценивай свой прогресс
                            спустя время.</p>

                    </div>
                </div>
                <!--line4-->
                <div class="row content col-xs-12 col-sm-8 d-flex justify-content-center mx-auto" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-sm s5-padding">

                        <p class="s5-bl-h">Полезные инструменты</p>
                        <p class="s5-bl-txt">Получи доступ к 10+ калькуляторам,
                            которые помогу рассчитать необходимую
                            калорийность рациона, нагрузку, твой
                            идеальный вес и многое другое.</p>

                    </div>
                    <div class="col-sm s5-padding">

                        <p class="s5-bl-h">Онлайн марафоны</p>
                        <p class="s5-bl-txt">Ставь цели, отмечай результаты
                            и оценивай свой прогресс
                            спустя время.</p>

                    </div>
                </div>
                </div>
            </div>

        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Как это работает? ======= -->
    <section id="skillsw">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <!--line1-->
                <div class="row content col-xs-12 col-sm-10 d-flex justify-content-center mx-auto" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-sm-6">

                        <p class="s6-h1">Как это работает?</p>
                        <!--line1-->
                        <div class="row s6-bottom">
                            <div class="col-lg-2">
                                <p class="s6-num">1</p>
                            </div>
                            <div class="col-lg-6">
                                <p class="s5-bl-txt">Получи профессионально
                                    составленную программу от наших
                                    тренеров и достигай поставленных
                                    целей еще быстрее.</p>
                            </div>
                        </div>
                        <!--line2-->
                        <div class="row s6-bottom">
                            <div class="col-lg-2">
                                <p class="s6-num">2</p>
                            </div>
                            <div class="col-lg-6">
                                <p class="s5-bl-txt">Записывай видео процесса
                                    и отправляй в личном
                                    кабинете</p>
                            </div>
                        </div>
                        <!--line3-->
                        <div class="row s6-bottom">
                            <div class="col-lg-2">
                                <p class="s6-num">3</p>
                            </div>
                            <div class="col-lg-6">
                                <p class="s5-bl-txt">Наши тренера выберут
                                    самого сильного и лучшего
                                    в участника этого месяца.</p>
                            </div>
                        </div>
                        <!--line4-->
                        <div class="row s6-bottom">
                            <div class="col-lg-2">
                                <p class="s6-num">4</p>
                            </div>
                            <div class="col-lg-6">
                                <p class="s5-bl-txt">Побеждай и получай
                                    ценные призы от сервиса <img src="assets/img/section2/pro.png" width="30px">
                                    тренировки.</p>
                            </div>
                        </div>
                        <button class="btn hero-btn mx-tel" data-bs-toggle="modal" data-bs-target="#Modalregistr">Зарегистрироваться
                        </button>


                    </div>
                    <div class="col-sm-6 skillsw">
                        <div class="col-lg-5 order-3 order-lg-2" data-aos="zoom-in" data-aos-delay="150"><img class="boy"
                                src="assets/img/section6/boy.png"></div>
                    </div>


                </div>
            </div>


        </div>

        </div>
    </section><!-- End Как это работает? -->


    <!-- ======= Why Us Section ======= -->
  <!--  <section id="sec7" class="sec7 section-bg">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row sec7-row">
                <div class="row girl-margin ">
                    <div class="col-xs-12 col-sm-5 order-2 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                        <img src="assets/img/section7/girlm.png" class="sec7-img girlm">
                        </div>
                    <div
                        class="col-xs-12 col-sm-6 d-flex flex-column justify-content-center align-items-stretch  order-1 order-lg-1">

                        <div class="content program">
                            <h3>Получи программу тренировок и питания на 1 день бесплатно</h3>
                            <p>
                                Ты в нужном месте и в нужное время, чтобы начать свой путь к здоровью, отличному
                                самочувствию и подтянутому телу.
                            </p>
                            <a class="btn hero-btn mx-tel" href="#" data-bs-toggle="modal" data-bs-target="#Modalregistr">Получить программу</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
-->
    <!-- End Why Us Section -->


    <!-- ======= Как Как пользоваться
сервисом  ======= -->
    <section id="sec8" class="sec8">
        <div class="container" data-aos="fade-up">
            <!--line1row-->
            <div class="row">
                <!--line1-->
                <div class="d-flex flex-wrap justify-content-center col-xs-12 col-sm-10 mx-auto" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-xs-12 col-sm-6">

                        <p class="s6-h1">Как пользоваться сервисом </p>
                        <!--line1-->
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-2">
                                <p class="s8-num">1</p>
                            </div>
                            <div class="col-lg-8">
                                <p class="s8-bl-txt">Регистрируйся на платформе</p>
                            </div>
                        </div>


                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="col-lg-5 order-3 order-lg-2" data-aos="zoom-in" data-aos-delay="150"><img class="boy"
                                src="assets/img/section8/Air.png"></div>
                    </div>


                </div>
            </div>
            <!--line2row-->
            <div class="row">
                <!--line1-->
                <div class="d-flex flex-wrap justify-content-center col-xs-12 col-sm-10 mx-auto" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-xs-12 col-sm-6">
                        <!--line1-->
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-2">
                                <p class="s8-num">2</p>
                            </div>
                            <div class="col-xs-12  col-sm-8">
                                <p class="s8-bl-txt">Получай доступ к бесплатным и очень
                                    нужным инструментам: дневнику питания
                                    и тренировок, статистике прогресса,
                                    калькуляторам и т. д.</p>
                            </div>
                        </div>


                    </div>
                    <div class="col-xs-12 col-sm-6">

                    </div>


                </div>
            </div>
            <!--line3row-->
            <div class="row">
                <!--line1-->
                <div class="d-flex flex-wrap justify-content-center col-xs-12 col-sm-10 mx-auto" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-xs-12 col-sm-6 d-flex justify-content-center  flex-column">
                        <div class="col-xs-12 col-sm-8 order-3 order-lg-2 mx-tel" data-aos="zoom-in" data-aos-delay="150"><img class="boy"
                                src="assets/img/section8/tel.png"></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 d-flex justify-content-center  flex-column">
                        <!--line1-->
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-2">
                                <p class="s8-num">3</p>
                            </div>
                            <div class="col-xs-12  col-sm-8">
                                <p class="s8-bl-txt">Выбери свой тариф и получи персональную
                                    программу тренировок для дома или зала,
                                    личный план питания и дополнительные
                                    возможности сервиса.</p>
                            </div>
                        </div>
                        <!--line2-->
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-2">
                                <p class="s8-num">4</p>
                            </div>
                            <div class="col-lg-8">
                                <p class="s8-bl-txt">Фиксируй свой прогресс и уверенно
                                    достигай целей с сервисом</p>
                            </div>
                        </div>


                    </div>


                </div>
            </div>


        </div>

        </div>
    </section><!-- End Как пользоваться сервисом  -->
    <section class="ftco-section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="subscribe-txt text-left heading-section mb-5 pb-md-4">Тренеры</p>
                </div>
                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">

                        @foreach($trainers as $trainer)

                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-center justify-content-center rounded"
                                         style="background-image: url({{asset('photo/'.$trainer->photo)}});">

                                    </div>
                                    <div class="text pt-3 w-100 text-center">
                                        <h3 class="head">{{$trainer->surname}} {{$trainer->name}}</h3>

                                        <div class="col-md-8 mx-auto text-left">
                                            <p class="shead">Образование</p>
                                            {!! $trainer->education !!}
                                        </div>
                                        <div class="col-md-8 mx-auto text-left">
                                            <p class="shead">Достижения</p>
                                            {!! $trainer->achievements !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="fut-txt">Наши тренера составят для тебя персональную
                                    программу тренировок и питания</p>
                                <a class="btn hero-btn mx-tel" href="#" data-bs-toggle="modal" data-bs-target="#Modalregistr">Присоединиться</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Portfolio Section ======= -->

     <section class="rates-mob-section" id="rates-mob">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="subscribe-txt text-left heading-section mb-5 pb-md-4">Выбери свой тариф</p>
                </div>
                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">


                        @foreach($tarifs as $tarif)
                            <div class="item rate-m">
                                <div class="work">

                                    <div class="text pt-3 w-100 text-center">
                                        <h3 class="head"></h3>

                                        <div class="col-md-8 mx-auto text-left">
                                            <p class="rate-txt">{{ $tarif->name }}</p>
                                            <p class="rate-price">{{ $tarif->price }} &#8381;<span class="rate-span">/ день</span></p>
                                        </div>
                                        <div class="col-md-8 mx-auto text-left">
                                            <p class="rate-txt-sm">{{$tarif->hint}}</p>

                                        </div>
                                        <div class="col-xs-12 pbt"><a class="btn hero-btn mx-tel" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Купить</a></div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ======= тариф Section ======= -->
   <!-- <section id="rates" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="col-md-12 text-center">
                <p class="subscribe-txt text-left heading-section mb-5 pb-md-4">Выбери свой тариф</p>
            </div>

            <div class="row">

                <div class="col-lg-12">

                    <table class="table" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <thead>
                        <tr>
                            <th>
                                <div class="">
                                    <p class="text-name">Стоимость день</p>

                                </div>
                            </th>
                            @foreach($tarifs as $tarif)


                                <th>
                                    <div class="price-block price-block_s">
                                        <p class="price-head">{{$tarif->name}}
                                            <span class="question" data-title="{{$tarif->hint}}">
                                          <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                        </span>
                                        </p>
                                        <span class="lable_null"></span>
                                        <p class="price-txt">{{$tarif->price}}р</p>
                                    </div>
                                </th>

                            @endforeach

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td class="">
                                <div class="">
                                    <p class="text-name">Калькуляторы</p>
                                </div>
                            </td>
                            @foreach($tarifs as $tarif)
                                <td class="td-green">
                                    {{ $tarif->status_2 }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="">
                                <div class="">
                                    <p class="text-name">Дневник тренировок</p>
                                    <p class="text-name-small">Самостоятельное заполнение</p>
                                </div>
                            </td>
                            @foreach($tarifs as $tarif)
                                <td class="td-green">
                                    {{ $tarif->status_3 }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="">
                                <div class="">
                                    <p class="text-name">Дневник тренировок</p>
                                    <p class="text-name-small">Автоматическое заполнение</p>
                                </div>
                            </td>
                            @foreach($tarifs as $tarif)
                                <td class="td-green">
                                    {{ $tarif->status_4 }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="">
                                <div class="">
                                    <p class="text-name">Дневник питания</p>
                                    <p class="text-name-small">Без цели БЖУ + калории</p>
                                </div>
                            </td>
                            @foreach($tarifs as $tarif)
                                <td class="td-green">
                                    {{ $tarif->status_5 }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="">
                                <div class="">
                                    <p class="text-name">Дневник питания</p>
                                    <p class="text-name-small">Выбор блюд по целям</p>
                                </div>
                            </td>
                            @foreach($tarifs as $tarif)
                                <td class="td-green">
                                    {{ $tarif->status_6 }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="">
                                <div class="">
                                    <p class="text-name">Прогресс-бар (цели)</p>
                                </div>
                            </td>
                            @foreach($tarifs as $tarif)
                                <td class="td-green">
                                    {{ $tarif->status_7 }}
                                </td>
                            @endforeach
                        </tr>

                        <tr>
                            <td class="">
                                <div class="">
                                    <p class="text-name">Кол-во подходов и веса<br>
                                        рассчитываются самостоятельно</p>
                                </div>
                            </td>
                            @foreach($tarifs as $tarif)
                                <td class="td-green">
                                    {{ $tarif->status_9 }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="">
                                <div class="">
                                    <p class="text-name">Результаты калькуляторов<br>
                                        сохраняются в лк и участвуют<br>
                                        в составлении планов</p>
                                </div>
                            </td>
                            @foreach($tarifs as $tarif)
                                <td class="td-green">
                                    {{ $tarif->status_10 }}
                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>

                </div>


            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="hero-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Выбрать тариф
                        </button>
                        

                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>--><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title d-flex justify-content-center col-12 mx-auto">
                <h1 class="subscribe-txt"> Почему подписка на <img src="assets/img/section2/pro.png"> тренировки в 10
                    раз выгоднее, чем занятия с личным тренером?</h1>
            </div>

            <div class="container">
                <div class="row row-flex">
                    <div class="col-xs-12 col-sm-6 mgbl" data-aos="fade-up" data-aos-delay="100">
                        <div class="box justify-content-center">
                            <p class="subscribe-block-txt"><img src="assets/img/section2/pro.png" width="60px" style="margin-right: 5px;">
                                 тренировки</p>
                            <p class="subscribe-h2">Самая дорогая подписка Premium+ обойдется тебе в 4300 ₽ (-30% при
                                покупке на полгода)</p>
                            <p class="subscribe-p">При этом ты получаешь:<br>
                                · персональную программу питания и тренировок с учетом твоих особенностей<br>
                                · безграничный доступ базе знаний<br>
                                · все полезные инструменты сервиса.</p>
                            <p class="subscribe-h2">Твоя выгода: 15 700 ₽</p>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 " data-aos="fade-up" data-aos-delay="200">
                        <div class="box2 row justify-content-center">
                            <p class="subscribe-h2">Месяц тренировок с персональным тренером в тренажерном зале будут
                                стоить около 20 000₽</p>
                            <p class="subscribe-p">Программа питания обычно стоит дополнительных денег.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Pricing Section -->

    <!--отзывы-->
    <section class="ftco-section" id="comments">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="subscribe-txt text-left heading-section mb-5 pb-md-4">Отзывы</p>
                </div>
                <div class="col-md-12 mgbl">
                    <div class="featured-carousel2 owl-carousel">

                        @foreach($comments as $comment)


                            <div class="item">
                                <div class=" work">


                                    <div class="rew row row-flex pt-3 w-100 text-center">
                                        <div class="rating">
                                            @for($i = 1 ; $i <= $comment->rating; $i++)
                                                <input type="radio" name="rating" disabled id="rating-5">
                                                <label for="rating-5"></label>
                                            @endfor
                                        </div>
                                        <div class="col-md-2 mx-auto text-left">
                                            <img class="rounded-circle"
                                                 @if($comment->photo == 0)
                                                 src="{{asset('dist/images/profile-3.jpg')}}"
                                                 @else
                                                 src="{{asset('photo/'.$comment->photo)}}"
                                                @endif
                                            >
                                        </div>
                                        <div class="col-md-8 mx-auto text-left">
                                            <p class="rew-txt">
                                                {!! $comment->comment !!}
                                            </p>
                                            <p class="rew-name">{{ $comment->surname }} {{ $comment->name }}</p>
                                            <p class="rew-city">{{ $comment->city }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <button class="hero-btn mx-tel" data-bs-toggle="modal" data-bs-target="#Modalrew">Добавить отзыв
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= отзывы ======= -->

    <!-- ======= dzen ======= -->
    <section id="dzen" class="dzen">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row dzen-bg">
                <div class="container">
                    <div class="row girl-margin">
                        <div
                            class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                            <div class="content">
                                <p class="dzen-logo mgt"><img src="assets/img/dzen/dzen-logo.png">ДЗЕН</p>
                                <p>
                                    Ещё у нас есть Дзен-канал, где мы регулярно публикуем полезные статьи на тему спорта
                                    и правильного питания
                                </p>
                                <a class="btn dzen-btn mx-tel mgbl" href="#" data-bs-toggle="modal" data-bs-target="#Modalregistr">Подписаться</a>
                            </div>


                        </div>

                        <div class="col-lg-5 order-3 order-lg-2" data-aos="zoom-in" data-aos-delay="150"><img class="boy"
                                src="assets/img/dzen/dzen.png"></div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End dzen -->
    <!-- ======= Frequently Asked Questions Section ======= -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <p class="subscribe-txt">Есть вопросы<br>или пожелания?</p>

            </div>

            <div class="row">


                <div class="col-lg-12 mt-12 mt-lg-0 d-flex align-items-stretch">
                    <form class="php-email-form">

                        <span class="text-success text-center" id="allSuccessMsg"></span>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Имя</label>
                                <input type="text" name="name" class="form-control form-h" id="name" required>
                                <span class="text-danger" id="nameErrorMsg"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Электронная почта или телефон</label>
                                <input type="email" class="form-control form-h" name="email" id="email" required>
                                <span class="text-danger" id="emailErrorMsg"></span>
                            </div>

                        </div>

                        <div class="form-group">

                            <textarea class="form-control" name="message" id="message" placeholder="Напишите что-нибудь" rows="10"
                                      required></textarea>
                            <span class="text-danger" id="messageErrorMsg"></span>
                        </div>
                        <div class="row">

                            <div class="form-group text-center">
                                <div class="col-xs-12 col-sm-12">
                                <input class="form-check-input" type="checkbox" value="" onclick="showButton()" id="flexCheckDefault">


                                <label class="form-check-label" for="flexCheckDefault">
                                    Я согласен на обработку персональных данных согласно <a href="/doc/personal_data.docx"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#Modalpolice">документу</a>
                                </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center" style="display:none" id="submitButtonBlock">
                            <button id="submitButton">Отправить</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center footer-menu">

                <div class="col-xs-12 col-sm text-center">
                    <img src="assets/img/footer/footer-logo.png">
                </div>

                <div class="col-xs-12 col-sm text-center">
                    <a href="#hero">Что получаешь?</a>
                </div>

                <div class="col-xs-12 col-sm text-center">
                    <a href="#skillsw">Как пользоваться?</a>
                </div>

                <div class="col-xs-12 col-sm text-center">
                    <a href="#trainers">Тренеры</a>
                </div>
               <!-- <div class="col-xs-12 col-sm text-center">
                    <a href="#rates">Тариф</a>
                </div>-->
                <div class="col-xs-12 col-sm text-center">
                    <a href="#comments">Отзывы</a>
                </div>

            </div>
        </div>
    </div>
    <div>
        <div class="container fline">
            <div class="d-flex flex-wrap justify-content-center col-12 mx-auto ">

                <div class="col-sm text-center">
                    <p class="contact"><img class="mail-img mr-2" src="{{asset('assets/img/footer/mail.png')}}">Контакты: <span
                            class="f-mail"><a href="mailto:Protrenirovki@mail.com">Protrenirovki@mail.com</a></span></p>
                </div>
                <div class="col-sm text-center">
                    <p class="contact"><img class="mail-img mr-2" src="{{asset('assets/img/footer/mail.png')}}">Для партнеров: <span
                            class="f-mail"><a href="mailto:Protrenirovki@mail.com">Partnerstrenirovki@mail.com</a></span></p>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex align-items-center footer-menu">

            <div class="col-xs-12 col-sm-3 text-center">
                <div class="copyright">
                    &copy;ИП Столяренко Б.А.<br>
                    ИНН: 360103632826<br>
                    ОРГНИП: 323366800029835<br>
                    Email: info@pro-trenirovki.ru
                </div>
                
            </div>

            <div class="col-xs-12  col-sm-3 text-center">
                <a class="op-txt" target="_blank" href="/documents">Документация проекта</a>
            </div>

            <div class="col-xs-12 col-sm-6 text-center">
                <button class="op-txt btn-f" data-bs-toggle="modal" data-bs-target="#Modalpolice">Согласие на обработку
                    персональных данных
                </button>
            </div>


        </div>
    </div>

</footer><!-- End Footer -->

<!-- Modal тарифы -->
<!--
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Выбрать тариф</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Выберите тариф</option>
                    @foreach($tarifs as $tarif)
                        <option value="{{$tarif->id}}">{{$tarif->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-form">Выбрать</button>
            </div>
        </div>
    </div>
</div>
-->
<!--modal-->

<!-- Modal отзывы -->
<div class="modal fade" id="Modalrew" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Оставить отзыв</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('comment.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlName" class="form-label">Имя</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlName" placeholder="Имя">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSurname" class="form-label">Фамилия</label>
                        <input type="text" name="surname" class="form-control" id="exampleFormControlSurname" placeholder="Фамилия">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlCity" class="form-label">Город</label>
                        <input type="text" name="city" class="form-control" id="exampleFormControlCity" placeholder="Город">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Отзыв</label>
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="rating-5">
                        <label for="rating-5"></label>
                        <input type="radio" name="rating" value="4" id="rating-4">
                        <label for="rating-4"></label>
                        <input type="radio" name="rating" value="3" id="rating-3">
                        <label for="rating-3"></label>
                        <input type="radio" name="rating" value="2" id="rating-2">
                        <label for="rating-2"></label>
                        <input type="radio" name="rating" value="1" id="rating-1">
                        <label for="rating-1"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-form">Оставить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--modal-->
<!-- Modal политика -->
<div class="modal fade" id="Modalpolice" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog col-8 modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Политика обработки персональных данных</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                Согласие на обработку персональных данных
                </p>
                <br>
                <p>
                1. Настоящим я (далее – «Пользователь»), предоставляю Индивидуальному предпринимателю Столяренко Борису Андреевичу (ОГРНИП: 314366828600273, ИНН: 360103632826),  Оператору Сайта https://www.protrenerovki.ru/,  (далее – Сайт), согласие на обработку моих персональных данных (далее — «Согласие») на условиях, изложенных далее.
				</p>
				<br>
                <p>
                2. Под персональными данными подразумевается любая информация, позволяющая установить мою личность, такая как:
ФИО;
адрес электронной почты;
Телефон Пользователя
платежная информация (номер карты, реквизиты расчётного счета);
иная персональная информация, которую Пользователь предоставляет о себе путем заполнения и/или отправки через специальные формы, расположенные на сайте или направленные Оператору посредством электронной почты. 
Персональная информация, которую Пользователь предоставляет о третьих лицах в процессе использования Сайта, включая персональные данные третьих лиц. 
содержание переписки между Пользователем и Оператором;
информация о посещениях Пользователем Сайта;
ответы Пользователя в каких-либо опросах или анкетах;
информация, которую Оператор Сайта может запросить у Пользователя при ответе на его запрос;

                </p>
                <br>
                <p>
                3. Настоящим согласием я подтверждаю, что проинформирован о том, что под обработкой персональных данных понимаются следующие действия с персональными данными, а именно: любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных.
				</p>
				<br>
                <p>
                4. Настоящим согласием я подтверждаю, что проинформирован о том, что обработка предоставляемых мною персональных данных осуществляется в целях: 
Исполнения Оператором заключённых с Пользователем соглашений и договоров.
Установления с Пользователем обратной связи, включая направление уведомлений, запросов, касающихся использования Сайта, обработки запросов и заявок от Пользователя.
Подтверждения достоверности и полноты персональных данных, предоставленных Пользователем.
Предоставления Пользователю эффективной технической поддержки при возникновении проблем, связанных с использованием Сайта.
Предоставления Пользователю с его согласия специальных предложений, новостной рассылки и иных сведений от имени Сайта.
Таргетирование рекламных материалов с целью предоставления наиболее релевантных объявлений о товарах и услугах;
 Предоставления доступа Пользователю на сайты партнеров Оператора;
                </p>
                <br>
                <p>
                5. Подтверждаю, что персональные данные и иные сведения, относящиеся ко мне предоставлены мною Оператору путем внесения их при заполнении любых форм на Сайте https://www.protrenerovki.ru/ добровольно и являются достоверными. Я извещен о том, что в случае недостоверности предоставленных персональных и сведений Оператор оставляет за собой право прекратить доступ к Сайту.

                </p>
                <br>
                <p>
                6. Я согласен, что мои персональные данные будут обрабатываться способами, соответствующими целям обработки персональных данных, без возможности принятия решения на основании исключительно автоматизированной обработки моих персональных данных.

                </p>
                <br>
                <p>
                7. Срок действия согласия является неограниченным, однако настоящее согласие может быть отозвано мной в любой момент путем направления письменного требования на адрес электронной почты Оператора: info@protrenerovki.ru с пометкой «Отзыв согласия на распространение персональных данных». Удаление персональных данных будет произведено в течении 3 (Трех) календарных дней с момента получения данного уведомления.

                </p>
               
            </div>
            <div class="text-center">
                <div class="modal-footer">

                    <button type="button" class="btn-policy " data-bs-dismiss="modal">Согласен с политикой обработки
                        персональных данных
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal-->

<!-- Modal регистрация -->
<div class="modal fade" id="Modalregistr" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Регистрация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/register" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="FormControlInputregname" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="FormControlInputregname"
                               placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    {{-- <div class="mb-3">
                        <label for="FormControlInputregname" class="form-label">Выберите тариф</label>
                        <select class="form-select" name="traffic" aria-label="Default select example">
                            @foreach($tarifs as $tarif)
                                <option value="{{$tarif->name}}">{{$tarif->name}} ({{$tarif->price}} руб.)</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="FormControlInputregpass" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="FormControlInputregpass"
                               placeholder="Пароль">
                        <div class="show-password">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m0 0h24v24h-24z" fill="#fff" opacity="0"/><g fill="#231f20"><path d="m21.87 11.5c-.64-1.11-4.16-6.68-10.14-6.5-5.53.14-8.73 5-9.6 6.5a1 1 0 0 0 0 1c.63 1.09 4 6.5 9.89 6.5h.25c5.53-.14 8.74-5 9.6-6.5a1 1 0 0 0 0-1zm-9.65 5.5c-4.31.1-7.12-3.59-8-5 1-1.61 3.61-4.9 7.61-5 4.29-.11 7.11 3.59 8 5-1.03 1.61-3.61 4.9-7.61 5z"/><path d="m12 8.5a3.5 3.5 0 1 0 3.5 3.5 3.5 3.5 0 0 0 -3.5-3.5zm0 5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1 -1.5 1.5z"/></g></svg>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="FormControlInputregpass2" class="form-label">Повторите пароль</label>
                        <input type="password" name="password_confirmation" class="form-control"
                               id="FormControlInputregpass2" placeholder="Пароль">
                        <div class="show-password">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m0 0h24v24h-24z" fill="#fff" opacity="0"/><g fill="#231f20"><path d="m21.87 11.5c-.64-1.11-4.16-6.68-10.14-6.5-5.53.14-8.73 5-9.6 6.5a1 1 0 0 0 0 1c.63 1.09 4 6.5 9.89 6.5h.25c5.53-.14 8.74-5 9.6-6.5a1 1 0 0 0 0-1zm-9.65 5.5c-4.31.1-7.12-3.59-8-5 1-1.61 3.61-4.9 7.61-5 4.29-.11 7.11 3.59 8 5-1.03 1.61-3.61 4.9-7.61 5z"/><path d="m12 8.5a3.5 3.5 0 1 0 3.5 3.5 3.5 3.5 0 0 0 -3.5-3.5zm0 5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1 -1.5 1.5z"/></g></svg>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                     <div class="mb-3 text-center">
                <input class="form-check-input" type="checkbox" value="" onclick="showButtonreg()" id="flexCheckreg">
                <label class="form-check-label" for="flexCheckreg">
                                    Я согласен на обработку  <a href="/doc/personal_data.docx"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#Modalpolice">персональных данных</a>
                                </label>
                </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" id="btnreg" class="btn btn-form" style="display:none">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--modal-->
<!-- Modal Авторизовации -->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Авторизация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/login" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="FormControlInputregname" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="FormControlInputregname"
                               placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="FormControlInputregpass" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="FormControlInputregpass"
                               placeholder="Пароль">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-form">Авторизация</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--modal-->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<!--cookies-->
<div id="cookies" class="cookies">
	<div class="cookblock">
	<span class="align-middle">На данном сайте используются файлы Cookies</span>
	<button id="okcookies" class="btn btn-form">Согласится с использованием</button>
	</div>
</div>
<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/slider/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/slider/js/popper.js')}}"></script>
<script src="{{asset('assets/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/slider/js/main.js')}}"></script>
<script src="{{asset('assets/js/star-rating.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{ asset('assets/vendor/noty/noty.js') }}"></script>
<script>
    // Rating Initialization
    $(document).ready(function () {
        $("#input-id").rating();
    });
</script>
<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.table th, .table td').hover(function () {
            var t = parseInt($(this).index()) + 1;
            if (t == 1) {
                t = 2
            }
            $('th:nth-child(' + t + '),td:nth-child(' + t + ')').addClass('hover');

            $('th:nth-child(' + t + ')').addClass('ff');

            $('th:nth-child(' + t + ')').children().removeClass('price-block');
        }, function () {
            var t = parseInt($(this).index()) + 1;
            if (t == 1) {
                t = 2
            }
            $('th:nth-child(' + t + '),td:nth-child(' + t + ')').removeClass('hover');
            $('th:nth-child(' + t + ')').removeClass('ff');
            $('th:nth-child(' + t + ')').children().addClass('price-block');
        });
    });
</script>
@if(session()->has('errors'))
    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: '<?php foreach ($errors->all() as $item) { echo $item . '<br>';}?>',
            timeout: 2000,
            killer: true
        }).show();
    </script>
@endif
@if(Session::get('success'))
    )
    <script type="text/javascript">
        setTimeout(function () {
            $("#success-notification-content").remove();
        }, 3000);
    </script>
@endif

<script type="text/javascript">

    function showButton() {
        var checkBox = document.getElementById("flexCheckDefault");
        var text = document.getElementById("submitButtonBlock");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
    
    function showButtonreg() {
        var checkBox = document.getElementById("flexCheckreg");
        var text = document.getElementById("btnreg");
        
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }



    $("#submitButton").click(function(e){

        e.preventDefault();

        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();

        $.ajax({
            type:'POST',
            url:"{{ route('contact.store') }}",
            data:{
                "_token": "{{ csrf_token() }}",
                name:name,
                email:email,
                message:message
            },
            success:function(data){
                $('#allSuccessMsg').text(data.success);
                console.log(data.success);
                $('#nameErrorMsg').val("");
                $('#emailErrorMsg').val("");
                $('#messageErrorMsg').val("");
            },
            error: function(response) {
                $('#nameErrorMsg').text(response.responseJSON.errors.name);
                $('#emailErrorMsg').text(response.responseJSON.errors.email);
                $('#messageErrorMsg').text(response.responseJSON.errors.message);
            },
        });

    });

$("#okcookies").click(function(){
var  cookies = document.getElementById("cookies");
cookies.style.display = "none";
});

</script>

</body>

</html>

