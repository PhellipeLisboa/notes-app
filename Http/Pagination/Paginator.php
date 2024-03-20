<?php


namespace Http\Pagination;


class Paginator
{


    public $elements_per_page;
    public $total_itens;
    public $total_pages;
    public $remainder;
    public $pages = [];
    
    
    public function __construct($array_to_paginate, $elements_per_page = 5)
    {
        $this->total_itens = Count($array_to_paginate);
        $this->elements_per_page = $elements_per_page;
    }


    public function getTotalPages()
    {
        $this->total_pages = $this->total_itens / $this->elements_per_page;

        if ($this->total_pages != floor($this->total_pages)) {
            $this->total_pages = ceil($this->total_pages);
        }
    }


    public function getRemainder()
    {
        $this->remainder = $this->total_itens % $this->elements_per_page;
    }


    public function turnIntoPages()
    {
        $this->getTotalPages();
        $this->getRemainder();
        
        for ($page_number=0; $page_number < $this->total_pages; $page_number++) { 
    
            $elements = [];

            // Degine the first elements of each page
            $firts_of_the_page = $page_number * $this->elements_per_page;
            
            // Define the last element of the last page
            $end_key = $firts_of_the_page + ($this->elements_per_page - 1);

            if ($page_number == $this->total_pages - 1 && $this->remainder !== 0) {
                $end_key = $this->remainder + ($firts_of_the_page) - 1;
            }
          
            
            for ($element= $firts_of_the_page; $element < $end_key + 1; $element++) { 
                /* echo 'page_number: ' . $firts_of_the_page;
                echo '<br>';
                echo 'end_key: ' . $end_key;
                echo '<br>'; */
                $elements[] = $element;
            }   
    
            $page_data = [
                'start' => $firts_of_the_page,
                'end' => $end_key,
                'elements' => $elements,
            ];
    
            $this->pages["{$page_number}"] = $page_data;
        }

        return $this->pages;
    }
}