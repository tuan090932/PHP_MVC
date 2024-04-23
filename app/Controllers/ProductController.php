<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Symfony\Component\VarDumper\VarDumper;

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
