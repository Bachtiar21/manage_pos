<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_user', 'no_hp', 'id_role', 'username', 'password', 'tgl_lahir', 'jabatan', 'tgl_lahir'];

    // Untuk Get All
    public function getUserWithRoles()
    {
        return $this->select('users.*, roles.nama_role')
            ->join('roles', 'roles.id_role = users.id_role')
            ->findAll();
    }

    // Untuk Get All Karyawan
    public function getKaryawan()
    {
        return $this->select('users.*, roles.nama_role')
            ->join('roles', 'roles.id_role = users.id_role')
            ->where('users.id_role', 2)
            ->findAll();
    }

    // Untuk Create User
    public function createUser($data)
    {
        return $this->insert($data);
    }

    // Untuk Update Data
    public function updateUserModel($id, $data)
    {
        return $this->update($id, $data);
    }

    // Untuk Delete Data
    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    // Untuk Get User by ID
    public function getUserById($id)
    {
        return $this->find($id);
    }
}
?>
