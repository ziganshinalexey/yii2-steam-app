<?php

declare(strict_types = 1);

use Userstory\ComponentBase\interfaces\ComponentWithFactoryInterface;
use Userstory\Yii2Cache\caches\operations\SimpleQueryCache;
use Ziganshinalexey\Yii2SteamApp\components\SteamAppComponent;
use Ziganshinalexey\Yii2SteamApp\dataTransferObjects\steamApp\OperationListResult;
use Ziganshinalexey\Yii2SteamApp\dataTransferObjects\steamApp\OperationResult;
use Ziganshinalexey\Yii2SteamApp\dataTransferObjects\steamApp\SteamApp;
use Ziganshinalexey\Yii2SteamApp\factories\SteamAppFactory;
use Ziganshinalexey\Yii2SteamApp\hydrators\SteamAppDatabaseHydrator;
use Ziganshinalexey\Yii2SteamApp\operations\steamApp\MultiDeleteOperation;
use Ziganshinalexey\Yii2SteamApp\operations\steamApp\MultiFindOperation;
use Ziganshinalexey\Yii2SteamApp\operations\steamApp\SingleCreateOperation;
use Ziganshinalexey\Yii2SteamApp\operations\steamApp\SingleFindOperation;
use Ziganshinalexey\Yii2SteamApp\operations\steamApp\SingleUpdateOperation;
use Ziganshinalexey\Yii2SteamApp\queries\SteamAppQuery;
use Ziganshinalexey\Yii2SteamApp\validators\steamApp\SteamAppValidator;

return [
    'class'                                           => SteamAppComponent::class,
    ComponentWithFactoryInterface::FACTORY_CONFIG_KEY => [
        'class'                                => SteamAppFactory::class,
        SteamAppFactory::MODEL_CONFIG_LIST_KEY => [
            SteamAppFactory::STEAM_APP_OPERATION_RESULT_PROTOTYPE      => [
                SteamAppFactory::OBJECT_TYPE_KEY => OperationResult::class,
            ],
            SteamAppFactory::STEAM_APP_LIST_OPERATION_RESULT_PROTOTYPE => [
                SteamAppFactory::OBJECT_TYPE_KEY => OperationListResult::class,
            ],
            SteamAppFactory::STEAM_APP_SINGLE_CREATE_OPERATION         => [
                SteamAppFactory::OBJECT_TYPE_KEY => SingleCreateOperation::class,
            ],
            SteamAppFactory::STEAM_APP_SINGLE_UPDATE_OPERATION         => [
                SteamAppFactory::OBJECT_TYPE_KEY => SingleUpdateOperation::class,
            ],
            SteamAppFactory::STEAM_APP_MULTI_DELETE_OPERATION          => [
                SteamAppFactory::OBJECT_TYPE_KEY => MultiDeleteOperation::class,
            ],
            SteamAppFactory::STEAM_APP_SINGLE_FIND_OPERATION           => [
                SteamAppFactory::OBJECT_TYPE_KEY => SingleFindOperation::class,
            ],
            SteamAppFactory::STEAM_APP_MULTI_FIND_OPERATION            => [
                SteamAppFactory::OBJECT_TYPE_KEY => MultiFindOperation::class,
            ],
            SteamAppFactory::STEAM_APP_QUERY                           => [
                SteamAppFactory::OBJECT_TYPE_KEY => SteamAppQuery::class,
            ],
            SteamAppFactory::STEAM_APP_DATABASE_HYDRATOR               => [
                SteamAppFactory::OBJECT_TYPE_KEY => SteamAppDatabaseHydrator::class,
            ],
            SteamAppFactory::STEAM_APP_CACHE                           => [
                SteamAppFactory::OBJECT_TYPE_KEY => [
                    'class'     => SimpleQueryCache::class,
                    'keyPrefix' => 'yii2steamapp-steamapp',
                ],
            ],
            SteamAppFactory::STEAM_APP_PROTOTYPE                       => [
                SteamAppFactory::OBJECT_TYPE_KEY => SteamApp::class,
            ],
            SteamAppFactory::STEAM_APP_VALIDATOR                       => [
                SteamAppFactory::OBJECT_TYPE_KEY => SteamAppValidator::class,
            ],
        ],
    ],
];
