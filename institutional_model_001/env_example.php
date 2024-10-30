<?php

$lang = 'en';

$companyName = 'Company Name';
$faviconPath = './imagesExample/favicon.png';

$nav = [
    'imagePath' => './imagesExample/nav_image.png',
    'items' => [
        'index.php' => 'Home',
        'about.php' => 'About Us',
        'contact.php' => 'Contact',
        'suppliers.php' => 'Suppliers',
    ],
];

$imageSlider = [
    'imagesPath' => './imagesExample/image_slider',
];

$textImage = [
    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Sed sed elit volutpat, porttitor dolor at, porttitor nulla.
        Suspendisse rutrum faucibus mollis. Phasellus at tempor nisi, eu porttitor libero.
        Aenean tempus felis sed velit consectetur, nec euismod urna eleifend.
        Integer elementum est sit amet ornare laoreet.
        Donec elementum sed arcu sed vulputate. Fusce vehicula et erat et convallis.
        Aenean egestas nisl blandit scelerisque egestas. Sed sed molestie libero.
        Vestibulum id enim quis ex commodo bibendum.
        Curabitur suscipit mauris orci, laoreet cursus est varius et.
        Pellentesque vel porta felis. Morbi posuere at enim nec ultrices.
        Sed blandit faucibus metus, eget fermentum arcu fringilla eu.
        Pellentesque feugiat metus id eros rhoncus, sed finibus ipsum dapibus.
        Mauris ullamcorper porta diam, vitae ornare risus luctus lacinia.',
    'image' => [
        'title' => 'Title',
        'path' => './imagesExample/favicon.png'
    ],
    'button' => [
        'link' => 'about.php',
        'text' => 'More',
    ]
];

$cardSlider = [
    // Info
    'title' => 'Slider Title',

    //  Texts should contain labels for the same amount of images contained in imagesPath.
    'texts' => [
        'Card 1 Text',
        'Card 2 Text',
        'Card 3 Text',
        'Card 4 Text',
        'Card 5 Text',
        'Card 6 Text',
        /**
         * .
         * .
         * .
         * Card N Text
         */
    ],
    'buttons' => [
        [
            'link' => 'about.php',
            'text' => 'More',
        ],
        [
            'link' => 'about.php',
            'text' => 'More',
        ],
        [
            'link' => 'about.php',
            'text' => 'More',
        ],
        [
            'link' => 'about.php',
            'text' => 'More',
        ],
        [
            'link' => 'about.php',
            'text' => 'More',
        ],
        [
            'link' => 'about.php',
            'text' => 'More',
        ],
        /**
         * .
         * .
         * .
         * [
         *  'link' => 'Link Button N',
         *  'text' => 'Text Button N
         * ]
         */
    ],
    'imagesPath' => './imagesExample/card_slider',

    // Controllers
    'visibleCards' => 3,
    'gapWidthPercentage' => 5,
    'transitionDelayMS' => 500,
    'sliderIntervalMS' => 5000,
];

$contactUs = [
    'title' => 'Contact Us',
    'info' => [
        'phone' => '(XX) XXXXX-XXXX',
        'email' => 'example@email.com',
        'address' => 'Example Address Street XXX - CT - 12',
    ],
    'form' => [
        'fields' => [
            'name' => [
                'label' => 'Name',
                'type' => 'text',
                'required' => true,
                'messages' => [
                    'required' => 'Please enter your name!',
                ],
            ],
            'email' => [
                'label' => 'E-mail',
                'type' => 'email',
                'required' => true,
                'messages' => [
                    'required' => 'We need your email to contact you!',
                    'typeMismatch' => 'Invalid format!',
                ],
            ],
            'message' => [
                'label' => 'Message',
                'type' => 'text',
                'required' => false,
                'messages' => [
                    'required' => 'Please write a message.',
                ],
            ],
        ],
        'requiredLabel' => '(Required)',
        'button' => [
            'text' => 'Send',
        ],
    ],
    'control' => [
        'destiny' => 'example@email.com',
        'subject' => 'New Contact From Site',
        'errorMessage' => 'There was an error sending your message. Please try again.',
    ],
];

$cssVariables = [
    'colorPalette' => [
        'primary' => '#FFFFFF',
        'secondary' => '#FFFFFF',
        'tertiary' => '#FFFFFF',
        'quarternary' => '#FFFFFF',
        'quinarius' => '#FFFFFF',
        'mainText' => '#FFFFFF',
        'subText' => '#FFFFFF',
    ],
    'text' => [
        'fontFamily' => 'Arial, sans-serif',
    ],
];

$footerCopy = "20XX {$companyName} - All rights reserved.";
?>