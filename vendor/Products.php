<?php


class Products
{

    public function getProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = $id;";
        return $this->db->query($query);
    }

    public function getCategory()
    {
        $category = filter_input(INPUT_GET, 'category');
        $query = "SELECT * FROM products WHERE category LIKE '$category';";
        $result = $this->db->query($query);
        if ($result) {
            while ($tmp = $result->fetch_assoc()) {
                $this->products[] = $tmp;
            }
        }
        return $this->products;
    }
}