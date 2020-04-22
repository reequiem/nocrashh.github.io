@extends('layout')

@section('title')
{{$user->username}}
@stop

@section('content')
<div class="navigator-line">
    <div class="container">
        <div class="navigator-line__wrapper">
            <button onclick="window.location.href = '/'" class="button-round button-round_trans-dark">
                <i class="button-round__icon button-round__icon_f-left fa fa-chevron-left" aria-hidden="true"></i>
                Игра
            </button>
            <h1 class="navigator-line__text"><span>Профиль пользователя</span></h1>
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
                                <img src="{{$user->avatar}}" alt="" class="profile__ava-img">
                            </div>
                        </div>
                        <div class="profile__ava-name">{{$user->username}}</div>
						@if(!Auth::guest() && Auth::user()->is_admin == 1)
						<div class="profile__ava-name"><a href="https://vk.com/{{$user->login}}">Перейти на страницу VK</a></div>
						@endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                    <div class="profile__content-wrapper">
                        <div class="profile__content-header">
                            <span class="profile__content-header-tab profile__content-header-tab_active">История игр</span>
                        </div>
                        <div class="profile__content-container">
                            <div class="profile__history-wrapper">
                                <div class="row">
									@foreach($drops as $d)
									<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
										<div class="profile__history-block">
											<img src="/storage/img/150/planet-{{$d->planet}}.png" alt="" class="profile__history-block-img">
											<div class="profile__history-value-wrapper">
												<span class="profile__history-value">{{$d->win}}</span>
												<span class="rouble">p</span>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								@if(count($drops) == 12)
								<div class="button-line button-line_center button-line_m-top">
									<button class="button-round button-round_ib" id="profile-private-more" data-user-id="{{$user->id}}">Загрузить еще</button>
								</div>
								@endif
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop