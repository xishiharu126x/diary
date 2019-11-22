<?php

use Illuminate\Database\Seeder;
// use = require_once
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
        //配列でサンプルデータを作成
        $diaries = [
            [
                'title' => '初めてのLaravel',
                'body' => '難しいなあ',
            ],
            [
                'title' => '初めてのセブ',
                'body' => '渋滞ぱねえ',
            ],
            [
                'title' => '腹痛',
                'body' => 'イキには行かない（嘘行く）',
            ]
        ];

        //IDが一番若いユーザーを取得
        $user = DB::table('users') ->first();

        //配列でループで回して、テーブルにINSERTする
        foreach($diaries as $diary){
            DB::table('diaries')->insert([
                'title' => $diary['title'],
                'body' => $diary['body'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id,

                //Carbon::now()は現在時刻
            ]);
        }
    }
}
