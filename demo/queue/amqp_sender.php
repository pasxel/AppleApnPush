<?php

include_once __DIR__ . '/include_config.php';

use Apple\ApnPush\Notification;
use Apple\ApnPush\Notification\Message;
use Apple\ApnPush\Queue\Amqp;

$autoload = include_once __DIR__ . '/../../vendor/autoload.php';

// Create notification
$notification = new Notification(CERTIFICATE_FILE);

// Create message
$message = new Message();
$message
    ->setBody('[Amqp queue] Hello world')
    ->setDeviceToken(DEVICE_TOKEN);

// Create amqp queue and send message
$amqp = Amqp::create($notification);
$amqp->addMessage($message);


