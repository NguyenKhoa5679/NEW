<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Guard::isUserLoggedIn()) {
            redirect('/home');
        }

        $data = [
            'messages' => session_get_once('messages'),
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('auth/login', $data);
    }

    public function login()
    {
        $user_credentials = $this->filterUserCredentials($_POST);

        $errors = [];
        $user = User::where('username', $user_credentials['username'])->first();
        if (!$user) {
            // Người dùng không tồn tại...
            $errors['username'] = 'Invalid username';
        } else if (Guard::login($user, $user_credentials)) {
            // Đăng nhập thành công...
            redirect('/home');
        } else {
            // Sai mật khẩu...
            $errors['password'] = 'Invalid password.';
        }

        // Đăng nhập không thành công: lưu giá trị trong form, trừ password
        $this->saveFormValues($_POST, ['password']);
        redirect('/login', ['errors' => $errors]);
    }

    public function logout()
    {
        Guard::logout();
        redirect('/login');
    }

    protected function filterUserCredentials(array $data)
    {
        return [
            // 'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
            'username' => $data['username'] ?? null,
            'password' => $data['password'] ?? null
        ];
    }
}