@extends('admin.layout')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="wraper container">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="profile-detail card-box">
                            <div>
                                <img src="{{$user->avatar}}" class="img-circle" alt="profile-image">

                                <h4>{{$user->username}}</h4>

                                <ul class="list-inline status-list m-t-20">
                                    <li>
                                        <h3 class="text-primary m-b-5">{{$user->countGames}}</h3>
                                        <p class="text-muted">Сыграл игр</p>
                                    </li>

                                    <li>
                                        <h3 class="text-success m-b-5">{{$user->winGames}} Р</h3>
                                        <p class="text-muted">Выиграл</p>
                                    </li>
                                </ul>
								<a href="https://vk.com/id{{$user->login2}}" target="_blank">
									<button type="button"
											class="btn btn-pink btn-custom btn-rounded waves-effect waves-light">
										Профиль
									</button>
								</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-9 col-md-8">
                        <div class="card-box">
                            <form class="form-horizontal group-border-dashed" action="/admin/saveUser" novalidate="">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Имя пользователя</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" required="" value="{{$user->username}}" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Аватарка пользователя</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" required="" value="{{$user->avatar}}" name="avatar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ссылка на профиль</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" required="" value="{{$user->login2}}" name="login2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Баланс пользователя</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" required="" value="{{$user->money}}" name="money">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Реферальный код пользователя</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{$user->ref_code}}" name="ref_code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Использованный реферальный код</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{$user->ref_use}}" name="ref_use">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Администратор</label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" required name="is_admin">
                                            @if($user->is_admin == 1)
                                                <option value="0">Нет</option>
                                                <option value="1" selected>Да</option>
											@elseif($user->is_admin == 0)
												<option value="0" selected>Нет</option>
												<option value="1">Да</option>
											@endif
                                        </select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Ютубер</label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" required name="is_yt">
											@if($user->is_yt == 1)
                                                <option value="0">Нет</option>
                                                <option value="1" selected>Да</option>
											@elseif($user->is_yt == 0)
												<option value="0" selected>Нет</option>
												<option value="1">Да</option>
											@endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Зарегистрирован</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" disabled value="{{$user->created_at}}">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                        <button type="submit" class="btn btn-primary">
                                            Сохранить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection