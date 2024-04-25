<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Validators\FormValidator;
use Symfony\Component\VarDumper\VarDumper;
use function App\Controllers\view;
use Exception;

class ProductController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        parent::__construct();
        $this->productModel = new ProductModel();
    }

    public function productList()
    {
        //VarDumper::dump("helo");

        $products = $this->productModel->getAllProducts();
        $data = compact('products');
        require_once 'app/Views/product_list.php';
    }

    public function createProduct()
    {
        require_once 'app/Views/create_product.php';
    }


    public function handle_createProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $validator = new FormValidator($_POST);
            try {
                $validator->validate();
                if ($validator->validate() == false) {
                    echo "cho loi ne ";
                    exit();
                } else {
                    echo "hello";

                    echo $_POST['title'];

                    exit();
                }
                $productData = [
                    'title' => $_POST['title'],
                    'body' => $_POST['body'],
                ];


                $this->productModel->createProduct($productData);
                header('Location: /product/list');
                exit();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }



    public function productdetail()
    {
        // VarDumper::dump("helo");
        $url = isset($_GET['url']) ? "/" . rtrim($_GET['url'], '/') : '/index';
        $url_array = explode("/", $url);
        if (count($url_array) > 0) {
            $productId = $url_array[count($url_array) - 1];
        } else {
            $productId = "";
        }
        $product = $this->productModel->getProductById($productId);
        require_once 'app/Views/product_detail.php';
    }
}
