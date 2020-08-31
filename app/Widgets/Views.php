<?php

namespace App\Widgets;

use App\Data\PostData;
use Arrilot\Widgets\AbstractWidget;

class Views extends AbstractWidget
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
        $most_viewed = PostData::mostViewed(); // :: bir sınıfın statik yöntemine erişim sağlar.

        return view('web.widgets.views', compact('most_viewed'));
    }
}
