<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto;

use Userstory\ComponentBase\interfaces\BaseOperationResultInterface;
use Userstory\ComponentBase\interfaces\PrototypeInterface;

/**
 * Результат работы команды, выполняющей действия над несколькими сущностями "Приложение".
 */
interface OperationListResultInterface extends BaseOperationResultInterface, PrototypeInterface
{
    /**
     * Метод возвращает список DTO сущностей, получившихся в результате работы операции.
     *
     * @return SteamAppInterface[]
     */
    public function getSteamAppList(): array;

    /**
     * Метод устанавливает список DTO сущсностей, получившихся в результате работы команды.
     *
     * @param SteamAppInterface[] $value Новое значение.
     *
     * @return OperationListResultInterface
     */
    public function setSteamAppList(array $value): OperationListResultInterface;
}
