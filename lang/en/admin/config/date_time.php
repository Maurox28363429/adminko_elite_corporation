<?php
/**
 * Provides the date and time formats for the calendar date picker in the footer/scripts.blade.php file.
 * @var string $php_date_format PHP format for dates (Year-Month-Day).
 * @var string $php_date_time_format PHP format for dates and times (Year-Month-Day Hour:Minute:Second).
 * @var string $php_time_format PHP format for times (Hour:Minute).
 * @var string $js_date_format JavaScript format for dates (Month Day, Year), used for the front-end calendar picker.
 **/
return [
    'php_date_format'      => 'F j, Y',
    'php_date_time_format' => 'F j, Y  H:i:s',
    'php_time_format'      => 'H:i',
    'js_date_format'       => 'F j, Y',
    'js_date_time_format'  => 'F j, Y H:i',
    'js_time_format'       => 'H:i',
];
