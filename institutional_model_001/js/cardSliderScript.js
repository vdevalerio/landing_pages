const cardSlider = document.querySelector('.card-slider');
const cardsContainer = document.querySelector('.cards');
const totalCards = document.querySelectorAll('.card').length;

// These variables comes from conf file.
let visibleCards;
let gapWidthPercent;
let transitionDelayMS;
let sliderIntervalMS;

// These variables are calculated based on above.
let currentPosition;
let offset;

function setVisibleCards(visibleCards, gapWidthPercent) {
    currentPosition = visibleCards;
    cards = document.querySelectorAll('.card');
    gapWidth = (visibleCards - 1) * gapWidthPercent;
    cardWidth = (100 - gapWidth) / visibleCards;
    offset = cardWidth + gapWidthPercent;

    cardsContainer.style.gap = `${gapWidthPercent}%`;
    cards.forEach(card => {
        card.style.width = `${cardWidth}%`;
    })
}

function duplicateCards() {
    const cards = document.querySelectorAll('.card');
    const firstCards = Array.from(cards).slice(0, visibleCards);
    const lastCards = Array.from(cards).slice(-visibleCards);

    firstCards.forEach(card => cardsContainer.appendChild(card.cloneNode(true)));
    lastCards.reverse().forEach(
        card => cardsContainer.insertBefore(card.cloneNode(true), cardsContainer.firstChild)
    );
}

function moveCarousel(direction, transitionDelayMS) {
    currentPosition += direction;

    cardsContainer.style.transition = `transform ${transitionDelayMS / 1000}s ease`;
    const translateX = - currentPosition * offset;
    cardsContainer.style.transform = `translateX(${translateX}%)`;

    setTimeout(() => {
        if (currentPosition === 0) {
            cardsContainer.style.transition = 'none';
            currentPosition = totalCards;
            xTranslation = -1 * currentPosition * offset;

            cardsContainer.style.transform = `translateX(${xTranslation}%)`;
        } else if (currentPosition === totalCards + visibleCards) {
            cardsContainer.style.transition = 'none';
            currentPosition = visibleCards;
            xTranslation = -1 * currentPosition * offset;

            cardsContainer.style.transform = `translateX(${xTranslation}%)`;
        }
    }, transitionDelayMS);
}

function autoMoveCarousel(interval, transitionDelayMS) {
    setInterval(() => {
        moveCarousel(1, transitionDelayMS);
    }, interval);
}

async function initializeCarousel() {
    fetch('../config.json')
        .then(response => response.json())
        .then(data => {

            cardSliderData = data.card_slider;
            visibleCards = cardSliderData.visible_cards;
            cardWidthPercent  = cardSliderData.card_width_percentage;
            gapWidthPercent = cardSliderData.gap_width_percentage;
            transitionDelayMS = cardSliderData.transition_delay_ms;
            sliderIntervalMS = cardSliderData.slider_interval_ms;

            setVisibleCards(visibleCards, gapWidthPercent);
            duplicateCards();
            moveCarousel(0, transitionDelayMS);
            autoMoveCarousel(sliderIntervalMS, transitionDelayMS);
        })
}

initializeCarousel();