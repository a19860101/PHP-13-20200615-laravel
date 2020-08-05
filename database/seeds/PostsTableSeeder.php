<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::create([
            'title'=>'標題一',
            'content'=>'內容一',
            'cover'=>'https://picsum.photos/id/15/800/600'
        ]);
        Post::create([
            'title'=>'標題2',
            'content'=>'內容2',
            'cover'=>'https://picsum.photos/id/12/800/600'
        ]);
        Post::create([
            'title'=>'標題3',
            'content'=>'內容3',
            'cover'=>'https://picsum.photos/id/14/800/600'
        ]);
    }
}
