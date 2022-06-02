<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WebsiteFeature extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website-feature');
    }
}
