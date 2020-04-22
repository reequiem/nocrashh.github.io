<?php

namespace App\Http\Controllers;


use App\User;
use App\Game;
use App\Withdraw;
use App\Settings;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{

    /*
     * Главная
     */
    public function index()
    {
        /*
         * Статистика
         */
		$all_win = Game::where('status', 1)->sum('win');
		$all_games = Game::where('status', 1)->count();
		$all_payed = \DB::table('payments')->where('status', 1)->sum('amount');
		$all_with = \DB::table('withdraw')->where('status', 1)->sum('amount');
		$pay_today = \DB::table('payments')->where('created_at', '>=', Carbon::today())->where('status', 1)->where('type', 0)->sum('amount');
		$pay_week = \DB::table('payments')->where('created_at', '>=', Carbon::now()->subDays(7))->where('type', 0)->where('status', 1)->sum('amount');
		$pay_month = \DB::table('payments')->where('created_at', '>=', Carbon::now()->subDays(30))->where('status', 1)->where('type', 0)->sum('amount');
		$last_games = Game::where('status', 1)->orderBy('id', 'desc')->limit(7)->get();
		foreach($last_games as $l)
		{
			$l->user = User::where('id', $l->user_id)->first();
		}
		$last_pays = \DB::table('payments')->where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
		foreach($last_pays as $lp)
		{
			$lp->user = User::where('id', $lp->user)->first();
		}
		$last_withs = \DB::table('withdraw')->where('status', 0)->orderBy('id', 'desc')->limit(7)->get();
		foreach($last_withs as $lw)
		{
			$lw->user = User::where('id', $lw->user_id)->first();
		}
        return view('admin.index', compact('all_win', 'all_games', 'all_payed', 'all_with', 'pay_today', 'pay_week', 'pay_month', 'last_games', 'last_pays', 'last_withs'));
    }

    /*
     * Настройки
     */
    public function settings()
    {
		$settings = Settings::where('id', 1)->first();
        return view('admin.settings', compact('settings'));
    }

    /*
     * Сохраняем настройки
     */
    public function saveSettings(Request $r)
    {
        $settings = Settings::where('id', 1)->first();
		$settings->update([
            'chance' => $r->chance,
            'yt_chance' => $r->yt_chance,
            'promo_sum' => $r->promo_sum,
            'promo_percent' => $r->promo_percent,
            'min_with' => $r->min_with,
            'min_bet' => $r->min_bet,
            'fk_id' => $r->fk_id,
            'fk_secret1' => $r->fk_secret1,
            'fk_secret2' => $r->fk_secret2
        ]);
        return redirect('/admin/settings');
    }

    /*
     * Последние открытия
     */
    public function lastOpen()
    {
        $opens = Game::orderBy('id', 'desc')->get();
        foreach ($opens as $live) {
            $live->user = User::where('id', $live->user_id)->first();
        }
        return view('admin.lastOpen', compact('opens'));
    }

    public function lastWithdraw()
    {
        $opens = \DB::table('withdraw')->orderBy('id', 'asc')->where('status', 0)->get();
        foreach ($opens as $live) {
            $live->user = User::where('id', $live->user_id)->first();
        }
        return view('admin.lastWithdraw', compact('opens'));
    }

    public function acceptWithdraw($id)
    {
        $withdraw = Withdraw::where('id', $id)->first();
        if (!is_null($withdraw)) $withdraw->update(['status' => 1]);
        return \Redirect::back();
    }

    public function declineWithdraw($id)
    {
        $withdraw = Withdraw::where('id', $id)->first();
        if (!is_null($withdraw)) $withdraw->update(['status' => 2]);
        $user = User::where('id', $withdraw->user_id)->first();
        if (!is_null($user)) $user->update(['money' => $user->money + $withdraw->amount]);
        return \Redirect::back();
    }

    public function lastOrders()
    {
        $opens = \DB::table('payments')->orderBy('id', 'desc')->where('status', 1)->get();
        foreach ($opens as $live) {
            $live->user = User::where('id', $live->user)->first();
        }
        return view('admin.lastOrders', compact('opens'));
    }


    public function users()
    {
        $users = User::orderBy('id', 'desc')->get();
		foreach($users as $u)
		{
			$u->countGames = Game::where('user_id', $u->id)->where('status',1)->count();
			$u->winGames = Game::where('user_id', $u->id)->where('status', 1)->sum('win');
		}
        return view('admin.users', compact('users'));
    }


    public function user($id)
    {
        $user = User::where('id', $id)->first();
		$user->countGames = Game::where('user_id', $user->id)->where('status',1)->count();
		$user->winGames = Game::where('user_id', $user->id)->where('status', 1)->sum('win');
        return view('admin.user', compact('user'));
    }
	
    public function saveUser(Request $r)
    {
        $user = User::where('id', $r->id)->first();
        if (is_null($user)) \Redirect::back();
        $user->update([
            'username' => $r->username,
            'avatar' => $r->avatar,
            'money' => $r->money,
			'is_admin' => $r->is_admin,
            'is_yt' => $r->is_yt,
            'ref_code' => $r->ref_code,
            'ref_use' => $r->ref_use,
			'login2' => $r->login2
        ]);
        return \Redirect::back();
    }
}