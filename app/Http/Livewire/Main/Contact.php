<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Modules\Pages\Entities\PagesContent;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.main.contact', [
            'content' => PagesContent::where(['pages_id' => 5, 'is_active' => 1])->with('attributes')->orderBy('order')->first(),
        ]);
    }
}