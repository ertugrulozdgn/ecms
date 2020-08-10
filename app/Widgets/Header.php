<?php

namespace App\Widgets;

use App\Models\Page;
use Arrilot\Widgets\AbstractWidget;

class Header extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {

//        $pages = Page::orderBy('must')->get();
//
//        return view('widgets.header',compact('pages'));
    }
}
