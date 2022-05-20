<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Header extends Component
{
    public $links;
    
    public function __construct()
    {
        $this->links = array_map(function($link) {
            if($link['path'] === Request::fullUrl()) {
                $link['active'] = ' link_active';
            }

            return $link;
        }, [
            'Accueil' => [
                'path' => route('home'),
            ],
            'Fonctionnalités' => [
                'path' => route('features'),
            ],
            'Tarifs' => [
                'path' => route('prices'),
            ],
            'Contact' => [
                'path' => route('contact'),
            ],
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
