<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Assets/bulma.css" rel="stylesheet">
<!--    https://wikiki.github.io/form/slider/ -->
    <link href="Assets/Slider/bulma-slider.min.css" rel="stylesheet">
    <title>Site</title>
</head>
<body>
<div class="container is-max-desktop mt-4">
    <div class="columns has-background-primary-light">
        <div class="column">
            <div class="dropdown">
                <div class="dropdown-trigger">
                    <button class="button" onclick="myFunction()" aria-haspopup="true" aria-controls="dropdown-menu3">
                        <span>Click me</span>
                        <span class="icon is-small">
                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
                <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                    <div class="dropdown-content">
                        <a href="#" class="dropdown-item">
                            Overview
                        </a>
                        <a href="#" class="dropdown-item">
                            Modifiers
                        </a>
                        <a href="#" class="dropdown-item">
                            Grid
                        </a>
                        <a href="#" class="dropdown-item">
                            Form
                        </a>
                        <a href="#" class="dropdown-item">
                            Elements
                        </a>
                        <a href="#" class="dropdown-item">
                            Components
                        </a>
                        <a href="#" class="dropdown-item">
                            Layout
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            More
                        </a>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <p>1</p>
                </div>
                <div class="column">
                    <p>2</p>
                </div>
            </div>
            <label>
                <input id="sliderWithValue" class="slider has-output is-fullwidth is-info" min="0" max="100" value="50" step="1" type="range">
                <output for="sliderWithValue">50</output>
            </label>
            <label>
                <input id="sliderWithValue1" class="slider has-output is-fullwidth is-info" min="0" max="100" value="50" step="1" type="range">
                <output for="sliderWithValue1">50</output>
            </label>
        </div>
    </div>
</div>
    <?php


    ?>
</body>
<script src="Assets/dropdown.js"></script>
<script src="Assets/Slider/bulma-slider.min.js"></script>
<!--Manages the slider output values -->
<script>bulmaSlider.attach();</script>