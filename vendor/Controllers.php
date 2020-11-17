<?php


class Controllers
{
    private $view;
    private $products;
    private $admin;

    public function __construct()
    {
        $this->view = new View();
        $this->products = new Products();
        $this->admin = new Admin();
    }

    /**
     * main()
     * отображение всех продуктов
     *
     */
    public function main()
    {
        $this->view->page = 'main';
        $this->view->render($this->products->getAllProducts());
    }

    /**
     * category()
     * отображает все товары выбранной категории
     */
    public function category()
    {
        $this->view->page = 'category';
        $category = filter_input(INPUT_GET, 'category');
        $this->view->render($this->products->getCategory($category));
    }

    /**
     * item()
     * отображение информации о продукте
     */
    public function item()
    {
        $this->view->page = 'item';
        $itemId = filter_input(INPUT_GET, 'id');
        $this->view->render($this->products->getProduct($itemId));
    }

    /**
     * admin()
     *
     */
    public function admin()
    {
        $this->view->page = 'admin';
        switch ($_GET['admin_page']) {
            case 'add_user':
                $this->view->render($this->admin->getAllUsers());
                break;
            case 'add_category':
                $this->view->render($this->admin->getAllCategories());
                break;
            default:
                $this->view->render($this->products->getAllProducts());
                break;
        }

    }

    public function login()
    {
        $check = $this->admin->checkLoginAndPass();
        if ($check) {
            $_SESSION['check'] = true;
        }
        Router::redirect();
    }

    public function logout()
    {
        $logout = filter_input(INPUT_POST, 'logout');
        if (isset($logout)) {
            session_destroy();
            Router::redirect();
        }
    }

    /**
     * add()
     * механизм добовления продукта
     */
    public function add()
    {
        $newProduct = [
            'name' => filter_input(INPUT_POST, 'name'),
            'category' => filter_input(INPUT_POST, 'category'),
            'description' => filter_input(INPUT_POST, 'description'),
            'vendorCode' => filter_input(INPUT_POST, 'vendorCode'),
            'price' => filter_input(INPUT_POST, 'price'),
        ];
        if ($this->products->addProduct($newProduct)) {
            Router::redirect();
        } else {
            $this->admin();
        }
    }

    /**
     * delete()
     * удаляет выбранный продукт
     */
    public function delete()
    {
        $delProductId = filter_input(INPUT_POST, 'delete_id');
        $this->products->deleteProduct($delProductId);
        Router::redirect();
    }

    public function deleteUser()
    {
        $id = filter_input(INPUT_POST, 'delete_user_id');
        $this->admin->deleteUser($id);
        Router::redirect();
    }

    public function addUser()
    {
        $this->admin->addNewUser();
        Router::redirect();
    }

    public function addCategory()
    {
        $this->admin->addCategory();
        Router::redirect();
    }

    public function deleteCategory()
    {
        $id = filter_input(INPUT_POST, 'delete_category_id');
        $this->admin->deleteCategory($id);
        Router::redirect();
    }
}