/<?php

use Illuminate\Database\Seeder;
// use=rquire_once
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //配列でサンプルデータ作成
        $diaries = [
            [
                'title' => '初めてのLaravel',
                'body' => '難しいな',
            ],
            [
                'title' => 'ご飯はやっぱり',
                'body' => '日本食',
            ],
            [
                'title' => 'もうすぐ日本に帰る',
                'body' => '温泉に行きたい',
            ],
        ];
        // IDが一番若いユーザーを取得
        $user = DB::table('users')->first();


        // 配列ループで回して、テーブルにINSERTする
        foreach ($diaries as $diary) {

            DB::table('diaries')->insert([
                'title' => $diary['title'],
                'body' => $diary['body'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id,

                // Carbon::now();  現在時刻
            ]);
        }
    }
}
