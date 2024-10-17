<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $company_name ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo $logos['logo-1']['path'] ?>">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <div class="header-container">
            <img class="header-image" src="<?php echo $logos['logo-1']['path'] ?>" alt="Italian Trulli">
            <nav class="menu-items">
                <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                    <?php echo $nav['index'] ?>
                </a>
                <a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">
                    <?php echo $nav['about'] ?>
                </a>
                <a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
                    <?php echo $nav['contact'] ?>
                </a>
                <a href="suppliers.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'suppliers.php' ? 'active' : ''; ?>">
                    <?php echo $nav['suppliers'] ?>
                </a>
            </nav>
        </div>
    </header>