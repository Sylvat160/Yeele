<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\View\Component;

class AppSidebar extends Component
{
    public $show_event_menu;
    public $event_uid;
    /**
     * 
     * @param bool $showeventmenu;
     * @param string $event;
     * 
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $showeventmenu, string $event)
    {
        $this->show_event_menu = $showeventmenu;
        if (isset($event)) {
            $this->event_uid = $event;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app-sidebar');
    }
}
