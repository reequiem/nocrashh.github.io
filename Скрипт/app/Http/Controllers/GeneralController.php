<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Settings;
use App\Game;
use Auth;
use DB;



class GeneralController extends Controller
{
    public function index()
	{
		return view('pages.index');
	}
	public function start(Request $r)
	{
		if(Auth::guest())
		{
			return response('{"gameAmount":["\u041d\u0435\u0434\u043e\u0441\u0442\u0430\u0442\u043e\u0447\u043d\u043e \u0441\u0440\u0435\u0434\u0441\u0442\u0432!"]}', 422);
		}
		else
		{
			if(Auth::user()->money < $r->gameAmount)
			{
				return response('{"gameAmount":["\u041d\u0435\u0434\u043e\u0441\u0442\u0430\u0442\u043e\u0447\u043d\u043e \u0441\u0440\u0435\u0434\u0441\u0442\u0432!"]}', 422);
			}
			else
			{
				$bet = $r->gameAmount;
				$user = User::where('id', Auth::user()->id)->first();
				$user->money = $user->money - $bet;
				$user->save();
				$settings = Settings::where('id', 1)->first();
				if(Auth::user()->is_yt == 1)
				{
					$chance = $settings->yt_chance;
				}
				else
				{
					$chance = $settings->chance;
				}
				$pro = mt_rand(1,100);
				if($pro >= $chance)
				{
					$multiply1 = 2;
					$multiply2 = 5;
					$multiply3 = 10;
					$cell_1 = $bet*$multiply1;
					$cell_2 = $bet*$multiply2;
					$cell_3 = $bet*$multiply3;
					$cells = array($cell_1, $cell_2, $cell_3);
					shuffle($cells);
					
					$insert = DB::table('games')->insertGetId([
						'bet' => $bet,
						'user_id' => Auth::user()->id,
						'type' => $r->gameType,
						'cell_1' => $cells[0],
						'cell_2' => $cells[1],
						'cell_3' => $cells[2],
						'win' => $bet*0.1,
						'status' => 0
					]);
					return json_encode(array("type" => $r->gameType, "bet" => $bet, "game_id" => $insert, "cell_1" => $cells[0], "cell_2" => $cells[1], "cell_3" => $cells[2]));
				}
				else
				{
					$pro2 = mt_rand(1,100);
					if($pro2 >= $chance) // Если рандом больше чем шанс, то создем игру с 2умя одинаковыми карточками
					{
						$multiply1 = array(2,5,10);	// Создаем первый множитель
						shuffle($multiply1);
						
						$pro5 = mt_rand(1,100); // Создаем шанс множителей
						
						if($pro5 <= $chance)  // Если шанс множителей меньше чем шанс
						{
							$multiply2 = array(2,5,10);
							shuffle($multiply2); // то выдаем охуенные множетели
						}
						if($pro5 > $chance) // Если нет, то хуевые
						{
							$multiply2 = array(2,5);
							shuffle($multiply2); 
						}
						
						
						$cell_1 = $bet*$multiply1[0]; // Умножаем ставку в определенный первый множитель
						$cell_2 = $bet*$multiply2[0]; // Умножаем на второй множетель
						$cell_3 = $bet*$multiply2[0]; // Умножаем на второй множетель
						
						
						
 						if(($cell_1 == $cell_2) && ($cell_2 == $cell_3)) // Если все числа получились одинаковыми,то
						{
							$insert = DB::table('games')->insertGetId([
								'bet' => $bet,
								'user_id' => Auth::user()->id,
								'type' => $r->gameType,
								'cell_1' => $cell_1,
								'cell_2' => $cell_2,
								'cell_3' => $cell_3,
								'win' => $cell_3,
								'status' => 0
							]);
							return json_encode(array("type" => $r->gameType, "bet" => $bet, "game_id" => $insert, "cell_1" => $cell_1, "cell_2" => $cell_2, "cell_3" => $cell_3));
						}
						else // Если одно число получилось не одинаковым
						{
							$cells = array($cell_1, $cell_2, $cell_3);
							shuffle($cells);
							$pro3 = mt_rand(1,100); // рассчитываем шанс
							if($pro3 <= $chance) 
							{
								$cell_4 = $bet*$multiply2[0]; // Если все заебись, то умножаем на такое же число, как и два одинаковых
								$insert = DB::table('games')->insertGetId([
									'bet' => $bet,
									'user_id' => Auth::user()->id,
									'type' => $r->gameType,
									'cell_1' => $cells[0],
									'cell_2' => $cells[1],
									'cell_3' => $cells[2],
									'cell_4' => $cell_4,
									'may_win' => $cell_4,
									'status' => 0
								]);
								return json_encode(array("type" => $r->gameType, "bet" => $bet, "game_id" => $insert, "cell_1" => $cells[0], "cell_2" => $cells[1], "cell_3" => $cells[2]));
							}
							else
							{
								$cell_4 = $bet*$multiply2[1]; // Если нет, то множим на другое число
								$insert = DB::table('games')->insertGetId([
									'bet' => $bet,
									'user_id' => Auth::user()->id,
									'type' => $r->gameType,
									'cell_1' => $cells[0],
									'cell_2' => $cells[1],
									'cell_3' => $cells[2],
									'cell_4' => $cell_4,
									'may_win' => $bet*0.1,
									'status' => 0
								]);
								return json_encode(array("type" => $r->gameType, "bet" => $bet, "game_id" => $insert, "cell_1" => $cells[0], "cell_2" => $cells[1], "cell_3" => $cells[2]));
							}
							
						} 
					}
					else
					{
						$pro5 = mt_rand(1,100); // Создаем шанс множителей
						
						if($pro5 < $chance)  // Если шанс множителей меньше чем шанс
						{
							$multiply2 = 2;
						}
						elseif($pro5 > $chance) // Если нет, то хуевые
						{
							$multiply2 = 5;
						}
						elseif($pro == $chance)
						{
							$multiply = 10;
						}
						
						$cell_1 = $bet*$multiply2; // Умножаем ставку в определенный первый множитель
						$cell_2 = $bet*$multiply2; // Умножаем на второй множетель
						$cell_3 = $bet*$multiply2; // Умножаем на второй множетель
						
						
						
						$cells = array($cell_1, $cell_2, $cell_3);
						shuffle($cells);
						$insert = DB::table('games')->insertGetId([
							'bet' => $bet,
							'user_id' => Auth::user()->id,
							'type' => $r->gameType,
							'cell_1' => $cells[0],
							'cell_2' => $cells[1],
							'cell_3' => $cells[2],
							'win' => $cells[0],
							'status' => 0
						]);
						return json_encode(array("type" => $r->gameType, "bet" => $bet, "game_id" => $insert, "cell_1" => $cells[0], "cell_2" => $cells[1], "cell_3" => $cells[2]));
					}
				}
			}
		}
	}
	public function game_continue(Request $r)
	{
		$game = Game::where('id', $r->id)->first();
		if($game == false)
		{
			return response('{"gameAmount":["Игра не найдена!"]}', 422);
		}
		else
		{
			if($game->status != 0)
			{
				return response('{"gameAmount":["Игра закончена!"]}', 422);
			}
			if(Auth::guest())
			{
				return response('{"gameAmount":["Необходимо авторизоваться!"]}', 422);
			}
			$user = User::where('id', Auth::user()->id)->first();
			$user->money = $user->money - $game->bet/2;
			$game->win = $game->may_win;
			$game->save();
			$user->save();
			return json_encode(array("type" => 1, "cell_4" => (int)$game->cell_4));
		}
		
	}
	public function game_end(Request $r)
	{
		if(!isset($r->id) || empty($r->id) || $r->id == '')
		{
			return response('{"gameAmount":["Заебал, ID игры не передан!"]}', 422);
		}
		else
		{
			$game = Game::where('id', $r->id)->first();
			if($game == false)
			{
				return response('{"gameAmount":["Игра не найдена!"]}', 422);
			}
			else
			{
				if($game->win == NULL)
				{
					$game->win = $game->bet*0.1;
					$win = $game->bet*0.1;
				}
				else
				{
					$win = $game->win;
				}
				$game->status = 1;
				$game->save();
				$user = User::where('id', Auth::user()->id)->first();
				$user->money = $user->money + $game->win;
				$user->save();
				return json_encode(array("win" => (int)$win));
			}
		}
	}
	public function stats()
	{
		$users = User::count();
		$win = Game::where('status', 1)->sum('win');
		$games = Game::where('status', 1)->count();
		return json_encode(array("users" => $users, "win" => $win, "drops" => $games));
	}
	public function get_drop()
	{
		$game = Game::where('status', 1)->orderBy('id', 'desc')->limit(25)->get();
		foreach($game as $g)
		{
			if($g->win < 10)
			{
				$g->planet = 1;
			}
			if($g->win >= 10 && $g->win < 20)
			{
				$g->planet = 2;
			}
			elseif($g->win >= 20 && $g->win < 50)
			{
				$g->planet = 3;
			}
			elseif($g->win >= 50 && $g->win < 100)
			{
				$g->planet = 4;
			}
			elseif($g->win >= 100 && $g->win < 200)
			{
				$g->planet = 5;
			}
			elseif($g->win >= 200 && $g->win < 500)
			{
				$g->planet = 6;
			}
			elseif($g->win >= 500 && $g->win < 1000)
			{
				$g->planet = 7;
			}
			elseif($g->win >= 1000 && $g->win < 10000)
			{
				$g->planet = 8;
			}
			elseif($g->win >= 10000)
			{
				$g->planet = 9;
			}
			$g->user = User::where('id', $g->user_id)->first();
		}
		$drops = array();
		foreach($game as $p)
		{
			$info = array("planet" => $p->planet, "amount" => $p->win, "link" => '/user/'.$p->user_id, "image" => $p->user->avatar);
			array_push($drops, $info);
		}
		return json_encode(array_reverse($drops));
	}
	public function drop(Request $r)
	{
		if(!isset($r->id))
		{
			return "Не переданы параметры";
		}
		$g = Game::where('id', $r->id)->first();
		if($g->win < 10)
		{
			$g->planet = 1;
		}
		if($g->win >= 10 && $g->win < 20)
		{
			$g->planet = 2;
		}
		elseif($g->win >= 20 && $g->win < 50)
		{
			$g->planet = 3;
		}
		elseif($g->win >= 50 && $g->win < 100)
		{
			$g->planet = 4;
		}
		elseif($g->win >= 100 && $g->win < 200)
		{
			$g->planet = 5;
		}
		elseif($g->win >= 200 && $g->win < 500)
		{
			$g->planet = 6;
		}
		elseif($g->win >= 500 && $g->win < 1000)
		{
			$g->planet = 7;
		}
		elseif($g->win >= 1000 && $g->win < 10000)
		{
			$g->planet = 8;
		}
		elseif($g->win >= 10000)
		{
			$g->planet = 9;
		}
		$g->user = User::where('id', $g->user_id)->first();
		$info = array("planet" => $g->planet, "amount" => $g->win, "link" => '/user/'.$g->user_id, "image" => $g->user->avatar);
		return json_encode($info);
	}
	public function terms()
	{
		return view('pages.terms');
	}
	public function policy()
	{
		return view('pages.policy');
	}
	public function help()
	{
		return view('pages.help');
	}
	public function profile()
	{
		if(Auth::guest())
		{
			return redirect('/');
		}
		else
		{
			$user = User::where('id', Auth::user()->id)->first();
			$drops = Game::where('status', 1)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->limit(12)->get();
			foreach($drops as $g)
			{
				if($g->win < 10)
				{
					$g->planet = 1;
				}
				elseif($g->win >= 10 && $g->win < 20)
				{
					$g->planet = 2;
				}
				elseif($g->win >= 20 && $g->win < 50)
				{
					$g->planet = 3;
				}
				elseif($g->win >= 50 && $g->win < 100)
				{
					$g->planet = 4;
				}
				elseif($g->win >= 100 && $g->win < 200)
				{
					$g->planet = 5;
				}
				elseif($g->win >= 200 && $g->win < 500)
				{
					$g->planet = 6;
				}
				elseif($g->win >= 500 && $g->win < 1000)
				{
					$g->planet = 7;
				}
				elseif($g->win >= 1000 && $g->win < 10000)
				{
					$g->planet = 8;
				}
				elseif($g->win >= 10000)
				{
					$g->planet = 9;
				}
			}
			return view('pages.profile', compact('user', 'drops'));
		}
	}
	public function history(Request $r)
	{
		if(!isset($r->limit) || !isset($r->skip) || !isset($r->userId))
		{
			return json_encode(array("Error" => "Не переданы параметры"));
		}
		else
		{
			$history = Game::where('status', 1)->where('user_id', $r->userId)->skip($r->skip)->limit($r->limit)->get();
			foreach($history as $g)
			{
				if($g->win < 10)
				{
					$g->planet = 1;
				}
				elseif($g->win >= 10 && $g->win < 20)
				{
					$g->planet = 2;
				}
				elseif($g->win >= 20 && $g->win < 50)
				{
					$g->planet = 3;
				}
				elseif($g->win >= 50 && $g->win < 100)
				{
					$g->planet = 4;
				}
				elseif($g->win >= 100 && $g->win < 200)
				{
					$g->planet = 5;
				}
				elseif($g->win >= 200 && $g->win < 500)
				{
					$g->planet = 6;
				}
				elseif($g->win >= 500 && $g->win < 1000)
				{
					$g->planet = 7;
				}
				elseif($g->win >= 1000 && $g->win < 10000)
				{
					$g->planet = 8;
				}
				elseif($g->win >= 10000)
				{
					$g->planet = 9;
				}
			}
			$ans = array();
			foreach($history as $h)
			{
				$a = array("planet" => $h->planet, "amount" => $h->win);
				array_push($ans, $a);
			}
			return json_encode($ans);
		}
	}
	public function payment_create(Request $r)
	{
		if(!isset($r->provider) || !isset($r->currency) || !isset($r->amount))
		{
			return json_encode(array("Error" => "Не переданы параметры"));
		}
		else
		{
			$settings = Settings::where('id', 1)->first();
			if(Auth::guest())
			{
				return json_encode(array("Error" => "Необходимо авторизоваться"));
			}
			$amount = $r->amount;
			$type = $r->provider;
			if((int)$amount < 1){
				$amount = 1;
			}
			$int_id =  DB::table('payments')->insertGetId([
				'amount' => (int)$amount,
				'user' => Auth::user()->id,
				'time' => time(),
				'status' => 0
			]);
			$orderID = $int_id;
			$sign = md5($settings->fk_id.':'.$amount.':'.$settings->fk_secret1.':'.$orderID);
			$url = 'http://www.free-kassa.ru/merchant/cash.php?m='.$settings->fk_id.'&oa='.$amount.'&o='.$orderID.'&s='.$sign.'&lang=ru&i='.$r->currency;
			return $url;
		}
	}
	public function payout_create(Request $r)
	{
		if(!isset($r->amount) || !isset($r->currency) || !isset($r->provider) || !isset($r->purse))
		{
			return json_encode(array("Error" => "Не переданы параметры"));
		}
		else
		{
			$settings = Settings::where('id', 1)->first();
			if(Auth::guest())
			{
				return response('{"gameAmount":["Необходимо авторизоваться!"]}', 422);
			}
			if((int)$r->amount < (int)$settings->min_with)
			{
				return response('{"gameAmount":["Минимальная сумма для вывода - '.(int)$settings->min_with.' рублей!"]}', 422);
			}
			if(Auth::user()->money < (int)$r->amount)
			{
				return response('{"gameAmount":["Недостаточно средств для вывода!"]}', 422);
			}
			if($r->purse == '')
			{
				return response('{"gameAmount":["Введите номер кошелька!"]}', 422);
			}
			$count = DB::table('withdraw')->where('user_id', Auth::user()->id)->where('status', 0)->count();
			if($count > 0)
			{
				return response('{"gameAmount":["Дождитесь обработки прошлой заявки!"]}', 422);
			}
			$user = User::where('id', Auth::user()->id)->first();
			$user->money = $user->money - $r->amount;
			$user->save();
			DB::table('withdraw')->insertGetId(['user_id' => Auth::user()->id, 'system' => $r->currency, 'wallet' => $r->purse ,'amount' => $r->amount]);
			return json_encode($r->amount);
		}
	}
	public function profile_finance()
	{
		if(Auth::guest())
		{
			return redirect('/');
		}
		$pays = DB::table('payments')->where('user', Auth::user()->id)->orderBy('id', 'desc')->get();
		return view('pages.finance', compact('pays'));
	}
	public function profile_withdraws()
	{
		if(Auth::guest())
		{
			return redirect('/');
		}
		$withdraws = DB::table('withdraw')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
		return view('pages.withdraws', compact('withdraws'));
	}
	public function profile_partner()
	{
		if(Auth::guest())
		{
			return redirect('/');
		}
		$vvod = DB::table('promocodes')->where('code', Auth::user()->ref_code)->get();
		if(count($vvod) > 0)
		{
			foreach($vvod as $v)
			{
				$v->user = User::where('id', $v->user)->first();
			}
		}
		return view('pages.partner', compact('vvod'));
	}
	public function activate(Request $r)
	{
		if(!isset($r->promocode))
		{
			return response('{"gameAmount":["Введите промокод!"]}', 422);
		}
		if(Auth::guest())
		{
			return response('{"gameAmount":["Необходимо авторизоваться!"]}', 422);
		}
		if(Auth::user()->ref_use != NULL)
		{
			return response('{"gameAmount":["Вы уже вводили промо-код!"]}', 422);
		}
		if(Auth::user()->ref_code == $r->promocode)
		{
			return response('{"gameAmount":["Вы не можете ввести свой промо-код!"]}', 422);
		}
		$referer = User::where('ref_code', $r->promocode)->first();
		if($referer == false)
		{
			return response('{"gameAmount":["Такого промо-кода не существует!"]}', 422);
		}
		else
		{
			$summ = Settings::where('id', 1)->first();
			$user = User::where('id', Auth::user()->id)->first();
			$user->ref_use = $r->promocode;
			$user->money = $user->money + (int)$summ->promo_sum;
			$user->save();
			DB::table('promocodes')->insertGetId(["code" => $r->promocode, "user" => Auth::user()->id]);
			return json_encode((int)$summ->promo_sum);
		}
	}
	public function user_page($id)
	{
		if(!Auth::guest() && Auth::user()->id == $id)
		{
			return redirect('/profile');
		}
		else
		{
			$user = User::where('id', $id)->first();
			$drops = Game::where('status', 1)->where('user_id', $id)->orderBy('id', 'desc')->limit(12)->get();
			foreach($drops as $g)
			{
				if($g->win < 10)
				{
					$g->planet = 1;
				}
				if($g->win >= 10 && $g->win < 20)
				{
					$g->planet = 2;
				}
				elseif($g->win >= 20 && $g->win < 50)
				{
					$g->planet = 3;
				}
				elseif($g->win >= 50 && $g->win < 100)
				{
					$g->planet = 4;
				}
				elseif($g->win >= 100 && $g->win < 200)
				{
					$g->planet = 5;
				}
				elseif($g->win >= 200 && $g->win < 500)
				{
					$g->planet = 6;
				}
				elseif($g->win >= 500 && $g->win < 1000)
				{
					$g->planet = 7;
				}
				elseif($g->win >= 1000 && $g->win < 10000)
				{
					$g->planet = 8;
				}
				elseif($g->win >= 10000)
				{
					$g->planet = 9;
				}
			}
			return view('pages.user', compact('user', 'drops'));
		}
	}
	function getIP() 
	{
		if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
		return $_SERVER['REMOTE_ADDR'];
	}
	public function get_payment(Request $r)
	{
		$settings = Settings::where('id', 1)->first();
		$sign = md5($settings->fk_id.':'.$r->AMOUNT.':'.$settings->fk_secret2.':'.$r->MERCHANT_ORDER_ID);
		if($sign != $r->SIGN){
		  return "Ошибка подписи";
		}
		$payment = DB::table('payments')->where('id', $r->MERCHANT_ORDER_ID)->first();
		if(count($payment) == 0)
		{
			return 'Платеж не найден';
		}
		else
		{
			if($payment->status != 0){
				return "[ Ошибка ] Статус платежа - оплачен до запроса";
			}
			else
			{
				if($payment->amount != $r->AMOUNT){
					return "[ Ошибка ] Сумма платежа указана не верно!";
				}
				else
				{
					$user = User::where('id', $payment->user)->first();
					$user->money = $user->money + $payment->amount;
					$user->deposit = $user->deposit + $payment->amount;
					$user->save();

					//1 tas kas uzaicina
					$settings = Settings::where('id', 1)->first();
					$percent = $settings->promo_percent;
					$te = User::where('ref_code', $user->ref_use)->first();
					if(count($te) == null || count($te) == 0){

					}
					else
					{
						$bon = ($percent/100)*$payment->amount;
						$te->money =   $te->money + $bon;
						$te->save();
					}
					\DB::table('payments')
					->where('id', $payment->id)
					->update(['status' => 1]);
					return 'success';
				}
			}
		}
	}
}
