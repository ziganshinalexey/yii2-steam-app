<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp;

use Userstory\ComponentBase\interfaces\DTOValidatorInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\OperationListResultInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\OperationResultInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiDeleteOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleCreateOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleUpdateOperationInterface;

/**
 * Интерфейс фабрики. Опеределяет методы порождения моделей пакета.
 */
interface FactoryInterface
{
    /**
     * Метод возвращает прототип объекта результата операции над списокм сущностей "Приложение".
     *
     * @return OperationListResultInterface
     */
    public function getSteamAppListOperationResultPrototype(): OperationListResultInterface;

    /**
     * Метод возвращает интерфейс операции для удаления нескольких сущностей "Приложение".
     *
     * @return MultiDeleteOperationInterface
     */
    public function getSteamAppMultiDeleteOperation(): MultiDeleteOperationInterface;

    /**
     * Метод возвращает интерфейс операции для поиска нескольких сущностей "Приложение".
     *
     * @return MultiFindOperationInterface
     */
    public function getSteamAppMultiFindOperation(): MultiFindOperationInterface;

    /**
     * Метод возвращает прототип объекта результата операции над сущностью "Приложение".
     *
     * @return OperationResultInterface
     */
    public function getSteamAppOperationResultPrototype(): OperationResultInterface;

    /**
     * Метод возвращает протитип модели DTO сущности "Приложение".
     *
     * @return SteamAppInterface
     */
    public function getSteamAppPrototype(): SteamAppInterface;

    /**
     * Метод возвращает интерфейс операции для создания одной сущности "Приложение".
     *
     * @return SingleCreateOperationInterface
     */
    public function getSteamAppSingleCreateOperation(): SingleCreateOperationInterface;

    /**
     * Метод возвращает интерфейс операции для поиска одной сущности "Приложение".
     *
     * @return SingleFindOperationInterface
     */
    public function getSteamAppSingleFindOperation(): SingleFindOperationInterface;

    /**
     * Метод возвращает интерфейс для обновления одной сущности "Приложение".
     *
     * @return SingleUpdateOperationInterface
     */
    public function getSteamAppSingleUpdateOperation(): SingleUpdateOperationInterface;

    /**
     * Метод возвращает прототип объекта валидатора сущности "Приложение".
     *
     * @return DTOValidatorInterface
     */
    public function getSteamAppValidator(): DTOValidatorInterface;
}
