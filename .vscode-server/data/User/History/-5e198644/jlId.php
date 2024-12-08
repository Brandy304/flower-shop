<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthCard extends Component
{
    /**
     * 渲染组件的视图
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.auth-card');
    }
}
