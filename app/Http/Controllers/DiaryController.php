<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Diaryモデルを使う宣言
use App\Diary;

use App\Http\Requests\CreateDiary;
class DiaryController extends Controller
{
    //一覧画面を表示する
    public function index()
    {
    //   diariesテーブルのデータを全権取得
    //   取得した結果を画面で確認
        $diaries = Diary::all();
        // dd($diaries);
        // dd()::var_dump と die が同時に実行される
        // view/diaries/index.blade.php
        // フォルダ名.ファイル名（blade.phpは除く）
        return view('diaries.index',[
            // キー => 値
            'diaries' => $diaries
        ]);
    }
    // 日記に作成画面を表示する
    public function create()
    {
        return view('diaries.create');
    }
    // 新しい日記の保存をする画面
    public function store(CreateDiary $request)
    {
         // Diaryモデルのインスタンスを作成
        $diary = new Diary();
        // Diaryモデルを使って、DBに日記を保存する
        // $diary->カラム名 = カラムに設定したい値
        $diary->title = $request->title;
        $diary->body = $request->body;

        // DBに保存実行
        $diary->save();

        // 一覧ページにリダイレクト
        return redirect()->route('diary.index');
    }
    // 日記を削除するためのメソッド
    public function destroy(int $id)
    {
        // diaryモデルを使用して、IDが一致する日記を取得
        $diary = Diary::find($id);
        // 取得した日記の削除
        $diary->delete();
        // 一覧画面にリダイレクト
        return redirect()->route('diary.index');
    }

}
