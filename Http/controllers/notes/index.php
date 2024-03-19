<?php 

use Core\Database;
use Core\App;
use PHPUnit\Framework\Constraint\Count;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE user_id = :user_id', [
    'user_id' => $_SESSION['user']['id']
])->get();

$total_notes = Count($notes);
$pages = [];
// Se número de páginas for maior que 7 -> ?????????

/* 
$pages = [
    0 => [
        $start = 0;
        $end = 4;
        $elements = [0, 1, 2, 3, 4]
    ];
    1 => [
        $start = 5;
        $end = 9;
        $elements = [5, 6, 7, 8, 9]
    ];
    2 => [
        $start = 10;
        $end = 14;
        $elements = [10, 11, 12, 13, 14]
    ];
];
*/ 

for ($n=0; $n < $total_notes; $n++) { 

    $total_pages = intdiv($total_notes, 5);
    if ($total_notes / 5 > intdiv($total_notes, 5)) {
        $total_pages += 1;
    }

    for ($p=0; $p < $total_pages; $p++) { 

        $elements = [];

        for ($e= $p * 5; $e < (($p * 5) + 4) + 1; $e++) { 
            $elements[] = $e;
        }

        $page_data = [
            'start' => $p * 5,
            'end' => ($p * 5) + 4,
            'elements' => $elements,
        ];

        $pages["{$p}"] = $page_data;

    }
    
}

//dd($pages);

$total_pages = Count($pages);

$n = 0;

/*
while ($n < Count($notes)) :
for ($i=0; $i < 5; $i++) :
$start = $initial_item[$n];

    $notes[$start + $i]['created_at'];

endfor;
$n += 1;
endwhile; */

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'total_pages' => $total_pages,
    'total_notes' => $total_notes,
    'pages' => $pages,
    'notes' => $notes,
]);