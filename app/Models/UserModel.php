<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];
    protected $validationRules = [
        'username' => 'required|is_unique[users.username]',
        'password' => 'required|min_length[6]',
    ];
}
