@extends('layout')

@section('title')
Партнерская программа
@stop

@section('content')
<div class="navigator-line">
	<div class="container">
		<div class="navigator-line__wrapper">
			<button onclick="window.location.href = '/'" class="button-round button-round_trans-dark">
				<i class="button-round__icon button-round__icon_f-left fa fa-chevron-left" aria-hidden="true"></i>
				Игра
			</button>
			<h1 class="navigator-line__text">Мой профиль</h1>
		</div>
	</div>
</div>
<div class="profile">
        <div class="container container_full-width">
            <div class="profile__wrapper">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
    <div class="profile__ava-block-wrapper">
        <div class="profile__ava-block">
            <div class="profile__ava">
                <img src="{{Auth::user()->avatar}}" alt="" class="profile__ava-img">
            </div>
        </div>
        <div class="profile__ava-name">{{Auth::user()->username}}</div>
        <div class="profile__ava-balance">
            <i class="fa fa-money" aria-hidden="true"></i>
            <span class="profile__ava-balance-value">{{Auth::user()->money}}</span>
            <span class="rouble">p</span>
        </div>
        
    </div>
    <div class="button-line button-line_m-top">
        <!--button-round_disable-->
        <button data-modal="payin" class="modal-activate button-round button-round_long button-round_m-top">
            <i class="button-round__icon button-round__icon_f-left fa fa-credit-card" aria-hidden="true"></i>
            Пополнить
            <i class="button-round__icon button-round__icon_f-right fa fa-chevron-right" aria-hidden="true"></i>
        </button>
        <button data-modal="payout" class="modal-activate button-round button-round_long button-round_m-top button-round_dark">
            <i class="button-round__icon button-round__icon_f-left fa fa-money" aria-hidden="true"></i>
            Вывести
            <i class="button-round__icon button-round__icon_f-right fa fa-chevron-right" aria-hidden="true"></i>
        </button>
        <button data-modal="promo" class="modal-activate button-round button-round_long button-round_m-top button-round_trans">
            <i class="button-round__icon button-round__icon_f-left fa fa-gift" aria-hidden="true"></i>
            Ввести <span class="hidden-sm hidden-md">промо</span>код
            <i class="button-round__icon button-round__icon_f-right fa fa-chevron-right" aria-hidden="true"></i>
        </button>
        <form action="/logout" method="post">
            <input type="hidden" name="_token" value="g86Qd8FqAnxGVop8apubq8wv8UKQ3wnYoLK5RnRd">
            <button type="submit" class="button-round button-round_long button-round_m-top button-round_trans-dark">
                <i class="button-round__icon button-round__icon_f-left fa fa-sign-out" aria-hidden="true"></i>
                Выйти
                <i class="button-round__icon button-round__icon_f-right fa fa-chevron-right" aria-hidden="true"></i>
            </button>
        </form>
    </div>
</div>                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                        <div class="profile__content-wrapper">
                            <div class="profile__content-header">
                                <a class="profile__content-header-tab" href="/profile">История игр</a>
								<a class="profile__content-header-tab" href="/profile/pays">Пополения</a>
								<a class="profile__content-header-tab" href="/profile/withdraws">Выводы</a>
                                <span class="profile__content-header-tab profile__content-header-tab_active">Партнерская программа</span>
                            </div>
                            <div class="profile__content-container">
                                <div class="profile__refprogram">
                                    <div class="profile__refprogram-text">
									@php
									$settings = \DB::table('settings')->where('id', 1)->first();
									@endphp
                                        <p>Приглашайте друзей и получайте {{$settings->promo_percent}}% от всех пополнений, которые сделают ваши друзья!</p><br>
                                        <p>Все работает очень просто: отправьте им ваш персональный промокод и ссылку на наш сайт.</p><br>
                                        <p>После регистрации ваш друг получит {{$settings->promo_sum}} рублей!<br>
                                            Если ваш друг пополнит баланс, вы получите {{$settings->promo_percent}}% от этой суммы на свой счет.</p><br>
                                        <p>Деньги заработанные по партнерской программе сразу доступны для вывода!</p>
                                    </div>
                                    <div class="profile__refprogram-code-block">
                                        Ваш персональный промокод: <span class="profile__refprogram-code">{{Auth::user()->ref_code}}</span>
                                    </div>
                                    <div class="profile__refprogram-text profile__refprogram-text_center profile__refprogram-text_gray">
                                         Запрещается: регистрировать более 1 аккаунта и вводить собственный промокод для обмана партнерской программы, рассылать спам.
                                        За нарушение правил - блокировка аккаунта.
                                    </div>
                                    <br>
                                    <h2>Приглашенные друзья:</h2>
                                    <div class="table">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th class="table__th">Пользователь</th>
                                                <th class="table__th">Дата</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											@if(count($vvod) > 0)
											@foreach($vvod as $v)
												<tr>
													<td class="table__td">{{$v->user->username}}</td>
													<td class="table__td">{{$v->created_at}}</td>
												</tr>
											@endforeach
											@endif
											</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop