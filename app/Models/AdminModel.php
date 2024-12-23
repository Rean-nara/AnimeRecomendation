<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'email', 'password', 'profilepics', 'fullname', 'role'];

    public function getAllData()
    {
        return $this->findAll();
    }

    public function addData($data)
    {
        return $this->insert($data);
    }

    public function getDataId($id_admin)
    {
        return $this->find($id_admin);
    }
}
