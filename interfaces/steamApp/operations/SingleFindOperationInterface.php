<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations;

use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\filters\SingleFilterOperationInterface;

/**
 * Интерфейс операции, реализующей логику поиска сущности.
 */
interface SingleFindOperationInterface extends BaseFindOperationInterface, SingleFilterOperationInterface
{
    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int    $appid    Атрибут "Идентификатор во внешней системе" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byAppid(int $appid, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Приложение".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byId(int $id, string $operator = '='): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по нескольким значениям PK сущности "Приложение".
     *
     * @param array $ids Список PK  сущности "Приложение".
     *
     * @return SingleFindOperationInterface
     */
    public function byIds(array $ids): SingleFindOperationInterface;

    /**
     * Задает критерий фильтрации выборки по атрибуту "Название" сущности "Приложение".
     *
     * @param string $name     Атрибут "Название" сущности "Приложение".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return SingleFindOperationInterface
     */
    public function byName(string $name, string $operator = '='): SingleFindOperationInterface;

    /**
     * Метод возвращает одну сущность по заданному фильтру.
     *
     * @return SteamAppInterface|null
     */
    public function doOperation(): ?SteamAppInterface;

    /**
     * Устанавливает сортировку результатов запроса по полю "appid".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return SingleFindOperationInterface
     */
    public function sortByAppid(string $sortType = 'ASC'): SingleFindOperationInterface;

    /**
     * Устанавливает сортировку результатов запроса по полю "id".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return SingleFindOperationInterface
     */
    public function sortById(string $sortType = 'ASC'): SingleFindOperationInterface;

    /**
     * Устанавливает сортировку результатов запроса по полю "name".
     *
     * @param string $sortType Тип сортировки - ASC или DESC.
     *
     * @return SingleFindOperationInterface
     */
    public function sortByName(string $sortType = 'ASC'): SingleFindOperationInterface;
}
