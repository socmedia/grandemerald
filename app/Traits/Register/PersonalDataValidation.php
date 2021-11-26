<?php

namespace App\Traits\Register;

trait PersonalDataValidation
{
    /**
     * Create validation rules
     *
     * @return void
     */
    protected function rules()
    {
        $regencies = array_map(function ($v) {
            return $v['id'];
        }, $this->regencies);

        return [
            'nama_lengkap' => 'required|min:3|max:199',
            'hcid' => 'required|size:12',
            'whatsapp' => 'required|min:13|max:15',
            'provinsi' => 'required',
            'kota' => 'required|in:' . implode(',', $regencies),
            'alamat' => 'required|min:5',
            'ktp' => 'required|size:16',
            'foto_ktp' => 'required|image|mimes:png,jpg,jpeg|max:512',
            'tempat_lahir' => 'required|min:3|max:199',
            'tanggal_lahir' => 'required|date',
        ];
    }

    /**
     * Create validation messages
     *
     * @return void
     */
    protected function messages()
    {
        return [
            '*.required' => ':attribute tidak boleh kosong.',
            '*.min' => ':attribute minimal :min karakter.',
            'foto_ktp.max' => ':attribute maksimal :max Kb.',
            '*.max' => ':attribute maksimal :max karakter.',
            '*.in' => 'nilai tidak tersedia.',
            '*.image' => ':attribute harus berupa gambar.',
            '*.mimes' => 'format :attribute yang diperbolehkan :mimes.',
            '*.size' => ':attribute harus :size karakter.',
        ];
    }

    /**
     * Fill the variable $tempData after next step has been triggered
     *
     * @return void
     */
    public function action()
    {
        $foto_ktp = $this->foto_ktp ? $this->foto_ktp->storePublicly(now()->toDateString(), 'images') : null;

        $this->tempData = [
            'name' => $this->nama_lengkap,
            'hcid' => $this->hcid,
            'whatsapp' => $this->whatsapp,
            'province' => $this->provinsi,
            'regency' => $this->kota,
            'address' => $this->alamat,
            'ktp' => $this->ktp,
            'ktp_photo' => url('storage/images/' . $foto_ktp),
            'place_of_birth' => $this->tempat_lahir,
            'date_of_birth' => $this->tanggal_lahir,
        ];

        $this->emitTo('auth.register.account', 'userData', $this->tempData);
    }
}