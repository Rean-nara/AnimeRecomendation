<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;
use App\Models\AnimeModel;

class DashboardController extends BaseController
{
    protected $adminModel;
    protected $animeModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->animeModel = new AnimeModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'username' => session()->get('username'),
            'profilepics' => session()->get('profilepics'),
            'role' => session()->get('role')
        ];

        return view('dashboard/content/home', $data);
    }

    public function login()
    {
        return view('dashboard/login');
    }

    public function auth()
    {
        // Input validation
        if (
            !$this->validate([
                'email' => 'required',
                'password' => 'required'
            ])
        ) {
            return redirect()->back()->withInput()->with('error', 'Please fill in all fields.');
        }

        $inputUsername = htmlspecialchars($this->request->getPost('email', FILTER_UNSAFE_RAW));
        $inputPassword = htmlspecialchars($this->request->getPost('password', FILTER_UNSAFE_RAW));

        $user = $this->adminModel->where('email', $inputUsername)->first();

        if ($user) {
            // Password Verification
            if (password_verify($inputPassword, $user['password'])) {
                // Captcha Verification
                $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
                $secretKey = '6Ld80YUqAAAAAO-x6KF3WkqyeFSOL6CoKnYcgbsF';

                $url = 'https://www.google.com/recaptcha/api/siteverify';
                $response = file_get_contents($url . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
                $responseKeys = json_decode($response, true);

                if (!$responseKeys['success']) {
                    return redirect()->back()->with('error', 'Captcha verification failed.');
                }

                // Login
                session()->set([
                    'id_admin' => $user['id_admin'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'profilepics' => $user['profilepics'],
                    'fullname' => $user['fullname'],
                    'role' => $user['role'],
                    'isLoggedIn' => TRUE
                ]);
                return redirect()->to(base_url('/dashboard'));
            } else {
                return redirect()->back()->with('error', 'User not found.');
            }
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
    public function profile()
    {
        $admin = [
            'id_admin' => session()->get('id_admin'),
            'username' => session()->get('username'),
            'email' => session()->get('email'),
            'profilepics' => session()->get('profilepics'),
            'fullname' => session()->get('fullname'),
            'role' => session()->get('role')
        ];
        return view('dashboard/content/profile', $admin);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
    public function manageData()
    {
        $admin = [
            'username' => session()->get('username'),
            'profilepics' => session()->get('profilepics'),
            'role' => session()->get('role')
        ];
        $data['anime'] = $this->animeModel->groupBy('id_anime')->paginate(5);
        $data['pager'] = $this->animeModel->pager;
        return view('dashboard/content/manage-data', $data + $admin);
    }
    public function getTableData()
    {
        $search = $this->request->getVar('search') ?? '';
        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;
        $this->animeModel->like('title', $search, 'after');
        $data = $this->animeModel->groupBy('id_anime')->paginate($perPage, 'default', $page);
        $pager = $this->animeModel->pager->links('default', 'custom_pager_dashboard');
        return $this->response->setJSON([
            'data' => $data,
            'pager' => $pager,
        ]);
    }
    public function createData()
    {
        if (
            !$this->validate([
                'title' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Title is required.',
                        'max_length' => 'Title cannot exceed 50 characters.',
                    ],
                ],
                'poster' => [
                    'rules' => 'uploaded[poster]|max_size[poster,200]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Poster is required.',
                        'max_size' => 'Poster must not exceed 200KB.',
                        'is_image' => 'Uploaded file must be an image.',
                        'mime_in' => 'Only JPG and PNG formats are allowed.',
                    ],
                ],
                'nav-cover' => [
                    'rules' => 'uploaded[nav-cover]|max_size[nav-cover,200]|is_image[nav-cover]|mime_in[nav-cover,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Nav cover is required.',
                        'max_size' => 'Nav cover must not exceed 200KB.',
                        'is_image' => 'Uploaded file must be an image.',
                        'mime_in' => 'Only JPG and PNG formats are allowed.',
                    ],
                ],
                'genre' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Genre is required.',
                        'max_length' => 'Genre cannot exceed 50 characters.',
                    ],
                ],
                'synopsis' => [
                    'rules' => 'required|max_length[250]',
                    'errors' => [
                        'required' => 'Synopsis is required.',
                        'max_length' => 'Synopsis cannot exceed 250 characters.',
                    ],
                ],
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $imgPoster = $this->request->getFile('poster');
        $renameImg = $imgPoster->getRandomName();
        $imgPoster->move(FCPATH . '/uploads/data/', $renameImg);

        $imgNavcover = $this->request->getFile('nav-cover');
        $renameNav = $imgNavcover->getRandomName();
        $imgNavcover->move(FCPATH . '/uploads/data/', $renameNav);

        $data = ([
            'title' => $this->request->getPost('title'),
            'japanese_title' => $this->request->getPost('j-title'),
            'poster' => $renameImg,
            'navbar_cover' => $renameNav,
            'genre' => $this->request->getPost('genre'),
            'score' => $this->request->getPost('score'),
            'type' => $this->request->getPost('type'),
            'status' => $this->request->getPost('status'),
            'total_episode' => $this->request->getPost('total_eps'),
            'duration' => $this->request->getPost('duration'),
            'release_date' => $this->request->getPost('release'),
            'studio' => $this->request->getPost('studio'),
            'synopsis' => $this->request->getPost('synopsis'),
            'producer' => $this->request->getPost('producer'),
        ]);

        $this->animeModel->addData($data);
        return redirect()->back()->with('success', 'Data has been saved!');
    }

    public function deleteData($id)
    {
        $anime = $this->animeModel->find($id);
        if ($anime) {
            $posterPath = FCPATH . '/uploads/data/' . $anime['poster'];
            $navbarCoverPath = FCPATH . '/uploads/data/' . $anime['navbar_cover'];
            if (is_file($posterPath)) {
                unlink($posterPath);
            }
            if (is_file($navbarCoverPath)) {
                unlink($navbarCoverPath);
            }
            $this->animeModel->delete($id);
            return redirect()->back()->with('success', 'Data has been deleted!');
        }
    }
    public function editData()
    {
        $validationRules = [
            'title' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Title is required.',
                    'max_length' => 'Title cannot exceed 50 characters.',
                ],
            ],
            'genre' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Genre is required.',
                    'max_length' => 'Genre cannot exceed 50 characters.',
                ],
            ],
            'synopsis' => [
                'rules' => 'required|max_length[250]',
                'errors' => [
                    'required' => 'Synopsis is required.',
                    'max_length' => 'Synopsis cannot exceed 250 characters.',
                ],
            ]
        ];
        $id = $this->request->getPost('id_anime');
        $oldPoster = $this->request->getPost('old-poster');
        $oldNavCover = $this->request->getPost('old-nav-cover');
        $poster = $this->request->getFile('poster');
        $navCover = $this->request->getFile('nav-cover');
        if ($poster->isValid()) {
            $validationRules['poster'] = [
                'rules' => 'uploaded[poster]|max_size[poster,200]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Poster is required.',
                    'max_size' => 'Poster must not exceed 200KB.',
                    'is_image' => 'Uploaded file must be an image.',
                    'mime_in' => 'Only JPG and PNG formats are allowed.',
                ],
            ];
        }
        if ($navCover->isValid()) {
            $validationRules['nav_cover'] = [
                'rules' => 'uploaded[nav-cover]|max_size[nav-cover,200]|is_image[nav-cover]|mime_in[nav-cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Nav cover is required.',
                    'max_size' => 'Nav cover must not exceed 200KB.',
                    'is_image' => 'Uploaded file must be an image.',
                    'mime_in' => 'Only JPG and PNG formats are allowed.',
                ],
            ];
        }
        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        // poster img check, delete replace and delete older poster
        if ($poster->isValid() && !$poster->hasMoved()) {
            $renamePoster = $poster->getRandomName();
            $poster->move(FCPATH . '/uploads/data/', $renamePoster);
            $savePoster = $renamePoster;
            $oldPosterPath = FCPATH . '/uploads/data/' . $oldPoster;
            if (is_file($oldPosterPath)) {
                unlink($oldPosterPath);
            }
        } else {
            $savePoster = $oldPoster;
        }

        // nav cover img check, delete replace and delete older nav cover
        if ($navCover->isValid() && !$navCover->hasMoved()) {
            $renameNavCover = $navCover->getRandomName();
            $navCover->move(FCPATH . '/uploads/data/', $renameNavCover);
            $saveNavCover = $renameNavCover;
            $oldNavCoverPath = FCPATH . '/uploads/data/' . $oldNavCover;
            if (is_file($oldNavCoverPath)) {
                unlink($oldNavCoverPath);
            }
        } else {
            $saveNavCover = $oldNavCover;
        }

        $this->animeModel->update($id, [
            'title' => $this->request->getPost('title'),
            'japanese_title' => $this->request->getPost('j-title'),
            'poster' => $savePoster,
            'navbar_cover' => $saveNavCover,
            'genre' => $this->request->getPost('genre'),
            'score' => $this->request->getPost('score'),
            'type' => $this->request->getPost('type'),
            'status' => $this->request->getPost('status'),
            'total_episode' => $this->request->getPost('total_eps'),
            'duration' => $this->request->getPost('duration'),
            'release_date' => $this->request->getPost('release'),
            'studio' => $this->request->getPost('studio'),
            'producer' => $this->request->getPost('producer'),
            'synopsis' => $this->request->getPost('synopsis'),
        ]);
        if (strtolower($this->request->getMethod() !== 'post')) {
            return redirect()->back()->with('success', 'Data has been changes!');
        }
    }

    public function editProfile()
    {
        $validationRules = [
            'fullname' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Full name is required.',
                    'max_length' => 'Full name cannot exceed 50 characters.',
                ],
            ],
            'username' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Username is required.',
                    'max_length' => 'Username cannot exceed 50 characters.',
                ],
            ],
            'email' => [
                'rules' => 'required|max_length[50]|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'max_length' => 'Email cannot exceed 50 characters.',
                    'valid_email' => 'Please provide a valid email address.',
                ],
            ],
        ];
        $id = $this->request->getPost('id_admin');
        $oldPP = $this->request->getPost('old_pp');
        $newPP = $this->request->getFile('new_pp');
        if ($newPP->isValid()) {
            $validationRules['new_pp'] = [
                'rules' => 'uploaded[new_pp]|max_size[new_pp,100]|is_image[new_pp]|mime_in[new_pp,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Profile picture is required.',
                    'max_size' => 'Profile picture must not exceed 100KB.',
                    'is_image' => 'Uploaded file must be an image.',
                    'mime_in' => 'Only JPG and PNG formats are allowed.',
                ],
            ];
        }
        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        if ($newPP->isValid() && !$newPP->hasMoved()) {
            $renamePP = $newPP->getRandomName();
            $newPP->move(FCPATH . '/uploads/admin/', $renamePP);
            $savePP = $renamePP;
            $oldPPPath = FCPATH . '/uploads/admin/' . $oldPP;
            if (is_file($oldPPPath)) {
                unlink($oldPPPath);
            }
        } else {
            $savePP = $oldPP;
        }
        $this->adminModel->update($id, [
            'username' => $this->request->getPost('username'),
            'profilepics' => $savePP,
            'email' => $this->request->getPost('email'),
            'fullname' => $this->request->getPost('fullname'),
        ]);
        $updatedUser = $this->adminModel->find($id);
        session()->set([
            'username' => $updatedUser['username'],
            'profilepics' => $updatedUser['profilepics'],
            'email' => $updatedUser['email'],
            'fullname' => $updatedUser['fullname'],
        ]);
        if (strtolower($this->request->getMethod() !== 'post')) {
            return redirect()->back()->with('success', 'Profile updated successfully!');
        }
    }
    public function manageAdmin()
    {
        $admin = [
            'username' => session()->get('username'),
            'profilepics' => session()->get('profilepics'),
            'role' => session()->get('role')
        ];
        $data['datas'] = $this->adminModel->groupBy('id_admin')->paginate(10);
        $data['pager'] = $this->adminModel->pager;
        return view('/dashboard/content/manage-admin', $data + $admin);
    }
    public function getTableAdmin()
    {
        $search = $this->request->getVar('search') ?? '';
        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;
        $this->adminModel->like('username', $search, 'after');
        $data = $this->adminModel->groupBy('id_admin')->paginate($perPage, 'default', $page);
        $pager = $this->adminModel->pager->links('default', 'custom_pager_dashboard');
        return $this->response->setJSON([
            'data' => $data,
            'pager' => $pager,
        ]);
    }
    public function createAdmin()
    {
        if (
            !$this->validate([
                'fullname' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Full name is required.',
                        'max_length' => 'Full name cannot exceed 50 characters.',
                    ],
                ],
                'username' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Username is required.',
                        'max_length' => 'Username cannot exceed 50 characters.',
                    ],
                ],
                'email' => [
                    'rules' => 'required|max_length[50]|valid_email',
                    'errors' => [
                        'required' => 'Email is required.',
                        'max_length' => 'Email cannot exceed 50 characters.',
                        'valid_email' => 'Please provide a valid email address.',
                    ],
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[255]',
                    'errors' => [
                        'required' => 'Password is required.',
                        'min_length' => 'Password must be at least 5 characters.',
                        'max_length' => 'Password cannot exceed 255 characters.',
                    ],
                ],
                'confpassword' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Password confirmation is required.',
                        'matches' => 'Password confirmation does\'nt match.',
                    ],
                ],
                'new_pp' => [
                    'rules' => 'uploaded[new_pp]|max_size[new_pp,100]|is_image[new_pp]|mime_in[new_pp,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Profile picture is required.',
                        'max_size' => 'Profile picture must not exceed 100KB.',
                        'is_image' => 'Uploaded file must be an image.',
                        'mime_in' => 'Only JPG and PNG formats are allowed.',
                    ],
                ],
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $profilePics = $this->request->getFile('new_pp');
        $renamePP = $profilePics->getRandomName();
        $profilePics->move(FCPATH . '/uploads/admin/', $renamePP);
        $password = $this->request->getPost('password');
        $confpassword = $this->request->getPost('confpassword');
        if ($password !== $confpassword) {
            return redirect()->to(base_url('/dashboard/manage/admin'))->with('error', 'Password not match!');
        } else if ($password == $confpassword) {
            $result = password_hash($password, PASSWORD_DEFAULT);
        }
        $data = ([
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'password' => $result,
            'role' => $this->request->getPost('role'),
            'email' => $this->request->getPost('email'),
            'profilepics' => $renamePP,
        ]);
        $this->adminModel->addData($data);
        return redirect()->back()->with('success', 'Data has been saved!');
    }
    public function editAdmin()
    {
        $validationRules = [
            'fullname' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Full name is required.',
                    'max_length' => 'Full name cannot exceed 50 characters.',
                ],
            ],
            'username' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Username is required.',
                    'max_length' => 'Username cannot exceed 50 characters.',
                ],
            ],
            'email' => [
                'rules' => 'required|max_length[50]|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'max_length' => 'Email cannot exceed 50 characters.',
                    'valid_email' => 'Please provide a valid email address.',
                ],
            ],
        ];
        $id = $this->request->getPost('id_admin');
        $password = $this->request->getPost('password');
        $oldPP = $this->request->getPost('old_pp');
        $profilepics = $this->request->getFile('new_pp');
        if (!empty($password)) {
            $validationRules['password'] = [
                'rules' => 'required|min_length[5]|max_length[255]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must be at least 5 characters.',
                    'max_length' => 'Password cannot exceed 255 characters.',
                ]
            ];
            $validationRules['confpassword'] = [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password confirmation is required.',
                    'matches' => 'Password confirmation does\'nt match.',
                ],
            ];
        }
        if ($profilepics->isValid()) {
            $validationRules['new_pp'] = [
                'rules' => 'uploaded[new_pp]|max_size[new_pp,100]|is_image[new_pp]|mime_in[new_pp,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Profile picture is required.',
                    'max_size' => 'Profile picture must not exceed 100KB.',
                    'is_image' => 'Uploaded file must be an image.',
                    'mime_in' => 'Only JPG and PNG formats are allowed.',
                ],
            ];
        }
        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        if ($profilepics->isValid() && !$profilepics->hasMoved()) {
            $renamePP = $profilepics->getRandomName();
            $profilepics->move(FCPATH . '/uploads/admin/', $renamePP);
            $savePP = $renamePP;
            $oldPPPath = FCPATH . '/uploads/admin/' . $oldPP;
            if (is_file($oldPPPath)) {
                unlink($oldPPPath);
            }
        } else {
            $savePP = $oldPP;
        }
        $updateData = [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'role' => $this->request->getPost('role'),
            'email' => $this->request->getPost('email'),
            'profilepics' => $savePP,
        ];
        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $this->adminModel->update($id, $updateData);
        if (strtoLower($this->request->getMethod() !== 'post')) {
            return redirect()->back()->with('success', 'Data has been changes!');
        }
    }
    public function deleteAdmin($id)
    {
        $data = $this->adminModel->find($id);
        if ($data) {
            $profilepics = FCPATH . '/uploads/admin/' . $data['profilepics'];
            if (is_file($profilepics)) {
                unlink($profilepics);
            }
            $this->adminModel->delete($id);
            return redirect()->back()->with('success', 'Data has been deleted!');
        }
    }
}
