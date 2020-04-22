@extends('layout')

@section('title')
BingoCard — онлайн игра с выводом денег
@stop

@section('content')
<div class="game">
        <div class="container container_full-width">
            <div class="game__wrapper">
                <div class="game__row row">
                    <div class="col-md-8 col-lg-7">
                        <div class="game__start-block visible" id="screen-start">
    <div class="game__start-layout">
        <div class="game__loader-bg-wrapper">
            <img src="/storage/img/loader-bg.png" alt="" class="game__loader-bg">
        </div>
        <div class="game__start-window-wrapper">
            <div class="game__start-window-block">
                <div id="game__start-ufo" class="game__ufo"></div>
                <div class="game__start-window">
                    <div class="game__start-window-tabs">
                        <div class="game__start-window-tab game__start-window-tab_left game__start-window-tab_active">На баланс</div>
                        <div class="game__start-window-tab game__start-window-tab_right">&nbsp;&nbsp;&nbsp;&nbsp;Демо&nbsp;&nbsp;&nbsp;</div>
                    </div>
                    <div class="game__start-window-tabs-wrapper game__start-window-tabs-wrapper_left">
                        <div class="game__start-window-tabs-block" data-type="1">
    <div class="game__start-window-text game__start-window-text_mid">Ставка</div>
    <div id="demo-rate" class="game__start-window-input input-block">
        <div data-input="inp-balance" class="input-block__down-button input-block__button input-block__button_left"><i class="fa fa-minus" aria-hidden="true"></i></div>
        <div data-input="inp-balance" class="input-block__up-button input-block__button input-block__button_right"><i class="fa fa-plus" aria-hidden="true"></i></div>
        <div class="input-block__input-wrapper">
            <input data-input="inp-balance" id="inp-balance" type="text" class="bet-input input-block__input" placeholder="100" value="100">
        </div>
        <div class="input-block__pattern-line">
            <div data-input="inp-balance" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">100</span>
                <span class="rouble">p</span>
            </div>
            <div data-input="inp-balance" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">200</span>
                <span class="rouble">p</span>
            </div>
            <div data-input="inp-balance" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">500</span>
                <span class="rouble">p</span>
            </div>
            <div data-input="inp-balance" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">1000</span>
                <span class="rouble">p</span>
            </div>
            <div data-input="inp-balance" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">5000</span>
                <span class="rouble">p</span>
            </div>
        </div>
    </div>
    <div class="game__start-window-text game__start-window-text_mid">Выигрыш: <span><span class="rate-min">200</span><span class="rouble">p</span> &mdash; <span class="rate-max">1000</span><span class="rouble">p</span></span></div>
    <div class="game__start-window-text game__start-window-text_mid">Гарантированно: <span><span class="rate-gar">10</span><span class="rouble">p</span></span></div>
    <div class="game__start-window-button-line button-line button-line_center">
	@if(Auth::guest())
	<div class="game__start-window-button button-round button-round_ib modal-activate" data-modal="reg">Начать игру<img src="/storage/img/icon__comet_d.png" srcset="/storage/img/icon__comet_d@2x.png 2x, /storage/img/icon__comet_d@3x.png 3x" class="game__start-window-button-icon"></div>
	@else
	<div class="game__start-window-button button-round button-round_ib btn-game-start">Начать игру<img src="/storage/img/icon__comet_d.png" srcset="/storage/img/icon__comet_d@2x.png 2x, /storage/img/icon__comet_d@3x.png 3x" class="game__start-window-button-icon"></div>
	@endif
	</div>
</div>                        <div class="game__start-window-tabs-block" data-type="2">
    <div class="game__start-window-text game__start-window-text_mid">Демо режим</div>
    <div id="demo-rate" class="game__start-window-input input-block">
        <div data-input="inp-bonus" class="input-block__down-button input-block__button input-block__button_left"><i class="fa fa-minus" aria-hidden="true"></i></div>
        <div data-input="inp-bonus" class="input-block__up-button input-block__button input-block__button_right"><i class="fa fa-plus" aria-hidden="true"></i></div>
        <div class="input-block__input-wrapper">
            <input data-input="inp-bonus" id="inp-bonus" type="text" class="bet-input input-block__input" placeholder="100" value="100">
        </div>
        <div class="input-block__pattern-line">
            <div data-input="inp-bonus" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">100</span>
                <span class="rouble">p</span>
            </div>
            <div data-input="inp-bonus" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">200</span>
                <span class="rouble">p</span>
            </div>
            <div data-input="inp-bonus" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">500</span>
                <span class="rouble">p</span>
            </div>
            <div data-input="inp-bonus" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">1000</span>
                <span class="rouble">p</span>
            </div>
            <div data-input="inp-bonus" class="input-block__pattern-block input-block__pattern">
                <span class="input-block__pattern-value">5000</span>
                <span class="rouble">p</span>
            </div>
        </div>
    </div>
    <div class="game__start-window-text game__start-window-text_mid">Выигрыш: <span><span class="rate-min">200</span><span class="rouble">p</span> &mdash; <span class="rate-max">1000<span><span class="rouble">p</span></span></div>
    <div class="game__start-window-text game__start-window-text_mid">Гарантированно: <span><span class="rate-gar">10</span><span class="rouble">p</span></span></div>
    <div class="game__start-window-button-line button-line button-line_center">
	@if(Auth::guest())
	<div class="game__start-window-button button-round button-round_ib modal-activate" data-modal="reg">Начать игру<img src="/storage/img/icon__comet_d.png" srcset="/storage/img/icon__comet_d@2x.png 2x, /storage/img/icon__comet_d@3x.png 3x" class="game__start-window-button-icon"></div>
	@else
	<div class="game__start-window-button button-round button-round_ib btn-game-start">Начать игру<img src="/storage/img/icon__comet_d.png" srcset="/storage/img/icon__comet_d@2x.png 2x, /storage/img/icon__comet_d@3x.png 3x" class="game__start-window-button-icon"></div>
	@endif
	</div>
</div>                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                        <div class="game__start-block" id="screen-suspense">
    <div class="game__start-layout">
        <div class="game__loader-bg-wrapper">
            <img src="/storage/img/loader-bg.png" alt="" class="game__loader-bg">
        </div>
        <div class="game__start-window-wrapper">
            <div class="game__start-window-block">
                <div id="game__hmm-ufo" class="game__ufo"></div>
                <div class="game__start-window">
                    <div class="game__start-window-header">Вы угадали 2 из 3</div>
                    <div class="game__start-window-button-line button-line button-line_center">
                        <div class="game__start-window-button button-round button-round_ib" id="btn-suspense-continue">Открыть еще за <span class="val">5</span><span class="rouble">p</span></div>
                        <div class="game__start-window-button button-round button-round_trans-dark button-round_ib" id="btn-suspense-end">Забрать <span class="val">1</span><span class="rouble">p</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                        <div class="game__start-block" id="screen-lose">
    <div class="game__start-layout">
        <div class="game__start-window-wrapper">
            <div class="game__start-window-block">
                <div id="game__loose-ufo" class="game__ufo"></div>
                <div class="game__start-window">
                    <div class="game__start-window-header">Увы, не угадали</div>
                    <div class="game__start-window-text">Гарантированный приз <span class="val">20<span class="rouble">p</span></span><br>зачислен на ваш баланс</div>
                    <div class="game__start-window-button-line button-line button-line_center">
                        <div class="game__start-window-button button-round button-round_ib">Попробовать еще<img src="/storage/img/icon__refresh_d.png" srcset="/storage/img/icon__refresh_d@2x.png 2x, /storage/img/icon__refresh_d@3x.png 3x" class="game__start-window-button-icon"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                        <div class="game__start-block" id="screen-win">
    <div class="game__start-layout">
        <div class="game__start-bg-wrapper">
            <img src="/storage/img/start-bg.png" alt="" class="game__start-bg">
        </div>
        <div class="game__start-window-wrapper">
            <div class="game__start-window-block">
                <div id="game__win-ufo" class="game__ufo"></div>
                <div class="game__start-window">
                    <div class="game__start-window-header">Поздравляем</div>
                    <div class="game__start-window-text game__start-window-text_big">Вы выиграли <span class="val">5000</span><span class="rouble">p</span></div>
                    <div class="game__start-window-text">Выигрыш зачислены на ваш баланс</div>
                    <div class="game__start-window-button-line button-line button-line_center">
                        <div class="game__start-window-button button-round button-round_ib">Сыграть еще раз<img src="/storage/img/icon__comet_d.png" srcset="/storage/img/icon__comet_d@2x.png 2x, /storage/img/icon__comet_d@3x.png 3x" class="game__start-window-button-icon"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                        <div class="game__containers-wrapper game__containers-wrapper_blur">
                            <div class="game__containers row">
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="game__block-col col-xs-4">
                                    <div class="game__block-wrapper">
                                        <div class="game__block">
                                            <div class="game__win-block">
                                                <div class="game__win-value-wrapper">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-5">
    <div class="game__info-block">
        <h1 class="game__header">Как играть BingoCard?</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                <div class="game__info-text">
                    <div class="game__info-icon-wrapper">
                        <img src="/storage/img/icon__comet.png" srcset="/storage/img/icon__comet@2x.png 2x, /storage/img/icon__comet@3x.png 3x" class="game__info-icon">
                    </div>
                    Выбери ставку, нажми кнопку &quot;Начать игру&quot;
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                <div class="game__info-text">
                    <div class="game__info-icon-wrapper">
                        <img src="/storage/img/icon__hand.png" srcset="/storage/img/icon__hand@2x.png 2x, /storage/img/icon__hand@3x.png 3x" class="game__info-icon">
                    </div>
                    Курсором сотри защитный слой на 3 карточках
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                <div class="game__info-text">
                    <div class="game__info-icon-wrapper">
                        <img src="/storage/img/icon__sunrub.png" srcset="/storage/img/icon__sunrub@2x.png 2x, /storage/img/icon__sunrub@3x.png 3x" class="game__info-icon">
                    </div>
                    <span>Совпали 3 числа</span>
                    Получи приз в зависимости от ставки
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                <div class="game__info-text">
                    <div class="game__info-icon-wrapper">
                        <img src="/storage/img/icon__refresh.png" srcset="/storage/img/icon__refresh@2x.png 2x, /storage/img/icon__refresh@3x.png 3x" class="game__info-icon">
                    </div>
                    <span>Совпали 2 числа</span>
                    Открой 4 карту или забери гарантированный приз
                </div>
            </div>
        </div>
    </div>
</div>                    <audio src="sound/start.mp3" id="sound-start"></audio>
                    <audio src="sound/win.mp3" id="sound-win"></audio>
                    <audio src="sound/lose.mp3" id="sound-lose"></audio>
                    <audio src="sound/suspense.mp3" id="sound-suspense"></audio>
                    <audio src="sound/open.mp3" id="sound-open"></audio>
                </div>
            </div>
        </div>
    </div>
    <div class="howit">
    <div class="container">
        <div class="howit__header-block">
            <div class="howit__header-line"></div>
            <h2 class="howit__header-text">Как играть в Bingo<span>Card?</span></h2>
            <div class="howit__header-line"></div>
        </div>
        <div class="howit__card-line">
            <div class="howit__card-wrapper">
                <i class="howit__card-chevron howit__card-chevron_right fa fa-chevron-right" aria-hidden="true"></i>
                <i class="howit__card-chevron howit__card-chevron_bottom fa fa-chevron-down" aria-hidden="true"></i>
                <div class="howit__card">
                    <div class="howit__card-icon-line">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                    </div>
                    <h3 class="howit__card-header">Пополни баланс</h3>
                    <div class="howit__card-text">Более чем 50 методов для пополнения баланса</div>
                </div>
            </div>
            <div class="howit__card-wrapper">
                <i class="howit__card-chevron howit__card-chevron_right fa fa-chevron-right" aria-hidden="true"></i>
                <i class="howit__card-chevron howit__card-chevron_bottom fa fa-chevron-down" aria-hidden="true"></i>
                <div class="howit__card">
                    <div class="howit__card-icon-line">
                        <i class="fa fa-ticket" aria-hidden="true"></i>
                    </div>
                    <h3 class="howit__card-header">Установи цену билета</h3>
                    <div class="howit__card-text">Все под твоим контролем! Установи свою цену на билет</div>
                </div>
            </div>
            <div class="howit__card-wrapper">
                <i class="howit__card-chevron howit__card-chevron_right fa fa-chevron-right" aria-hidden="true"></i>
                <i class="howit__card-chevron howit__card-chevron_bottom fa fa-chevron-down" aria-hidden="true"></i>
                <div class="howit__card">
                    <div class="howit__card-icon-line">
                        <i class="fa fa-rocket" aria-hidden="true"></i>
                    </div>
                    <h3 class="howit__card-header">Начни играть</h3>
                    <div class="howit__card-text">Угадай 3 одинаковых карты</div>
                </div>
            </div>
            <div class="howit__card-wrapper">
                <div class="howit__card">
                    <div class="howit__card-icon-line">
                        <i class="fa fa-rub" aria-hidden="true"></i>
                    </div>
                    <h3 class="howit__card-header">Заработай больше</h3>
                    <div class="howit__card-text">Приглашай друзей по личному промокоду и заработай больше!</div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop