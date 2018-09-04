<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\operations\steamApp;

use Userstory\ComponentBase\events\FindOperationEvent;
use Userstory\Yii2Exceptions\exceptions\typeMismatch\IntMismatchException;
use yii;
use yii\base\InvalidConfigException;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\MultiFindOperationInterface;
use function is_int;

/**
 * Операция поиска сущностей "Приложение" на основе фильтра.
 */
class MultiFindOperation extends BaseFindOperation implements MultiFindOperationInterface
{
    /**
     * Метод возвращает все сущности по заданному фильтру в виде массива.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return array
     */
    public function allAsArray(): array
    {
        $query = $this->buildQuery();
        $data  = $this->getFromCache($query, true);
        if (null === $data || false === $data) {
            $data = $query->all($this->getDbConnection());
            $this->setToCache($query, $data, true);
        }
        return $data;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int    $appid    Атрибут "Идентификатор во внешней системе" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return MultiFindOperationInterface
     */
    public function byAppid(int $appid, string $operator = '='): MultiFindOperationInterface
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
     * @return MultiFindOperationInterface
     */
    public function byId(int $id, string $operator = '='): MultiFindOperationInterface
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
     * @return MultiFindOperationInterface
     */
    public function byIds(array $ids): MultiFindOperationInterface
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
     * @return MultiFindOperationInterface
     */
    public function byName(string $name, string $operator = '='): MultiFindOperationInterface
    {
        $this->getQuery()->byName($name, $operator);
        return $this;
    }

    /**
     * Метод возвращает все сущности по заданному фильтру.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SteamAppInterface[]
     */
    public function doOperation(): array
    {
        $data   = $this->allAsArray();
        $result = $this->getSteamAppList($data);
        $event  = Yii::createObject([
            'class'                  => FindOperationEvent::class,
            'dataTransferObjectList' => $result,
        ]);
        $this->trigger(self::DO_EVENT, $event);
        return $result;
    }

    /**
     * Метод устанавливает лимит получаемых сущностей.
     *
     * @param int $limit Количество необходимых сущностей.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return MultiFindOperationInterface
     */
    public function limit(int $limit): MultiFindOperationInterface
    {
        if ($limit <= 0) {
            return $this;
        }
        $this->getQuery()->limit($limit);
        return $this;
    }

    /**
     * Метод устанавливает смещение получаемых сущностей.
     *
     * @param int $offset Смещение в списке необходимых сущностей.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return MultiFindOperationInterface
     */
    public function offset(int $offset): MultiFindOperationInterface
    {
        if ($offset < 0) {
            return $this;
        }
        $this->getQuery()->offset($offset);
        return $this;
    }

    /**
     * Устанавливает сортировку результатов запроса по полю "appid".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return MultiFindOperationInterface
     */
    public function sortByAppid(string $sortType = 'ASC'): MultiFindOperationInterface
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
     * @return MultiFindOperationInterface
     */
    public function sortById(string $sortType = 'ASC'): MultiFindOperationInterface
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
     * @return MultiFindOperationInterface
     */
    public function sortByName(string $sortType = 'ASC'): MultiFindOperationInterface
    {
        $this->getQuery()->sortBy('name', $sortType);
        return $this;
    }
}
