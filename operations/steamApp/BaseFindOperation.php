<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\operations\steamApp;

use Userstory\Database\traits\ObjectWithDbConnectionTrait;
use Userstory\Yii2Cache\traits\ObjectWithQueryCacheTrait;
use yii\base\InvalidConfigException;
use yii\base\Model;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\BaseFindOperationInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\QueryInterface;
use Ziganshinalexey\Yii2SteamApp\traits\steamApp\DatabaseHydratorTrait;

/**
 * Операция поиска сущностей "Приложение" на основе фильтра.
 */
class BaseFindOperation extends Model implements BaseFindOperationInterface
{
    use ObjectWithDbConnectionTrait;
    use DatabaseHydratorTrait;
    use ObjectWithQueryCacheTrait;

    /**
     * Объект запрос к базе данных.
     *
     * @var QueryInterface|null
     */
    protected $query;

    /**
     * Прототип объекта сущности.
     *
     * @var SteamAppInterface|null
     */
    protected $steamAppPrototype;

    /**
     * Метод строит запрос дял получения сущностей, добавляя в него необходимые параметры.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return QueryInterface
     */
    protected function buildQuery(): QueryInterface
    {
        return $this->getQuery();
    }

    /**
     * Метод возвращает объект запрос к базе данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return QueryInterface
     */
    protected function getQuery(): QueryInterface
    {
        if (null === $this->query) {
            throw new InvalidConfigException(__METHOD__ . '() Query can not be empty');
        }
        return $this->query;
    }

    /**
     * Метод создает из полученных из базы данных объекты сущностей.
     *
     * @param array $data Данные из базы данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SteamAppInterface[]
     */
    protected function getSteamAppList(array $data): array
    {
        $result    = [];
        $prototype = $this->getSteamAppPrototype();
        foreach ($data as $item) {
            $object   = $prototype->copy();
            $hydrator = $this->getSteamAppDatabaseHydrator();
            $object   = $hydrator->hydrate($item, $object);

            $result[$object->getId()] = $object;
        }
        return $result;
    }

    /**
     * Метод возвращает сущность, над которой нужно выполнить операцию.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SteamAppInterface
     */
    public function getSteamAppPrototype(): SteamAppInterface
    {
        if (null === $this->steamAppPrototype) {
            throw new InvalidConfigException(__METHOD__ . '() SteamAppPrototype prototype can not be empty');
        }
        return $this->steamAppPrototype;
    }

    /**
     * Метод устанавливает объект запрос к базе данных.
     *
     * @param QueryInterface $query Новое значение.
     *
     * @return BaseFindOperationInterface
     */
    public function setQuery(QueryInterface $query): BaseFindOperationInterface
    {
        $this->query = $query;
        return $this;
    }

    /**
     * Метод устанавливает сущность, над которой необходимо выполнить операцию.
     *
     * @param SteamAppInterface $value Новое значение.
     *
     * @return BaseFindOperationInterface
     */
    public function setSteamAppPrototype(SteamAppInterface $value): BaseFindOperationInterface
    {
        $this->steamAppPrototype = $value;
        return $this;
    }
}
