<?php


class Products
{
    private $products;
    private $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
    }

    public function getAllProducts()
    {
        $query = "SELECT * from products;";
        $result = $this->db->query($query);
        if ($result) {
            while ($tmp = $result->fetch_assoc()) {
                $this->products[] = $tmp;
            }
        }
        return $this->products;
    }

    public function addProduct(array $newProduct)
    {
        if (!file_exists(IMAGES_DIR)) {
            mkdir(IMAGES_DIR);
        }
        $image = $_FILES['image'];
        if ($image['error'] != 0) {
            $_SESSION['message'] = "An error happened with file " . $image['name'];
        } else if (!in_array($image['type'], AVAILABLE_IMAGE_TYPES)) {
            $_SESSION['message'] = "unavailable file " . $image['name'] . " type";
        } else if ($image['size'] >= MAX_IMAGE_SIZE) {
            $_SESSION['message'] = "file " . $image['name'] . " is too large";
        } else {
            $extension = pathinfo($image['name'])['extension'];
            $fileName = uniqid() . $image['name'] . '.' . $extension;
            $filePath = IMAGES_DIR . $fileName;
            if (move_uploaded_file($image['tmp_name'], $filePath)) {
                $_SESSION['message'] = 'Uploaded successfully';

                $name = $newProduct['name'];
                $description = $newProduct['description'];
                $price = $newProduct['price'];
                $vendorCode = $newProduct['vendorCode'];
                $category = $newProduct['category'];
                $imageName = $newProduct['imageName'];
                $query = "INSERT INTO products (id, name, description, price, vendor_code, category, image_name) VALUES (NULL, '$name', '$description', '$price', '$vendorCode', '$category', '$imageName');";
                return $this->db->query($query);
            } else {
                $_SESSION['message'] = "Couldn't upload file";
                return false;
            }
        }
    }

    public function getProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = $id;";
        return $this->db->query($query);
    }

    public function getCategory($category)
    {
        $query = "SELECT * FROM products WHERE category LIKE '$category';";
        $result = $this->db->query($query);
        if ($result) {
            while ($tmp = $result->fetch_assoc()) {
                $this->products[] = $tmp;
            }
        }
        return $this->products;
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE id = $id;";
        return $this->db->query($query);
    }
}