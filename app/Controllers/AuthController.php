<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginForm()
    {
        if (session()->get('logged_in') === true) {
            return redirect()->to('/tasks');
        }

        return view('auth/login');
    }

    public function login()
    {
        $rules = [
            'username' => 'required|max_length[50]',
            'password' => 'required|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return view('auth/login', ['errors' => $this->validator->getErrors()]);
        }

        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if (!$user || empty($user['password']) || !password_verify($password, $user['password'])) {
            return view('auth/login', [
                'errors' => ['credentials' => 'Invalid username or password.'],
                'username' => $username,
            ]);
        }

        session()->regenerate(true);
        session()->set([
            'user_id'  => (int) $user['id'],
            'username' => $user['username'],
            'logged_in' => true,
        ]);

        return redirect()->to('/tasks')->with('success', 'Login successful.');
    }

    public function logout()
    {
        session()->remove(['user_id', 'username', 'logged_in']);
        session()->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
