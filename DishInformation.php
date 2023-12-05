<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dish Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('recipes.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        table {
            background-color: white;
            margin: 10px;
            border: 2px solid brown;
        }

        td, th, tr {
            padding: 7px;
        }

        button {
            width: auto;
            height: auto;
            padding: 1px;
            margin: 1px;
        }

        a {
            color: black;
        }

        .logout {
            display: flex;
            justify-content: flex-end;
        }

        div {
            display: flex;
            justify-content:space-between;
        }

        center {
            margin-top:100px;
        }
    </style>
</head>

<body>
    <p class="logout">
        <a href="Logout.php"><button type="button" id="logout" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> Log Out</button></a>
    </p>
    <center>
        <?php
        if (isset($_GET['cod']) && isset($_GET['table'])) {
$conn = new PDO('mysql:host=localhost;dbname=id21519434_recipes;charset=utf8', 'id21519434_admin', 'Palomeras2.');            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $cod = $_GET['cod'];
            $table = $_GET['table'];
            $delete = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 
            10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 
            3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 
            4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
            </svg>';
            $download = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
            </svg>';
            
            $tableNames = array('MAINCOURSES', 'SECONDCOURSES', 'APPETIZERS', 'DESSERTS');

            if (in_array($table, $tableNames)) {
                $stmt = $conn->prepare("SELECT * FROM $table WHERE COD = :cod");
                $stmt->bindParam(':cod', $cod);
                $stmt->execute();
                $product = $stmt->fetch();

                if ($product) {
                    echo "<table border='2'>";
                    echo "<tr><th>COD</th><th>QUANTITY</th><th>WEIGHT</th><th>DESCRIPTION</th><th>BRAND</th><th>IMAGE</th></tr>";
                    echo "<tr>";
                    echo "<td>" . $product['COD'] . "</td><td>" . $product['QUANTITY'] . "</td><td>" . $product['WEIGHT'] . "</td><td>"
                        . $product['DESCRIPTION'] . "</td><td>" . $product['BRAND'] . "</td>
                        <td><img src='data:image/jpeg;base64," . base64_encode($product['IMAGE']) . "' width='100' height='100' /><br><br>
                        <div><a href='data:image/jpeg;base64," . base64_encode($product['IMAGE']) . 
                        "' download='image.jpg' class='btn btn-outline-success'>" . $download . "</a>
                        <form id='delete_form_" . $product['COD'] . "' method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                        <input type='hidden' name='delete' value='" . $product['COD'] . "'>
                        <input type='hidden' id='confirm_delete_input_" . $product['COD'] . "' name='confirm_delete' value='0'> 
                        <button type='button' class='btn btn-outline-danger' onclick='confirmDelete(" . $product['COD'] . ")'>" . $delete . "</button>
                        </form></div></td>
                        ";
                    echo "</tr>";
                    echo "</table>";
                } else {
                    echo "Not found.";
                }
            } else {
                echo "Invalid table name.";
            }
        } else {
            echo "No code or table name given.";
        }
        ?>
    </center>

    <center>
        <button type="button" class="btn btn-primary" onclick="goBack()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 
                .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg> Go back
        </button>
    </center>

    <script>
        function goBack() {
            window.history.back();
        }

function confirmDelete(cod) {
            if (confirm('Are you sure you want to delete this dish?')) {
                document.getElementById('confirm_delete_input_' + cod).value = '1';
                document.getElementById('delete_form_' + cod).submit();
            }
        }
    </script>
</body>

</html>
