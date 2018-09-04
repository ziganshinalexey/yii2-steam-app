<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\filters;

use Userstory\ComponentBase\interfaces\AbstractFilterInterface;

/**
 * Интерфейс объявляет методы фильтра данных.
 */
interface BaseFilterInterface extends AbstractFilterInterface
{
    /**
     * Метод возвращает атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @return int
     */
    public function getAppid();

    /**
     * Метод возвращает атрибут "Идентификатор" сущности "Приложение".
     *
     * @return int
     */
    public function getId();

    /**
     * Метод возвращает атрибут "Название" сущности "Приложение".
     *
     * @return string
     */
    public function getName();
}
