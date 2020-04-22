
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
		<link rel="stylesheet" href="/js/jquery.arcticmodal-0.3.css" type="text/css">
    <title>@yield('title')</title>
    <meta name="description" content="BingoCard — онлайн игра на реальные деньги, где тебе нужно открыть 3 одинаковые карточки. Начни зарабатывать с BingoCard прямо сейчас!" />
    <link href="/css/app.css?id=4870563c1f14bcdb1ca7" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<script type="text/javascript" src="/js/socket.io-1.4.5.js"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery.arcticmodal-0.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery.animateNumber.min.js') }}"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
	<script>
		@php
		$settings = \DB::table('settings')->where('id', 1)->first(); 
		@endphp
        var min_bet = {{$settings->min_bet}};

    </script>
    <meta name="theme-color" content="#ffffff">
    <meta property="og:type" content="website">
    <meta property="og:title" content="BingoCard — онлайн игра с выводом денег">
    <meta property="og:url" content="/">
    <meta property="og:image" content="/android-chrome-256x256.png">
    <meta property="business:contact_data:country_name" content="Russia">
    <base href="/">
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <div class="header__element header__element_static">
                <div data-modal="h-menu" class="visible-xs modal-activate header__menu-button">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
            </div>

            <div class="header__element header__element_static">
                <a href="/" class="header__logo-link">
                    <img src="/storage/img/logo_big.png" alt="" class="header__logo header__logo_big">
                    <img src="/storage/img/logo_small.png" alt="" class="header__logo header__logo_small">
                </a>
            </div>

            <div class="header__element">
                <nav>
                    <ul class="header__nav-line">
                        <li class="header__nav-link">
                            <a href="/">Игра</a>
                        </li>
                        <li class="header__nav-link">
							@if(Auth::guest())
							<a data-modal="reg" class="modal-activate">Бонус</a>
							@else
							<a data-modal="promo" class="modal-activate">Бонус</a>
							@endif
						</li>
                        <li class="header__nav-link">
                            <a href="/help">Помощь</a>
                        </li>
						<li class="header__nav-link">
						@if(Auth::guest())
							<a data-modal="reg" class="modal-activate">Заработай</a>
						@else
							<a href="/profile/partner">Заработай</a>
						@endif
						</li>
                    </ul>
                </nav>
            </div>
			@if(Auth::guest())
				<div class="header__element header__element_static">
					<button data-modal="reg" class="modal-activate button-round"><i class="visible-xs fa fa-sign-in" aria-hidden="true"></i><span class="hidden-xs">Вход / Регистрация</span></button>
				</div>
			@else
			<div class="header__element header__element_static">
                <div class="header__user-block">
                    <a href="/profile" class="hidden-xs header__user-profile-link">Мой профиль</a>
                    <div class="header__user-balance">
                        <span class="header__user-balance-value" data-value="{{Auth::user()->money}}" id="balance">{{Auth::user()->money}}</span>
                        <span class="rouble">p </span>
                        
                    </div>
                    <div class="header__user-cash">
                        <div data-modal="payin" class="modal-activate header__user-cash-button header__user-cash-button_in"><i class="fa fa-plus-circle" aria-hidden="true"></i>Пополнить</div>
                        <div data-modal="payout" class="modal-activate header__user-cash-button header__user-cash-button_out"><i class="fa fa-minus-circle" aria-hidden="true"></i>Вывести</div>
                    </div>
                    <div class="header__user-ava-wrapper">
                        <a href="/profile" class="header__user-ava">
                            <img src="{{Auth::user()->avatar}}" alt="" class="header__user-ava-img">
                        </a>
                    </div>
                </div>
            </div>
			@endif
                    </div>
    </div>
</header><main>
    <noindex>
    <div class="live">
        <div class="container">
            <div class="live__line">
                @php
					$drops = array_reverse(json_decode(file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/api/get_drop')));
				@endphp
				@foreach($drops as $d)
					<div class="live__coin-block">
						<div class="live__coin">
							<img src="/storage/img/60/planet-{{$d->planet}}.png" alt="" class="live__coin-bg">
							<div class="live__coin-value">{{$d->amount}}</div>
						</div>
						<a href="{{$d->link}}" class="live__coin-ava">
							<img src="{{$d->image}}" alt="" class="live__coin-ava-img">
						</a>
					</div>
				@endforeach
			</div>
        </div>
    </div>
</noindex>    <div class="stats">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="stats__block">
                    <div class="stats__block-header">Онлайн:</div>
                    <div class="stats__block-value" id="count-online" data-value="0">-</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="stats__block">
                    <div class="stats__block-header">Пользователей:</div>
                    <div class="stats__block-value" id="count-users" data-value="0">-</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="stats__block">
                    <div class="stats__block-header">Выдано:</div>
                    <div class="stats__block-value"><span id="count-win" data-value="0">-</span> <span class="rouble">p</span></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="stats__block">
                    <div class="stats__block-header">Игр:</div>
                    <div class="stats__block-value" id="count-games" data-value="0">-</div>
                </div>
            </div>
        </div>
    </div>
</div>   

@yield('content')     
</main>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
                <div class="footer__block">
                    <div class="footer__block-header">BingoCard</div>
                    <div class="footer__block-text">Добро пожаловать в галактику BingoCard!</div>
                    <div class="footer__block-text">Ты попал в параллельную вселенную, где можешь испытать свою удачу и купить беспроигрышные билеты. Не упусти свой шанс!</div>
                    <div class="footer__block-text footer__block-text_link">
                        <a href="/terms">Пользовательское соглашение</a>
                    </div>
                    <div class="footer__block-text footer__block-text_link">
                        <a href="/policy">Политика конфиденциальности</a>
                    </div>
                    <div class="footer__block-text">Copyright © 2017. Все права защищены</div>
                </div>
            </div>
            <div class="col-xs-5 col-sm-2 col-md-3 col-lg-3">
                <div class="footer__block">
                    <div class="footer__block-header">Меню</div>
                    <div class="footer__nav-block">
                        <div class="footer__nav-link">
                            <a href="/">Игра</a>
                        </div>
                        <div class="footer__nav-link">
						@if(Auth::guest())
							<a data-modal="reg" class="modal-activate">Бонус</a>
						@else
							<a data-modal="promo" class="modal-activate">Бонус</a>
						@endif
						</div>
                        <div class="footer__nav-link">
                            <a href="/help">Помощь</a>
                        </div>
                        <div class="footer__nav-link">
						@if(Auth::guest())
							<a data-modal="reg" class="modal-activate">Заработай</a>
						@else
							<a href="/profile/partner">Заработай</a>
						@endif
						</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-7 col-sm-5 col-md-3 col-lg-3">
                <div class="footer__block">
                    <div class="footer__block-header">Принимаем</div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="footer__ps-logo">
                                <img src="/storage/img/mc_footer.svg" alt="" class="footer__ps-logo-img">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="footer__ps-logo">
                                <img src="/storage/img/visa_footer.svg" alt="" class="footer__ps-logo-img">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="footer__ps-logo">
                                <img src="/storage/img/qiwi_footer.svg" alt="" class="footer__ps-logo-img">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="footer__ps-logo">
                                <img src="/storage/img/ym_footer.svg" alt="" class="footer__ps-logo-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<noindex>
    
    <div id="h-menu" class="modal">
    <div class="modal__wrapper modal__wrapper_top">
        <div data-modal="h-menu" class="modal-disactivate modal__close-layout"></div>
        <div class="modal__window modal__h-menu">
            <div data-modal="h-menu" class="modal-disactivate modal__h-menu-close">
                <img src="/storage/img/cross_y.png" alt="" class="">
            </div>
            <ul class="modal__h-menu-line">
                <li class="modal__h-menu-link">
                    <a href="/">
                        <span class="modal__h-menu-link-line"></span>
                        <span class="modal__h-menu-link-value">Игра</span>
                        <span class="modal__h-menu-link-line"></span>
                    </a>
                </li>
                <li class="modal__h-menu-link">
						@if(Auth::guest())
						<a href="#" data-modal="reg" class="modal-activate">
                            <span class="modal__h-menu-link-line"></span>
                            <span class="modal__h-menu-link-value">Бонус</span>
                            <span class="modal__h-menu-link-line"></span>
                        </a>
						@else
						<a data-modal="promo" class="modal-activate">
                            <span class="modal__h-menu-link-line"></span>
                            <span class="modal__h-menu-link-value">Бонус</span>
                            <span class="modal__h-menu-link-line"></span>
                        </a>
						@endif
				</li>
                <li class="modal__h-menu-link">
                    <a href="/help">
                        <span class="modal__h-menu-link-line"></span>
                        <span class="modal__h-menu-link-value">Помощь</span>
                        <span class="modal__h-menu-link-line"></span>
                    </a>
                </li>
                <li class="modal__h-menu-link">
						@if(Auth::guest())
						<a data-modal="reg" class="modal-activate">
                            <span class="modal__h-menu-link-line"></span>
                            <span class="modal__h-menu-link-value">Заработай</span>
                            <span class="modal__h-menu-link-line"></span>
                        </a>
						@else
						<a href="/profile/partner">
                            <span class="modal__h-menu-link-line"></span>
                            <span class="modal__h-menu-link-value">Заработай</span>
                            <span class="modal__h-menu-link-line"></span>
                        </a>
						@endif
				</li>
            </ul>
        </div>
    </div>
</div>    
<div id="dialog" class="modal">
    <div class="modal__wrapper">
        <div data-modal="dialog" class="modal-disactivate modal__close-layout"></div>
        <div class="modal__window modal__window_no-pad-bot">
            <div class="modal__window-wrapper">
                <div class="modal__header"></div>
                <div class="modal__info-block">
                    <div class="modal__info-text-block">
                        <div class="modal__info-text"></div>
                    </div>
                    <div class="button-line button-line_center">
                        <button class="button-round button-round_ib button-yes"></button>
                        <button class="button-round button-round_trans-dark button-round_ib button-no"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<div id="info" class="modal">
    <div class="modal__wrapper">
        <div data-modal="info" class="modal-disactivate modal__close-layout"></div>
        <div class="modal__window modal__window_no-pad-bot">
            <div class="modal__window-wrapper">
                <div data-modal="info" class="modal-disactivate modal__close-button">
                    <img src="/storage/img/cross_d.png" alt="" class="modal__close-button-img modal__close-button-img_main">
                    <img src="/storage/img/cross_y.png" alt="" class="modal__close-button-img modal__close-button-img_hover">
                </div>
                <div class="modal__header"><span></span></div>
                <div class="modal__info-block">
                    <div class="modal__info-text-block">
                        <div class="modal__info-text"></div>
                    </div>
                    <div class="button-line button-line_center">
                        <button data-modal="info" class="modal-disactivate button-round button-round_ib">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
        
<div id="promo" class="modal">
    <div class="modal__wrapper">
        <div data-modal="promo" class="modal-disactivate modal__close-layout"></div>
        <div class="modal__window modal__window_no-pad-bot">
            <div class="modal__window-wrapper">
                <div data-modal="promo" class="modal-disactivate modal__close-button">
                    <img src="/storage/img/cross_d.png" alt="" class="modal__close-button-img modal__close-button-img_main">
                    <img src="/storage/img/cross_y.png" alt="" class="modal__close-button-img modal__close-button-img_hover">
                </div>
                <div class="modal__header">Ввод промокода</div>
                <div class="modal__info-block">
                    <div class="modal__info-text-block">
                        <div class="modal__info-text modal__info-text_center">
                            <span class="gray">Промокод можно вводить <span class="yellow">только один раз</span></span>
                        </div>
                    </div>
                    <div class="modal__pay-input-wrapper input-block">
                        <div class="input-block__input-wrapper">
                            <input type="text" class="input-block__input" placeholder="Введите промокод" id="promocode-input" value="">
                        </div>
                    </div>
                    <div class="button-line button-line_center">
                        <button class="button-round button-round_ib" id="btn-promocode">Активировать</button>
                    </div>
                </div>
                <div class="hidden modal__info-block">
                    <div class="modal__info-text-block">
                        <div class="modal__info-text modal__info-text_center">Вы уже вводили промокод, <span class="yellow">повторный ввод невозможен</span></div>
                    </div>
                    <div class="button-line button-line_center">
                        <button class="button-round button-round_ib">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        
<div id="payin" class="modal">
    <div class="modal__wrapper">
        <div data-modal="payin" class="modal-disactivate modal__close-layout"></div>
        <div class="modal__window modal__window_no-pad-bot">
            <div class="modal__window-wrapper">
                <div data-modal="payin" class="modal-disactivate modal__close-button">
                    <img src="/storage/img/cross_d.png" alt="" class="modal__close-button-img modal__close-button-img_main">
                    <img src="/storage/img/cross_y.png" alt="" class="modal__close-button-img modal__close-button-img_hover">
                </div>
                <div class="modal__header">Пополнение баланса</div>
                <div class="modal__pay">
                    <div class="modal__pay-ps">
                        <div class="modal__ps-wrapper">
                            <div data-modal="payin" class="modal__pay_next modal__ps-block modal__ps-block_active" data-currency="94" data-provider="3">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Банк.карта (РФ)</div>
                                <img src="/storage/img/visa-mc_color.png" alt="" class="modal__ps-img">
                            </div>
                            <div data-modal="payin" class="modal__pay_next modal__ps-block" data-currency="155" data-provider="3">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Qiwi</div>
                                <img src="/storage/img/qiwi_color.png" alt="" class="modal__ps-img">
                            </div>
                            <div data-modal="payin" class="modal__pay_next modal__ps-block" data-currency="45" data-provider="3">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Яндекс.Деньги</div>
                                <img src="/storage/img/ym_color.png" alt="" class="modal__ps-img">
                            </div>
                            <div data-modal="payin" class="modal__pay_next modal__ps-block" data-currency="82" data-provider="3">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Мегафон</div>
                                <img src="/storage/img/mf_color.png" alt="" class="modal__ps-img">
                            </div>
                            <div data-modal="payin" class="modal__pay_next modal__ps-block" data-currency="132" data-provider="3">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Tele2</div>
                                <img src="/storage/img/tele2_color.png" alt="" class="modal__ps-img">
                            </div>
                            <div data-modal="payin" class="modal__pay_next modal__ps-block" data-currency="84" data-provider="3">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">МТС</div>
                                <img src="/storage/img/mts_color.png" alt="" class="modal__ps-img">
                            </div>
                            <div data-modal="payin" class="modal__pay_next modal__ps-block" data-currency="83" data-provider="3">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Билайн</div>
                                <img src="/storage/img/beeline_color.png" alt="" class="modal__ps-img">
                            </div>
                        </div>
                    </div>
                    <div class="modal__pay-info">
                        <div class="modal__pay-header">
                            <span data-modal="payin" class="modal__pay_prev modal__ps-toggle-button visible-xs-inline-block">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                <span class="modal__pay-header-value">Банк.карта (РФ)</span>
                            </span>
                            <span class="hidden-xs modal__pay-header-value">Банк.карта (РФ)</span>
                        </div>
                        <div id="payin-val" class="modal__pay-input-wrapper input-block">
                            <div data-input="payin-val-input" class="input-block__down-button input-block__button input-block__button_left"><i class="fa fa-minus" aria-hidden="true"></i></div>
                            <div data-input="payin-val-input" class="input-block__up-button input-block__button input-block__button_right"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            <div class="input-block__input-wrapper">
                                <input size="1" data-input="payin-val" id="payin-val-input" type="number" class="input-block__input" placeholder="20" value="20">
                            </div>
                            <div class="input-block__pattern-line">
                                <div data-input="payin-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">100</span>
                                    <span class="rouble">p</span>
                                </div>
                                <div data-input="payin-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">500</span>
                                    <span class="rouble">p</span>
                                </div>
                                <div data-input="payin-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">1000</span>
                                    <span class="rouble">p</span>
                                </div>
                                <div data-input="payin-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">5000</span>
                                    <span class="rouble">p</span>
                                </div>
                                <div data-input="payin-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">15000</span>
                                    <span class="rouble">p</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal__pay-text-block">
                            <div class="modal__pay-text">
                                Минимальная сумма<span class="modal__pay-text_unstable"> для пополнения</span>:
                                <span data-input="payin-val-input" class="modal__pay-pattern-minmax input-block__pattern-block input-block__pattern">
                                <span class="input-block__pattern-value">20</span>
                                <span class="rouble">p</span>
                            </span>
                            </div>
                            <div class="modal__pay-text">
                                Максимальная сумма<span class="modal__pay-text_unstable"> для пополнения</span>:
                                <span data-input="payin-val-input" class="modal__pay-pattern-minmax input-block__pattern-block input-block__pattern">
                                <span class="input-block__pattern-value">15000</span>
                                <span class="rouble">p</span>
                            </span>
                            </div>
                        </div>
                        <div class="button-line button-line_center">
                            <button class="button-round button-round_ib" id="payment-start" data-currency="" data-provider="3">
                                Продолжить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<div id="reg" class="modal">
    <div class="modal__wrapper">
        <div data-modal="reg" class="modal-disactivate modal__close-layout"></div>
        <div class="modal__window modal__window_active">
            <div class="modal__window-wrapper">
                <div data-modal="reg" class="modal-disactivate modal__close-button">
                    <img src="/storage/img/cross_d.png" alt="" class="modal__close-button-img modal__close-button-img_main">
                    <img src="/storage/img/cross_y.png" alt="" class="modal__close-button-img modal__close-button-img_hover">
                </div>
                <div class="modal__header">Вход / Регистрация</div>
                <div class="modal__sb-line">
                    <div class="modal__sb-block">
                        <div class="modal__sb-button-wrapper">
                            <a class="modal__sb-button modal__sb-button_vk" href="/login">
                                <img src="/storage/img/vk_w.png" alt="" class="modal__sb-button-img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
 <div id="payout" class="modal">
    <div class="modal__wrapper">
        <div data-modal="payout" class="modal-disactivate modal__close-layout"></div>
        <div class="modal__window modal__window_no-pad-bot">
            <div class="modal__window-wrapper">
                <div data-modal="payout" class="modal-disactivate modal__close-button">
                    <img src="/storage/img/cross_d.png" alt="" class="modal__close-button-img modal__close-button-img_main">
                    <img src="/storage/img/cross_y.png" alt="" class="modal__close-button-img modal__close-button-img_hover">
                </div>
                <div class="modal__header">Вывод средств</div>
                <div class="modal__pay">
                    <div class="modal__pay-ps">
                        <div class="modal__ps-wrapper">
                            <div data-modal="payout" class="modal__pay_next modal__ps-block modal__ps-block_active" data-currency="1" data-provider="3" data-purse="">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Банк.карта (РФ)</div>
                                <img src="/storage/img/visa-mc_color.png" alt="" class="modal__ps-img">
                            </div>
                            <div data-modal="payout" class="modal__pay_next modal__ps-block" data-currency="4" data-provider="3" data-purse="">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Qiwi</div>
                                <img src="/storage/img/qiwi_color.png" alt="" class="modal__ps-img">
                            </div>
                            <div data-modal="payout" class="modal__pay_next modal__ps-block" data-currency="5" data-provider="3" data-purse="">
                                <div class="modal__ps-block-arrow"></div>
                                <div class="modal__ps-name">Яндекс.Деньги</div>
                                <img src="/storage/img/ym_color.png" alt="" class="modal__ps-img">
                            </div>
                        </div>
						
                    </div>
                    <div class="modal__pay-info">
                        <div class="modal__pay-header">
                            <span data-modal="payout" class="modal__pay_prev modal__ps-toggle-button visible-xs-inline-block">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                <span class="modal__pay-header-value">Банк.карта (РФ)</span>
                            </span>
                            <span class="hidden-xs modal__pay-header-value">Банк.карта (РФ)</span>
                        </div>
                        <div id="payout-val" class="modal__pay-input-wrapper input-block">
                            <div data-input="payout-val-input" class="input-block__down-button input-block__button input-block__button_left"><i class="fa fa-minus" aria-hidden="true"></i></div>
                            <div data-input="payout-val-input" class="input-block__up-button input-block__button input-block__button_right"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            <div class="input-block__input-wrapper">
                                <input data-input="payout-val" id="payout-val-input" type="text" class="input-block__input" placeholder="20" value="20">
                            </div>
                            <div class="input-block__pattern-line">
                                <div data-input="payout-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">100</span>
                                    <span class="rouble">p</span>
                                </div>
                                <div data-input="payout-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">500</span>
                                    <span class="rouble">p</span>
                                </div>
                                <div data-input="payout-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">1000</span>
                                    <span class="rouble">p</span>
                                </div>
                                <div data-input="payout-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">5000</span>
                                    <span class="rouble">p</span>
                                </div>
                                <div data-input="payout-val-input" class="input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">15000</span>
                                    <span class="rouble">p</span>
                                </div>
                            </div>
                        </div>
                        <div id="payout-valet" class="modal__pay-input-wrapper input-block">
                            <div class="input-block__input-wrapper input-block__input-wrapper_no-buttons">
                                <input data-input="payout-valet" id="payout-valet-input" type="text" class="input-block__input input-block__input_left-text" placeholder="Введите номер кошелька" value=""  />
                            </div>
                        </div>
                        <div class="modal__pay-text-block">
                            <div class="modal__pay-text">
                                Минимальная сумма<span class="modal__pay-text_unstable"> для вывода</span>:
                                <span data-input="payout-val-input" class="modal__pay-pattern-minmax input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">{{$settings->min_with}}</span>
                                    <span class="rouble">p</span>
                                </span>
                            </div>
                            <div class="modal__pay-text">
                                Максимальная сумма<span class="modal__pay-text_unstable"> для вывода</span>:
                                <span data-input="payout-val-input" class="modal__pay-pattern-minmax input-block__pattern-block input-block__pattern">
                                    <span class="input-block__pattern-value">15000</span>
                                    <span class="rouble">p</span>
                                </span>
                            </div>
                        </div>
                        <div class="button-line button-line_center">
                            <button class="button-round button-round_ib" id="payout-start" data-currency="1" data-provider="3" data-purse="">Заказать выплату</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
</noindex>

<div id="hid" style="display:none;"><a href="//www.free-kassa.ru/" target="_blank"><img src="//www.free-kassa.ru/img/fk_btn/6.png" width="95">
                    </a></div>

<input type="hidden" id="flash_status" value="" />
<script src="/js/app.js?id=a225aa49814ad48f61ae"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107935693-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-107935693-1');
</script>

<!-- Schema.org -->
<script type="application/ld+json">
{
    "@context" : "http://schema.org",
    "@type" : "AdultEntertainment",
    "name":"SkyCard",
    "url":"/",
    "aggregateRating":{
        "@type":"AggregateRating",
        "ratingValue":"5",
        "reviewCount":"5"
    },
    "priceRange":"5"
}
</script>

</body>
</html>