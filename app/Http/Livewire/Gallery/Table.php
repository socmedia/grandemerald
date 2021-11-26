<?php

namespace App\Http\Livewire\Gallery;

use App\Services\GalleryService;
use App\Traits\FileHandler;
use App\Traits\Livewire\CustomTable;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Gallery\Entities\Gallery;

class Table extends Component
{
    use WithPagination, CustomTable, FileHandler;

    public $deleteId, $search = null, $perPage = null, $order = 'created_at', $sort = 'desc', $view = 'grid';

    protected $listeners = [
        'load-more' => 'loadMore',
    ];

    public function mount()
    {
        $this->view == 'grid' ? $this->perPage = 40 : $this->perPage = 20;
    }

    public function loadMore()
    {
        $this->dispatchBrowserEvent('init');
        return $this->perPage += 20;
    }

    public function getAll($data)
    {
        $service = new GalleryService();
        return $service->getAll($data);
    }

    public function updated($var, $val)
    {
        $this->dispatchBrowserEvent('init');
    }

    /**
     * Find gallery from resource by passing id
     *
     * @param  string $id
     * @return object
     */
    public function findGallery($id)
    {
        $this->dispatchBrowserEvent('init');
        return Gallery::find($id);
    }

    /**
     * Move gallery to trash
     *
     * @param  string $id
     * @return void
     */
    public function trash($id)
    {
        $gallery = $this->findGallery($id);
        $gallery->delete();
        $this->dispatchBrowserEvent('success', 'Gambar/video berhasil dipindahkan ke tong sampah !');
    }

    /**
     * Remove gallery from storage
     *
     * @param  mixed $id
     * @return void
     */
    public function destroyMedia($id)
    {
        $media = Gallery::findOrFail($id);

        if ($media->media_path) {
            $type = $media->media_type === 'image' ? 'img_gallery' : 'vid_gallery';
            $explode = explode('/', $media->media_path);
            $this->deleteMedia(end($explode), $type);
        }

        if ($media->thumbnalil) {
            $explode = explode('/', $media->thumbnalil);
            $this->deleteMedia(end($explode), 'img_gallery');
        }

        $media->delete();

        $this->dispatchBrowserEvent('deleted', 'Media berhasil dihapus !');
    }

    public function render()
    {
        $galleryFilters = [
            'search' => $this->search,
            'perPage' => $this->perPage,
            'order' => $this->order,
            'sort' => $this->sort,
        ];

        $galleries = $this->getAll($galleryFilters);

        return view('livewire.gallery.table', [
            'galleries' => $galleries,
        ]);
    }
}