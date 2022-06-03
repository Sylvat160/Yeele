<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class WebsiteNavBar extends Component
{
    public $links;
    
    public function __construct()
    {
        $this->links = array_map(function($link) {
            if($link['path'] === Request::fullUrl()) {
                $link['active'] = true;
            }

            return $link;
        }, [
            'Accueil' => [
                'path' => route('website.home'),
            ],
            'Fonctionnalités' => [
                'path' => route('website.features'),
            ],
            'Tarifs' => [
                'path' => route('website.prices'),
            ],
            'Contact' => [
                'path' => route('website.contact'),
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
        return view('components.website-navbar');
    }
}
