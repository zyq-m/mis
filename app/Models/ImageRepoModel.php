<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageRepoModel extends Model
{
    protected $table = "image_repo";
    protected $primaryKey = "id";

    protected $allowedFields = ['path', 'descriptions'];

    public function fake()
    {
        $faker = \Faker\Factory::create();

        return [
            'path' => $faker->imageUrl(),
            'descriptions' => $faker->paragraph
        ];
    }

    public function generateFakeImage($total)
    {
        for ($i = 0; $i < $total; $i++) {
            $this->insert($this->fake());
        }
    }
}
