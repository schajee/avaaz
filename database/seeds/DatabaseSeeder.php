<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $times = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, $this->times)->create();
        factory(\App\Topic::class, $this->times*2)->create();

        factory(\App\Poll::class, $this->times*5)->create()->each(function($u) 
        {
            for ($i = 1; $i <= 2; $i++)
            {
                $u->options()->save(factory(\App\Option::class, 'radio')->make());
            }

            $topic = \App\Topic::inRandomOrder()->first();
            $u->topics()->attach($topic);
        });

        factory(\App\Poll::class, $this->times*5)->create()->each(function($u) 
        {
            for ($i = 1; $i <= 3; $i++)
            {
                $u->options()->save(factory(\App\Option::class, 'checkbox')->make());
            }

            $topic = \App\Topic::inRandomOrder()->first();
            $u->topics()->attach($topic);
        });

        factory(\App\Response::class, $this->times*100)->create();
    }
}
