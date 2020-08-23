<?php

namespace App\Widgets;

use App\Models\Page;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Cache;

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

        $pagesNav = Cache::tags('pagesNav')->remember('page',60,function () {
           return Page::orderBy('must')->get();
        });

        return view('widgets.header',compact('pagesNav'));
    }
}
