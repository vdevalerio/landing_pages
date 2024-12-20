let slideIndex = 0;

showSlides();

function showSlides() {
    const slides = document.getElementsByClassName("image-slider-slide");

    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }

    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].classList.add("active");

    setTimeout(showSlides, 5000);
}

function changeSlide(n) {
    const slides = document.getElementsByClassName("image-slider-slide");
    slideIndex += n;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    if (slideIndex < 1) {
        slideIndex = slides.length;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }

    slides[slideIndex - 1].classList.add("active");
}