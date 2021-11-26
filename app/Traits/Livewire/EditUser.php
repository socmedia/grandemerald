<?php

namespace App\Traits\Livewire;

use App\Notifications\AccountHasBeenActivated;
use App\Notifications\AccountHasBeenApproved;
use App\User;
use Illuminate\Validation\Rule;
use Modules\Community\Entities\Community;
use Modules\UserManagement\Entities\UsersInformation;
use Modules\UserManagement\Entities\UsersSocialMedia;
use Spatie\Permission\Models\Role;

trait EditUser
{
    /**
     * User data: form validation
     *
     * @return void
     */
    public function validateUser()
    {
        $this->validate([
            'account.name' => 'required|min:3|max:199',
            'account.email' => 'required|email|' . Rule::unique('users', 'email')->ignore($this->account['id']),
            'account.hcid' => 'required|size:12',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:512',
            'account.is_approved' => 'nullable|boolean',
            'account.approved_at' => 'nullable|date',
            'account.approved_by' => 'nullable',
            'account.is_active' => 'nullable|boolean',
        ], [], [
            'account.name' => 'name',
            'account.email' => 'email',
            'account.hcid' => 'hcid',
            'photo' => 'photo',
            'account.is_approved' => 'is_approved',
            'account.approved_at' => 'approved_at',
            'account.approved_by' => 'approved_by',
            'account.is_active' => 'is_active',
        ]);
    }

    /**
     * Change password: form validation
     *
     * @return void
     */
    public function validatePassword()
    {
        $this->validate([
            'password' => 'required|min:8|max:199|confirmed',
        ]);
    }

    /**
     * User informaiton: form validation
     *
     * @return void
     */
    public function validateInformation()
    {
        $this->validate([
            'information.phone' => 'required|min:13|max:15',
            'information.province_id' => 'nullable|size:2',
            'information.regency_id' => 'nullable|size:4',
            'information.address' => 'nullable',
            'information.identity_card' => 'required|size:16',
            'photo_id' => 'nullable|image|mimes:png,jpg,jpeg|max:512',
            'information.place_of_birth' => 'required|min:3|max:199',
            'information.date_of_birth' => 'required|date',
        ], [], [
            'information.phone' => 'phone',
            'information.province_id' => 'province',
            'information.regency_id' => 'regency',
            'information.address' => 'address',
            'information.identity_card' => 'identity card',
            'photo_id' => 'photo id',
            'information.place_of_birth' => 'place of birth',
            'information.date_of_birth' => 'date of birth',
        ]);
    }

    /**
     * Update user data from resource
     *
     * @return void
     */
    public function updateUser()
    {
        // validate data
        $this->validateUser();

        // find user
        $user = $this->findUser();
        $data = $this->account;

        // check if photo has been added
        if ($this->photo) {
            // remove image from storage
            deleteImage($data['profile_photo_path']);
            $photo = $this->photo ? $this->photo->storePublicly(now()->toDateString(), 'images') : null;
            $data['profile_photo_path'] = $this->photo ? url('storage/images/' . $photo) : $data['profile_photo_path'];
        }

        $data['approved_by'] = is_array($data['approved_by']) ? $data['approved_by']['id'] : $data['approved_by'];

        // notify the user if the account has been approved
        if (!$user->is_approved && $data['is_approved']) {
            $user->notify(new AccountHasBeenApproved([
                'user_name' => $user->name,
                'email' => $user->email,
            ]));
        }

        // notify the user if the account has been activated
        if (!$user->is_active && $data['is_active']) {
            $user->notify(new AccountHasBeenActivated([
                'user_name' => $user->name,
                'email' => $user->email,
            ]));
        }

        $checkEmail = $user->email != $data['email'];

        // updating data
        $user->update(array_splice($data, 0, -3));

        if ($checkEmail) {
            redirect()->route('adm.users.profile', $user->email);
        }

        $this->reset(['photo', 'changeImage']);
    }

    /**
     * Update user password from resource
     *
     * @return void
     */
    public function updatePassword()
    {
        // validate data
        $this->validatePassword();

        // find user
        $user = $this->findUser();

        // updating data
        $user->update([
            'password' => bcrypt($this->password),
        ]);

        $this->reset(['password', 'password_confirmation']);
    }

    /**
     * Update user information from resource
     *
     * @return void
     */
    public function updateInformation()
    {
        // validate data
        $this->validateInformation();

        // find user informaiton
        $user = UsersInformation::where('user_id', $this->account['id'])->first();

        $data = $this->information;

        // remove id index from array $data
        if (array_key_exists('id', $data)) {
            unset($data['id']);
        } else {
            $data['user_id'] = $this->account['id'];
        }

        // check if identity card photo has been added
        if ($this->photo_id) {
            // delete image from storage
            deleteImage($data['identity_card_photo_path']);
            $photo = $this->photo_id->storePublicly(now()->toDateString(), 'images');
            $data['identity_card_photo_path'] = $this->photo_id ? url('storage/images/' . $photo) : $data['identity_card_photo_path'];
        }

        // updating data
        $user ? $user->update($data) : UsersInformation::create($data);
        $this->reset(['photo_id']);
    }

    public function updateSocialMedia()
    {
        $user = UsersSocialMedia::where('user_id', $this->account['id'])->get();
        $instagram = $user->where('attributes', 'instagram')->first();
        $facebook = $user->where('attributes', 'facebook')->first();

        $instagram->update([
            'values' => $this->social_medias['instagram'],
        ]);
        $instagram->save();

        $facebook->update([
            'values' => $this->social_medias['facebook'],
        ]);
        $facebook->save();
    }

    /**
     * Update user role from resource
     *
     * @return void
     */
    public function updateRole()
    {
        // find user
        $user = $this->findUser();

        // get role names from given input
        $roles = Role::whereIn('id', array_map('intval', $this->role))->select('name')->get()->toArray();

        $mapped = array_map(function ($q) {
            return $q['name'];
        }, $roles);

        // attach user with given role
        $user->syncRoles($mapped);
    }

    /**
     * Update user communities from resouurce
     *
     * @return void
     */
    public function updateCommunities()
    {
        // find user
        $user = $this->findUser();

        // get communities id from given input
        $communities = Community::whereIn('id', $this->community)->select('id')->get()->pluck('id');

        if (!$user->hasRole('anggota_komunitas')) {
            $user->assignRole('anggota_komunitas');
        }

        // attach user communities from given input
        $user->communities()->syncWithPivotValues($communities, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Find only one user from resource by passing id
     *
     * @param  string $id
     * @return object
     */
    public function findUser($id = '')
    {
        return User::where('id', $id !== '' ? $id : $this->account['id'])->first();
    }
}