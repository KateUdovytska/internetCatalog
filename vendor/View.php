<?php


class View
{
    public $template = 'default';
    public $page;

    /**
     * @param array $data
     */
    public function render(array $data)
    {
        include_once 'views' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $this->template . '.php';
    }
}