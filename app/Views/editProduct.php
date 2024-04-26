<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Sản Phẩm Mới</title>
    <link rel="stylesheet" href="<?= BASE_PATH ?>/public/css/style.css">
</head>

<body>
    <header>
        <h1>Tạo Sản Phẩm Mới</h1>
    </header>
    <?php
    require_once "nav.php";
    ?>
    <main>
        <div class="container">
            <form action="<?= BASE_PATH ?>/product/edit" method="post">
                <label for="name">Tên Sản Phẩm:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="description">Mô Tả:</label><br>
                <input type="text" id="body" name="body"><br>
                <input type="submit" value="Tạo Sản Phẩm">
                <input type="hidden" name="id" value="<?= $finalValue ?>">

            </form>
        </div>
    </main>
    <footer>&copy; 2023 BHZ Co.</footer>
</body>

</html>