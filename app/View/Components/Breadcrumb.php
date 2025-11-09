<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $items;
    public $description;
    public $background;

    /**
     * Create a new component instance.
     */
    public function __construct($items = [], $description = null, $background = null)
    {
        $this->items = $items;
        $this->description = $description;
        $this->background = $background ?? asset('/assets/img/scale1.webp');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
