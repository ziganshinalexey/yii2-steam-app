<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\filters\steamApp;

use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\filters\SingleFilterInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\filters\SingleFilterOperationInterface;

/**
 * Класс реализует методы применения фильтра к операции.
 */
class SingleFilter extends BaseFilter implements SingleFilterInterface
{
    /**
     * Метод применяет фильтр к операции над одной сущности.
     *
     * @param SingleFilterOperationInterface $operation Обект реализующий методы фильтров операции.
     *
     * @return SingleFilterOperationInterface
     */
    public function applyFilter(SingleFilterOperationInterface $operation): SingleFilterOperationInterface
    {
        if ($this->getId()) {
            $operation->byId((int)$this->getId());
        }
        if ($this->getAppid()) {
            $operation->byAppid((int)$this->getAppid());
        }
        if ($this->getName()) {
            $operation->byName((string)$this->getName(), 'like');
        }
        return $operation;
    }

    /**
     * Метод устанавливает атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setAppid(int $value): SingleFilterInterface
    {
        $this->appid = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Идентификатор" сущности "Приложение".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setId(int $value): SingleFilterInterface
    {
        $this->id = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Название" сущности "Приложение".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setName(string $value): SingleFilterInterface
    {
        $this->name = $value;
        return $this;
    }
}
