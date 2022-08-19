<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class WebsiteNavBar extends Component
{
    public $links;

    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website-navbar');
    }
}
