<div class="slider">
    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>

    <div class="slides">
        <?php foreach ($logos as $logo): ?>
            <div class="slide fade">
                <img class="slide-image" src="<?php echo htmlspecialchars($logo['path']); ?>"
                    alt="<?php echo htmlspecialchars($logo['title']); ?>"
                >
            </div>
        <?php endforeach; ?>
    </div>

    <a class="next" onclick="changeSlide(1)">&#10095;</a>
</div>

<script src="./js/sliderScript.js"></script>