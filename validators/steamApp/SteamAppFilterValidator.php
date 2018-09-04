<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\validators\steamApp;

use Userstory\ComponentHelpers\helpers\ArrayHelper;
use Userstory\Yii2Forms\validators\rest\AbstractFilterValidator;

/**
 * Валидатор атрибутов фильтра сущности "Приложение".
 *
 * @property int    $appid Идентификатор во внешней системе.
 * @property int    $id    Идентификатор.
 * @property string $name  Название.
 */
class SteamAppFilterValidator extends AbstractFilterValidator
{
    /**
     * Данный метод возвращает массив, содержащий правила валидации атрибутов.
     *
     * @return array
     */
    public function rules(): array
    {
        return ArrayHelper::merge(parent::rules(), SteamAppValidator::getRules());
    }
}
