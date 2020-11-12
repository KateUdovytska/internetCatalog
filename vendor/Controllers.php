<?php


class Controllers
{
    private $view;
    private $products;

    public function __construct()
    {
        $this->view = new View();
        $this->products = new Products();
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
        $category = $_SERVER['QUERY_STRING'];
        if (isset($category)) {
            $this->view->render($this->products->getCategory($category));
        }
    }

    /**
     * item()
     * отображение информации о продукте
     */
    public function item()
    {
        $this->view->page = 'item';
        $itemId = filter_input(INPUT_GET, 'itemid');
        $this->view->render($this->products->getProduct($itemId));
    }

    /**
     * admin()
     *
     */
    public function admin()
    {
        $this->view->render($this->products->getAllProducts());
    }

    /**
     * add()
     * механизм добовления продукта
     */
    public function add()
    {
        $newProduct = [
            'name' => filter_input(INPUT_POST, 'name'),
            'category_id' => filter_input(INPUT_POST, 'category_id'),
            'description' => filter_input(INPUT_POST, 'description'),
            'article' => filter_input(INPUT_POST, 'article'),
            'price' => filter_input(INPUT_POST, 'price'),
        ];
        $this->products->addProduct($newProduct);
        Router::redirect();

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

}