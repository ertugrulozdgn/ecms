<?php

namespace App\Widgets;

use App\Data\PostData;
use App\Models\Page;
use App\Models\Post;
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

        $pagesNav = PostData::pageNav(); // :: bir sınıfın statik yöntemine erişim sağlar.


        return view('web.widgets.header',compact('pagesNav'));
    }
}
