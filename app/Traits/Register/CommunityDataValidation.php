<?php

namespace App\Traits\Register;

use Illuminate\Validation\Rule;
use Modules\Community\Entities\Community;

trait CommunityDataValidation
{
    /**
     * Create validation rules
     *
     * @return void
     */
    protected function rules()
    {
        $provinces = array_map(function ($v) {
            return $v['id'];
        }, $this->provinces);

        $motor_types = array_map(function ($v) {
            return $v['slug_name'];
        }, $this->motor_types);

        $community_types = array_map(function ($v) {
            return $v['id'];
        }, $this->community_types);

        $regencies = array_map(function ($v) {
            return $v['id'];
        }, $this->regencies);

        return [
            'nama_komunitas' => 'required|min:3|max:199|' . Rule::unique('communities', 'name')->ignore($this->communityID),
            'jenis_sepeda_motor' => 'required|in:' . implode(',', $motor_types),
            'tipe_komunitas' => 'required|in:' . implode(',', $community_types),
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:512',
            'telepon' => 'required|min:13|max:15',
            'tanggal_berdiri' => 'required|date',
            'provinsi' => 'required|in:' . implode(',', $provinces),
            'kota' => 'required|in:' . implode(',', $regencies),
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'alamat_berkumpul' => 'required',
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
            '*.unique' => ':attribute sudah terdaftar',
            'logo.max' => ':attribute maksimal :max Kb.',
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
        $logo = $this->logo ? $this->logo->storePublicly(now()->toDateString(), 'images') : null;

        $this->tempData = [
            'id' => $this->communityID,
            'name' => $this->nama_komunitas,
            'slug_name' => slug($this->nama_komunitas),
            'motor_type' => $this->jenis_sepeda_motor,
            'community_type_id' => $this->tipe_komunitas,
            'logo_path' => url('storage/images/' . $logo),
            'date_of_birth' => $this->tanggal_berdiri,
            'province_id' => $this->provinsi,
            'regency_id' => $this->kota,
            'phone' => $this->telepon,
            'description' => xssFilter($this->deskripsi),
            'visi_misi' => json_encode([
                'visi' => xssFilter($this->visi),
                'misi' => xssFilter($this->misi),
            ]),
            'gathering_address' => $this->alamat_berkumpul,
        ];
    }

    /**
     * Store community to storage
     *
     * @return void
     */
    public function storeData()
    {
        $community = Community::find($this->communityID);
        if ($community) {
            $community->update($this->tempData);
        } else {
            Community::create($this->tempData);
        }
    }
}