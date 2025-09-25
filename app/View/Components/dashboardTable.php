<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardTable extends Component
{
    public string $title;
    public array $columns;
    public $items;
    public array $badges;
    /**
     * Create a new component instance.
     */
  

    public function __construct(string $title, array $columns, $items, array $badges = [])
        {
            $this->title = $title;
            $this->columns = $columns;
            $this->items = $items;
            $this->badges = $badges;
        }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-table');
    }
}
