<?php
namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table = 'anime';
    protected $primaryKey = 'id_anime';
    protected $allowedFields = ['title', 'japanese_title', 'poster', 'navbar_cover', 'genre', 'score', 'type', 'status', 'total_episode', 'duration', 'release_date', 'studio', 'producer', 'synopsis'];

    public function getAllData()
    {
        return $this->findAll();
    }

    public function addData($data)
    {
        return $this->insert($data);
    }

}
