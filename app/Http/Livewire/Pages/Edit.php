<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Pages\Entities\Page;
use Modules\Pages\Entities\PagesContent;

class Edit extends Component
{
    use WithFileUploads;

    public $page, $content, $title_normal, $title_secondary, $image, $description, $is_active,
    $order, $reference;

    protected $queryString = [
        'reference',
    ];

    public function mount()
    {
        $page = Page::where('id', $this->reference)->first();
        $this->page = $page ?: null;
        if ($page) {
            $order = $page->contents()->orderBy('order', 'desc')->first();
            $this->order = $order ? $order->order + 1 : 1;
        }

        if (request()->id) {
            $this->content = PagesContent::where('id', request()->id)->with('attributes')->first()->toArray();
        }
    }

    public function savePage()
    {
        $this->validate([
            'title_normal' => 'nullable|min:3|max:199',
            'title_secondary' => 'nullable|min:3|max:199',
            'image' => 'nullable|image|mimes:png,jpg|max:512',
            'description' => 'nullable|min:3',
        ]);

        if ($this->page) {

            $this->image
            ? $this->content['image'] = url('storage/' . $this->image->store('images', 'public'))
            : $this->image;

            $content = PagesContent::find($this->content['id']);
            $data = $this->content;
            unset($data['id']);
            $content->update($data);
        }

        $this->dispatchBrowserEvent('success', 'Konten berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.pages.edit');
    }
}