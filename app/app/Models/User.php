<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_roles', null, null, null, 'role_id');
    }

    public function hasRole($role_name)
    {
        return null !== $this->roles()->where('role_name', $role_name)->first();
    }

    public function getRoleNameById($role_ids, $role_name)
    {
        return in_array($this->roles()->where('role_name', $role_name)->first()->role_id, $role_ids);
    }

    public function getRoleIdByName($role_name)
    {
        return DB::table('roles')->where('role_name', $role_name)->first()->role_id;
    }

    public function getIdOfDistrictOperator($user_id)
    {
        $ret = DB::table('user_roles')
            ->whereExists(function ($query) use($user_id) {
                $query
                ->select('additional_code')
                ->where('user_id', $user_id)
                ->where('role_id', $this->getRoleIdByName('operator_raion'));
            })
            ->first();

        return $ret ? $ret->additional_code : null;
    }
}
