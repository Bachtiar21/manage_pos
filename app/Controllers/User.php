<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\AuthModel;

class User extends BaseController
{
	// Function for Get All Data
	public function getAllUser(): string
	{
		$userModel = new UserModel();
		$data['users'] = $userModel->getUserWithRoles();

		return view('admin/user_view', $data);
	}

	// Function for Get All Karyawan
	public function getAllKaryawan(): string
	{
		$userModel = new UserModel();
		$data['users'] = $userModel->getKaryawan();

		return view('admin/karyawan_view', $data);
	}

	// Function for Get Data User By Session
	public function getUserBySession() : string
	{
		$userModel = new UserModel();
		$roleModel = new RoleModel();
		$userId = session()->get('id_user');
	
		$userData = $userModel->find($userId);
		$role = $roleModel->find($userData['id_role']);
		$userData['role_name'] = $role ? $role['nama_role'] : '';

		$data['user'] = $userData;
	
		return view('karyawan/profil_view', $data);
	}
	
	// Function for Get Data Assigner By Session
	public function getAssignerBySession() : string
	{
		$userModel = new UserModel();
		$roleModel = new RoleModel();
		$userId = session()->get('id_user');
	
		$userData = $userModel->find($userId);
		$role = $roleModel->find($userData['id_role']);
		$userData['role_name'] = $role ? $role['nama_role'] : '';

		$data['user'] = $userData;
	
		return view('assigner/profil_view', $data);
	}

	// Function for Get Data By Id
	public function getUserById($id) : string 
	{
		$userModel = new UserModel();
		$roleModel = new RoleModel();
		$user = $userModel->find($id);

		if (!$user) {
			return 'User not found';
		}

		$role = $roleModel->find($user['id_role']);
		$user['role_name'] = $role ? $role['nama_role'] : '';
		// $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

		$data['user'] = $user;

		return view('admin/user_detail', $data);
	}

	// Function for Create User
	public function renderPageCreateUser(): string
	{
		$roleModel = new RoleModel();
		$data['roles'] = $roleModel->findAll();
		return view('admin/user_create', $data);
	}

	public function createUser()
	{
		$authModel = new AuthModel();

		// Mengambil data dari request
		$nama_user = $this->request->getVar('nama_user');
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$no_hp = $this->request->getVar('no_hp');
		$tgl_lahir = $this->request->getVar('tgl_lahir');
		$jabatan = $this->request->getVar('jabatan');
		$kode_angkatan = $this->request->getVar('kode_angkatan');
		$role = $this->request->getVar('id_role');
		
		// Ambil 2 digit terakhir dari tahun lahir
		$tahun_lahir = date('y', strtotime($tgl_lahir));

		$no_urut = $this->request->getVar('no_urut');

		// Membuat id_user sesuai dengan aturan NIPPOS
		$id_user = '9' . $tahun_lahir . $kode_angkatan . $no_urut;

		// Menggabungkan semua data
		$data = [
			'id_user' => $id_user,
			'nama_user' => $nama_user,
			'username' => $username,
			'password' => $password,
			'no_hp' => $no_hp,
			'tgl_lahir' => $tgl_lahir,
			'jabatan' => $jabatan,
			'id_role' => $role,
		];

		// Insert data ke database
		if ($authModel->insert($data)) {
			return redirect()->to('/dashboard/user')->with('success', 'Registrasi berhasil. Silakan login.');
		} else {
			return redirect()->back()->withInput()->with('errors', $authModel->errors());
		}
	}

	// Functin for Update Data
	public function renderPageUpdateUser($id): string
	{
		$userModel = new UserModel();
		$roleModel = new RoleModel();

		$data['user'] = $userModel->find($id);
		$data['roles'] = $roleModel->findAll();
		
		return view('admin/user_update', $data);
	}

	public function renderPageUpdateKaryawan($id): string
	{
		$userModel = new UserModel();
		$roleModel = new RoleModel();

		$data['user'] = $userModel->find($id);
		$data['roles'] = $roleModel->findAll();
		
		return view('karyawan/profil_update', $data);
	}

	public function renderPageUpdateAssigner($id): string
	{
		$userModel = new UserModel();
		$roleModel = new RoleModel();

		$data['user'] = $userModel->find($id);
		$data['roles'] = $roleModel->findAll();
		
		return view('assigner/profil_update', $data);
	}

	public function updateUser($id)
	{
		$userModel = new UserModel();
		$data = $this->request->getPost();

		if ($userModel->updateUserModel($id, $data)) {
			return redirect()->to('/dashboard/user')->with('message', 'User berhasil diupdate');
		} else {
			return redirect()->back()->withInput()->with('errors', $userModel->errors());
		}
	}

	public function updateKaryawan($id)
	{
		$userModel = new UserModel();
		$data = $this->request->getPost();

		if ($userModel->updateUserModel($id, $data)) {
			return redirect()->to('/dashboard/karyawan/profil')->with('message', 'User berhasil diupdate');
		} else {
			return redirect()->back()->withInput()->with('errors', $userModel->errors());
		}
	}

	public function updateAssigner($id)
	{
		$userModel = new UserModel();
		$data = $this->request->getPost();

		if ($userModel->updateUserModel($id, $data)) {
			return redirect()->to('/dashboard/assign/profil')->with('message', 'User berhasil diupdate');
		} else {
			return redirect()->back()->withInput()->with('errors', $userModel->errors());
		}
	}

	public function deleteUser($id)
	{
		$userModel = new UserModel();
		if ($userModel->deleteUser($id)) {
			// Debugging message
			echo "User deleted successfully";
			return redirect()->to('/dashboard/user')->with('message', 'User berhasil dihapus');
		} else {
			// Debugging message
			echo "Failed to delete user";
			return redirect()->back()->with('message', 'Gagal menghapus user');
		}
	}
}
