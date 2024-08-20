<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
	public function register(): string
	{
		// Untuk menampilkan view form registrasi
		return view('register');
	}

	public function attemptRegister()
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
			'id_role' => 2,
		];

		// Insert data ke database
		if ($authModel->insert($data)) {
			return redirect()->to('login')->with('success', 'Registrasi berhasil. Silakan login.');
		} else {
			return redirect()->back()->withInput()->with('errors', $authModel->errors());
		}
	}

	public function login(): string
	{
		// Untuk menampilkan view form registrasi
		return view('login');
	}

	public function attemptLogin()
	{
		$session = session();
		$authModel = new AuthModel();
		$usernameOrId = $this->request->getVar('username'); // Bisa username atau id_user
		$password = $this->request->getVar('password');

		// Cari pengguna berdasarkan username atau id_user
		$user = $authModel->where('username', $usernameOrId)
						->orWhere('id_user', $usernameOrId)
						->first();

		if ($user) {
			$pass = $user['password'];
			$authenticatePassword = password_verify($password, $pass);
			if ($authenticatePassword) {
				// Simpan data user dalam cookies
				$cookie = [
					'name'   => 'user_data',
					'value'  => json_encode([
						'id_user' => $user['id_user'],
						'username' => $user['username'],
					]),
					'expire' => '3600',
					'secure' => true,
				];
				helper('cookie');
				set_cookie($cookie);

				// Set data user dalam session
				$ses_data = [
					'id_user' => $user['id_user'],
					'username' => $user['username'],
					'logged_in' => TRUE
				];
				$session->set($ses_data);

				return redirect()->to('/dashboard');
			} else {
				$session->setFlashdata('msg', 'Password salah');
				return redirect()->to('/login');
			}
		} else {
			$session->setFlashdata('msg', 'Username atau ID User tidak ditemukan');
			return redirect()->to('/login');
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/login');
	}
}