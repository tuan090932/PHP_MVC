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

    public function form_editProduct()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        $url .= $_SERVER['HTTP_HOST'];
        $url .= $_SERVER['REQUEST_URI'];
        $urlParts = parse_url($url);
        $url = $urlParts;

        // Split the path by '/'
        $pathParts = explode('/', $url['path']);

        // Get the last part of the path, which should be the final value
        $finalValue = end($pathParts);

        echo $finalValue;

        compact($finalValue);

        require_once 'app/Views/editProduct.php';
    }


    public function handle_deleteProduct()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        $url .= $_SERVER['HTTP_HOST'];
        $url .= $_SERVER['REQUEST_URI'];
        $urlParts = parse_url($url);
        $url = $urlParts;

        // Split the path by '/'
        $pathParts = explode('/', $url['path']);

        // Get the last part of the path, which should be the final value
        $finalValue = end($pathParts);

        echo $finalValue;

        $product = $this->productModel->deleteProduct($finalValue);
    }


    public function handle_edit()
    {

        if (isset($_POST['id'])) {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $product = [
                'title' => $title,
                'body' => $body,
            ];

            $this->productModel->editProduct($_POST['id'], $product);
        }
    }

    public function handle_viewProduct()
    {



        // VarDumper::dump("helo");
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        // Append the host(domain name, ip) to the URL.   
        $url .= $_SERVER['HTTP_HOST'];
        // Append the requested resource location to the URL   
        $url .= $_SERVER['REQUEST_URI'];
        // Phân tích URL
        $urlParts = parse_url($url);
        //  echo $urlParts;
        // echo $urlParts['path'];

        $url = $urlParts;

        // Split the path by '/'
        $pathParts = explode('/', $url['path']);

        // Get the last part of the path, which should be the final value
        $finalValue = end($pathParts);

        echo $finalValue;








        $product = $this->productModel->getProductById($finalValue);
        echo "<script>alert('Title: " . $product['title'] . "\\nBody: " . $product['body'] . "');</script>";

        //require_once 'app/Views/product_detail.php';
    }
}
