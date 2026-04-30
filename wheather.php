<?php
header('Content-Type: application/json');
$city = $_GET['city'] ?? 'Kathmandu';

$weatherData = [
    'Kathmandu' => ['temp' => 24, 'condition' => 'Sunny'],
    'Pokhara' => ['temp' => 26, 'condition' => 'Cloudy'],
    'Everest' => ['temp' => 5, 'condition' => 'Snowy']
];

echo json_encode([
    'temp' => $weatherData[$city]['temp'] ?? 22,
    'city' => $city,
    'condition' => $weatherData[$city]['condition'] ?? 'Clear'
]);
?>