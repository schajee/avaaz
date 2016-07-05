<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /**
     *  Loads the incoming requested view (if exists)
     */
    public function router(string $page = null)
    {
        $view = 'help.'. ($page === null ? 'help' : $page);
        
        if (view()->exists($view)) 
        {
            return view($view);
        }

        abort(404);
    }
}
