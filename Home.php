<?php
session_start();

if (isset($_SESSION['message'])) {
    echo "<script>alert('{$_SESSION['message']}');</script>";
    unset($_SESSION['message']);
}

class DB {
    private $host = 'localhost';
    private $dbname = 'id21519434_recipes';
    private $username = 'id21519434_admin';
    private $password = 'Palomeras2.';
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function endConnection() {
        $this -> conn = null;
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    if (!empty($username) && !empty($password)) {
        try {
            $DB = new DB();
            $conn = $DB->getConnection();
            $stmt = $conn->prepare("SELECT * FROM cooks WHERE name = :username AND password = :password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $userType = $stmt->fetch(PDO::FETCH_ASSOC);
                $type = $userType['TYPE'];
                $_SESSION['USERNAME'] = $username;
                $_SESSION['TYPE'] = $type;

                if ($type === 'Admin') {
                    header('Location: Admins.php');
                } else {
                    header('Location: Users.php');
                }
            } else {
                $_SESSION['message'] = "Incorrect username or password";
                header('Location: Home.php');
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        header('Location: Home.php');
    }
}


    ?>
    
    <!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>ProKi Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    
    <style>
        h3, span {
            color:white;
        }

        form {
            width: 250px;
            text-align: left;
        }

        span {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
        }
        
        center {
            margin-top: 10%;
        }

        #login, #register {
            background-color: cyan;
            width:30%;
        }

        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <center>
    <h3>Login</h3><br>
    <form action="#" method="post">
    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> Name: <input type="text" name="username" value="" required><br>
    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg> Password: <input type="password" name="password" value="" required><br><br>
    <input type="submit" value="Log In" name="login" id="login"></input>
    </form>
    </center>
</body>
</html>