<?php

namespace App\Http\Livewire\Gallery;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Gallery\Entities\Gallery;

class Create extends Component
{
    use WithFileUploads;

    public $name = '', $alt, $url, $media, $thumbnail, $mediaType = 'image';

    protected function rules()
    {
        if ($this->mediaType === 'image') {
            $media = 'image|mimes:png,jpg,webp|max:512';
        }

        if ($this->mediaType === 'video') {
            $media = 'mimeTypes:video/mp4,video/avi|max:51200';
        }

        return [
            'name' => 'required|min:3|max:191',
            'alt' => 'nullable|min:3|max:191',
            'thumbnail' => 'nullable|image|mimes:png,jpg,webp|max:512',
            'media' => 'required|' . $media,
        ];
    }

    public function updatedMediaType()
    {
        $this->reset(['name', 'alt', 'media', 'thumbnail']);
    }

    public function createMedia()
    {
        $this->validate();

        $gallery = Gallery::latest()->first();
        $position = $gallery ? $gallery->position + 1 : 1;

        if ($this->mediaType === 'image') {
            Gallery::create([
                'media_type' => 'image',
                'name' => $this->name,
                'media_path' => url('storage/' . $this->media->store('images/gallery', 'public')),
                'alt' => $this->alt ? $this->alt : $this->name,
                'position' => $position,
                'is_active' => 1,
            ]);
        }

        if ($this->mediaType === 'video') {
            Gallery::create([
                'media_type' => 'video',
                'name' => $this->name,
                'media_path' => url('storage', $this->media->store('videos/gallery', 'public')),
                'thumbnail' => url('storage', $this->thumbnail->store('images/gallery', 'public')),
                'position' => $position,
                'is_active' => 1,
            ]);
        }

        $this->dispatchBrowserEvent('created', 'Media berhasil ditambahkan ke galeri !');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.gallery.create');
    }
}