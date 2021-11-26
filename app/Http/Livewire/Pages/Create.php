<?php

namespace App\Http\Livewire\Pages;

use App\Utillities\Generate;
use App\Utillities\RouteList;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Pages\Entities\Page;
use Modules\Pages\Entities\PagesContent;

class Create extends Component
{
    use WithFileUploads;

    public $page, $title_normal, $title_secondary, $image, $description, $is_active,
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
    }

    public function savePage()
    {
        $this->validate([
            'title_normal' => 'nullable|min:3|max:199',
            'title_secondary' => 'nullable|min:3|max:199',
            'image' => 'required|image|mimes:png,jpg|max:512',
            'description' => 'nullable|min:3',
        ]);

        if ($this->page) {

            PagesContent::create([
                'id' => Generate::ID(16),
                'pages_id' => $this->page->id,
                'image' => url('storage/' . $this->image->store('images', 'public')),
                'title_normal' => $this->title_normal,
                'title_secondary' => $this->title_secondary,
                'description' => $this->description,
                'is_active' => 1,
                'order' => $this->order,
            ]);
        }

        $this->dispatchBrowserEvent('success', 'Halaman berhasil ditambahkan.');
        $this->reset(['title_normal', 'title_secondary', 'image', 'description']);
    }

    public function render()
    {
        return view('livewire.pages.create', [
            'routes' => RouteList::publicRoute(),
        ]);
    }
}