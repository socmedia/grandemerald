<?php

namespace App\Http\Livewire\Gallery;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Gallery\Entities\Gallery;

class Edit extends Component
{
    use WithFileUploads, FileHandler;

    public $galleryID, $mediaType, $name, $alt, $oldMedia, $media, $oldThumbnail, $thumbnail, $url, $isActive;

    protected $listeners = [
        'getID' => 'findGallery',
    ];

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
            'url' => 'nullable|active_url|min:3|max:191',
            'thumbnail' => 'nullable|image|mimes:png,jpg,webp|max:512',
            'media' => 'nullable|' . $media,
        ];
    }

    public function mount($galleryId)
    {
        $this->findGallery($galleryId);
    }

    public function findGallery($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery) {
            $this->galleryID = $gallery->id;
            $this->mediaType = $gallery->media_type;
            $this->name = $gallery->name;
            $this->alt = $gallery->alt;
            $this->url = $gallery->references_url;
            $this->oldMedia = $gallery->media_path;
            $this->oldThumbnail = $gallery->thumbnail;
            $this->isActive = $gallery->is_active;
        }
    }

    public function editMedia()
    {
        $this->validate();

        $gallery = Gallery::find($this->galleryID);

        if ($this->mediaType === 'image') {
            $gallery->name = $this->name;

            if ($this->media) {
                $gallery->media_path = url('storage/' . $this->media->store('images/gallery', 'public'));
            }

            $gallery->alt = $this->alt ? $this->alt : $this->name;
            $gallery->references_url = $this->url;
            $gallery->position = $gallery->position;
            $gallery->is_active = $this->isActive ? 1 : 0;
        }

        if ($this->mediaType === 'video') {
            $gallery->name = $this->name;

            if ($this->media) {
                $gallery->media_path = url('storage', $this->media->store('videos/gallery', 'public'));
            }

            if ($this->thumbnail) {
                $gallery->thumbnail = url('storage', $this->thumbnail->store('images/gallery', 'public'));
            }

            $gallery->position = $gallery->position;
            $gallery->is_active = $this->isActive ? 1 : 0;
        }

        $gallery->save();

        $this->dispatchBrowserEvent('updated', 'Media berhasil diperbarui !');
    }

    public function render()
    {
        return view('livewire.gallery.edit');
    }
}