<?php
// Generate all placeholder images for Nepal Tourism Website
// Run this script once to create all images

$images_dir = __DIR__ . '/images';

// Color mapping for different images
$images = [
    // Nepal letters backgrounds
    'nepal1' => ['N', '#667eea', '#764ba2', 'Nepal Tourism'],
    'nepal2' => ['E', '#f093fb', '#f5576c', 'Explore'],
    'nepal3' => ['P', '#4facfe', '#00f2fe', 'Pokhara'],
    'nepal4' => ['A', '#fa709a', '#fee140', 'Adventure'],
    'nepal5' => ['L', '#2c3e50', '#34495e', 'Lumibni'],
    
    // Festivals
    'dashain' => ['D', '#e74c3c', '#c0392b', 'Dashain Festival'],
    'tihar' => ['T', '#9b59b6', '#8e44ad', 'Tihar Festival'],
    'holi' => ['H', '#f39c12', '#e67e22', 'Holi Festival'],
    
    // Places
    'everest' => ['E', '#3498db', '#2980b9', 'Mount Everest'],
    'pokhara' => ['P', '#1abc9c', '#16a085', 'Pokhara'],
    'annapurna' => ['A', '#27ae60', '#229437', 'Annapurna'],
    'chitwan' => ['C', '#f39c12', '#d68910', 'Chitwan'],
];

$size = 800;

foreach ($images as $filename => $data) {
    list($letter, $color1, $color2, $text) = $data;
    
    // Create image
    $img = imagecreatetruecolor($size, $size);
    
    // Allocate colors
    $c1 = imagecolorallocate($img, hexdec(substr($color1, 1, 2)), hexdec(substr($color1, 3, 2)), hexdec(substr($color1, 5, 2)));
    $c2 = imagecolorallocate($img, hexdec(substr($color2, 1, 2)), hexdec(substr($color2, 3, 2)), hexdec(substr($color2, 5, 2)));
    $white = imagecolorallocate($img, 255, 255, 255);
    
    // Create gradient background
    for ($y = 0; $y < $size; $y++) {
        $ratio = $y / $size;
        $r = (int)(hexdec(substr($color1, 1, 2)) * (1 - $ratio) + hexdec(substr($color2, 1, 2)) * $ratio);
        $g = (int)(hexdec(substr($color1, 3, 2)) * (1 - $ratio) + hexdec(substr($color2, 3, 2)) * $ratio);
        $b = (int)(hexdec(substr($color1, 5, 2)) * (1 - $ratio) + hexdec(substr($color2, 5, 2)) * $ratio);
        $gradientColor = imagecolorallocate($img, $r, $g, $b);
        imageline($img, 0, $y, $size, $y, $gradientColor);
    }
    
    // Add decorative circles
    imageellipse($img, $size/2, $size/2, $size*0.6, $size*0.6, $white);
    imageellipse($img, $size/2, $size/2, $size*0.4, $size*0.4, $white);
    
    // Add letter
    $textSize = 7;
    $textWidth = imagefontwidth($textSize);
    imagestring($img, $textSize, ($size - $textWidth * strlen($letter)) / 2, $size/2 - 30, $letter, $white);
    imagestring($img, 3, ($size - imagefontwidth(3) * strlen($text)) / 2, $size - 80, $text, $white);
    
    // Save image
    $filepath = $images_dir . '/' . $filename . '.jpg';
    imagejpeg($img, $filepath, 95);
    imagedestroy($img);
    
    echo "Created: $filepath\n";
}

echo "\nAll images created successfully!\n";
?>
