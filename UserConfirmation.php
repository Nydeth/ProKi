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
            $name = $_POST["name"];
            $address = $_POST["address"];
            $tlph = $_POST["tlph"];
            $type = $_POST["type"];
            $password = sha1($_POST['password']);

            if (empty($name) || empty($address) || empty($tlph) || empty($type) || empty($password)) {
                echo "<p>Please, fill all the fields.</p>";
            } else {
                try {
$conn = new PDO('mysql:host=localhost;dbname=id21519434_recipes;charset=utf8', 'id21519434_admin', 'Palomeras2.');                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("INSERT INTO COOKS (NAME, ADDRESS, TLPH, TYPE, PASSWORD) VALUES (:name, :address, :tlph, :type, :password)");
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':address', $address);
                    $stmt->bindParam(':tlph', $tlph);
                    $stmt->bindParam(':type', $type);
                    $stmt->bindParam(':password', $password);

                    if ($stmt->execute()) {
                        echo "<p>$name $type has been created.</p>";
                    } else {
                        echo "<p>Error introducing data in the table.</p>";
                    }
                } catch (PDOException $ex) {
                    print "¡Error!: " . $ex->getMessage() . "<br/>";
                }
            }
        }
        ?>
            <a href="ManageUsers.php"><input type="submit" value="Manage Users" class="btn btn-info"/></a>
    </center>
</body>
</html>
