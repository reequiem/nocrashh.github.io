@extends('layout')
@section('title')
Пополнения
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
</div>                    
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<div class="profile__content-wrapper">
						<div class="profile__content-header">
							<a class="profile__content-header-tab" href="/profile">История игр</a>
							<span class="profile__content-header-tab profile__content-header-tab_active">Пополнения</span>
							<a class="profile__content-header-tab" href="/profile/withdraws">Выводы</a>
							<a class="profile__content-header-tab" href="/profile/partner">Партнерская программа</a>
						</div>
						<div class="profile__content-container">
							<div class="table">
								<table>
									<thead>
									<tr>
										<th class="table__th">№</th>
										<th class="table__th">Наименование</th>
										<th class="table__th table__th_center">Сумма</th>
										<th class="table__th table__th_center">Дата</th>
										<th class="table__th table__th_right">Статус</th>
									</tr>
									</thead>
									<tbody>
										@foreach($pays as $p)
										<tr>
											<td class="table__td">{{$p->id}}</td>
											<td class="table__td">Пополнение баланса на {{$p->amount}} руб.</td>
											<td class="table__td table__td_center table__td_yellow">{{$p->amount}}</td>
											<td class="table__td table__td_center">{{$p->created_at}}</td>
											@if($p->status == 0)
											<td class="table__td table__td_right">Ожидание</td>
											@else
											<td class="table__td table__td_right">Успешно</td>
											@endif
										</tr>
										@endforeach
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
@stop