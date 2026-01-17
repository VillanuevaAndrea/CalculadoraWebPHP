<?php

$resultado = "";
$operacion_realizada = "";

if (isset($_POST['limpiar'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['calcular'])) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $op = $_POST['operacion'];

    if (is_numeric($n1) && is_numeric($n2)) {
        switch ($op) {
            case 'sumar': $resultado = $n1 + $n2; $operacion_realizada = "+"; break;
            case 'restar': $resultado = $n1 - $n2; $operacion_realizada = "-"; break;
            case 'multiplicar': $resultado = $n1 * $n2; $operacion_realizada = "*"; break;
            case 'dividir': 
                $resultado = ($n2 != 0) ? $n1 / $n2 : "Error (División por cero)";
                $operacion_realizada = "/";
                break;
        }
    } else {
        $resultado = "Por favor, ingresa números válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora PHP + Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; height: 100vh; }
        .calc-card { max-width: 400px; margin: auto; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container">
    <div class="card calc-card">
        <div class="card-header bg-primary text-white text-center">
            <h4>Calculadora PHP</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <input type="number" step="any" name="n1" class="form-control" placeholder="Número 1" required value="<?= $_POST['n1'] ?? '' ?>">
                </div>
                <div class="mb-3">
                    <select name="operacion" class="form-select">
                        <option value="sumar">+</option>
                        <option value="restar">-</option>
                        <option value="multiplicar">x</option>
                        <option value="dividir">/</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="number" step="any" name="n2" class="form-control" placeholder="Número 2" required value="<?= $_POST['n2'] ?? '' ?>">
                </div>
                <button type="submit" name="calcular" class="btn btn-primary w-100">
                    Calcular
                </button>
                <button type="submit" name="limpiar" class="btn btn-outline-danger px-4">
                    Limpiar Todo
                </button>
            </form>

            <?php if ($resultado !== ""): ?>
                <div class="alert alert-success mt-4 text-center">
                    <h5>Resultado:</h5>
                    <p class="display-6"><?= $resultado ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>