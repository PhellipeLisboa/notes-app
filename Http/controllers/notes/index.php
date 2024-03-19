<?php 

use Core\Database;
use Core\App;
use PHPUnit\Framework\Constraint\Count;

if (isset($_POST['last'])) {
    $last_current = $_POST['last'];
}
if (isset($_POST['current'])) {
    $current_page = $_POST['current'];
}
if (isset($_POST['next'])) {
    $last_current = $_POST['next'];
}

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
    .
    .
    .
];
*/ 

$total_pages = intdiv($total_notes, 5);
$resto = $total_notes % 5;

if ($total_notes / 5 > intdiv($total_notes, 5)) {
    $total_pages += 1;
}

for ($p=0; $p < $total_pages; $p++) { 

    $elements = [];

    if ($p == $total_pages - 1) {
        if ($resto == 0) {
            $end = (($p * 5) + 4);
        } else {
            $end = $resto + ($p * 5) - 1;
        }
    } else {
        $end = ($p * 5) + 4;
    }
    
    for ($e= $p; $e < $end; $e++) { 
        $elements[] = $e;
    }   

    $page_data = [
        'start' => $p * 5,
        'end' => $end,
        'elements' => $elements,
    ];

    $pages["{$p}"] = $page_data;
    unset($elements);

}

if (!isset($_POST['current'])) {
    $current_page = 0;
}

if (isset($_POST['last'])) {
    if ($last_current >= 1) {
        $current_page = (int) $last_current - 1;
    }
}

if (isset($_POST['next'])) {
    if ($current_page < Count($pages) ) {
        $current_page = (int) $last_current + 1;   
    }
}

if ($current_page > (int) end($pages) + 1) {
    $current_page = (int) end($pages) + 1;
}   

//dd($current_page);
// 2 => 1

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'total_pages' => $total_pages,
    'total_notes' => $total_notes,
    'pages' => $pages,
    'notes' => $notes,
    'current_page' => $current_page ?? 0,
]);