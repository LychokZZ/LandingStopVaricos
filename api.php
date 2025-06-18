<?php
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    else return $_SERVER['REMOTE_ADDR'];
}
$key_hash = 'demo_api_key_123456';

$data = [
    'key_hash'  => $key_hash,
    'name'      => $_POST['name'] ?? '',
    'phone'     => $_POST['phone'] ?? '',
    'address'   => $_POST['address'] ?? '',
    'ip'        => getUserIP(),

    'subid'     => $_POST['subid'] ?? '',
    'subid1'    => $_POST['subid1'] ?? '',
    'subid2'    => $_POST['subid2'] ?? '',
    'subid3'    => $_POST['subid3'] ?? '',
    'subid4'    => $_POST['subid4'] ?? '',
    'subid5'    => $_POST['subid5'] ?? '',
];

if (!empty($data['name']) && !empty($data['phone'])) {

    $ch = curl_init('');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_POST, true);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($http_code == 200) {
        echo "Замовлення успішно відправлено!";
    } else {
        echo "Помилка при надсиланні замовлення.";
    }

} else {
    echo "Некоректні вхідні дані.";
}
?>
