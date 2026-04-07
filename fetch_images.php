<?php

$accessKey = '9kp5z-y4DV16ElX_8qMHXe88aVKVWP0kwYeH3ltix8c';
$queries = [
    'hero' => 'corporate business auditing professionals',
    'bento1' => 'business office professionals',
    'bento2' => 'business growth charts',
    'bento3' => 'international business global',
    'bento4' => 'business handshake trust'
];

$dir = __DIR__ . '/public/images';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

foreach ($queries as $name => $query) {
    $url = "https://api.unsplash.com/photos/random?query=" . urlencode($query) . "&orientation=landscape&client_id={$accessKey}";
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept-Version: v1'
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200) {
        $data = json_decode($response, true);
        $imageUrl = $data['urls']['regular'] ?? null;
        
        if ($imageUrl) {
            echo "Downloading $name from $imageUrl\n";
            $imageContent = file_get_contents($imageUrl);
            file_put_contents("$dir/{$name}.jpg", $imageContent);
            echo "Saved $name.jpg\n";
        }
    } else {
        echo "Error fetching $name: HTTP $httpCode\n";
        echo $response . "\n";
    }
}
