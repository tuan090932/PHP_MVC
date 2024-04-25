<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <link rel="stylesheet" href="<?= BASE_PATH ?>/public/css/style.css">
</head>

<body>

    <header>
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </header>

    <?php
    require_once "nav.php";
    ?>
    <main>
        <div class="container">
            <div class="left-box">
                <h2>Danh Mục</h2>
                <ul>

                    <li>

                        <?php
                        foreach ($products as $product) {
                            echo "<p>{$product['body']}</p>";
                        }
                        ?>
                    </li>
                </ul>
            </div>

            <div class="right-box">
                <div class="product-box">

                </div>

                <div class="pagination">

                </div>
            </div>
        </div>
    </main>
    <footer>&copy; 2023 BHZ Co.</footer>

</body>

</html>