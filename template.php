<?php
$weather_data = get_the_weather();

if ($weather_data !== false) {

    $weather = $weather_data['current_observation']['weather'];
    $temp_f  = round($weather_data['current_observation']['temp_f']);
    $icon    = $weather_data['current_observation']['icon'];

    ?><a href="https://www.wunderground.com/us/nh/mount-washington" target="_blank">
        <span><?php echo $temp_f; ?>&deg; F</span>
        <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-weather-' . $icon . '.svg'; ?>" alt="">
    </a><?php

} ?>