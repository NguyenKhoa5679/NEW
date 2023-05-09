<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['username', 'email', 'password', 'fullname', 'role',];

    public static function validate(array $data)
    {
        $errors = [];

        // if (!$data['email']) {
        //    $errors['email'] = 'Invalid email.';
        // } elseif (static::where('email', $data['email'])->count() > 0) {
        //    $errors['email'] = 'Email already in use.';
        // }

        if (!$data['username']) {
            $errors['username'] = 'Invalid username.';
        } elseif (static::where('username', $data['username'])->count() > 0) {
            $errors['username'] = 'username already in use.';
        }

        if (strlen($data['password']) < 6) {
            $errors['password'] = 'Password must be at least 6 characters.';
        } elseif ($data['password'] != $data['password_confirmation']) {
            $errors['password'] = 'Password confirmation does not match.';
        }

        return $errors;
    }

    public static function getUserbyIDUser($idUser)
    {
        return self::all()->where('user_id', $idUser)->first();

    }

}
