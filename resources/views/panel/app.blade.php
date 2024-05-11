<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset("front/img/logo.ico")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('panel/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.css')}}"/>
    <link rel="stylesheet" href="{{asset('panel/css/modal.css')}}">
    <link rel="icon" href="https://www.firat.edu.tr/favicon.ico" type="image/x-icon">


    <script src="{{asset('jquery/jquery-3.6.0.js')}}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <title>
        
        Fırat Sohbet
    </title>

</head>
<style>
    input,
    textarea,
    select{
        border-radius: 8px;
        padding: 8px 10px;
        border: 1px solid #ced4da;
        font-size: 15px;
    }

    form {
        display: flex;
        flex-wrap: wrap;
    }

    .half {
        display: flex;
        flex-direction: column;
        width: 48%;
        margin-right: 2%;
        margin-bottom: 30px;
    }

    .half img {
        height: 200px;
        object-fit: contain;
    }

    form div input,
    form div textarea,
    form div select{
        width: 60%;
    }
    input[type="color"]{
        width: max-content;
    }

    .flex {
        width: 48%;
        margin-left: 2%;
        margin-bottom: 30px;
    }

    .flex input {
        width: max-content;
    }

    tbody tr.false {
        background-color: #d4d4d4 !important;
    }
    table img{
        /*max-width: 50px;

         */
        height: 100px;

        object-fit: contain;

    }
</style>
<body>
<header>
    <div class="headerRight">

        <h2><i class="fas fa-bars"></i> Hoşgeldiniz <strong></strong></h2>

        {{--en-tr ayrımı bitiş--}}
        <div>

            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0" style="margin-left: 10px;">
                <a href=""  target="_blank" class="btn green" ></a>
            </li>
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0" style="margin-left: 10px;">
                <a href="   " class="btn red"  style="margin-left: 10px">Çıkış Yap</a>
            </li>
        </div>
    </div>
</header>

<div id="sidebar">
    <aside>
        <div class="headerLogo">
            <i class="fas fa-times"></i>
            <a href="{{route('panel.index')}}">
                <img src="{{asset('images/firatlogo404.png')}}" alt="">
                <div>
                    <h2>Fırat Sohbet Paneli</h2>
                </div>
            </a>
        </div>
        <ul class="menu">

            <li id="anasayfa" class="menuHomePage">
                <a href="{{route('panel.index')}}" title="">
                    <i class="fas fa-home"></i>
                    <span>Ana Sayfa</span>
                    <i class="fas fa-caret-right"></i>
                </a>
            </li>
            <li>
                <a href="{{route('category.list')}}" title="Categories" >
                    <i class="fa-solid fa-file" ></i>
                    <span>BİRİM LİSTESİ</span>
                    <i class="fas fa-caret-right"></i>
                </a>

            </li>
            <li>
                <a href="{{route('user.list')}}" title="Videos" >
                    <i class="fa-solid fa-video" ></i>
                    <span>KULLANICILAR</span>
                    <i class="fas fa-caret-right"></i>
                </a>
            </li>

            <li>
                <a href="{{route('user.chat')}}" title="Categories" >
                    <i class="fa-solid fa-file" ></i>
                    <span>Tüm Chat Listesi</span>
                    <i class="fas fa-caret-right"></i>
                </a>

            </li>
            <li>
                <a href="{{route('user.chatrequest')}}" title="Categories" >
                    <i class="fa-solid fa-file" ></i>
                    <span>Tüm Sohbet istek Listesi</span>
                    <i class="fas fa-caret-right"></i>
                </a>

            </li>
            <li>
                <a href="{{route('panel.super_admin_role.index')}}" title="Categories" >
                    <i class="fa-solid fa-file" ></i>
                    <span>ROLLER</span>
                    <i class="fas fa-caret-right"></i>
                </a>

            </li>
            <li>
                <a href="{{route('list')}}" title="Categories" >
                    <i class="fa-solid fa-file" ></i>
                    <span>newuser</span>
                    <i class="fas fa-caret-right"></i>
                </a>

            </li>
        </ul>
    </aside>
    <footer>
        <div style="margin-top: 15px">
            <p>Tüm Hakları Saklıdır© 2023 |<br> <a href="http://ddyo.firat.edu.tr/" target="_blank" style="color: white; margin:0;"> Dijital Dönüşüm ve Yazılım Ofisi </a></p>
        </div>
    </footer>
</div>
<main>
    @yield("content")
</main>
<!--index.js-->
<script src="{{asset('panel/js/index.js')}}"></script>
<!--bootstrap 5.0.2 js-->
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield("scripts")
<script>
    $(".open-modal").click(function (event) {
        var id = "#" + event.currentTarget.id + "-modal";
        $(id).addClass("active");
    })
    $(".modal-close").click(function () {
        $(".modal-space").removeClass("active")
    })
    $(".modal-space").click(function (event) {
        if ($(event.target).hasClass("modal-space")) {
            $(".modal-space").removeClass("active")
        }
    })

</script>
<script>
    $(".from").parent().parent().addClass("active")
    $(".from").parent().slideDown(300);
</script>
</body>

</html>
