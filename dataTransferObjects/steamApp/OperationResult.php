<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\dataTransferObjects\steamApp;

use Userstory\ComponentBase\models\Model;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\OperationResultInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;

/**
 * Объект отвечающий за результат работы операции.
 */
class OperationResult extends Model implements OperationResultInterface
{
    /**
     * DTO сущности, получившаяся в результате выполнения операции.
     *
     * @var SteamAppInterface|null
     */
    protected $steamApp;

    /**
     * Метод копирования объекта результата.
     *
     * @return OperationResultInterface
     */
    public function copy(): OperationResultInterface
    {
        return new static();
    }

    /**
     * Метод возвращает сущность, получившуюся в результате работы операции.
     *
     * @return SteamAppInterface|null
     */
    public function getSteamApp(): ?SteamAppInterface
    {
        return $this->steamApp;
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
     * Метод устанавливает сущность, получившуюся в результате работы операции.
     *
     * @param SteamAppInterface $value Новое значение.
     *
     * @return OperationResultInterface
     */
    public function setSteamApp(SteamAppInterface $value): OperationResultInterface
    {
        $this->steamApp = $value;
        return $this;
    }
}
