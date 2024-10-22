<?php
    include 'config.php';
    $currentDir = '/components/header/';
?>

<link rel="stylesheet" href="<?php echo $currentDir . 'header.css'?>">

<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $companyName ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo $faviconPath ?>">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <img class="header-image" src="<?php echo $nav['imagePath'] ?>"
            alt=""
            >
            <nav class="menu-items">
                <?php foreach ($nav['items'] as $ref => $item): ?>
                    <a href="<?php echo '/' . htmlspecialchars($ref); ?>"
                    class="<?php echo basename($_SERVER['PHP_SELF']) == $ref ? 'active' : ''; ?>">
                        <?php echo htmlspecialchars($item); ?>
                    </a>
               <?php endforeach; ?>
            </nav>
        </div>
    </header>