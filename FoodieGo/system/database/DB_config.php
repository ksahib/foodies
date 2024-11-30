 
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'foodiego',
    'dbdriver' => 'mysqli'
);

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        global $db;
        $this->connection = mysqli_connect(
            $db['default']['hostname'],
            $db['default']['username'],
            $db['default']['password'],
            $db['default']['database']
        );

        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>