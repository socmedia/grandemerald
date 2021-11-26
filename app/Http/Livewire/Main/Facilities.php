<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Modules\Pages\Entities\PagesContent;

class Facilities extends Component
{
    public function render()
    {
        return view('livewire.main.facilities', [
            'contents' => PagesContent::where(['pages_id' => 3, 'is_active' => 1])->orderBy('order')->get(),
        ]);
    }
}