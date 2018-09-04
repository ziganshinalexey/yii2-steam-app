<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\dataTransferObjects\steamApp;

use Userstory\ComponentBase\models\Model;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\OperationListResultInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;

/**
 * Объект результат работы операции с множеством DTO сущностей.
 */
class OperationListResult extends Model implements OperationListResultInterface
{
    /**
     * DTO, получившиеся в результате выполнения операции.
     *
     * @var SteamAppInterface[]
     */
    protected $steamAppList = [];

    /**
     * Метод копирования объекта результата.
     *
     * @return OperationListResultInterface
     */
    public function copy(): OperationListResultInterface
    {
        return new static();
    }

    /**
     * Метод возвращает список DTO сущностей, получившихся в результате работы операции.
     *
     * @return SteamAppInterface[]
     */
    public function getSteamAppList(): array
    {
        return $this->steamAppList;
    }

    /**
     * Метод указывает прошла ли операция успешно.
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return ! $this->hasErrors();
    }

    /**
     * Метод устанавливает список DTO сущсностей, получившихся в результате работы команды.
     *
     * @param SteamAppInterface[] $value Новое значение.
     *
     * @return OperationListResultInterface
     */
    public function setSteamAppList(array $value): OperationListResultInterface
    {
        $this->steamAppList = $value;
        return $this;
    }
}
