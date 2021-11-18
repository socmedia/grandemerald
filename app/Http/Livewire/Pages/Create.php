<?php

namespace App\Http\Livewire\Pages;

use App\Utillities\Generate;
use App\Utillities\RouteList;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Pages\Entities\PagesContent;

class Create extends Component
{
    use WithFileUploads;

    public $name, $route_name, $section, $image, $title, $description, $is_active, $order = 1;

    public function updatedName($val)
    {
        $routes = RouteList::publicRoute();

        foreach ($routes as $route) {
            if ($route['url'] == $val) {
                $this->route_name = $route['route_name'];
            }
        }
    }

    public function savePage()
    {
        $this->validate([
            'name' => 'required|max:199',
            'route_name' => 'required|max:199',
            'section' => 'required|max:199',
            'image' => 'required|image|mimes:png,jpg|max:512',
            'title' => 'nullable|min:3|max:199',
            'description' => 'nullable|min:3',
        ]);

        PagesContent::create([
            'id' => Generate::ID(16),
            'pages_id' => ,
            'name' => $this->name,
            'route_name' => $this->route_name,
            'section' => $this->section,
            'image' => $this->image->store('images'),
            'title' => $this->title,
            'description' => $this->description,
            'is_active' => 1,
            'order' => 1,
        ]);

        $this->dispatchBrowserEvent('success', 'Halaman berhasil ditambahkan.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.create', [
            'routes' => RouteList::publicRoute(),
        ]);
    }
}