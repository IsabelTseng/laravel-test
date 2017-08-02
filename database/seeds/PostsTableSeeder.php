<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        post::truncate();

        $faker = Faker\Factory::create('zh_Tw');
        $total = 10;

        foreach (range(1,$total) as $id){
            Post::create([
                'title' => $faker->realText(rand(15,25)),
                'sub_title' => $faker->realText(rand(20,28)),
                'content' => $faker->realText(rand(200,600)),
                'is_feature' =>rand(0,1),
                'created_at' => \Carbon\Carbon::now()->subDays($total-$id),
                'updated_at' => \Carbon\Carbon::now()->subDays($total-$id)->addHours(rand(1,3))->addMinutes(rand(5,20)),

            ]);
        }

    }
}
