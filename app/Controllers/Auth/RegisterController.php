<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;
use Illuminate\Database\Capsule\Manager;

class RegisterController extends Controller
{
    public function __construct()
    {
        if (Guard::isUserLoggedIn()) {
            redirect('/home');
        }

        parent::__construct();
    }

    public function showRegisterForm()
    {
        $data = [
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('auth/register', $data);
    }

    public function register()
    {
        $this->saveFormValues($_POST, ['password', 'password_confirmation']);

        $data = $this->filterUserData($_POST);
        $model_errors = User::validate($data);
        if (empty($model_errors)) {
            // Dữ liệu hợp lệ...
            $this->createUser($data);

            $messages = ['success' => 'User has been created successfully.'];
            redirect('/login', ['messages' => $messages]);
        }

        // Dữ liệu không hợp lệ...
        redirect('/register', ['errors' => $model_errors]);
    }

    protected function filterUserData(array $data)
    {
        return [
            'username' => $data['username'] ?? null,
            'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
            'password' => $data['password'] ?? null,
            'password_confirmation' => $data['password_confirmation'] ?? null,
            'fullname' => $data['fullname'] ?? null,
            'role' => 2
        ];
    }

    protected function createUser($data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_ARGON2ID),
            'fullname' => $data['fullname'],
            'role' => 2
        ]);


//		 Manager::insert(
        // 	'INSERT INTO users (username, password, email, fullname, create_at, update_at, role) VALUES (:username, :password, :email, :fullname, now(), now(), :role)',
        // 	[
        // 		'username' => $data['username'],
        // 		'password' => password_hash($data['password'], PASSWORD_ARGON2ID),
        // 		'email' => $data['email'],
        // 		'fullname' => $data['fullname'],
        // 		'role' => 2
        // 	]
        // );
    }
}
