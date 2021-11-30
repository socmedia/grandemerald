<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Entities\ContactsAttribute;

class Edit extends Component
{
    use WithFileUploads;

    public $instagram, $facebook, $email, $whatsapp, $catalogue, $oldCatalogue, $whatsapp2, $phone;

    public function mount()
    {
        $contact = ContactsAttribute::orderBy('id')->get()->toArray();

        $this->instagram = count($contact) > 0 ? $contact[0] : null;
        $this->facebook = count($contact) > 1 ? $contact[1] : null;
        $this->email = count($contact) > 2 ? $contact[2] : null;
        $this->whatsapp = count($contact) > 3 ? $contact[3] : null;
        $oldCatalogue = count($contact) > 4 ? $contact[4] : null;
        $this->whatsapp2 = count($contact) > 5 ? $contact[5] : null;
        $this->phone = count($contact) > 6 ? $contact[6] : null;

        $catalogueArr = explode('/', $oldCatalogue['value']);
        $catalogueName = end($catalogueArr);
        $this->oldCatalogue = $oldCatalogue;
        $this->oldCatalogue['name'] = $catalogueName;
    }

    public function updateContact($id, $component)
    {
        $trim = strtolower(str_replace(' ', '_', $component));
        $contact = ContactsAttribute::where('id', $id)->firstOrFail();
        if ($component === 'Catalogue') {
            $contact->value = url('storage/' . $this->catalogue->store('files/catalogue', 'public'));
        } else {
            $contact->value = $this->$trim['value'];
        }
        $contact->save();

        $this->dispatchBrowserEvent('updated', 'Kontak berhasil diperbarui !');
    }

    public function render()
    {
        return view('livewire.contact.edit');
    }
}