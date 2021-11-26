<?php

namespace App\Http\Livewire\Gallery;

use App\Services\GalleryService;
use App\Traits\Livewire\CustomTable;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Community\Entities\Community;
use Modules\Gallery\Entities\Gallery;

class UserTable extends Component
{
    use WithPagination, CustomTable;

    public $deleteId, $search = null, $perPage = null, $order = 'created_at', $sort = 'desc', $view = 'grid', $route,
    $filters = [
        'disetujui' => [
            'label' => null,
            'val' => null,
        ],
        'diupload_oleh' => [
            'label' => null,
            'val' => null,
        ],
        'komunitas' => [
            'label' => null,
            'val' => null,
        ],
    ];

    protected $listeners = [
        'load-more' => 'loadMore',
    ];

    public function mount()
    {
        $this->route = request()->routeIs('adm.gallery.trash');
        $this->view == 'grid' ? $this->perPage = 40 : $this->perPage = 20;
    }

    public function loadMore()
    {
        $this->dispatchBrowserEvent('init');
        return $this->perPage += 20;
    }

    public function getAll($data, $route)
    {
        $service = new GalleryService();
        return $service->getAll($data, $route);
    }

    public function updated($var, $val)
    {
        if (str_contains($var, 'diupload_oleh')) {
            $uploadedBy = Gallery::where('id', $val)->select('name')->first();
            $this->filters['diupload_oleh']['label'] = $uploadedBy->name;
        }

        if (str_contains($var, 'komunitas')) {
            $community = Community::where('id', $val)->select('name')->first();
            $this->filters['komunitas']['label'] = $community->name;
            $this->filters['diupload_oleh']['label'] = null;
            $this->filters['diupload_oleh']['val'] = null;
        }

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
        if ($this->route) {
            return Gallery::withTrashed()->where('id', $id)->first();
        }
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
     * Restore gallery from trash
     *
     * @param  string $id
     * @return void
     */
    public function restore($id)
    {
        $gallery = $this->findGallery($id);
        $gallery->restore();
        $this->dispatchBrowserEvent('success', 'Gambar/video berhasil dipulihkan !');
    }

    /**
     * Remove gallery from storage
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $gallery = $this->findGallery($id);
        $gallery->forceDelete();
        $this->dispatchBrowserEvent('success', 'Gambar/video berhasil dihapus !');
    }

    public function render()
    {
        $galleryFilters = [
            'search' => $this->search,
            'filters' => $this->filters,
            'perPage' => $this->perPage,
            'order' => $this->order,
            'sort' => $this->sort,
        ];

        $galleries = $this->getAll($galleryFilters, $this->route);

        $uploadedBy = array_values($galleries->groupBy('uploaded_by')->toArray());

        $gallery = [];

        foreach ($uploadedBy as $uploaded) {

            if (count($uploaded) > 0 && is_array($uploaded) && array_pop($uploaded)['uploaded_by']) {
                array_push($gallery, [
                    'id' => array_pop($uploaded)['uploaded_by']['id'],
                    'name' => array_pop($uploaded)['uploaded_by']['name'],
                ]);
            }

        }

        return view('livewire.gallery.user-table', [
            'galleries' => $galleries,
            'communities' => Community::all(['id', 'name']),
            'uploaded_by' => $gallery,
        ]);
    }
}