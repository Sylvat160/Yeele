<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppAlert extends Component
{

    public $bgColor;
    public $fa;
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type, string $message)
    {

        $this->message = $message;

        switch ($type) {
            case 'success':
                $this->bgColor = "78, 204, 78";
                $this->fa = 'fa-circle-check';
                break;
            
            case 'danger':
                $this->bgColor = "254, 59, 59";
                $this->fa = 'fa-circle-xmark';
                break;
            case 'warning':
                $this->bgColor = "235, 189, 53";
                $this->fa = 'fa-circle-exclamation';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app-alert');
    }
}
