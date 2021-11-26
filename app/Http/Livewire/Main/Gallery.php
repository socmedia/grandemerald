<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Gallery\Entities\Gallery as GalleryModel;

class Gallery extends Component
{
    use WithPagination;

    public $perPage = 20, $view = 'grid';

    protected $listeners = [
        'load-more' => 'loadMorePage',
    ];

    public function loadMorePage()
    {
        $this->perPage += 20;
    }

    public function getAll()
    {
        return GalleryModel::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.main.gallery', [
            'galleries' => $this->getAll(),
        ]);
    }
}