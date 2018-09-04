<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\filters\steamApp;

use Userstory\ComponentBase\models\Model;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\filters\BaseFilterInterface;

/**
 * Класс реализует методы применения фильтра к операции.
 */
class BaseFilter extends Model implements BaseFilterInterface
{
    /**
     * Свойство хранит атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @var int|null
     */
    protected $appid;

    /**
     * Свойство хранит атрибут "Идентификатор" сущности "Приложение".
     *
     * @var int|null
     */
    protected $id;

    /**
     * Свойство хранит атрибут "Название" сущности "Приложение".
     *
     * @var string|null
     */
    protected $name;

    /**
     * Метод возвращает атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @return int
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * Метод возвращает атрибут "Идентификатор" сущности "Приложение".
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Метод возвращает атрибут "Название" сущности "Приложение".
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
