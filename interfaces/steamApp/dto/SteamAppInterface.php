<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto;

use Userstory\ComponentBase\interfaces\DataTransferObjectInterface;
use Userstory\ComponentBase\interfaces\ObjectWithErrorsInterface;
use Userstory\ComponentBase\interfaces\PrototypeInterface;

/**
 * Интерфейс требует методы доступа для объекта DTO.
 */
interface SteamAppInterface extends PrototypeInterface, ObjectWithErrorsInterface, DataTransferObjectInterface
{
    /**
     * Метод возвращает атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @return int
     */
    public function getAppid(): int;

    /**
     * Метод возвращает атрибут "Идентификатор" сущности "Приложение".
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Метод возвращает атрибут "Название" сущности "Приложение".
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Метод устанавливает атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int $value Новое значение.
     *
     * @return SteamAppInterface
     */
    public function setAppid(int $value): SteamAppInterface;

    /**
     * Метод устанавливает атрибут "Идентификатор" сущности "Приложение".
     *
     * @param int $value Новое значение.
     *
     * @return SteamAppInterface
     */
    public function setId(int $value): SteamAppInterface;

    /**
     * Метод устанавливает атрибут "Название" сущности "Приложение".
     *
     * @param string $value Новое значение.
     *
     * @return SteamAppInterface
     */
    public function setName(string $value): SteamAppInterface;
}
