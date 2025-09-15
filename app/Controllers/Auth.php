<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']); // Load form helper
        echo view('auth/login');
    }

    public function loginSubmit()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validate user credentials
        $user = $model->validateUser($email, $password);

        if ($user) {
            $sessionData = [
                'user_id' => $user['id'],
                'user_email' => $user['email'],
                'Role' => $user['Role'], // Assuming 'role' field exists in the database
                'logged_in' => true,
            ];
            $session->set($sessionData);

            // Redirect based on role
            if ($user['Role'] === 'Admin') {
                return redirect()->to('/adminPage');
            } elseif ($user['Role'] === 'User') {
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Invalid role assigned.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Invalid Email or Password');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login')->with('message', 'You have been logged out.');
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        echo view('dashboard');
    }

    public function adminPage()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        echo view('adminPage');
    }
}


/*
<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']); // Load form helper
        echo view('auth/login');
    }

    public function loginSubmit()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->validateUser($email, $password);

        if ($user) {
            $session->set([
                'user_id' => $user['id'],
                'user_email' => $user['email'],
                'logged_in' => true,
            ]);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'Invalid Email or Password');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login')->with('message', 'You have been logged out.');
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        echo view('dashboard');
    }
}
*/