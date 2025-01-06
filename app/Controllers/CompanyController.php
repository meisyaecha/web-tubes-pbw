<?php


namespace App\Controllers;

use App\Models\CompanyModel;
use CodeIgniter\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        $model = new \App\Models\CompanyModel();

        // Tangkap kata kunci pencarian dari query string
        $search = $this->request->getGet('search');
        if ($search) {
            $model->like('name', $search);
        }

        // Ambil data dengan pagination
        $data['companies'] = $model->paginate(10);
        $data['pager'] = $model->pager;

        // Pass kata kunci ke view untuk menampilkan ulang
        $data['search'] = $search;

        return view('companies/index', $data);
    }


    public function add()
    {
        return view('companies/add');
    }

    public function save()
    {
    $file = $this->request->getFile('logo');
    $fileName = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $fileName = $file->getRandomName();
        $file->move('images', $fileName);
    }

    $model = new \App\Models\CompanyModel();
    $model->insert([
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'logo' => $fileName,
        'website' => $this->request->getPost('website'),
    ]);

    return redirect()->to('/companies');
    }

    public function edit($id)
    {
        $model = new \App\Models\CompanyModel();
        $data['company'] = $model->find($id);

        if (!$data['company']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Perusahaan tidak ditemukan');
        }

        return view('companies/edit', $data);
    }


    public function update($id)
    {
        $file = $this->request->getFile('logo');
        $fileName = $this->request->getPost('existing_logo');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('public/images', $fileName);
        }

        $model = new \App\Models\CompanyModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'logo' => $fileName,
            'website' => $this->request->getPost('website'),
        ]);

        return redirect()->to('/companies');
    }

    public function delete($id)
    {
        $model = new \App\Models\CompanyModel();
        $company = $model->find($id);

        if ($company && file_exists('public/images/' . $company['logo'])) {
            unlink('public/images/' . $company['logo']);
        }

        $model->delete($id);

        return redirect()->to('/companies');
    }


}


