@extends('admin.layout')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/admin/saveSettings">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Настройки сайта</b></h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-20">
                                            <h5><b>Шанс окупаемости игры</b></h5>
                                            <p class="text-muted m-b-15 font-13">
                                                Положительное число, больше 0, но меньше 100
                                            </p>
                                            <input type="number" value="{{$settings->chance}}" class="form-control" maxlength="25" name="chance">
                                        </div>
										<div class="p-20">
                                            <h5><b>Шанс окупаемости для Ютуберов</b></h5>
                                            <p class="text-muted m-b-15 font-13">
												Положительное число, больше 0, но меньше 100 для рекламы сайта
                                            </p>
                                            <input type="number" value="{{$settings->yt_chance}}" class="form-control" maxlength="25" name="yt_chance">
                                        </div>
                                        <div class="p-20">
                                            <h5><b>Сумма за реферальный код</b></h5>
                                            <p class="text-muted m-b-15 font-13">
                                                Когда пользователь активирует код, то он получит:
                                            </p>
                                            <input type="number" value="{{$settings->promo_sum}}" class="form-control" maxlength="25" name="promo_sum">
                                        </div>
										<div class="p-20">
                                            <h5><b>Процент от пополнения пригласившему: </b></h5>
                                            <p class="text-muted m-b-15 font-13">
                                                Бонус от пополнения пользователя его пригласителю:
                                            </p>
                                            <input type="number" value="{{$settings->promo_percent}}" class="form-control" maxlength="25" name="promo_percent">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
										<div class="p-20">
                                            <h5><b>Минимальная сумма вывода</b></h5>
                                            <p class="text-muted m-b-15 font-13">
                                                Минимальная сумма вывода
                                            </p>
                                            <input type="number" value="{{$settings->min_with}}" class="form-control" maxlength="25" name="min_with">
                                        </div>
										<div class="p-20">
                                            <h5><b>Минимальная ставка в игре</b></h5>
                                            <p class="text-muted m-b-15 font-13">
                                                Минимальная сумма, меньше которой поставить будет нельзя
                                            </p>
                                            <input type="number" value="{{$settings->min_bet}}" class="form-control" maxlength="25" name="min_bet">
                                        </div>
                                        <div class="p-20">
                                            <h5><b>ID кассы</b></h5>
                                            <p class="text-muted m-b-15 font-13">
                                                ID кассы с Free-kassa
                                            </p>
                                            <input type="number" value="{{$settings->fk_id}}" class="form-control" maxlength="25" name="fk_id">
                                        </div>
                                        <div class="p-20">
                                            <h5><b>Секретное слово #1</b></h5>
                                            <p class="text-muted m-b-15 font-13">
                                                Первое секретное слово Free-kassa
                                            </p>
                                            <input type="text" value="{{$settings->fk_secret1}}" class="form-control" maxlength="25" name="fk_secret1">
                                        </div>
                                        <div class="p-20">
                                            <h5><b>Секретное слово #2</b></h5>
                                            <p class="text-muted m-b-15 font-13">
                                                Второе секретное слово Free-kassa
                                            </p>
                                            <input type="text" value="{{$settings->fk_secret2}}" class="form-control" maxlength="25" name="fk_secret2">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection