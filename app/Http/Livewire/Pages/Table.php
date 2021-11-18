<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Pages\Entities\Page;

class Table extends Component
{
    use WithPagination;

    public $perPage = 10, $search = '', $p = 'main', $active = 1;

    protected $queryString = [
        'p',
    ];

    public function getAll($search)
    {
        $page = Page::orderBy('created_at', 'desc');

        if ($search !== '') {
            $page->where(function ($page) use ($search) {
                $page->where('name', 'like', '%' . $search . '%')
                    ->orWhere('created_at', 'like', '%' . $search . '%');
            });
        }

        if ($this->p == 'trash') {
            $page->onlyTrashed();
        }

        return $page->simplePaginate($this->perPage);
    }

    public function preview($val)
    {
        $this->active = $val;
        $this->emitTo('pages.contents-table', 'preview', $val);
    }

    public function updateStatus($id, $active)
    {
        $page = Page::find($id);
        $page->is_active = $active ?: 0;
        $page->save();

        $this->dispatchBrowserEvent('status-updated', 'Status halaman berhasil diperbarui.');
    }

    public function trash($id)
    {
        $page = Page::find($id);
        $page->delete();

        $this->dispatchBrowserEvent('status-updated', 'Halaman berhasil dipindahkan ke tempat sampah.');
    }

    public function restore($id)
    {
        $page = Page::withTrashed()->where('id', $id)->first();
        $page->restore();

        $this->dispatchBrowserEvent('status-updated', 'Halaman berhasil di pulihkan.');
    }

    public function delete($id)
    {
        $page = Page::withTrashed()->where('id', $id)->first();
        $page->forceDelete();

        $this->dispatchBrowserEvent('status-updated', 'Halaman berhasil di hapus permanen.');
    }

    public function render()
    {
        return view('livewire.pages.table', [
            'pages' => $this->getAll(
                $this->search
            ),
        ]);
    }
}