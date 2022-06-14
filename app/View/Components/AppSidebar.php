<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppSidebar extends Component
{
    public $show_event_menu;
    public $event_uid;
    public $hasDynamicForm;
    /**
     * 
     * @param bool $showeventmenu;
     * @param string $event;
     * 
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $showeventmenu, string $event, $dynamicform)
    {
        $this->show_event_menu = $showeventmenu;
        $this->hasDynamicForm = (bool) $dynamicform;
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
