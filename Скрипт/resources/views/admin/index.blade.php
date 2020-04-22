@extends('admin.layout')

@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".knob").knob();
        });
    </script>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Статистика</h4>
                        <p class="text-muted page-title-alt">Добро пожаловать в ADMIN-PANEL !</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-info pull-left">
                                <i class="md md-attach-money text-info"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">{{$all_win}}</b></h3>
                                <p class="text-muted">Выиграли пользователи</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-info pull-left">
                                <i class="md md-attach-money text-info"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">{{$all_games}}</b></h3>
                                <p class="text-muted">Всего лотерей сыграно</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-info pull-left">
                                <i class="md md-attach-money text-info"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">{{$all_payed}}</b></h3>
                                <p class="text-muted">Внесли пользователи</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-info pull-left">
                                <i class="md md-attach-money text-info"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">{{$all_with}}</b></h3>
                                <p class="text-muted">Вывели пользователи</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0 m-b-30">Статистика сегодня</h4>

                            <div class="widget-chart text-center">
                                <input class="knob" data-width="150" data-height="150" data-linecap=round
                                       data-fgColor="#34d3eb" value="{{ (int)$pay_today }}" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".15"/>
                                <h5 class="text-muted m-t-20">Заработок на сегодня</h5>
                                <h2 class="font-600">{{$pay_today}} р.</h2>
                                <ul class="list-inline m-t-15">
                                    <li>
                                        <h5 class="text-muted m-t-20">За неделю</h5>
                                        <h4 class="m-b-0">{{$pay_week}} р.</h4>
                                    </li>
                                    <li>
                                        <h5 class="text-muted m-t-20">За месяц</h5>
                                        <h4 class="m-b-0">{{$pay_month}} р.</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card-box">
                            <a href="/admin/lastOpen" class="pull-right btn btn-default btn-sm waves-effect waves-light">Больше</a>
                            <h4 class="text-dark header-title m-t-0">Последние игры</h4>
                            <p class="text-muted m-b-30 font-13">
                                Последние 7 игр
                            </p>

                            <div class="table-responsive" style="min-height: 300px; max-height: 300px;  overflow:  hidden; ">
                                <table class="table table-actions-bar">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ставка</th>
                                        <th>Пользователь</th>
                                        <th>Выиграл</th>
                                        <th>Профит сайту</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--No1-->
									@foreach($last_games as $l)
										<tr>
											<td>{{$l->id}}</td>
											<td>{{$l->bet}}</td>
											<td><a href="/admin/user/{{$l->user_id}}" target="blank">{{$l->user->username}}</a></td>
											<td>{{$l->win}} р.</td>
											<td>{{ $l->bet - $l->win }} р.</td>
										</tr>
									@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">

                    <div class="col-lg-4">
                        <div class="card-box">
                            <a href="/admin/lastOrders" class="pull-right btn btn-default btn-sm waves-effect waves-light">Больше</a>
                            <h4 class="m-t-0 m-b-20 header-title"><b>Последние пополнения</b></h4>
                            <div class="nicescroll mx-box" style="overflow: hidden; outline: none; min-height: 345px; max-height: 345px;" tabindex="5000">
                                <ul class="list-unstyled transaction-list m-r-5">
									@foreach($last_pays as $lp)
                                    <li>
                                        <i class="ti-download text-success"></i>
                                        <a href="/admin/user/{{$lp->user->id}}" target="blank">
                                            <span class="tran-text">{{$lp->user->username}}</span>
                                        </a>
                                        <span class="pull-right text-success tran-price">+{{$lp->amount}} р.</span>
                                        <span class="pull-right text-muted">{{$lp->created_at}}</span>
                                        <span class="clearfix"></span>
                                    </li>
									@endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- col -->

                    <div class="col-lg-8">
                        <div class="card-box">
                            <a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light">Больше</a>
                            <h4 class="text-dark header-title m-t-0">Последние запросы на вывод</h4>
                            <p class="text-muted m-b-30 font-13">
                                Последние 7 запросов на вывод
                            </p>

                            <div class="table-responsive">
                                <table class="table table-actions-bar">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Пользователь</th>
                                        <th>Платежка</th>
										<th>Кошелек<th>
                                        <th>Сумма</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									@foreach($last_withs as $lw)
                                    <tr>
                                        <td>{{$lw->id}}</td>
                                        <td><a href="/admin/user/{{$lw->user_id}}" target="blank">{{$lw->user->username}}</a></td>
                                        <td>@if($lw->system == 4) QIWI @elseif($lw->system == 1) Банк.карта @elseif($lw->system == 5) ЯндексДеньги @endif</td>
                                        <td>{{$lw->wallet}}</td>
                                        <td>{{$lw->amount}}</td>
                                        <td>
                                            <a href="/admin/acceptWithdraw/" class="table-action-btn">Оплатить</a>
                                            <span> | </span>
                                            <a href="/admin/declineWithdraw/" class="table-action-btn">Отказать</a>
                                        </td>
                                    </tr>
									@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->


            </div> <!-- container -->

        </div> <!-- content -->
        <footer class="footer text-right">
            © 2017. All rights reserved. by Ivan Isaev.
        </footer>

    </div>
@endsection