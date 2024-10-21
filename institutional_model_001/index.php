<?php include 'header.php'; ?>

    <div class="main-section">
        <?php include './components/image_slider.php'; ?>

        <div class="index-main">
            <div class="index-main-column-1">
                <h1 class="index-main-title">
                    <?php echo $companyName ?>
                </h1>
                <?php echo $texts['index']['main'] ?>

                <div class="button-1">
                    <a href="about.php">
                        <?php echo $buttons['more'] ?>
                    </a>
                </div>
            </div>

            <div class="index-main-column-2">
                <img class="index-main-image" src="<?php echo htmlspecialchars($logos['main']['path']); ?>"
                    alt="<?php echo htmlspecialchars($logos['main']['title']); ?>"
                >
            </div>
        </div>

        <div class="index-sub">
            <?php include './components/card_slider.php'; ?>
        </div>

    </div>
<?php include 'footer.php'; ?>
