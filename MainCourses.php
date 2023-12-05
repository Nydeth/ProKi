<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Main Courses</title>
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
            margin:10px;
            border: 2px solid brown;
        }

        td, th, tr {
            padding:7px;
        }

        button {
            width:auto;
            height:auto;
            padding:1px;
            margin:1px;
        }

        a {
            color: white;
        }

        .logout {
            display:flex;
            justify-content:flex-end;
        }

</style>

<body>
    <p class="logout">
        <a href="Logout.php"><button type="button" id="logout" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" 
        width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 
  1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 
  2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> Log Out</button></a>
    </p>

<center><table border = 2>
        <tr>
            <th>COD</th>
            <th>QUANTITY</th>
            <th>WEIGHT</th>
            <th>DESCRIPTION</th>
            <th>BRAND</th>
            <th>IMAGE</th>
            <th>SETTINGS</th>
        </tr> <br>

        <?php
        
        $view = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 
            0 3.879 1.168 5.168 2.457A13.133 
            13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 
            0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
          </svg>';
          $delete = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
          <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 
          0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 
          4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 
          1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 
          .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8
           4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
        </svg>';
           
        try {
$conn = new PDO('mysql:host=localhost;dbname=id21519434_recipes;charset=utf8', 'id21519434_admin', 'Palomeras2.');            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare('SELECT * FROM maincourses ORDER BY COD');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
            while ($prove = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>".$prove['COD']."</td><td>".$prove['QUANTITY']."</td><td>".$prove['WEIGHT']."</td><td>"
                    .$prove['DESCRIPTION']."</td><td>".$prove['BRAND']."</td>
                    <td><img src='data:image/jpeg;base64," . base64_encode($prove['IMAGE']) . "' width='100' height='100' /></td>
                    <td><a href='dish/" . $prove['COD'] . "' class='btn btn-outline-secondary'> $view </a>
                    <form id='delete_form_" . $prove['COD'] . "' method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                    <input type='hidden' name='delete' value='" . $prove['COD'] . "'>
                    <input type='hidden' id='confirm_delete_input_" . $prove['COD'] . "' name='confirm_delete' value='0'>
                    <button type='button' class='btn btn-outline-danger' onclick='confirmDelete(" . $prove['COD'] . ")'>" . $delete . "</button>
                    </form>";
                echo "</tr>";
            }
        } catch (PDOException $ex) {
            print "¡Error!: " . $ex->getMessage() . "<br/>";
            exit;
        }
        ?>

    </table></br>
    <center>
    <button type="button" class="btn btn-primary" onclick="goBack()">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg> Go back
</button>
        <a href='NewDish.php?' class='btn btn-info'>New Dish</a>
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