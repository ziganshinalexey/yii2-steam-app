<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations;

use Userstory\ComponentBase\interfaces\DTOValidatorInterface;
use Userstory\ComponentHydrator\interfaces\HydratorInterface;
use Userstory\Yii2Cache\interfaces\QueryCacheInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\OperationResultInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;

/**
 * Интерфейс операции, реализующей логику создания сущностей "Приложение".
 */
interface SingleCreateOperationInterface
{
    public const DO_EVENT = 'DO_CREATE';

    /**
     * Метод выполняет операцию.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface;

    /**
     * Метод возвращает объект-результат ответа команды.
     *
     * @return OperationResultInterface
     */
    public function getResultPrototype(): OperationResultInterface;

    /**
     * Метод возвращает сущности, над которыми нужно выполнить операцию.
     *
     * @return SteamAppInterface
     */
    public function getSteamApp(): SteamAppInterface;

    /**
     * Метод возвращает валидатор ДТО сущности.
     *
     * @return DTOValidatorInterface
     */
    public function getSteamAppValidator(): DTOValidatorInterface;

    /**
     * Метод задает обработчик на событие.
     *
     * @param string        $name    Название события.
     * @param callable|null $handler Обработчик события.
     * @param mixed|null    $data    Данные которые будет использовать при триггере.
     * @param bool|true     $append  Флаг добавления или замены обработчика.
     *
     * @inherit
     *
     * @return void
     */
    public function on($name, $handler, $data = null, $append = true);

    /**
     * Метод устанавливает модель кэшера.
     *
     * @param QueryCacheInterface $cacheModel Новое значение модели кэшера.
     *
     * @return static
     */
    public function setCacheModel(QueryCacheInterface $cacheModel);

    /**
     * Метод устанавливает объект прототипа ответа команды.
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleCreateOperationInterface;

    /**
     * Метод устанавливает сущности, над которыми необходимо выполнить операцию.
     *
     * @param SteamAppInterface $item Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setSteamApp(SteamAppInterface $item): SingleCreateOperationInterface;

    /**
     * Метод задает значение гидратора сущности "Приложение" в массив для записи в БД и обратно.
     *
     * @param HydratorInterface $hydrator Объект класса преобразователя.
     *
     * @return static
     */
    public function setSteamAppDatabaseHydrator(HydratorInterface $hydrator);

    /**
     * Метод устанавливает валидатор ДТО сущности.
     *
     * @param DTOValidatorInterface $validator Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setSteamAppValidator(DTOValidatorInterface $validator): SingleCreateOperationInterface;
}
