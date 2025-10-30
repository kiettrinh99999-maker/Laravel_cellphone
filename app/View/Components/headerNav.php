<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class headerNav extends Component
{
    /**
     * Create a new component instance.
     */
    public $headerNav;
    public function __construct($headerNav="Default")
    {
        $this->headerNav=$headerNav;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-nav');
    }
}
