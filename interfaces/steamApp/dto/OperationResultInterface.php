<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto;

use Userstory\ComponentBase\interfaces\BaseOperationResultInterface;
use Userstory\ComponentBase\interfaces\PrototypeInterface;

/**
 * Результат работы операции, выполняющей действия над одной сущностью "Приложение".
 */
interface OperationResultInterface extends BaseOperationResultInterface, PrototypeInterface
{
    /**
     * Метод возвращает сущность, получившуюся в результате работы операции.
     *
     * @return SteamAppInterface|null
     */
    public function getSteamApp(): ?SteamAppInterface;

    /**
     * Метод устанавливает сущность, получившуюся в результате работы операции.
     *
     * @param SteamAppInterface $value Новое значение.
     *
     * @return OperationResultInterface
     */
    public function setSteamApp(SteamAppInterface $value): OperationResultInterface;
}
