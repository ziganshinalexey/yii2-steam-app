<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\components;

use Userstory\ComponentBase\interfaces\ComponentWithFactoryInterface;
use Userstory\ComponentBase\traits\ComponentEventTrait;
use Userstory\ComponentBase\traits\ModelsFactoryTrait;
use yii\base\Component;
use yii\base\InvalidConfigException;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\ComponentInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\FactoryInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiDeleteOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleCreateOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleUpdateOperationInterface;
use function get_class;

/**
 * Компонент. Является программным API для доступа к пакету.
 */
class SteamAppComponent extends Component implements ComponentWithFactoryInterface, ComponentInterface
{
    use ModelsFactoryTrait {
        ModelsFactoryTrait::getModelFactory as getModelFactoryFromTrait;
    }
    use ComponentEventTrait;

    /**
     * Метод возвращает операцию создания одного экземпляра сущности "Приложение".
     *
     * @param SteamAppInterface $item Сущность для создания.
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return SingleCreateOperationInterface
     */
    public function createOne(SteamAppInterface $item): SingleCreateOperationInterface
    {
        $operation = $this->getModelFactory()->getSteamAppSingleCreateOperation()->setSteamApp($item);
        $operation->on($operation::DO_EVENT, [
            $this,
            'triggerCreate',
        ]);
        return $operation;
    }

    /**
     * Метод возвращает операцию удаления нескольких экземпляров сущности "Приложение".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return MultiDeleteOperationInterface
     */
    public function deleteMany(): MultiDeleteOperationInterface
    {
        $operation = $this->getModelFactory()->getSteamAppMultiDeleteOperation();
        $operation->on($operation::DO_EVENT, [
            $this,
            'triggerDelete',
        ]);
        return $operation;
    }

    /**
     * Метод возвращает операцию поиска нескольких экземпляров сущности "Приложение".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return MultiFindOperationInterface
     */
    public function findMany(): MultiFindOperationInterface
    {
        $operation = $this->getModelFactory()->getSteamAppMultiFindOperation();
        $operation->on($operation::DO_EVENT, [
            $this,
            'triggerFind',
        ]);
        return $operation;
    }

    /**
     * Метод возвращает операцию поиска одного экземпляра сущности "Приложение".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return SingleFindOperationInterface
     */
    public function findOne(): SingleFindOperationInterface
    {
        $operation = $this->getModelFactory()->getSteamAppSingleFindOperation();
        $operation->on($operation::DO_EVENT, [
            $this,
            'triggerFind',
        ]);
        return $operation;
    }

    /**
     * Метод возвращает фабрику моделей пакета "Приложение".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return FactoryInterface
     */
    public function getModelFactory(): FactoryInterface
    {
        $modelFactory = $this->getModelFactoryFromTrait();
        if (! $modelFactory instanceof FactoryInterface) {
            throw new InvalidConfigException('Class ' . get_class($modelFactory) . ' must implement interface ' . FactoryInterface::class);
        }
        return $modelFactory;
    }

    /**
     * Метод возвращает прототип объекта DTO "Приложение".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return SteamAppInterface
     */
    public function getSteamAppPrototype(): SteamAppInterface
    {
        return $this->getModelFactory()->getSteamAppPrototype();
    }

    /**
     * Метод возвращает интерефейс операции обновления одного экземпляра сущности "Приложение".
     *
     * @param SteamAppInterface $item Сущность для обновления.
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return SingleUpdateOperationInterface
     */
    public function updateOne(SteamAppInterface $item): SingleUpdateOperationInterface
    {
        $operation = $this->getModelFactory()->getSteamAppSingleUpdateOperation()->setSteamApp($item);
        $operation->on($operation::DO_EVENT, [
            $this,
            'triggerUpdate',
        ]);
        return $operation;
    }
}
