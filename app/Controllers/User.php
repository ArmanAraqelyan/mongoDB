<?php

namespace App\Controllers;

use App\Models\User as UserModel;
use CodeIgniter\Controller;

class User extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function index()
	{
	    $users = $this->users->getUsers();
        echo view('users', compact('users'));
	}

	public function create() {
        echo view('user_create');
    }

    public function store() {
        $validation = $this->validator();

        if (!$validation) {
            session()->setFlashdata(['error' =>  $this->validator]);
            return redirect()->back();
        }

        $newUser = $this->request->getPost();
        $storeUserStatus = $this->users->storeUser($newUser);

        session()->setFlashdata(['message' => $storeUserStatus]);
        return redirect()->back();
    }

	public function edit($id) {
        $user = $this->users->getUserById($id);
        echo view('user_edit', compact('user'));
    }

    public function update() {
        $validation = $this->validator();
        $id = $this->request->uri->getSegment(2);

        if (!$validation) {
            session()->setFlashdata(['error' =>  $this->validator]);
            return redirect()->back();
        }
        $editUser = $this->request->getPost();
        $updateUserStatus = $this->users->updateUser($id, $editUser);

        session()->setFlashdata(['message' => $updateUserStatus]);
        return redirect()->back();
    }

    public function delete($id) {
        $result = $this->users->deleteUser($id);
        session()->setFlashdata(['message' => $result]);
        return redirect('/');
    }

    private function validator() {
        return $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|valid_email',
            'date_of_birth' => 'required'
        ]);
    }
}
