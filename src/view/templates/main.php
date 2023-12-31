<?php require_once __DIR__ . '/../../Core/baseFunctions/view.php' ?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Museum App</title>
    <link rel="stylesheet" type="text/css" href="/public/assets/bootstrap/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/layouts/default.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/app.css">
</head>
<body>
<?php partial('navbar'); ?>
<main><?= $CONTENT ?? '' ?></main>
</body>
</html>