<div class="image-slider">
    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>

    <?php
        $images = getImagesFromDir($imageSlider['imagesPath']);
    ?>

    <div class="image-slider-slides">
        <?php foreach ($images as $image): ?>
            <div class="image-slider-slide">
                <img class="image-slider-image"
                src="<?php echo htmlspecialchars($image['path']); ?>"
                alt="<?php echo htmlspecialchars($image['title']); ?>"
                >
            </div>
        <?php endforeach; ?>
    </div>

    <a class="next" onclick="changeSlide(1)">&#10095;</a>
</div>

<script src="./js/image_slider_script.js"></script>