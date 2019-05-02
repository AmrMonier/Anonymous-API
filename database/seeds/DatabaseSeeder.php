<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 30)
            ->create()
            ->each(function ($u){
                $i = 50;
                    $u->slug = $u->name . '-' . $u->id;
                    $u->save();
                    factory(App\Question::class, 10)
                        ->create([
                            'user_id' => $u->id
                        ])
                        ->each(function ($q){
                            factory(App\Answers::class, 5)->create([
                                'question_id' => $q->id
                            ]);
                        }
                );
                factory(App\Message::class,10)->create([
                    'user_id' => $u->id
                ]);
            });
        // $this->call(UsersTableSeeder::class);
    }
}
