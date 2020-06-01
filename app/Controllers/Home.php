<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = model('App\Models\CategoryModel');
    }

    public function index()
    {
        $data = [];
        $data['categories'] = $this->categoryModel->where('parent_id', null)->findAll();
        echo view('welcome_message', $data);
    }

    public function createSubs($parentId)
    {
        $subCategories = $this->categoryModel->where('parent_id', $parentId)->findAll();

        if (!$subCategories && $parentCategory = $this->categoryModel->find($parentId)) {
            $this->categoryModel->insert([
                'title'  => $this->parseSubCategoryTitle($parentCategory, 1),
                'parent_id'  => $parentCategory['id']
            ]);
            $this->categoryModel->insert([
                'title'  => $this->parseSubCategoryTitle($parentCategory, 2),
                'parent_id'  => $parentCategory['id']
            ]);
            $subCategories = $this->categoryModel->where('parent_id', $parentId)->findAll();
        }
        return $this->respond($subCategories, 200);
    }

    protected function parseSubCategoryTitle($category, $append = '')
    {
        $subCategoryTitle = '';
        if ($category['parent_id']) {
            $subCategoryTitle  = 'SUB ' . $category['title'];
            $subCategoryTitle .= '-';
        } else {
            $categoryTitleArray = explode(' ', $category['title']);
            $subCategoryTitle  = 'SUB ' . end($categoryTitleArray);
        }
        return $subCategoryTitle . $append;
    }
}
