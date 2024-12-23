<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AnimeModel;
class MainController extends BaseController
{
    protected $animeModel;

    public function __construct()
    {
        $this->animeModel = new AnimeModel();
    }

    public function index()
    {
        if (url_is('/')) {
            return redirect()->to(base_url('/anime'));
        }
        $data['anime'] = $this->animeModel
            ->select('title, poster, genre, synopsis')
            ->groupBy('id_anime')
            ->paginate(8);
        $data['pager'] = $this->animeModel->pager;
        return view('index', $data);
    }

    public function animeList()
    {
        $data['anime'] = $this->animeModel
            ->select('title')
            ->like('title', 'A', 'after')
            ->groupBy('id_anime')
            ->paginate(30);
        $data['pager'] = $this->animeModel->pager;
        return view('anime-list', $data);
    }

    public function detail($title)
    {
        $data['anime'] = $this->animeModel->where('title', $title)->first();
        return view('anime-detail', $data);
    }

    public function filter()
    {
        try {
            $request = $this->request->getJSON();
            $genre1 = $request->genre1 ?? null;
            $genre2 = $request->genre2 ?? null;

            $query = $this->animeModel->select('id_anime, title, poster, genre, synopsis');

            if ($genre1 && !$genre2) {
                $query->like('genre', $genre1);
            } else if ($genre2 && !$genre1) {
                $query->like('genre', $genre2);
            } else if ($genre1 && $genre2) {
                $query->like('genre', $genre1)->like('genre', $genre2);
            }

            $perPage = 8;
            $page = $this->request->getVar('page') ?? 1;
            $query->groupBy('id_anime');
            $result = $query->paginate($perPage, 'default', $page);
            $pager = $this->animeModel->pager;

            return $this->response->setJSON([
                'data' => $result,
                'pager' => $pager->links('default', 'custom_pager')
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Filter Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function sort()
    {
        try {
            $request = $this->request->getJSON();
            $alphabet = $request->alphabet ?? null;

            $query = $this->animeModel->select('id_anime, title');
            if ($alphabet) {
                $query->like('title', $alphabet, 'after');
            }
            $perPage = 30;
            $page = $this->request->getVar('page') ?? 1;
            $query->groupBy('id_anime');
            $result = $query->paginate($perPage, 'default', $page);
            $pager = $this->animeModel->pager;
            return $this->response->setJSON([
                'data' => $result,
                'pager' => $pager->links('default', 'custom_pager')
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Sort Error:' . $e->getMessage());
            return $this->response->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}