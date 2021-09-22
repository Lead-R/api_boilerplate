<?php
session_start();

include_once(__DIR__ . DIRECTORY_SEPARATOR . 'LeadR.php');
include_once(__DIR__ . DIRECTORY_SEPARATOR . 'helpers.php');

$userId = 0;
$apiKey = 'asfsa924.............fasf8902';
$flowId = 1234;

// Путь к файлу лога - настоятельно рекомендуется вынести на уровень выше, вне публичной директории.
$logFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'log.txt';

// Собираем данные лида
$clientName = $_POST['name']; // Вместо name - подставить имя поля для имени клиента в форме
$clientPhone = $_POST['phone']; // Вместо phone - подставить имя поля для телефона клиента в форме

$clientReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null; // Получаем страницу откуда пришёл пользователь
$clientUseragent = $_SERVER['HTTP_USER_AGENT']; // Получаем строку юзерагента пользователя
$clientIp = getUserIP(); // Получаем IP клиента
$clientGeo = getUserCountryCode($clientIp);

$leadR = new LeadR($userId, $apiKey);

/* Вернёт массив с прототипом данных для создания лида */
$leadDataPrototype = $leadR->getLeadDataPrototype();

$leadDataPrototype['geo'] = $clientGeo;
$leadDataPrototype['ip'] = $clientIp;
$leadDataPrototype['name'] = $clientName;
$leadDataPrototype['phone'] = $clientPhone;
$leadDataPrototype['user_agent'] = $clientUseragent;
$leadDataPrototype['referer'] = $clientReferer;


/* Создаст лид в указанном потоке, вернёт id лида */
try {
    $newLeadId = $leadR->createLeadByFlow($flowId, $leadDataPrototype);
    // Тут у нас лид успешно создался и у нас есть его ид в $newLeadId
    // Вы можете тут добавить код для отправки лида в трекер или что-то еще

    $leadDataPrototype['order_id'] = $newLeadId;
    $_SESSION['order_data'] = json_encode($leadDataPrototype);

    header('Location: ./success.php'); // Перенаправление на сакцесс страницу
    exit;
} catch (\Exception $e) {
    file_put_contents(
        $logFilePath,
        sprintf("[%s] Error: %s\n\tData: %s\n", date('Y-m-d H:i:s'), $e->getMessage(), print_r($leadDataPrototype, 1)),
        FILE_APPEND
    );
    // Произошла ощибка, сообщение об ошибке доступно в : $e->getMessage();
    $_SESSION['order_data'] = json_encode($leadDataPrototype);
    header('Location: ./error.php'); // Перенаправление на сакцесс страницу
    exit;
}
