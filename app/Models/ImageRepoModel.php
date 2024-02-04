<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageRepoModel extends Model
{
    protected $table = "image_repo";
    protected $primaryKey = "id";

    protected $allowedFields = ['file_name', 'path', 'descriptions', 'screening_date', 'screening_time', 'myKad', 'hospital', 'session', 'time_stamp'];

    public function fake()
    {
        $faker = \Faker\Factory::create();

        return [
            'path' => $faker->imageUrl(),
            'descriptions' => $faker->paragraph,
            'screening_date' => $faker->date,
            'screening_time' => $faker->time
        ];
    }

    public function generateFakeImage($total)
    {
        for ($i = 0; $i < $total; $i++) {
            $this->insert($this->fake());
        }
    }
}
