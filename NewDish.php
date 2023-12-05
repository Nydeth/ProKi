<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Dish</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
</head>

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
        color: white;
    }

    body {
        margin-top: 20%;
    }

    .logout {
        display:flex;
        justify-content:flex-end;
    }
</style>

<body>
    <p class="logout">
        <a href="Logout.php"><button type="button" id="logout" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> Log Out</button></a>
    </p>
    <center>
        <table border="2">
            <tr>
                <th>TYPE</th> 
                <th>QUANTITY</th>
                <th>WEIGHT</th>
                <th>DESCRIPTION</th>
                <th>BRAND</th>
                <th>IMAGE</th>
                <th>SETTINGS</th>
            </tr>
            <form action="Confirmation.php" method="post" enctype="multipart/form-data">
                <tr>
                    <td>
                        <select name="table" id="table" required>
                            <?php
                            try {
$conn = new PDO('mysql:host=localhost;dbname=id21519434_recipes;charset=utf8', 'id21519434_admin', 'Palomeras2.');                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->query("SHOW TABLES");
                                while ($table = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $tableName = $table['Tables_in_recipes'];
                                    $tableName = ucfirst($tableName);
                                    echo "<option value='" . $tableName . "'>" . $tableName . "</option>";
                                }
                            } catch (PDOException $ex) {
                                print "¡Error!: " . $ex->getMessage() . "<br/>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="quantity" id="quantity" required>
                    </td>
                    <td>
                        <input type="text" name="weight" id="weight" required>
                    </td>
                    <td>
                        <input type="text" name="description" id="description" required>
                    </td>
                    <td>
                        <input type="text" name="brand" id="brand" required>
                    </td>
                    <td>
                        <input type="file" name="image" id="image" required>
                    </td>
                    <td>
                        <input type="submit" value="Add New Dish" class="btn btn-outline-secondary"></input>
                    </td>
                </tr>
            </form>
        </table><br>
        <form action="Recipes.php">
            <input type="submit" value="Go to Recipes" class="btn btn-info"/>
        </form>
    <button type="button" class="btn btn-primary" onclick="goBack()">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg> Go back
</button>
    </center>

<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>
