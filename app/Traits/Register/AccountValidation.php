<?php

namespace App\Traits\Register;

use App\Notifications\RegisteredAsCommunity;
use App\User;
use App\Utillities\Generate;
use Illuminate\Support\Facades\Auth;
use Modules\UserManagement\Entities\UsersInformation;
use Modules\UserManagement\Entities\UsersSocialMedia;

trait AccountValidation
{
    /**
     * Create validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'nama_lengkap' => 'required|max:199',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:199|confirmed',
        ];
    }

    /**
     * Create validation message
     *
     * @return void
     */
    protected function messages()
    {
        return [
            '*.required' => ':attribute tidak boleh kosong.',
            '*.min' => ':attribute minimal :min karakter.',
            '*.unique' => ':attribute sudah terdaftar',
            '*.max' => ':attribute maksimal :max karakter.',
            '*.confirmed' => ':attribute tidak sama.',
        ];
    }

    /**
     * Store data to resource
     *
     * @return void
     */
    public function storeData()
    {
        $userID = Generate::ID(32);
        // Create Users
        $this->createUser($userID);

        $user = User::find($userID);
        $this->attachRoleForUser($user, $userID);

        // Create user information
        $this->createUserInformation($userID);

        // Notify user
        $this->notifyUser($user);

        Auth::login($user);
    }

    /**
     * Create user to resource
     *
     * @param  string $id
     * @return void
     */
    public function createUser($id)
    {
        User::create([
            'id' => $id,
            'hcid' => $this->hcid,
            'name' => $this->nama_lengkap,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->createUserSocialMedia($id);
    }

    /**
     * Attach role to user
     *
     * @param  object $user
     * @param  string $id
     * @return void
     */
    public function attachRoleForUser($user, $id)
    {
        // Give user role
        $user->assignRole('pemilik_komunitas');

        // Attach relation between users and community
        $user->communities()->attach($this->communityID, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Store user information to resource
     *
     * @param  string $id
     * @return void
     */
    public function createUserInformation($id)
    {
        UsersInformation::create([
            'user_id' => $id,
            'phone' => $this->userData['whatsapp'],
            'province_id' => $this->userData['province'],
            'regency_id' => $this->userData['regency'],
            'address' => $this->userData['address'],
            'identity_card' => $this->userData['ktp'],
            'identity_card_photo_path' => $this->userData['ktp_photo'],
            'place_of_birth' => $this->userData['place_of_birth'],
            'date_of_birth' => $this->userData['date_of_birth'],
        ]);
    }

    /**
     * Store user social media to resource
     *
     * @param  mixed $id
     * @return void
     */
    public function createUserSocialMedia($id)
    {
        UsersSocialMedia::insert([
            [
                'user_id' => $id,
                'attributes' => 'instagram',
                'values' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'user_id' => $id,
                'attributes' => 'facebook',
                'values' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ]);
    }

    /**
     * Notify user by email
     *
     * @param  object $user
     * @return void
     */
    public function notifyUser($user)
    {
        // Notify the user if he has successfully registered
        $user->notify(new RegisteredAsCommunity([
            'user_name' => $this->nama_lengkap,
            'email' => $this->email,
        ]));

        // Notify user if he need verify his email
        $user->sendEmailVerificationNotification();
    }
}