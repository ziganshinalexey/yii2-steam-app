<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\factories;

use Userstory\ComponentBase\interfaces\DTOValidatorInterface;
use Userstory\ComponentBase\models\ModelsFactory;
use Userstory\ComponentHydrator\interfaces\HydratorInterface;
use Userstory\Yii2Cache\interfaces\QueryCacheInterface;
use yii\base\InvalidConfigException;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\OperationListResultInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\OperationResultInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\FactoryInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiDeleteOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleCreateOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleUpdateOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\QueryInterface;

/**
 * Фабрика. Реализует породждение моделей пакета для работы с сущностью "Приложение".
 */
class SteamAppFactory extends ModelsFactory implements FactoryInterface
{
    public const STEAM_APP_PROTOTYPE                       = 'steamAppPrototype';
    public const STEAM_APP_VALIDATOR                       = 'steamAppValidator';
    public const STEAM_APP_OPERATION_RESULT_PROTOTYPE      = 'steamAppOperationResultPrototype';
    public const STEAM_APP_LIST_OPERATION_RESULT_PROTOTYPE = 'steamAppListOperationResultPrototype';
    public const STEAM_APP_QUERY                           = 'steamAppQuery';
    public const STEAM_APP_DATABASE_HYDRATOR               = 'steamAppDatabaseHydrator';
    public const STEAM_APP_SINGLE_CREATE_OPERATION         = 'steamAppSingleCreateOperation';
    public const STEAM_APP_SINGLE_UPDATE_OPERATION         = 'steamAppSingleUpdateOperation';
    public const STEAM_APP_SINGLE_FIND_OPERATION           = 'steamAppSingleFindOperation';
    public const STEAM_APP_MULTI_DELETE_OPERATION          = 'steamAppMultiDeleteOperation';
    public const STEAM_APP_MULTI_FIND_OPERATION            = 'steamAppMultiFindOperation';
    public const STEAM_APP_CACHE                           = 'steamAppCache';

    /**
     * Метод возвращает модель кеширования запросов для выборки данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return QueryCacheInterface
     */
    protected function getSteamAppCache(): QueryCacheInterface
    {
        return $this->getModelInstance(self::STEAM_APP_CACHE, [], false);
    }

    /**
     * Метод возвращает модель гидратора для работы с БД.
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return HydratorInterface
     */
    protected function getSteamAppDatabaseHydrator(): HydratorInterface
    {
        return $this->getModelInstance(self::STEAM_APP_DATABASE_HYDRATOR, [], false);
    }

    /**
     * Метод возвращает прототип объекта результата операции над списокм сущностей "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return OperationListResultInterface
     */
    public function getSteamAppListOperationResultPrototype(): OperationListResultInterface
    {
        return $this->getModelInstance(static::STEAM_APP_LIST_OPERATION_RESULT_PROTOTYPE, [], false);
    }

    /**
     * Метод возвращает операцию для удаления нескольких сущности "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return MultiDeleteOperationInterface
     */
    public function getSteamAppMultiDeleteOperation(): MultiDeleteOperationInterface
    {
        return $this->getModelInstance(self::STEAM_APP_MULTI_DELETE_OPERATION, [], false)
                    ->setResultPrototype($this->getSteamAppOperationResultPrototype())
                    ->setCacheModel($this->getSteamAppCache());
    }

    /**
     * Метод возвращает операцию для поиска нескольких сущностей "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return MultiFindOperationInterface
     */
    public function getSteamAppMultiFindOperation(): MultiFindOperationInterface
    {
        return $this->getModelInstance(self::STEAM_APP_MULTI_FIND_OPERATION, [], false)
                    ->setQuery($this->getSteamAppQuery())
                    ->setSteamAppPrototype($this->getSteamAppPrototype())
                    ->setSteamAppDatabaseHydrator($this->getSteamAppDatabaseHydrator())
                    ->setCacheModel($this->getSteamAppCache());
    }

    /**
     * Метод возвращает прототип объекта результата операции над сущностью "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return OperationResultInterface
     */
    public function getSteamAppOperationResultPrototype(): OperationResultInterface
    {
        return $this->getModelInstance(static::STEAM_APP_OPERATION_RESULT_PROTOTYPE, [], false);
    }

    /**
     * Метод возвращает протитип модели DTO сущности "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return SteamAppInterface
     */
    public function getSteamAppPrototype(): SteamAppInterface
    {
        return $this->getModelInstance(self::STEAM_APP_PROTOTYPE, [], false);
    }

    /**
     * Метод возвращает модель построителя запросов для выборки данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return QueryInterface
     */
    protected function getSteamAppQuery(): QueryInterface
    {
        return $this->getModelInstance(self::STEAM_APP_QUERY, [], false);
    }

    /**
     * Метод возвращает операцию для создания одной сущности "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return SingleCreateOperationInterface
     */
    public function getSteamAppSingleCreateOperation(): SingleCreateOperationInterface
    {
        return $this->getModelInstance(self::STEAM_APP_SINGLE_CREATE_OPERATION, [], false)
                    ->setResultPrototype($this->getSteamAppOperationResultPrototype())
                    ->setSteamAppValidator($this->getSteamAppValidator())
                    ->setSteamAppDatabaseHydrator($this->getSteamAppDatabaseHydrator())
                    ->setCacheModel($this->getSteamAppCache());
    }

    /**
     * Метод возвращает операцию для поиска одной сущности "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return SingleFindOperationInterface
     */
    public function getSteamAppSingleFindOperation(): SingleFindOperationInterface
    {
        return $this->getModelInstance(self::STEAM_APP_SINGLE_FIND_OPERATION, [], false)
                    ->setQuery($this->getSteamAppQuery())
                    ->setSteamAppPrototype($this->getSteamAppPrototype())
                    ->setSteamAppDatabaseHydrator($this->getSteamAppDatabaseHydrator())
                    ->setCacheModel($this->getSteamAppCache());
    }

    /**
     * Метод возвращает операцию для обновления одной сущности "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return SingleUpdateOperationInterface
     */
    public function getSteamAppSingleUpdateOperation(): SingleUpdateOperationInterface
    {
        return $this->getModelInstance(self::STEAM_APP_SINGLE_UPDATE_OPERATION, [], false)
                    ->setResultPrototype($this->getSteamAppOperationResultPrototype())
                    ->setSteamAppValidator($this->getSteamAppValidator())
                    ->setSteamAppDatabaseHydrator($this->getSteamAppDatabaseHydrator())
                    ->setCacheModel($this->getSteamAppCache());
    }

    /**
     * Метод возвращает прототип объекта валидатора сущности "Приложение".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return DTOValidatorInterface
     */
    public function getSteamAppValidator(): DTOValidatorInterface
    {
        return $this->getModelInstance(self::STEAM_APP_VALIDATOR, [], false);
    }
}
