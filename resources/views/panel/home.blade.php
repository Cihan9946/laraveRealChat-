@extends("panel.app")
@section("content")
    <style>
        .card{
            border-top-right-radius: 10px !important;
            border-top-left-radius: 10px !important;
            box-shadow: 0px 0px 15px -6px black;
        }
        .card .card-header{
            background-color: #282828;
            border-top-right-radius: 10px !important;
            border-top-left-radius: 10px !important;
        }
        .card .card-header .card-title{
            color: white;
            margin: 0;
        }
        .card-body .cardA {
            display: flex;
            position: relative;
            text-align: center;
            background-color: #282828;
            border-radius: 10px;
            width: calc(88% / 3);
            margin: 0 2%;
            flex-direction: column;
            align-items: center;
        }
        .card-body .cardA .iconA {
            color: white;
            margin-left: 10%;
        }
        .card-body .cardA .contentA {
            width: 100%;
            display: flex;
            color: white;
            align-items: center;
            color: white;
            margin-bottom: 2vw;
        }
        .card-body .cardA .contentA h2{
            font-size: 2vw;
        }
        .card-body .cardA .contentA .numberA{
            margin-left: 28%;
        }
        .card-body .cardA .card-nameA {
            margin-top: 0.5vw;
            color: white;
            font-size: 0.85vw;
        }
        .card-body .cardA .more-menuA {
            color: white;
            font-size: 0.85vw;
            display: flex;
            justify-content: center;
            background-color: #bf2533;
            color: white;
            position: absolute;
            bottom: 0;
            width: 100%;
            left: 0;
        }
        .card-body .cardA .more-menuA a{
            color: white;
            text-decoration: none;
        }
        .card-red{
            margin-top: 10px;
        }
        .card-red .card-header{
            background-color: #bf2533;
            border-radius: 0px !important;
        }
        .tables{
            display: flex;
        }
    </style>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Veriler</h3>
            </div>
            <div class="card-body p-5" style="display: flex;flex-wrap: wrap;row-gap: 25px; ">
                <div class="cardA">
                    <div class="card-nameA">Toplam Kullanıcı Sayısı</div>
                    <div class="contentA">
                        <div class="iconA">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div class="numberA">
                            <h2></h2>
                        </div>
                    </div>
                    <div class="more-menuA">
                        <a> <i class="fas fa-arrow-circle"></i></a>
                    </div>
                </div>
                <div class="cardA">
                    <div class="card-nameA">Toplam bekleyen Kullanıcı Sayısı </div>
                    <div class="contentA">
                        <div class="iconA">
                            <i class="far fa-file fa-2x"></i>
                        </div>
                        <div class="numberA">
                            <h2></h2>
                        </div>
                    </div>
                    <div class="more-menuA">
                        <a href=""> Detaylara Git <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="cardA">
                    <div class="card-nameA">Toplam Sayısı</div>
                    <div class="contentA">
                        <div class="iconA">
                            <i class="fas fa-video fa-2x"></i>
                        </div>
                        <div class="numberA">
                            <h2></h2>
                        </div>
                    </div>
                    <div class="more-menuA">
                        <a href=""> Detaylara Git <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('hover-control')
    <script>
        $(document).ready(function () {
            $('.nav-item').removeClass('active');
            $('.nav-item .collapse').removeClass('show');
            $('.dashboard').addClass('active');
        });
    </script>
@endsection
