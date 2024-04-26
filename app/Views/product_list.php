<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <link rel="stylesheet" href="<?= BASE_PATH ?>/public/css/style.css">


    <style>
        /* Add your CSS here */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

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
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $product) {
                        echo "<tr>";
                        echo "<td>{$product['title']}</td>";
                        echo "<td>{$product['body']}</td>";
                        echo "<td>";
                        echo "<a href='delete/{$product['id']}'>Delete</a> | ";
                        echo "<a href='view/{$product['id']}'>View</a> |";
                        echo "<a href= 'form_editProduct/{$product['id']}'>edit</a> |";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
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