<?php

date_default_timezone_set("Asia/Shanghai");

$id = empty($_GET['id']) ? "165" : trim($_GET['id']);

$cacheDir = __DIR__ . '/bstcache';
$ttl = 300;

if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0755, true);
}


$clientCacheFile = $cacheDir . '/clientid.json';
$clientInfo = [
    'timestamp' => 0,
    'clientID' => '',
];


if (file_exists($clientCacheFile)) {
    $tmp = json_decode(file_get_contents($clientCacheFile), true);
    if (!empty($tmp['clientID']) && time() - ($tmp['timestamp'] ?? 0) < $ttl) {
        $clientInfo = $tmp;
    }
}


if (empty($clientInfo['clientID'])) {

    $timestamp = time();
    $salt = "557f1d838112de4fc349b8558781fe17";
    $param = "deviceid=" . generateDeviceId()
        . "&market=coocaa&timestamp=" . $timestamp
        . "&version=1.2305.0713";
    $signature = hash_hmac("md5", $param, $salt);


    $firstJson = get_content(
        "https://kylinapi.bbtv.cn/5g/v1/client-id-by-region?"
        . $param . "&signature=" . $signature,
        "getclientid",
        $timestamp,
        ""
    );
    $clientID = json_decode($firstJson, true)['clientID'] ?? '';


    if ($clientID) {
        $clientInfo = [
            'timestamp' => $timestamp,
            'clientID' => $clientID,
        ];
        file_put_contents($clientCacheFile, json_encode($clientInfo, JSON_UNESCAPED_SLASHES));
    }
}

$clientID = $clientInfo['clientID'];


$cacheFile = $cacheDir . '/playurl_' . md5($id) . '.json';
if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $ttl)) {
    $data = json_decode(file_get_contents($cacheFile), true);
    if (!empty($data['playUrl'])) {
        $parts = parse_url($data['playUrl']);
        $basePath = dirname($parts['path']) . '/';
        $baseUrl = "{$parts['scheme']}://{$parts['host']}{$basePath}";
        $m3u8content = get_content($data['playUrl'], "getm3u8content", "", "");
        extracted($m3u8content, $baseUrl);
    }
}


$timestamp = time();
$salt = "557f1d838112de4fc349b8558781fe17";

$secondJson = get_content(
    "https://kylinapi.bbtv.cn/5g/v1/tv/now/{$id}?client=" . $clientID,
    "getplayurl",
    $timestamp,
    $salt
);
$playUrl = json_decode($secondJson, true)['playUrl'] ?? '';


file_put_contents($cacheFile, json_encode([
    'timestamp' => $timestamp,
    'playUrl' => $playUrl
], JSON_UNESCAPED_SLASHES));


function extracted($m3u8content, string $baseUrl)
{
    $realM3u8Body = preg_replace_callback(
        '`((?i).*?\.ts)`',
        function(array $matches) use ($baseUrl) {
            return $baseUrl . $matches[1];
        },
        $m3u8content
    );
    header("Content-Type: application/vnd.apple.mpegurl");
    header("Content-Disposition: attachment; filename=mnf.m3u8");
    echo $realM3u8Body;
    exit();
}

if ($playUrl) {
    $parts = parse_url($playUrl);
    $basePath = dirname($parts['path']) . '/';
    $baseUrl = "{$parts['scheme']}://{$parts['host']}{$basePath}";
    $m3u8content = get_content($playUrl, "getm3u8content", "", "");
    extracted($m3u8content, $baseUrl);
} else {
    header('HTTP/1.1 502 Bad Gateway');
    echo "无法获取播放地址";
    exit();
}


function generateDeviceId()
{
    $hex = strtoupper(bin2hex(random_bytes(16)));
    $hex[12] = '4';
    $variants = ['8', '9', 'A', 'B'];
    $hex[16] = $variants[random_int(0, 3)];
    $uuid = substr($hex, 0, 8) . '-'
        . substr($hex, 8, 4) . '-'
        . substr($hex, 12, 4) . '-'
        . substr($hex, 16, 4) . '-'
        . substr($hex, 20, 12);
    return 'COOCAA_' . $uuid;
}

function get_content($apiurl, $flag, $timestamp, $salt)
{
    if ($flag === "getclientid") {
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'User-Agent: SDK/1.0.0/coocaa//',
        ];
    } else if ($flag === "getm3u8content") {
        $headers = [
            'Accept: */*',
            'User-Agent: BesTV Media Player 1.0',
        ];
    } else {
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'app: android',
            'release: 1',
            'channel: standard',
            'version: 1.2305.0713',
            'timestamp: ' . $timestamp,
            'User-Agent: SDK/1.0.0/coocaa//',
            'sign: ' . md5("{$timestamp}{$salt}")
        ];
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}