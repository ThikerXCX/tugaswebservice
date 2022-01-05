<?php

namespace App\View\Components;

use Illuminate\View\Component;

class main extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public function __construct($title = '')
    {
        $this->title = $title ? $title : 'LaravelApp';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main');
    }
}
