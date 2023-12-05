<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
</head>

<style>
    body {
        background-image: url('recipes.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    body {
        margin-top: 20%;
    }
    
    p {
        color:white;
        width: 40%;
        background-color:black;
    }
</style>

<body>
    <center>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $table = $_POST["table"];
            $quantity = $_POST["quantity"];
            $weight = $_POST["weight"];
            $description = $_POST["description"];
            $brand = $_POST["brand"];
            $image = $_FILES["image"]['name'];
            $image = file_get_contents($_FILES['image']['tmp_name']);

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $image = null;
            }
            if (empty($table) || empty($quantity) || empty($weight) || empty($description) || empty($brand)) {
                echo "<p>Please, fill all the fields.</p>";
            } else {
                try {
                $conn = new PDO('mysql:host=localhost;dbname=id21519434_recipes;charset=utf8', 'id21519434_admin', 'Palomeras2.');                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("INSERT INTO $table (QUANTITY, WEIGHT, DESCRIPTION, BRAND, IMAGE) VALUES (:quantity, :weight, :description, :brand, :image)");
                    $stmt->bindParam(':quantity', $quantity);
                    $stmt->bindParam(':weight', $weight);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':brand', $brand);
                    $stmt->bindParam(':image', $image, PDO::PARAM_LOB);

                    if ($stmt->execute()) {
                        echo "<p>Data has been successfully introduced in the table $table.</p>";
                    } else {
                        echo "<p>Error introducing data in the table $table.</p>";
                    }
                } catch (PDOException $ex) {
                    print "¡Error!: " . $ex->getMessage() . "<br/>";
                }
            }
        }
        ?>
        <form action="Recipes.php">
            <input type="submit" value="Go to Recipes" class="btn btn-info"/>
        </form>
    </center>
</body>
</html>
