<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $message;

    /**
     * Create a new component instance.
     */
    public function __construct(string $type = '', string $message = '')
    {
        // If no type is passed, check the session for a type
        $this->type = $type ?: (session()->has('success') ? 'success' :
                                (session()->has('error') ? 'error' :
                                (session()->has('info') ? 'info' : '')));

        // If no message is passed, pull from session flash
        $this->message = $message ?: session($this->type, '');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
