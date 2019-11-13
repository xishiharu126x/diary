<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Diaryモデルを使用する宣言
use App\Diary;

class DiaryController extends Controller
{
    public function index()
    {
            //diariesテーブルのデータを全件取得
            //取得した結果を画面で確認
            $diaries = Diary::all();
            // dd($diaries);
            //→dd():var_dump と die が同時に実行される

            //フォルダ名.ファイルで表示させたいものをだす
            return view('diaries.index',[
                //キー => 値
                'diaries' => $diaries
            ]);
    }
}
