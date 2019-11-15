<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Diaryモデルを使用する宣言
use App\Diary;
//CreateDiaryを使用する宣言
use App\Http\Requests\CreateDiary;

class DiaryController extends Controller
{
    //一覧画面を表示するためのメソッド
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

    //日記の作成画面を表示する
    public function create()
    {
        return view('diaries.create');
    }
    //新しい日記の保存をする画面
    public function store(CreateDiary $request)
    {
        // Diaryモデルのインスタンスを作成
        $diary = new Diary();

        // Diaryモデルを使ってDBに日記を保存
        // dd($request->title);
        // $diary->カラム名 = カラムに設定したい値
        $diary->title = $request->title;
        $diary->body = $request->body;

        //DBに保存実行
        $diary->save();

        // 一覧ページにリダイレクト
        return redirect()->route('diary.index');
    }
    //日記を削除するメソッド
    public function destroy(int $id)
    {
        //Diaryモデルを使用してIDが一致する日記の取得
        $diary = Diary::find($id);

        //取得した日記の削除
        $diary->delete();

        //一覧画面にリダイレクト
        return redirect()->route('diary.index');
    }
    //編集画面を表示する
    public function edit(int $id)
    {
        //受け取ったIDをもとに日記を取得
        $diary = Diary::find($id);

        // 編集画面を返す。同時に画面に取得した日記を渡す
        return view('diaries.edit',[
            //キー => 値
            'diary' => $diary
        ]);
    }

    //日記を更新し、一覧画面にリダイレクトする
    //-$id : 編集対象の日記のID
    //-$request : リクエストの内容。ここに画面で入力された文字が格納されてる。
    public function update(int $id, CreateDiary $request)
    {
        // dd($request->title);
        //受け取ったIDをもとに日記を取得
        $diary = Diary::find($id);

        //取得した日記のタイトル、本文を置き換える
        $diary->title = $request->title;
        $diary->body = $request->body;

        //DBに保存
        $diary->save();

        //一覧のページにリダイレクト
        return redirect()->route('diary.index');
    }
}
