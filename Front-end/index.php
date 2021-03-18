<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Assets/bulma.css" rel="stylesheet">
<!--    https://wikiki.github.io/form/slider/ -->
    <link href="Assets/Slider/bulma-slider.min.css" rel="stylesheet">
<!--    Font Awesome -->
    <script defer src="Assets/Font-Awesome-All.js"></script>
    <title>Site</title>
</head>
<body>
    <div class="container is-max-widescreen mt-4">
        <div class="columns has-background-primary-light">
            <div class="column">
<!--                Classes dropdown menu -->
                <div class="dropdown block">
                    <div class="dropdown-trigger">
                        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu3">
                            <span>Class 1</span>
                            <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
    <!--                Probably a PHP / MySQL loop here to provide some classes?-->
                    <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item">
                                Class 1
                            </a>
                            <a href="#" class="dropdown-item">
                                Class 2
                            </a>
                            <a href="#" class="dropdown-item">
                                Class 3
                            </a>
                            <a href="#" class="dropdown-item">
                                Class 4
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                Class 5
                            </a>
                        </div>
                    </div>
                </div>
    <!--            Another PHP / MySQL script to loop the number of groups-->
                <div class="columns is-multiline is-mobile">
                    <div class="column is-one-quarter has-text-centered">
                        <button class="button is-info modal-button" data-target="modal-1" aria-haspopup="true">
                            Group 1
                        </button>
                    </div>
                    <div class="column is-one-quarter has-text-centered">
                        <button class="button is-info">
                            Group 2
                        </button>
                    </div>
                    <div class="column is-one-quarter has-text-centered">
                        <button class="button is-info">
                            Group 3
                        </button>
                    </div>
                    <div class="column is-one-quarter has-text-centered">
                        <button class="button is-info">
                            Group 4
                        </button>
                    </div>
                    <div class="column is-one-quarter has-text-centered">
                        <button class="button is-info">
                            Group 5
                        </button>
                    </div>
                </div>
    <!--            <label>
                    <input id="sliderWithValue" class="slider has-output is-fullwidth is-info" min="0" max="100" value="50" step="1" type="range">
                    <output for="sliderWithValue">50</output>
                </label>
                <label>
                    <input id="sliderWithValue1" class="slider has-output is-fullwidth is-info" min="0" max="100" value="50" step="1" type="range">
                    <output for="sliderWithValue1">50</output>
                </label>-->
                <div class="block has-text-right">
                    <button id="generate-groups" class="button is-info">
                        <span class="icon is-small">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span>Generate groups</span>
                    </button>
                    <button id="done-button" class="button is-success">
                        <span class="icon is-small">
                          <i class="fas fa-check"></i>
                        </span>
                        <span>Done</span>
                    </button>
                </div>
            </div>
        </div>
        <!--                Modals-->
        <div id="modal-1" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    <div class="columns is-multiline">
                        <div class="column is-full is-size-4">
                            <p>Student student</p>
                        </div>
                        <div class="column divider is-full">
                            <hr class="group-box">
                        </div>
                        <div class="column is-full is-size-4">
                            <p>Student student</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    </div>
</body>
<script src="Assets/Modal.js"></script>
<script src="Assets/dropdown.js"></script>
<script src="Assets/Slider/bulma-slider.min.js"></script>
<!--Manages the slider output values -->
<script>bulmaSlider.attach();</script>