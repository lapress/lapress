<?php

namespace App\Http\Controllers;

use App\Models\Page;
use LaPress\Models\Option;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class HomepageController extends Controller
{
    public function show()
    {
        $option = Option::get('page_on_front');
        $page = Page::find($option);

        return view(theme_view('index'))->withPage($page);
    }
}
