<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SigleProduct extends Component
{
    /**
     * Create a new component instance.
     */
        public $name;
        public $price;
        public $sale;
        public $image;
    public function __construct($name="Product", $price=200, $image, $sale)
    {
        $this->name=$name;
        $this->price=$price;
        $this->image=$image;
        $this->sale=$sale;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sigle-product');
    }
}
