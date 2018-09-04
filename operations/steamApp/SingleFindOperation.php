<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\operations\steamApp;

use Userstory\ComponentBase\events\FindOperationEvent;
use Userstory\Yii2Exceptions\exceptions\typeMismatch\IntMismatchException;
use yii;
use yii\base\InvalidConfigException;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleFindOperationInterface;
use function is_int;

/**
 * Операция поиска сущностей "Приложение" на основе фильтра.
 */
class SingleFindOperation extends BaseFindOperation implements SingleFindOperationInterface
{
    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int    $appid    Атрибут "Идентификатор во внешней системе" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SingleFindOperationInterface
     */
    public function byAppid(int $appid, string $operator = '='): SingleFindOperationInterface
    {
        $this->getQuery()->byAppid($appid, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Приложение".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SingleFindOperationInterface
     */
    public function byId(int $id, string $operator = '='): SingleFindOperationInterface
    {
        $this->getQuery()->byId($id, $operator);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по нескольким значениям PK сущности "Приложение".
     *
     * @param array $ids Список PK  сущности "Приложение".
     *
     * @throws IntMismatchException   Если в переданном массиве содержатся не только целые числа.
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SingleFindOperationInterface
     */
    public function byIds(array $ids): SingleFindOperationInterface
    {
        foreach ($ids as $id) {
            if (! is_int($id)) {
                throw new IntMismatchException('All SteamApp ids must be integer');
            }
        }
        $this->getQuery()->byIds($ids);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Название" сущности "Приложение".
     *
     * @param string $name     Атрибут "Название" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SingleFindOperationInterface
     */
    public function byName(string $name, string $operator = '='): SingleFindOperationInterface
    {
        $this->getQuery()->byName($name, $operator);
        return $this;
    }

    /**
     * Метод возвращает одну сущность по заданному фильтру.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SteamAppInterface|null
     */
    public function doOperation(): ?SteamAppInterface
    {
        $query = $this->buildQuery();
        $data  = $this->getFromCache($query);
        if (null === $data || false === $data) {
            $data = $query->one($this->getDbConnection());
            if (! $data) {
                return null;
            }
            $data = [$data];
            $this->setToCache($query, $data);
        }

        $list   = $this->getSteamAppList($data);
        $result = array_shift($list);
        $event  = Yii::createObject([
            'class'                  => FindOperationEvent::class,
            'dataTransferObjectList' => $list,
        ]);
        $this->trigger(self::DO_EVENT, $event);
        return $result;
    }

    /**
     * Устанавливает сортировку результатов запроса по полю "appid".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SingleFindOperationInterface
     */
    public function sortByAppid(string $sortType = 'ASC'): SingleFindOperationInterface
    {
        $this->getQuery()->sortBy('appid', $sortType);
        return $this;
    }

    /**
     * Устанавливает сортировку результатов запроса по полю "id".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SingleFindOperationInterface
     */
    public function sortById(string $sortType = 'ASC'): SingleFindOperationInterface
    {
        $this->getQuery()->sortBy('id', $sortType);
        return $this;
    }

    /**
     * Устанавливает сортировку результатов запроса по полю "name".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SingleFindOperationInterface
     */
    public function sortByName(string $sortType = 'ASC'): SingleFindOperationInterface
    {
        $this->getQuery()->sortBy('name', $sortType);
        return $this;
    }
}
