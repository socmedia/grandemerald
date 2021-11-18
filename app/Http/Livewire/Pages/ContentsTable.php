<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Modules\Pages\Entities\PagesContent;

class ContentsTable extends Component
{
    public $active, $p = 'main';

    protected $listeners = [
        'preview',
    ];

    public function mount($active)
    {
        $this->active = $active;
    }

    public function preview($id)
    {
        $this->active = $id;
        $contents = PagesContent::where('pages_id', $id)->orderBy('order')->get();
        return $contents;
    }

    public function updateOrder($list)
    {
        foreach ($list as $item) {
            PagesContent::find($item['value'])->update([
                'order' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.contents-table', [
            'contents' => $this->preview($this->active),
        ]);
    }
}