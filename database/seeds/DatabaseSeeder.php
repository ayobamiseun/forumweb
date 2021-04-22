<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $users = [];

        /**
         * Create users and save IDs in an array
         */
        for ($i = 0; $i < 20; $i++) {
            $users[] = DB::table('users')
                        ->insertGetId([
                            'first_name'    => $faker->firstName,
                            'last_name'     => $faker->lastName,
                            'user_name'     => $faker->unique()->userName,
                            'email'         => $faker->unique()->email,
                            'password'      => $faker->password(),
                            'signature'     => $faker->catchPhrase(),
                            'last_activity' => Carbon::now()->format('Y-m-d H:i:s'),
                            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                        ]);
        }

        /**
         * Create topics using $users as creators
         */
        for ($i = 0; $i < 20; $i++) {
            $topic = DB::table('topics')
                        ->insertGetId([
                            'user_id'       => $users[mt_rand(0, count($users) - 1)],
                            'title'         => $faker->sentence(),
                            'description'   => $faker->paragraph(),
                            'last_post'     => Carbon::now()->format('Y-m-d H:i:s'),
                            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                        ]);

            /**
             * Create posts for the newly created topic
             */
            for ($j = 0; $j < 20; $j++) {
                DB::table('posts')
                    ->insert([
                        'user_id'       => $users[mt_rand(0, count($users) - 1)],
                        'topic_id'      => $topic,
                        'post'          => $faker->paragraph(),
                        'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
            }
        }
    }
}
