<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // 直接返回layouts.app视图，而不依赖插槽
        return view('layouts.app');
    }
}
