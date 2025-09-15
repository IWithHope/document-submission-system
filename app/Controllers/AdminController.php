<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('adminPage', ['name' => $session->get('name')]);
    }

    public function addUser()
    {
    $session = session();
    if (!$session->get('logged_in')) {
        return redirect()->to('/login'); // Ensure only logged-in users can access this page
    }
        $userTypeModel = new \App\Models\UserTypeModel(); // Create UserTypeModel to fetch user types
        $userTypes = $userTypeModel->findAll(); // Fetch all user types
    
        return view('addUser', ['userTypes' => $userTypes]); // Pass data to the view
    }

    public function removeUser()
    {
    $session = session();
    if (!$session->get('logged_in')) {
        return redirect()->to('/login'); // Ensure only logged-in users can access this page
    }

    return view('removeUser');
    }

    public function saveUser()
    {
    $session = session();
    if (!$session->get('logged_in')) {
        return redirect()->to('/login');
    }

    $userModel = new \App\Models\UserModel();

    // Collect form data
    $data = [
        'UserName'        => $this->request->getPost('username'),
        'email'           => $this->request->getPost('email'),
        'password'        => $this->request->getPost('password'), // Encrypt password
        'UserTypesId'     => $this->request->getPost('userTypesId'),
        'NameWithInitial' => $this->request->getPost('nameWithInitial'),
        'name'            => $this->request->getPost('name'),
        'LastName'        => $this->request->getPost('lastName'),
        'designation'     => $this->request->getPost('designation'),
        'StreetAddress'   => $this->request->getPost('streetAddress'),
        'City'            => $this->request->getPost('city'),
        'State'           => $this->request->getPost('state'),
        'PostalCode'      => $this->request->getPost('postalCode'),
        'contact_number'   => $this->request->getPost('contactNumber'),
        'Role'            => $this->request->getPost('role'),
    ];

    // Insert into the database
    if ($userModel->insert($data)) {
        return redirect()->to('/adminPage')->with('success', 'User added successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to add user. Please try again.');
    }
    }


    public function deleteUser()
    {
    $session = session();
    if (!$session->get('logged_in')) {
        return redirect()->to('/login');
    }

    $email = $this->request->getPost('email');

    if (empty($email)) {
        return view('removeUser', ['message' => 'Please provide a valid email.']);
    }

    $userModel = new \App\Models\UserModel();

    // Check if the user exists
    $user = $userModel->getUserByEmail($email);
    if (!$user) {
        return view('removeUser', ['message' => 'User not found.']);
    }

    // Delete the user
    if ($userModel->where('email', $email)->delete()) {
        return view('removeUser', ['message' => 'User removed successfully.']);
    }

    return view('removeUser', ['message' => 'Failed to remove user. Please try again.']);
    }

    public function addDocType()
{
    $session = session();
    if (!$session->get('logged_in')) {
        return redirect()->to('/login'); // Ensure only logged-in users can access this page
    }

    // Fetch user types from the database
    $userTypeModel = new \App\Models\UserTypeModel();
    $userTypes = $userTypeModel->whereNotIn('UserTypeName', ['Student', 'Admin', 'Super Admin'])->findAll();

    // Pass the filtered user types to the view
    return view('addDocType', ['userTypes' => $userTypes]);
}






}
