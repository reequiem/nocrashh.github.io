@extends('layout')

@section('title')
Помощь и техническая поддержка SkyCard
@stop

@section('content')
<div class="navigator-line">
	<div class="container">
		<div class="navigator-line__wrapper">
			<button class="button-round button-round_trans-dark" onclick="window.history.back()">
				<i class="button-round__icon button-round__icon_f-left fa fa-chevron-left" aria-hidden="true"></i>
				Назад
			</button>
			<h1 class="navigator-line__text">Помощь</h1>
		</div>
	</div>
</div>
<div class="help">
	<div class="container container_full-width">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
				<div class="help__assistant-wrapper">
					<iframe name="fXDc61eb" frameborder="0" src="https://vk.com/widget_community_messages.php?app=0&amp;width=300px&amp;_ver=1&amp;gid=153310399&amp;shown=1&amp;disable_welcome_screen=1&amp;tooltip_text=%D0%95%D1%81%D1%82%D1%8C%20%D0%B2%D0%BE%D0%BF%D1%80%D0%BE%D1%81%3F&amp;domain=skycard.dev&amp;button_position=undefined&amp;height=399&amp;url=http%3A%2F%2Fskycard.dev%2Fhelp&amp;referrer=&amp;title=%D0%9F%D0%BE%D0%BC%D0%BE%D1%89%D1%8C%20%E2%80%94%20Laravel&amp;15e72c58f27" width="372px" height="399px" scrolling="no" id="vkwidget1" style="overflow: hidden;"></iframe>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
				<div id="faq-help" class="help__faq-wrapper faq">
					<h2 class="faq__header">Вопросы и ответы</h2>
					<div class="faq__block">
						<div class="faq__block-header">
							<h3 data-block="#faq-help" class="faq__block-header-text faq__block-header-text_active">Как играть?</h3>
						</div>
						<div class="faq__block-text" style="display: block;">
							<ul>
								<li>— Выбери ставку, нажми кнопку "Начать игру"</li>
								<li>— Курсором или пальцем сотри защитный слой на 3 карточках</li>
								<li>— Если совпали 3 числа - получи приз в зависимости от ставки</li>
								<li>— Если совпали 2 числа - открой 4 карточку или забери гарантированный приз</li>
							</ul>
						</div>
					</div>
					<div class="faq__block">
						<div class="faq__block-header">
							<h3 data-block="#faq-help" class="faq__block-header-text faq__block-header-text_noactive">Как ввести промокод?</h3>
						</div>
						<div class="faq__block-text">
							В меню нажми на ссылку "Бонус" и введи промокод в появившемся окне. Подарок зачислится на баланс моментально.
						</div>
					</div>
					<div class="faq__block">
						<div class="faq__block-header">
							<h3 data-block="#faq-help" class="faq__block-header-text faq__block-header-text_noactive">Что демо-режим?</h3>
						</div>
						<div class="faq__block-text">
							Демо — это режим, в котором вы можете попробовать игру без пополнения баланса.
							Алгоритм и результаты игры будут такие же, как при игре на баланс. Однако в демо-режиме
							деньги с баланса не снимаются и выигрыш не зачисляется.
						</div>
					</div>
					<div class="faq__block">
						<div class="faq__block-header">
							<h3 data-block="#faq-help" class="faq__block-header-text faq__block-header-text_noactive">Как играть на реальные деньги?</h3>
						</div>
						<div class="faq__block-text">
							Для того чтобы играть на реальные деньги с возможностью вывода на свой кошелек - нужно пополнить баланс.
						</div>
					</div>
					<div class="faq__block">
						<div class="faq__block-header">
							<h3 data-block="#faq-help" class="faq__block-header-text faq__block-header-text_noactive">Вывод денег моментальный?</h3>
						</div>
						<div class="faq__block-text">
							Qiwi и Яндекс.Деньги выводятся в течение нескольких минут. Вывод на банковскую карту может занять
							от 1 минуты до 3 рабочих дней (зависит от вашего банка).
						</div>
					</div>
					<div class="faq__block">
						<div class="faq__block-header">
							<h3 data-block="#faq-help" class="faq__block-header-text faq__block-header-text_noactive">Как пригласить друга?</h3>
						</div>
						<div class="faq__block-text">
						@php
						$settings = \DB::table('settings')->where('id', 1)->first();
						@endphp
							Перейди в раздел "Заработай", там ты найдешь свой персональный промокод.<br><br>
							Скопируй и отправь его другу. Когда друг активирует его - он получит {{$settings->promo_sum}} рублей, а
							ты будешь получать {{$settings->promo_percent}}% от всех его пополнений!
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop