<?php


namespace Http\Pagination;


class Paginator
{


    public $elements_per_page;
    public $input_elements_per_page;
    public $total_itens;
    public $total_pages;
    public $remainder;
    public $pages = [];

    public $current_page;
    public $last_current;
    
    
    public function __construct($array_to_paginate, $input_elements_per_page = null)
    {
        $this->total_itens = Count($array_to_paginate);

        // Check if user's elements_per_page input was passed, if yes create $this->input_elements_per_page.
        if ($input_elements_per_page === null) {
            unset($this->input_elements_per_page);
        } else {
            if (isset($input_elements_per_page) && $input_elements_per_page > 0 && is_numeric($input_elements_per_page)) {
                $this->input_elements_per_page = $input_elements_per_page;
            }
        }
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


    public function ElementsPerPage()
    {
        return $this->elements_per_page;
    }


    public function turnIntoPages()
    {
        // Check if user's this->input_elements_per_page exist, if not use the default itens per page.
  
        if (isset($this->input_elements_per_page)) {
            $this->elements_per_page = $this->input_elements_per_page;
        }

        $this->getTotalPages();
        $this->getRemainder();
        
        for ($page_number=0; $page_number < $this->total_pages; $page_number++) { 
    
            $elements = [];

            // Degine the first elements of each page
            $firt_of_the_page = $page_number * $this->elements_per_page;
            // Define the last element of the last page
            $end_key = $firt_of_the_page + ($this->elements_per_page - 1);

            if ($page_number == $this->total_pages - 1 && $this->remainder !== 0) {
                $end_key = $this->remainder + ($firt_of_the_page) - 1;
            }
          
            
            for ($element= $firt_of_the_page; $element < $end_key + 1; $element++) { 
                $elements[] = $element;
            }   
    

            $page_data = [
                'start' => $firt_of_the_page,
                'end' => $end_key,
                'elements' => $elements,
            ];
    

            $this->pages["{$page_number}"] = $page_data;
        }


        return $this->pages;
    }


    public function handleNavigation($navigation_data) 
    {
        if (!isset($navigation_data['current'])) {
            $this->current_page = 0;
        } else {
            $this->current_page = $navigation_data['current'];
        }


        if (isset($navigation_data['previous'])) {
            $this->last_current = $navigation_data['previous'];
            
            if ($this->last_current >= 1) {
                $this->current_page = (int) $this->last_current - 1;
            }
        }
        

        if (isset($navigation_data['next'])) {
            $this->last_current = $navigation_data['next'];
            
            if ($this->last_current < Count($this->pages) ) {
                $this->current_page = (int) $this->last_current + 1;   
            }
        }
        

        if ($this->current_page > (int) array_key_last($this->pages)) {
            $this->current_page = (int) array_key_last($this->pages);
        }
           
        
        return $this->current_page;
    }

    
}