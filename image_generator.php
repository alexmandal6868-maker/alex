<?php
// Image Generator for Nepal Tourism Website
// Creates placeholder images dynamically

header('Content-Type: image/jpeg');

// Get image name from query parameter or use default
$name = isset($_GET['name']) ? $_GET['name'] : 'nepal';
$size = isset($_GET['size']) ? (int)$_GET['size'] : 800;

// Color mapping for different images
$colors = [
    'nepal1' => ['#667eea', '#764ba2'],  // N - Purple/Blue
    'nepal2' => ['#f093fb', '#f5576c'],  // E - Pink/Red
    'nepal3' => ['#4facfe', '#00f2fe'],  // P - Blue/Cyan
    'nepal4' => ['#fa709a', '#fee140'],  // A - Pink/Yellow
    'nepal5' => ['#2c3e50', '#34495e'],  // L - Dark
    'dashain' => ['#e74c3c', '#c0392b'], // Red theme
    'tihar' => ['#9b59b6', '#8e44ad'],   // Purple theme
    'holi' => ['#f39c12', '#e67e22'],    // Orange theme
    'everest' => ['#3498db', '#2980b9'], // Mountain blue
    'pokhara' => ['#1abc9c', '#16a085'], // Lake green
    'annapurna' => ['#27ae60', '#229437'],// Mountain green
    'chitwan' => ['#f39c12', '#d68910'], // Jungle orange
    'default' => ['#667eea', '#764ba2']
];

// Get color scheme or use default
$colorKey = isset($colors[$name]) ? $name : 'default';
$colorScheme = $colors[$colorKey];

// Create image
$img = imagecreatetruecolor($size, $size);

// Allocate colors
$color1 = imagecolorallocate($img, hexdec(substr($colorScheme[0], 1, 2)), hexdec(substr($colorScheme[0], 3, 2)), hexdec(substr($colorScheme[0], 5, 2)));
$color2 = imagecolorallocate($img, hexdec(substr($colorScheme[1], 1, 2)), hexdec(substr($colorScheme[1], 3, 2)), hexdec(substr($colorScheme[1], 5, 2)));
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);

// Create gradient background
for ($y = 0; $y < $size; $y++) {
    $ratio = $y / $size;
    $r = (int)(hexdec(substr($colorScheme[0], 1, 2)) * (1 - $ratio) + hexdec(substr($colorScheme[1], 1, 2)) * $ratio);
    $g = (int)(hexdec(substr($colorScheme[0], 3, 2)) * (1 - $ratio) + hexdec(substr($colorScheme[1], 3, 2)) * $ratio);
    $b = (int)(hexdec(substr($colorScheme[0], 5, 2)) * (1 - $ratio) + hexdec(substr($colorScheme[1], 5, 2)) * $ratio);
    $gradientColor = imagecolorallocate($img, $r, $g, $b);
    imageline($img, 0, $y, $size, $y, $gradientColor);
}

// Add decorative circle
imageellipse($img, $size/2, $size/2, $size*0.7, $size*0.7, $white);
imageellipse($img, $size/2, $size/2, $size*0.5, $size*0.5, $white);

// Add text
$text = strtoupper($name);
$textSize = 5;
$textColor = $white;

// Center text
$textWidth = imagefontwidth($textSize) * strlen($text);
$textHeight = imagefontheight($textSize);
$x = ($size - $textWidth) / 2;
$y = ($size - $textHeight) / 2;

imagestring($img, $textSize, $x, $y, $text, $textColor);

// Add "NEPAL TOURISM" watermark
$watermark = "NEPAL TOURISM";
imagestring($img, 3, ($size - imagefontwidth(3) * strlen($watermark)) / 2, $size - 50, $watermark, $white);

// Output image
imagejpeg($img, null, 90);
imagedestroy($img);
?>
