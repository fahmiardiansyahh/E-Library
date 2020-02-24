<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use App\book;
use Faker\Generator as Faker;

$factory->define(book::class, function (Faker $faker) {

	$randId = rand(1,100);
	$cover = "https://picsum.photos/id/{$randId}/200/300";
 
    return [
        //
        'author_id' => Author::inRandomOrder()->first()->id,
        'title' => $faker->sentence(5) , 
        'description' => $faker->sentence(20) , 
        'cover' => $cover ,
        'qty' => rand(10,20),
    ];
});
