<?php


class Products
{
    private $products;
    private $db;


    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
    }

    /**
     * Gets all the products from the DataBase
     * @return array
     */
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

    /**
     * Adds new product to a database and a new image to a local folder
     * @param array $newProduct
     * @return bool|mysqli_result
     */
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
            $fileName = uniqid() . $image['name'];
            $filePath = IMAGES_DIR . $fileName;
            if (move_uploaded_file($image['tmp_name'], $filePath)) {
                $_SESSION['message'] = 'Uploaded successfully';

                $name = $newProduct['name'];
                $description = $newProduct['description'];
                $price = $newProduct['price'];
                $imageName = $fileName;
                $vendorCode = $newProduct['vendorCode'];
                $category = $newProduct['category'];
                if (!is_numeric($price)) {
                    $_SESSION['message'] = 'Price must be a number';
                    unlink(IMAGES_DIR . $imageName);
                    $_SESSION['name'] = $name;
                    $_SESSION['description'] = $description;
                    $_SESSION['imageName'] = $imageName;
                    $_SESSION['vendorCode'] = $vendorCode;
                    $_SESSION['category'] = $category;
                    return false;
                } else {
                    $query = "INSERT INTO products (id, name, description, price, vendor_code, category_id, image_name) VALUES (NULL, '$name', '$description', '$price', '$vendorCode', '$category', '$imageName');";
                    return $this->db->query($query);
                }
            } else {
                $_SESSION['message'] = "Couldn't upload file";
                return false;
            }
        }
    }

    /**
     * Returns one product with the specified id
     * @param int $id
     * @return array|false
     */
    public function getProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = $id;";
        return $this->db->query($query);
    }

    /**
     * Gets all the products with the specified category
     * @param string $category
     * @return array
     */
    public function getCategory($category)
    {
        $query = "SELECT * FROM products WHERE category_id LIKE (SELECT id FROM categories WHERE name LIKE '$category');";
        $result = $this->db->query($query);
        if ($result) {
            while ($tmp = $result->fetch_assoc()) {
                $this->products[] = $tmp;
            }
        }
        return $this->products;
    }

    /**
     * Deletes the product from the DataBase
     * @param int $id
     * @return bool|mysqli_result
     */
    public function deleteProduct($id)
    {
        $query = "SELECT image_name FROM products WHERE id = $id;";
        $result = $this->db->query($query);
        $imageName = $result->fetch_row();
        if ($imageName) {
            if (unlink(IMAGES_DIR . $imageName[0])) {
                $_SESSION['message'] = 'Deleted successfully';
                $query = "DELETE FROM products WHERE id = $id;";
                return $this->db->query($query);
            }
        }
        return false;
    }
}