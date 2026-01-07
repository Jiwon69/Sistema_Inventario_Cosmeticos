<?php
require_once __DIR__ . '/../config/Conexion.php';

class DashboardController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function index() {
        $stmt = $this->conn->query("CALL sp_total_productos()");
        $totalStock = $stmt->fetch(PDO::FETCH_ASSOC)['totalStock'] ?? 0;
        $stmt->closeCursor();

        $stmt = $this->conn->query("CALL sp_total_proveedores()");
        $totalProv = $stmt->fetch(PDO::FETCH_ASSOC)['totalProv'] ?? 0;
        $stmt->closeCursor();

        $stmt = $this->conn->query("CALL sp_total_usuarios()");
        $totalUser = $stmt->fetch(PDO::FETCH_ASSOC)['totalUser'] ?? 0;
        $stmt->closeCursor();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $usuarioConectado = $_SESSION['usuario'] ?? 'Invitado';
        $totalOnline = 1;

        require_once __DIR__ . '/../view/Dashboard.php';
    }
}
