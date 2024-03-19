<?php


namespace Http\Pagination;


use Core\Database;
use Core\App;


class Paginator
{


    public $total_notes;
    
    
    public function __construct()
    {
        $notes = App::resolve(Database::class)->query('SELECT * FROM notes WHERE user_id = :user_id', [
            'user_id' => $_SESSION['user']['id']
        ])->get();
    
        $this->total_notes = Count($notes);
    }


    public static function validate($attributes)
    {   
        
        $pages = [];
    
        $total_pages = intdiv(self::$total_notes, 5);
        $remainder = self::$total_notes % 5;
    
        // Get the number of pages, including the last page even if that is not full (5 notes)
        if (self::$total_notes / 5 > intdiv(self::$total_notes, 5)) {
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
    }
    
    /* $db = App::resolve(Database::class); */


}