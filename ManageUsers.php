<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
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
        width:auto;
        height:auto;
        padding:1px;
        margin:1px;
    }

    a {
        color: white;
    }

    body {
        background-image: url('bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    center {
        margin-top:220px;
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
                <th>ID</th>
                <th>NAME</th>
                <th>ADDRESS</th>
                <th>TLPH</th>
                <th>TYPE</th>
                <th>Action</th>
            </tr>
            <?php
            session_start();

            class DB
            {
                // ... Configuración de la base de datos ...

                public function __construct()
                {
                    try {
                        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
                        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $e) {
                        die("Connection error: " . $e->getMessage());
                    }
                }

                // ... Métodos para obtener y cerrar la conexión ...
            }

            if (isset($_POST['delete'])) {
                // ... Manejo de eliminación de usuario ...
            }

            $username = $_SESSION['USERNAME'];
            $type = $_SESSION['TYPE'];

            try {
                $DB = new DB();
                $conn = $DB->getConnection();

                $stmt = $conn->prepare("SELECT * FROM cooks");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $x = 0;
                while ($users = $stmt->fetch()) {
                    if ($type == 'Admin' || $users['NAME'] == $username) {
                        echo "<tr>";
                        echo "<td>" . $users['ID'] . "</td><td>" . $users['NAME'] . "</td><td>" . $users['ADDRESS'] . "</td><td>" . $users['TLPH'] . "</td><td>" . $users['TYPE'] . "</td>";
                        echo "<td>
                            <form id='delete_form_" . $users['ID'] . "' method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                                <input type='hidden' name='delete' value='" . $users['ID'] . "'>
                                <input type='hidden' id='confirm_delete_input' name='confirm_delete' value='0'>
                                <button type='button' class='btn btn-outline-danger' onclick='confirmDelete(" . $users['ID'] . ")'>Delete</button>
                            </form>
                        </td>";
                        echo "</tr>";
                        $x++;
                    }
                }
                $DB->endConnection();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </table>

        <?php
        if ($x == 0) {
            echo "<a href='NewUser.php'><button type='button' id='newUser' class='btn btn-success'>Add New User</button></a>";
            $x = 1;
        }
        ?>

        <button type="button" class="btn btn-primary" onclick="goBack()">
            <!-- ... Contenido del botón ... -->
        </button>
    </center>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>