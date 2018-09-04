<?php

declare(strict_types = 1);

return [
    'components'    => [
        'steamApp' => require __DIR__ . '/steamApp.component.global.php',
    ],
    'controllerMap' => [
        'migrate' => [
            'migrationPathList' => ['@vendor/ziganshinalexey/yii2-steam-app/migrations'],
        ],
    ],
];
