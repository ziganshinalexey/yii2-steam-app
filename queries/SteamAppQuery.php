<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\queries;

use yii\db\Query;
use Ziganshinalexey\Yii2SteamApp\entities\SteamAppActiveRecord;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\QueryInterface;

/**
 * Класс реализует обертку для формирования критериев выборки данных.
 */
class SteamAppQuery extends Query implements QueryInterface
{
    /**
     * Выборка по атрибуту "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int    $appid    Атрибут "Идентификатор во внешней системе" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byAppid(int $appid, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'appid',
            $appid,
        ]);
    }

    /**
     * Выборка по атрибуту "Идентификатор" сущности "Приложение".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byId(int $id, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'id',
            $id,
        ]);
    }

    /**
     * Задает критерий фильтрации по нескольким значениям атрибута "Идентификатор" сущности "Приложение".
     *
     * @param array $ids Атрибут "Идентификатор" сущности "Приложение".
     *
     * @return QueryInterface
     */
    public function byIds(array $ids): QueryInterface
    {
        return $this->andWhere([
            'IN',
            'id',
            $ids,
        ]);
    }

    /**
     * Выборка по атрибуту "Название" сущности "Приложение".
     *
     * @param string $name     Атрибут "Название" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byName(string $name, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'name',
            $name,
        ]);
    }

    /**
     * Метод выполняет инициализацию объекта.
     *
     * @inherit
     *
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->from(SteamAppActiveRecord::tableName());
        $this->select('*');
    }

    /**
     * Устанавливает сортировку результатов запроса.
     *
     * @param string $fieldName Название атрибута, по которому производится сортировка.
     * @param string $sortType  Тип сортировки - ASC или DESC.
     *
     * @return QueryInterface
     */
    public function sortBy(string $fieldName, string $sortType = 'DESC'): QueryInterface
    {
        $sortType = 'ASC' === $sortType ? $sortType : 'DESC';
        return $this->addOrderBy($fieldName . ' ' . $sortType);
    }
}
