<?php

namespace App\View\Components\list;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    public $book;
    /**
     * Create a new component instance.
     */
    public function __construct($book)
    {
        $this->book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list.card');
    }
}
