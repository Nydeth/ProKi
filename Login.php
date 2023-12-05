    <?php
    session_start();

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