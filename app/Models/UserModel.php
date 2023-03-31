<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "watchlist";
    protected $primaryKey = "id";
    protected $allowedFields = ["object_id", "type", "title", "image", "year", "provider_link", "provider_logo", "user_name"];
}
