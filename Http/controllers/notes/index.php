<?php 


use Core\Database;
use Core\App;
use Http\Pagination\Paginator;


if (isset($_POST['last'])) {
    $last_current = $_POST['last'];
}
if (isset($_POST['current'])) {
    $current_page = $_POST['current'];
}
if (isset($_POST['next'])) {
    $last_current = $_POST['next'];
}


/* 

$pages = Paginator::pages();


= LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

*/


$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE user_id = :user_id', [
    'user_id' => $_SESSION['user']['id']
])->get();

$total_notes = Count($notes);
$pages = [];

$total_pages = intdiv($total_notes, 5);
$remainder = $total_notes % 5;

// Get the number of pages, including the last page even if that is not full (5 notes)
if ($total_notes / 5 > intdiv($total_notes, 5)) {
    $total_pages += 1;
}

// loop to put every pages's first note, last note and an array with all the notes that belongs to that page inside the $pages array
for ($page=0; $page < $total_pages; $page++) { 

    $elements = [];

    // Define the last element of the last page
    if ($page == $total_pages - 1) {
        if ($remainder == 0) {
            $end = (($page * 5) + 4);
        } else {
            $end = $remainder + ($page * 5) - 1;
        }
    } else {
        $end = ($page * 5) + 4;
    }
    
    for ($element= $page; $element < $end; $element++) { 
        $elements[] = $element;
    }   

    $page_data = [
        'start' => $page * 5,
        'end' => $end,
        'elements' => $elements,
    ];

    $pages["{$page}"] = $page_data;
}

/* -------------------------------------- */

if (!isset($_POST['current'])) {
    $current_page = 0;
}

if (isset($_POST['last'])) {
    if ($last_current >= 1) {
        $current_page = (int) $last_current - 1;
    }
}

if (isset($_POST['next'])) {
    if ($last_current < Count($pages) ) {
        $current_page = (int) $last_current + 1;   
    }
}

if ($current_page > (int) array_key_last($pages)) {
    $current_page = (int) array_key_last($pages);
}   

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'total_pages' => $total_pages,
    'total_notes' => $total_notes,
    'pages' => $pages,
    'notes' => $notes,
    'current_page' => $current_page ?? 0,
]);