<?php 


use Core\Database;
use Core\App;
use Http\Pagination\Paginator;


$db = App::resolve(Database::class);


$searched = isset_get('search'); 


if (isset($searched) and $searched != '') {

    $keys = explode(" ", $searched);

    $query = "SELECT * FROM notes WHERE user_id = :user_id AND title LIKE '%$searched%'";
    foreach($keys as $k){
        $query.= " OR title LIKE '%$k%' ";
    }

    $notes = $db->query($query, [
        'user_id' => $_SESSION['user']['id']
    ])->get();

    $default_itens_per_page = count($notes);
}


if (empty($notes)) {
    $notes = $db->query('SELECT * FROM notes WHERE user_id = :user_id', [
        'user_id' => $_SESSION['user']['id']
    ])->get();
    $default_itens_per_page = 5;
} 


$paginator = new Paginator($notes, (int) isset_post('elements_per_page', $default_itens_per_page));

$pages = $paginator->turnIntoPages();

$current_page = $paginator->handleNavigation([
    'previous' => isset_post('previous'),
    'current' => (int) isset_post('current', 0),
    'next' => isset_post('next'),
]);

/* Should be a redirect, not a view. */

view("notes/index.view.php", [
    'heading' => 'Notes',
    'total_pages' => $paginator->total_pages,
    'total_notes' => $paginator->total_itens,
    'pages' => $pages,
    'notes' => $notes,
    'current_page' => $current_page ?? 0,
    'elements_per_page' => $paginator->elements_per_page,
]);