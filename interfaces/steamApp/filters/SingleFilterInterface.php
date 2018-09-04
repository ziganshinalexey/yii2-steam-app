<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\filters;

/**
 * Интерфейс объявляет фильтр форму для сущности "Приложение".
 */
interface SingleFilterInterface extends BaseFilterInterface
{
    /**
     * Метод применяет фильтр к операции над одной сущности.
     *
     * @param SingleFilterOperationInterface $operation Обект реализующий методы фильтров операции.
     *
     * @return SingleFilterOperationInterface
     */
    public function applyFilter(SingleFilterOperationInterface $operation): SingleFilterOperationInterface;

    /**
     * Метод устанавливает атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setAppid(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Идентификатор" сущности "Приложение".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setId(int $value): SingleFilterInterface;

    /**
     * Метод устанавливает атрибут "Название" сущности "Приложение".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setName(string $value): SingleFilterInterface;
}
