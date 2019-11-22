<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
// 日記のテーブルとユーザーテーブルの多対多の接続設定
    public function likes()
    {
        // diariesテーブルとuserテーブルは、
        // likesテーブルを介して多対多ん関係である。
        return $this->belongsToMany('App\User','likes')->withTimestamps();
    }
}
