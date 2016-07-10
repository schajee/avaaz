<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\App\User::class, function (Faker\Generator $faker) {
    return [
        'login'     => $faker->userName,
        'name'      => $faker->name,
        'email'     => $faker->email,
        'phone'     => $faker->e164PhoneNumber(),
        'password'  => bcrypt(str_random(10)),
    ];
});

$factory->define(\App\Poll::class, function (Faker\Generator $faker) {
    $title = $faker->words(3, true);
    return [
        'title'         => $title, 
        'slug'          => str_slug($title, '-'),
        'question'      => $faker->sentence(),
        'description'   => $faker->paragraph(6),
        'start_date'    => $faker->date(),
    ];
});

$factory->define(\App\Topic::class, function (Faker\Generator $faker) {
    $title = $faker->words(3, true);
    return [
        'title'         => $title, 
        'slug'          => str_slug($title, '-'),
    ];
});

$factory->define(\App\Option::class, function (Faker\Generator $faker) {
    return [
        'option_type'   => $faker->numberBetween(1,3),
        'value'         => $faker->numberBetween(1,3),
        'text'          => $faker->sentence(), 
    ];
});

$factory->defineAs(\App\Option::class, 'radio', function ($faker) use ($factory) {
    $user = $factory->raw(App\Option::class);
    return array_merge($user, ['option_type' => 1]);
});

$factory->defineAs(\App\Option::class, 'checkbox', function ($faker) use ($factory) {
    $user = $factory->raw(App\Option::class);
    return array_merge($user, ['option_type' => 2]);
});

$factory->defineAs(\App\Option::class, 'number', function ($faker) use ($factory) {
    $user = $factory->raw(App\Option::class);
    return array_merge($user, ['option_type' => 3]);
});



$factory->define(\App\Response::class, function (Faker\Generator $faker) {
    $user = \App\User::inRandomOrder()->first();
    $poll = \App\Poll::inRandomOrder()->first();
    $option = \App\Option::where('poll_id', $poll->id)->inRandomOrder()->first();
    return [
        'user_id'   => $user->id,
        'poll_id'   => $poll->id,
        'option_id' => $option->id, 
    ];
});


$factory->define(\App\Profile::class, function(Faker\Generator $faker) { 
    foreach (\App\User::all() as $user)
    {
        
    }
});