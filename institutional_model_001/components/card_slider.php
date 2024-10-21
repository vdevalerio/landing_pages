<div class="card-slider-container">
    <h1 class="card-slider-title">
        <?php echo $cardSlider['title'] ?>
    </h1>

    <div class="card-slider">
        <a class="prev"
        onclick="moveCarousel(-1, <?php echo $cardSlider['transitionDelayMS']?>)">
            &#10094;
        </a>

        <?php
            $cardImages = getImagesFromDir($cardSlider['imagesPath']);
        ?>
        <div class="cards">
            <?php foreach ($cardImages as $index => $image): ?>

            <div class="card">
                <?php
                    $index = htmlspecialchars((int) trim($index, 'card') - 1);
                    $path = htmlspecialchars($image['path']);
                    $title = htmlspecialchars($image['title']);
                ?>
                <div class="card-image" >
                    <img src="<?php echo $path; ?>"
                    alt="<?php echo htmlspecialchars($title); ?>"
                    >
                </div>
                <div class="card-text">
                    <p> <?php echo $cardSlider['texts'][$index] ?> </p>
                </div>

                <div class="card-button button-1">
                    <a href="<?php echo $cardSlider['buttons'][$index]['link'] ?>">
                        <?php echo $cardSlider['buttons'][$index]['text'] ?>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <a class="next"
        onclick="moveCarousel(1, <?php echo $cardSlider['transitionDelayMS']?>)">
            &#10095;
        </a>
    </div>
</div>

<script src="./js/card_slider_script.js"></script>