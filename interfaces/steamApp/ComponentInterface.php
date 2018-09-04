<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp;

use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiDeleteOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleCreateOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleUpdateOperationInterface;

/**
 * Интерфейс компонента для работы с сущностями "Приложение".
 */
interface ComponentInterface
{
    public const CREATE_OPERATION_EVENT = 'createEvent';
    public const UPDATE_OPERATION_EVENT = 'updateEvent';
    public const DELETE_OPERATION_EVENT = 'deleteEvent';
    public const FIND_OPERATION_EVENT   = 'findEvent';

    /**
     * Метод возвращает интерфейс операцию создания одного экземпляра сущности "Приложение".
     *
     * @param SteamAppInterface $item Сущность для создания.
     *
     * @return SingleCreateOperationInterface
     */
    public function createOne(SteamAppInterface $item): SingleCreateOperationInterface;

    /**
     * Метод возвращает интерфейс операции удаления нескольких экземпляров сущности "Приложение".
     *
     * @return MultiDeleteOperationInterface
     */
    public function deleteMany(): MultiDeleteOperationInterface;

    /**
     * Метод возвращает интерефейс операции поиска нескольких экземпляра сущности "Приложение".
     *
     * @return MultiFindOperationInterface
     */
    public function findMany(): MultiFindOperationInterface;

    /**
     * Метод возвращает интерефейс операции поиска одного экземпляра сущности "Приложение".
     *
     * @return SingleFindOperationInterface
     */
    public function findOne(): SingleFindOperationInterface;

    /**
     * Метод возвращает прототип объекта DTO "Приложение".
     *
     * @return SteamAppInterface
     */
    public function getSteamAppPrototype(): SteamAppInterface;

    /**
     * Метод возвращает интерефейс операции обновления одного экземпляра сущности "Приложение".
     *
     * @param SteamAppInterface $item Сущность для обновления.
     *
     * @return SingleUpdateOperationInterface
     */
    public function updateOne(SteamAppInterface $item): SingleUpdateOperationInterface;
}
