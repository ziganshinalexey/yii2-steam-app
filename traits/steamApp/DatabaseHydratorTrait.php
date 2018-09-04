<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\traits\steamApp;

use Userstory\ComponentHydrator\interfaces\HydratorInterface;
use yii\base\InvalidConfigException;
use Ziganshinalexey\Yii2SteamApp\hydrators\SteamAppDatabaseHydrator;

/**
 * Трейт, содержащий логику доступа к гидратору сущности "Приложение" в массив для записи в БД и обратно.
 */
trait DatabaseHydratorTrait
{
    /**
     * Экземпляр объекта гидратора для работы с БД сущности "Приложение".
     *
     * @var SteamAppDatabaseHydrator|null
     */
    protected $steamAppDatabaseHydrator;

    /**
     * Метод возвращает объект гидратора сущности "Приложение" в массив для записи в БД и обратно.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return HydratorInterface
     */
    protected function getSteamAppDatabaseHydrator(): HydratorInterface
    {
        if (null === $this->steamAppDatabaseHydrator) {
            throw new InvalidConfigException('Hydrator object can not be null');
        }
        return $this->steamAppDatabaseHydrator;
    }

    /**
     * Метод задает значение гидратора сущности "Приложение" в массив для записи в БД и обратно.
     *
     * @param HydratorInterface $hydrator Объект класса преобразователя.
     *
     * @return static
     */
    public function setSteamAppDatabaseHydrator(HydratorInterface $hydrator)
    {
        $this->steamAppDatabaseHydrator = $hydrator;
        return $this;
    }
}
