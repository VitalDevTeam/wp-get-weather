<?php
/**
 * Get weather data
 * https://www.wunderground.com/weather/api
 *
 * Weather data is via the free Weather Underground API with a limit of
 * 500 calls per day and 10 per hour. Data is cached locally in the
 * database via WP transients API
 * @return [array] Weather data results
 */
function get_the_weather() {

    $weather_data = get_transient('weather_data');

    if ($weather_data === false) {

        $wu_api_url = "http://api.wunderground.com/api/{API_KEY_HERE}/conditions/q/NH/mount_washington.json";
        $api_data = file_get_contents($wu_api_url);
        $weather_data = json_decode($api_data, true);

        set_transient('weather_data', $weather_data, 15 * MINUTE_IN_SECONDS);

    }

    if (!empty($weather_data)) {
        return $weather_data;
    }
}