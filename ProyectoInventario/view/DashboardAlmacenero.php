<?php 
include("BarraMenuAdmin.php"); 
require_once __DIR__ . "/../config/Conexion.php";
$db = new Database();
$conn = $db->getConnection();

$sqlStock = "CALL sp_total_productos()";
$stmt = $conn->query($sqlStock);
$totalStock = $stmt->fetch(PDO::FETCH_ASSOC)['totalStock'] ?? 0;
$stmt->closeCursor();

$sqlProv = "CALL sp_total_proveedores()";
$stmt = $conn->query($sqlProv);
$totalProv = $stmt->fetch(PDO::FETCH_ASSOC)['totalProv'] ?? 0;
$stmt->closeCursor();

$sqlUser = "CALL sp_total_usuarios()";
$stmt = $conn->query($sqlUser);
$totalUser = $stmt->fetch(PDO::FETCH_ASSOC)['totalUser'] ?? 0;
$stmt->closeCursor();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$usuarioConectado = $_SESSION['usuario'] ?? 'Invitado';
$totalOnline = 1;

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
      body {
        font-family: 'Poppins', sans-serif;
        background: url("view/imagenes/Fondo2.png") no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }
    .content {
        margin-left: 270px;
        margin-top: 20px;
        padding: 20px;
    }
      h1 {
          font-weight: 600;
          color: #6d28d9;
      }
      .card-dashboard {
        border: none;
        border-radius: 20px;
        padding: 25px;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        transition: transform 0.2s;
    }
      .card-dashboard:hover { transform: translateY(-5px); }
      .icon-circle {
          width: 60px;
          height: 60px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 28px;
          color: #fff;
      }
      .bg-lila { background: linear-gradient(135deg, #8b5cf6, #6d28d9); }
      .bg-pink { background: linear-gradient(135deg, #ec4899, #db2777); }
      .bg-green { background: linear-gradient(135deg, #10b981, #059669); }
      .bg-orange { background: linear-gradient(135deg, #f59e0b, #d97706); }

      @media (max-width: 768px) {
        .content { margin-left: 0; }
      }
  </style>
</head>
<body>
<div class="content">
    <h1 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard de Inicio</h1>

    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <a href="productos.php" class="text-decoration-none text-dark">
                <div class="card-dashboard">
                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-lila me-3">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Stock</h5>
                            <h3 class="mb-0"><?php echo $totalStock; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="proveedores.php" class="text-decoration-none text-dark">
                <div class="card-dashboard">
                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-pink me-3">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Proveedores</h5>
                            <h3 class="mb-0"><?php echo $totalProv; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
        <div class="card-dashboard">
            <div class="d-flex align-items-center">
                <div class="icon-circle bg-orange me-3">
                    <i class="bi bi-activity"></i>
                </div>
                <div>
                    <h5 class="mb-1">En línea</h5>
                    <h3 class="mb-0"><?php echo $totalOnline; ?></h3>
                    <small class="text-muted">
                        <?php echo "Tú: " . htmlspecialchars($usuarioConectado); ?>
                    </small>
                </div>
            </div>
        </div>
    </div>

        <div class="text-center mt-4">
            <img src="view/imagenes/Marcas.png" alt="Marcas" class="img-fluid rounded shadow" style="max-height:500px;">
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>