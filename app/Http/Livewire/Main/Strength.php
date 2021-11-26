<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Modules\Pages\Entities\PagesContent;

class Strength extends Component
{
    public function render()
    {
        return view('livewire.main.strength', [
            'contents' => PagesContent::where(['pages_id' => 2, 'is_active' => 1])->orderBy('order')->get(),
        ]);
    }
}