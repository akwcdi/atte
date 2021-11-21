<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Atte;
use App\Models\User;


class attesController extends Controller
{
   public function index()
    {
        if (Auth::check()) {
            // ログイン済みだったら打刻画面を表示
            return view('index');

        } else {
            // ログインしていなかったらログイン画面を表示
            return view('auth/login');
        }
    }

    public function enter_time()
    {
        $users = Auth::user();

         /**
         * 打刻は1日一回までにしたい 
         * DB
         */
        $oldTimestamp = Atte::where('users_id', $users->id)->latest()->first();
        if ($oldTimestamp) {
            $oldTimestamp_enter = new Carbon($oldTimestamp->enter_time);
            $oldTimestampDay = $oldTimestamp_enter->startOfDay();
        } else {
            $atte = Atte::create([
            'users_id' => $users->id,
            'enter_time' => Carbon::now(),
            ]);
            return redirect()->back()->with('my_status', '出勤打刻が完了しました');
        }
        
        $newTimestampDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
        if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->exit_time))){
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

        $atte = Atte::create([
            'users_id' => $users->id,
            'enter_time' => Carbon::now(),
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function exit_time()
    {
        $users = Auth::user();
        $atte = Atte::where('users_id', $users->id)->latest()->first();

        /**
         * 退勤打刻しているか、直前のTimestampの出勤打刻がされていない場合エラーを吐き出す。
         */

        if( !empty($atte->exit_time)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }

        $atte->update([
            'exit_time' => Carbon::now(),
            ]);

            return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }

    public function reststart_time()
    {
        $users = Auth::user();
        $atte = Atte::where('users_id', $users->id)->latest()->first();

        /**
         * 出勤打刻がされていない場合エラーを吐き出す。
         */

        if( empty($atte->enter_time)) {
            return redirect()->back()->with('error', '出勤打刻されていません');
        }

        $atte->update([
            'reststart_time' => Carbon::now(),
            ]);

            return redirect()->back()->with('my_status', '休憩開始しました');
    }

    public function restend_time()
    {
        $users = Auth::user();
        $atte = Atte::where('users_id', $users->id)->latest()->first();

        /**
         * 休憩開始がされていない場合エラーを吐き出す。
         */

        if( empty($atte->reststart_time)) {
            return redirect()->back()->with('error', '休憩開始されていません');
        }

        $atte->update([
            'restend_time' => Carbon::now(),
            ]);

            return redirect()->back()->with('my_status', '休憩終了しました');
    }


}
