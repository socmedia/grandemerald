<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Modules\Pages\Entities\PagesContent;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.main.homepage', [
            'contents' => PagesContent::where(['pages_id' => 1, 'is_active' => 1])->orderBy('order')->get(),
        ]);
    }
}