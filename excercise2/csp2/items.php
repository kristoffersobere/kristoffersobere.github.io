<?php 

$item1 = [
	'name' => 'Apple',
	'description' => 'apples',
	'price' => 20,
	'img' => 'https://lorempixel.com/50/50/',
	'category' => 'fruits'
];
$item2 = [
	'name' => 'Ampalaya',
	'description' => 'this is amplaya',
	'price' => 10,
	'img' => 'https://lorempixel.com/50/50/',
	'category' => 'vegestables'
];
$item3 = [
	'name' => 'Banana',
	'description' => 'Banana saging',
	'price' => 50,
	'img' => 'https://lorempixel.com/50/50/',
	'category' => 'fruits'
];
$item4 = [
	'name' => 'Durian',
	'description' => 'This is Durian',
	'price' => 45,
	'img' => 'https://lorempixel.com/50/50/',
	'category' => 'fruits'
];
$item5 = [
	'name' => 'Lemon',
	'description' => 'Lemon popsicle',
	'price' => 20,
	'img' => 'https://lorempixel.com/50/50/',
	'category' => 'fruits'
];
$item6 = [
	'name' => 'StringBeans',
	'description' => 'this is beans',
	'price' => 20,
	'img' => 'https://lorempixel.com/50/50/',
	'category' => 'vegestables'
];

$items = [$item1, $item2, $item3, $item4, $item5, $item6];

	

	$file = fopen("assets/items.json", "w");
	fwrite($file, json_encode($items,JSON_PRETTY_PRINT));
	fclose($file);

 

 ?>