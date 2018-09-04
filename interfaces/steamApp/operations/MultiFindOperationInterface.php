<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations;

use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\filters\MultiFilterOperationInterface;

/**
 * Интерфейс операции, реализующей логику поиска сущности.
 */
interface MultiFindOperationInterface extends BaseFindOperationInterface, MultiFilterOperationInterface
{
    /**
     * Метод возвращает все сущности по заданному фильтру в виде массива.
     *
     * @return array
     */
    public function allAsArray(): array;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int    $appid    Атрибут "Идентификатор во внешней системе" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byAppid(int $appid, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Приложение".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byId(int $id, string $operator = '='): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по нескольким значениям PK сущности "Приложение".
     *
     * @param array $ids Список PK  сущности "Приложение".
     *
     * @return MultiFindOperationInterface
     */
    public function byIds(array $ids): MultiFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Название" сущности "Приложение".
     *
     * @param string $name     Атрибут "Название" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return MultiFindOperationInterface
     */
    public function byName(string $name, string $operator = '='): MultiFindOperationInterface;

    /**
     * Метод возвращает все сущности по заданному фильтру.
     *
     * @return SteamAppInterface[]
     */
    public function doOperation(): array;

    /**
     * Метод устанавливает лимит получаемых сущностей.
     *
     * @param int $limit Количество необходимых сущностей.
     *
     * @return MultiFindOperationInterface
     */
    public function limit(int $limit): MultiFindOperationInterface;

    /**
     * Метод устанавливает смещение получаемых сущностей.
     *
     * @param int $offset Смещение в списке необходимых сущностей.
     *
     * @return MultiFindOperationInterface
     */
    public function offset(int $offset): MultiFindOperationInterface;

    /**
     * Устанавливает сортировку результатов запроса по полю "appid".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return MultiFindOperationInterface
     */
    public function sortByAppid(string $sortType = 'ASC'): MultiFindOperationInterface;

    /**
     * Устанавливает сортировку результатов запроса по полю "id".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return MultiFindOperationInterface
     */
    public function sortById(string $sortType = 'ASC'): MultiFindOperationInterface;

    /**
     * Устанавливает сортировку результатов запроса по полю "name".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return MultiFindOperationInterface
     */
    public function sortByName(string $sortType = 'ASC'): MultiFindOperationInterface;
}
