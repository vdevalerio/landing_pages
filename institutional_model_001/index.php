<?php include 'header.php'; ?>

    <div class="main-section">
        <?php include './components/slider.php'; ?>

        <div class="index-main">
            <div class="index-main-column-1">
                <h1>
                    <?php echo $company_name ?>
                </h1>
                <?php echo $texts['index']['main'] ?>

                <div class="button-1">
                    <a href="about.php">
                        Saiba mais
                    </a>
                </div>
            </div>

            <div class="index-main-column-2">
                <img class="index-main-image" src="<?php echo htmlspecialchars($logos['logo-1']['path']); ?>"
                    alt="<?php echo htmlspecialchars($logos['logo-1']['title']); ?>"
                >
            </div>
        </div>

    </div>

<?php include 'footer.php'; ?>
