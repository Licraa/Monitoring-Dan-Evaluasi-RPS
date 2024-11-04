<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email'];

    public function getUserWithRole()
    {
        return $this->db->table('users')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id')
            ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
            ->select('users.id, users.username, users.email, auth_groups.name AS role')
            ->get()
            ->getResultArray();
    }

    public function addUser($data)
    {
        return $this->insert($data);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
