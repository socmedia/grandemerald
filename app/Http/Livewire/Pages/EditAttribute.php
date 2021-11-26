<?php

namespace App\Http\Livewire\Pages;

use App\Services\Group;
use Livewire\Component;
use Modules\Pages\Entities\ContentAttribute;

class EditAttribute extends Component
{
    public $attributes, $contentId, $addMode = false, $type, $attribute, $value, $types = [];

    public function mount($contentId)
    {
        $this->init();
        $this->contentId = $contentId;

        if (!$this->attributes) {
            $this->addMode = true;
        }
    }

    public function changeMode()
    {
        $this->addMode ? $this->addMode = false : $this->addMode = true;
        $this->init();
    }

    public function init()
    {
        $group = new Group();
        $attributes = $this->getAllAttributes();
        $this->attributes = $group->GroupByEloquentData($attributes, 'type');

        $types = $group->GetGroup($attributes, 'type');
        $this->reset('types');
        foreach ($types as $i => $type) {
            $this->types[] = $i;
        }
    }

    public function createAttribute()
    {
        $content = new ContentAttribute();
        $content->create([
            'content_id' => $this->contentId,
            'type' => $this->type,
            'attribute' => $this->attribute,
            'value' => $this->value,
        ]);

        $this->dispatchBrowserEvent('success', 'Atribut berhasil ditambahkan.');
        $this->init();

        $this->reset([
            'addMode',
            'type',
            'attribute',
            'value',
        ]);
    }

    public function getAllAttributes()
    {
        return ContentAttribute::where('content_id', $this->contentId)->get();
    }

    public function saveAttribute($index, $index2)
    {
        $attribute = ContentAttribute::find($this->attributes[$index][$index2]['id']);
        $attribute->update([
            'value' => $this->attributes[$index][$index2]['value'],
        ]);

        $this->dispatchBrowserEvent('success', 'Attribut berhasil diperbarui.');
        $this->init();
    }

    public function removeAttribute($id)
    {
        ContentAttribute::destroy($id);
        $this->init();
        $this->dispatchBrowserEvent('success', 'Attribut berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.pages.edit-attribute');
    }
}