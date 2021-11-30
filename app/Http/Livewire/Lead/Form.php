<?php

namespace App\Http\Livewire\Lead;

use App\Mail\ContactMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Modules\Contact\Entities\ContactsAttribute;
use Modules\Lead\Entities\Lead;

class Form extends Component
{
    public $nama_lengkap, $whatsapp, $email, $alamat, $pertanyaan;

    protected $rules = [
        'nama_lengkap' => 'required|min:3|max:191|regex:~^[\p{L}\p{Z}]+$~u',
        'whatsapp' => 'required|min:10|max:15|regex:/^[0-9 +-]/',
        'email' => 'required|email|max:191',
        'pertanyaan' => 'required|min:10',
    ];

    protected $messages = [
        'required' => ':attribute tidak boleh kosong.',
        'min' => ':attribute minimal :min karakter.',
        'max' => ':attribute maksimal :max karakter.',
        'email' => 'format :attribute tidak sesuai',
        'nama.regex' => 'nama hanya diperbolehkan alfabet',
    ];

    public function submitForm()
    {
        $this->validate();

        $contact = ContactsAttribute::find(4);

        $text = "*Nama* : $this->nama_lengkap
*Email* : $this->email
*Whatsapp* : $this->whatsapp
*Pertanyaan* :

$this->pertanyaan";
        $url = 'https://wa.me/' . $contact->value . '?text=' . urlencode($text);

        $data = [
            'nama' => $this->nama_lengkap,
            'email' => $this->email,
            'telepon' => $this->whatsapp,
            'pertanyaan' => $this->pertanyaan,
        ];

        $this->dispatchBrowserEvent('whatsapp', $url);

        $lead = new Lead();
        $lead->lead_type = 'umum';
        $lead->name = $this->nama_lengkap;
        $lead->email = $this->email;
        $lead->phone = $this->whatsapp;
        $lead->question = $this->pertanyaan;
        $lead->status = 'belum diproses';
        $lead->save();

        try {
            Mail::to('milcahpujirahayu@gmail.com')
                ->cc('soemarmo86@gmail.com')
                ->send(new ContactMail($data));
        } catch (Exception $e) {
            //
        }

        session()->flash('success', 'Pertanyaan berhasil dikirim. Tunggu respon kami selanjutnya melalui email yang dikirimkan.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.lead.form');
    }
}