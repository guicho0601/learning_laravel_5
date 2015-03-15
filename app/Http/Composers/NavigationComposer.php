<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 14/03/15
 * Time: 7:24
 */

namespace App\Http\Composers;


use App\Article;

class NavigationComposer {

    public function compose($view){
        $view->with('latest',Article::latest()->first());
    }

} 