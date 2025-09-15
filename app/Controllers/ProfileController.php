<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();

        // Ensure the user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userEmail = $session->get('user_email'); // Get the email from the session

        // Load the UserModel
        $userModel = new UserModel();
        $user = $userModel->getUserByEmail($userEmail);

        // Pass user details to the view
        return view('profile', ['user' => $user]);
    }

    public function editProfile()
{
    $session = session();

    // Ensure the user is logged in
    if (!$session->get('logged_in')) {
        return redirect()->to('/login');
    }

    $userEmail = $session->get('user_email'); // Get the email from the session

    // Load the UserModel
    $userModel = new UserModel();
    $user = $userModel->getUserByEmail($userEmail);

    // Pass user details to the view
    return view('editProfile', ['user' => $user]);
}

    public function updateProfile()
{
    $session = session();

    // Ensure the user is logged in
    if (!$session->get('logged_in')) {
        return redirect()->to('/login');
    }

    $userEmail = $session->get('user_email'); // Get the email from the session

    // Get the current user data
    $userModel = new UserModel();
    $user = $userModel->getUserByEmail($userEmail);

    if (!$user) {
        return redirect()->to('/profile')->with('error', 'User not found.');
    }

    // Get data from the form
    $contactNumber = $this->request->getPost('contact_number');
    $designation = $this->request->getPost('designation');

    // Check for changes
    $updateData = [];
    if ($user['contact_number'] !== $contactNumber) {
        $updateData['contact_number'] = $contactNumber;
    }
    if ($user['designation'] !== $designation) {
        $updateData['designation'] = $designation;
    }

    // If no changes, redirect with a message
    if (empty($updateData)) {
        return redirect()->to('/profile')->with('message', 'No changes were made.');
    }

    // Attempt to update the user's profile
    if ($userModel->updateUserByEmail($userEmail, $updateData)) {
        return redirect()->to('/dashboard')->with('message', 'Profile updated successfully!');
    }

    return redirect()->to('/editProfile')->with('error', 'Failed to update profile. Please try again.');
}


}
