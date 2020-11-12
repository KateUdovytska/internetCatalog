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
     * @todo функционал не ясен
     *
     */
    public function main()
    {

    }

    /**
     * category()
     * @todo отображает все товары выбранной категории
     */
    public function category()
    {
        $this->view->page = 'category';
        $categoryId = filter_input(INPUT_GET,'category_id');
        $this->view->render($this->products->getCategory($categoryId));
    }

    /**
     * item()
     * @todo отображение информации о продукте
     */
    public function item()
    {
        $this->view->page = 'item';
        $itemId = filter_input(INPUT_GET,'itemid');
        $this->view->render($this->products->getProduct($itemId));
    }

    /**
     * admin()
     * @todo функционал не ясен
     */
    public function admin()
    {

    }

    /**
     * add()
     * @todo механизм добовления продукта
     */
    public function add()
    {
        $newProduct = [
            'name' => filter_input(INPUT_POST, 'name'),
            'category_id' =>filter_input(INPUT_POST, 'category_id'),
            'description' => filter_input(INPUT_POST, 'description'),
            'article' => filter_input(INPUT_POST,'article'),
            'price' => filter_input(INPUT_POST,'price'),
        ];
        $this->products->addProduct($newProduct);
        Router::redirect();

    }

}