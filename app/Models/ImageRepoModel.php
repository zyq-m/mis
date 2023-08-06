<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageRepoModel extends Model
{
    protected $table = "image_repo";
    protected $primaryKey = "id";

    protected $allowedFields = ['path', 'descriptions'];
}
