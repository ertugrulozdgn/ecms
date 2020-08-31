<?php

namespace App\Widgets;

use App\Data\PostData;
use Arrilot\Widgets\AbstractWidget;

class Populer extends AbstractWidget
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
        $populer_posts = PostData::populars(); // :: bir sınıfın statik yöntemine erişim sağlar.

        return view('web.widgets.populer', compact('populer_posts'));
    }
}
