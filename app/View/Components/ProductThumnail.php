<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductThumnail extends Component
{
    /**
     * Create a new component instance.
     */
    public $image;
    public $name;
    public $price;
    public $sale;
    public function __construct($name, $image,$price,$sale)
    {
        $this->image=$image;
        $this->name=$name;
        $this->price=$price;
        $this->sale=$sale;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-thumnail');
    }
}
