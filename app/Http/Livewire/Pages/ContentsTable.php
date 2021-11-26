<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Modules\Pages\Entities\PagesContent;

class ContentsTable extends Component
{
    public $active, $route, $p = 'main';

    protected $listeners = [
        'preview',
    ];

    public function mount($active)
    {
        $this->active = $active;
        $this->route = route('main.index');
    }

    public function preview($id)
    {
        $this->active = $id;
        $contents = PagesContent::where('pages_id', $id)->orderBy('order')->get();

        switch ($id) {
            case 1:
                $this->route = route('main.index');
                break;
            case 2:
                $this->route = route('main.strength');
                break;
            case 3:
                $this->route = route('main.facilities');
                break;
            case 4:
                $this->route = route('main.houses');
                break;
            case 5:
                $this->route = route('main.contact');
                break;
        }

        return $contents;
    }

    public function updateStatus($id, $val)
    {
        $content = PagesContent::find($id);
        $content->update([
            'is_active' => $val,
        ]);

        $this->dispatchBrowserEvent('success', 'Status konten berhasil diperbarui');
    }

    public function delete($id)
    {
        $content = PagesContent::find($id);
        $content->forceDelete();
        $this->dispatchBrowserEvent('success', 'Konten berhasil dihapus !');
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