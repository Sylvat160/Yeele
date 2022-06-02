<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Container extends Component
{
    public string $classes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $class = "")
    {
        $this->classes = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.container');
    }
}
