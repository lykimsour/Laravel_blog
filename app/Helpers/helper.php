<?php

namespace App\Helpers;

use App\Models\Post;

class Helper
{
	/**
     * Get lists of pages
     */ 
    public static function get_pages()
    {
        $pages = Post::where('post_type', 'page')->get();
        
        return $pages;
    }

}