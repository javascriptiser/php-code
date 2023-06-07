<?php
$arr = [
    [
        'country' => 'Россия',
        'city' => 'Москва',
    ],
    [
        'country' => 'Беларусь',
        'city' => 'Минск',
    ],
    [
        'country' => 'Россия',
        'city' => 'Питер',
    ],
    [
        'country' => 'Россия',
        'city' => 'Владивосток',
    ],
    [
        'country' => 'Украина',
        'city' => 'Львов',
    ],
    [
        'country' => 'Беларусь',
        'city' => 'Могилев',
    ],
    [
        'country' => 'Украина',
        'city' => 'Киев',
    ],
];

$new = [];
foreach ($arr as $index => $item) {
    $new[$item['country']][] = $item['city'];

}
//print_r($new);

$arr = [
    [
        'date' => '2019-12-29',
        'event' => 'name1'
    ],
    [
        'date' => '2019-12-31',
        'event' => 'name2'
    ],
    [
        'date' => '2019-12-29',
        'event' => 'name3'
    ],
    [
        'date' => '2019-12-30',
        'event' => 'name4'
    ],
    [
        'date' => '2019-12-29',
        'event' => 'name5'
    ],
    [
        'date' => '2019-12-31',
        'event' => 'name6'
    ],
    [
        'date' => '2019-12-29',
        'event' => 'name7'
    ],
    [
        'date' => '2019-12-30',
        'event' => 'name8'
    ],
    [
        'date' => '2019-12-30',
        'event' => 'name9'
    ],
];
$new = [];
foreach ($arr as $index => $item) {
    $new[$item['date']][] = $item['event'];
}

//print_r($new);

$arr = [
    '2019-12-29' => ['name1', 'name2', 'name3', 'name4'],
    '2019-12-30' => ['name5', 'name6', 'name7'],
    '2019-12-31' => ['name8', 'name9'],
];
$new = [];

foreach ($arr as $index => $item) {
    foreach ($item as $elem) {
        $new[] = [$index => $elem];
    }
}

print_r($new);