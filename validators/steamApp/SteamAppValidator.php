<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\validators\steamApp;

use Userstory\ComponentBase\validators\BaseDTOValidator;
use Userstory\Yii2Exceptions\exceptions\typeMismatch\ExtendsMismatchException;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use function get_class;

/**
 * Валидатор атрибутов DTO сущности "Приложение".
 *
 * @property int    $appid Идентификатор во внешней системе.
 * @property int    $id    Идентификатор.
 * @property string $name  Название.
 */
class SteamAppValidator extends BaseDTOValidator
{
    /**
     * Список правил валидации для сущности "Приложение".
     *
     * @var array
     */
    protected static $ruleList = [
        [
            ['id'],
            'integer',
            'min'         => 1,
            'max'         => 2147483647,
            'skipOnEmpty' => 1,
        ],
        [
            ['appid'],
            'integer',
            'min' => -2147483648,
            'max' => 2147483647,
        ],
        [
            [
                'appid',
                'name',
            ],
            'required',
        ],
        [
            ['name'],
            'string',
            'max' => 255,
        ],
    ];

    /**
     * Данный метод возвращает массив, содержащий правила валидации атрибутов.
     *
     * @return array
     */
    public static function getRules(): array
    {
        return self::$ruleList;
    }

    /**
     * Данный метод возвращает массив, содержащий правила валидации атрибутов.
     *
     * @return array
     */
    public function rules(): array
    {
        return self::$ruleList;
    }

    /**
     * Метод выполняет валидацию ДТО сущности.
     *
     * @param mixed $object Объект для валидации.
     *
     * @throws ExtendsMismatchException Исключение генерируется в случае, если передан ДТО неподдерживаемого типа.
     *
     * @return bool
     */
    public function validateObject($object): bool
    {
        if (! $object instanceof SteamAppInterface) {
            throw new ExtendsMismatchException(get_class($object) . ' must implement ' . SteamAppInterface::class);
        }
        return parent::validateObject($object);
    }
}
