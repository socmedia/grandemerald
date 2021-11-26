<?php

namespace App\Http\Livewire\Main;

use App\Services\Group;
use Livewire\Component;
use Modules\Pages\Entities\PagesContent;

class Houses extends Component
{
    public function render()
    {
        $contents = PagesContent::where(['pages_id' => 4, 'is_active' => 1])->with('attributes')->orderBy('order')->get();
        $group = new Group();

        $groups = [];
        foreach ($contents as $i => $content) {
            array_push($groups, $content);
            $groups[$i]->groups = $group->GroupByEloquentData($content->attributes, 'type');
        }

        return view('livewire.main.houses', [
            'contents' => $groups,
        ]);
    }
}