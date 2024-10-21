<div class="text-image">
    <div class="text-image-text-column">
        <h1 class="text-image-title">
            <?php echo $companyName ?>
        </h1>

        <p> <?php echo $textImage['text']; ?> </p>

        <div class="button-1">
            <a href="<?php echo $textImage['button']['link'] ?>">
                <?php echo $textImage['button']['text'] ?>
            </a>
        </div>
    </div>

    <div class="text-image-image-column">
        <img class="text-image-image"
        src="<?php echo htmlspecialchars($textImage['image']['path']); ?>"
        alt="<?php echo htmlspecialchars($textImage['image']['title']); ?>"
        >
    </div>
</div>