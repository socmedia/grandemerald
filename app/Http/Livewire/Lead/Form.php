<?php

namespace App\Http\Livewire\Lead;

use Exception;
use Livewire\Component;
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

        $lead = new Lead();
        $lead->lead_type = 'umum';
        $lead->name = $this->nama_lengkap;
        $lead->email = $this->email;
        $lead->phone = $this->whatsapp;
        $lead->question = $this->pertanyaan;
        $lead->status = 'belum diproses';
        $lead->save();

        try {
            // Mail::to('greenparkjogja.website@gmail.com')
            //     ->send(new ContactMail($data));
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