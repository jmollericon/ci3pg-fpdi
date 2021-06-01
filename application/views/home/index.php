<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeIgniter</title>
  <style>
    .archivo {
      text-decoration:none;
    }
  </style>
</head>
<body>
  <h2>Archivos PDF</h2>
  <ul>
    <?php foreach($archivos as $a): ?>
      <li>
        <a href="<?= base_url('home/editar_pdf/?id=').base64_encode($a->id) ?>" target="_blank" class="archivo"><?= $a->id ?> - <?= $a->documento ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
  <h2>Subir archivo PDF</h2>
  <form action="<?= base_url('home/guardar_pdf') ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="documento" accept="application/pdf">
    <button type="submit">Subir PDF</button>
  </form>
</body>
</html>