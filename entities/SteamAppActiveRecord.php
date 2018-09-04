<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\entities;

use Userstory\ComponentBase\traits\ModifierAwareTrait;
use yii;
use yii\db\ActiveRecord;
use Ziganshinalexey\Yii2SteamApp\validators\steamApp\SteamAppValidator;

/**
 * Модель данных сущности "Приложение"
 * Не использовать сохранение модели через метод save() за пределами Save-операции пакета.
 * Желательно, вообще не использовать.
 *
 * @property int    $appid Идентификатор во внешней системе.
 * @property int    $id    Идентификатор.
 * @property string $name  Название.
 */
class SteamAppActiveRecord extends ActiveRecord
{
    use ModifierAwareTrait;

    public const TRANSLATE_CATEGORY = 'Admin.Yii2SteamApp.SteamApp';

    /**
     * Возвращает подписи для атрибутов модели.
     *
     * @return array
     */
    public function attributeLabels(): array
    {
        return static::labels();
    }

    /**
     * Переопределенный метод возвращает список атрибутов..
     * Нужен для для корректной работы метода getAttributes.
     *
     * @return array
     */
    public function attributes(): array
    {
        return $this->scenarios()[$this->getScenario()];
    }

    /**
     * Возвращает список атрибутов AR, входящих в дефолтнй сценарий.
     *
     * @return array
     */
    public static function getDefaultScenarioFields(): array
    {
        return [
            'id',
            'appid',
            'name',
        ];
    }

    /**
     * Метод возвращает подписи для атрибутов модели.
     *
     * @return array
     */
    public static function labels(): array
    {
        return [
            'id'    => Yii::t(self::TRANSLATE_CATEGORY, 'field.id', 'Идентификатор'),
            'appid' => Yii::t(self::TRANSLATE_CATEGORY, 'field.appid', 'Идентификатор во внешней системе'),
            'name'  => Yii::t(self::TRANSLATE_CATEGORY, 'field.name', 'Название'),
        ];
    }

    /**
     * Данный метод возвращает массив, содержащий правила валидации атрибутов.
     *
     * @return array
     */
    public function rules(): array
    {
        return SteamAppValidator::getRules();
    }

    /**
     * Переопределенный метод возвращает список сценариев с активными атрибутами.
     * Нужен для корректной работы метода load.
     *
     * @return array
     */
    public function scenarios(): array
    {
        return [
            self::SCENARIO_DEFAULT => static::getDefaultScenarioFields(),
        ];
    }

    /**
     * Данный метод возвращает имя связанной с моделью таблицы.
     *
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%steam_app}}';
    }
}
