<?php

namespace App\Models;

use CodeIgniter\Model;

class CredentialsModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $allowedFields = ["name", "last_name", "user_name", "password"];
}
