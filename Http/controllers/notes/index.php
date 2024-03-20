<?php 


use Core\Database;
use Core\App;
use Http\Pagination\Paginator;


if (isset($_POST['elements_per_page']) && $_POST['elements_per_page'] > 0 && is_numeric($_POST['elements_per_page'])) {
    $elements_per_page = (int) $_POST['elements_per_page'];
}
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

$paginator = new Paginator($notes, $elements_per_page ?? 5);
$pages = $paginator->turnIntoPages();


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
    'total_pages' => $paginator->total_pages,
    'total_notes' => $paginator->total_itens,
    'pages' => $pages,
    'notes' => $notes,
    'current_page' => $current_page ?? 0,
    'elements_per_page' => $paginator->elements_per_page,
]);