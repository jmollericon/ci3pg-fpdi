<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeIgniter</title>
</head>
<body>
  <h1>Productos</h1>
  <ul>
    <?php foreach($productos as $p): ?>
      <li><?= $p->nombre ?> - <?= $p->cantidad ?></li>
    <?php endforeach; ?>
  </ul>
  <h1>Subir archivo PDF</h1>
</body>
</html>