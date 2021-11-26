<?php

namespace App\Traits\Livewire;

trait CreateUser
{
    /**
     * Create validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:199',
            'hcid' => 'required|size:12',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:512',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:199|confirmed',
        ];
    }
}