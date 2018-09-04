<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\dataTransferObjects\steamApp;

use Userstory\ComponentBase\models\Model;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;

/**
 * Реализует логику DTO "Приложение" для хранения и обмена данными с другими компонентами системы.
 */
class SteamApp extends Model implements SteamAppInterface
{
    /**
     * Свойство хранит атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @var int
     */
    protected $appid = 0;

    /**
     * Свойство хранит атрибут "Идентификатор" сущности "Приложение".
     *
     * @var int|null
     */
    protected $id;

    /**
     * Свойство хранит атрибут "Название" сущности "Приложение".
     *
     * @var string
     */
    protected $name = '';

    /**
     * Метод копирования объекта DTO.
     *
     * @return SteamAppInterface
     */
    public function copy(): SteamAppInterface
    {
        return new static();
    }

    /**
     * Метод возвращает атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @return int
     */
    public function getAppid(): int
    {
        return (int)$this->appid;
    }

    /**
     * Метод возвращает атрибут "Идентификатор" сущности "Приложение".
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return null === $this->id ? null : (int)$this->id;
    }

    /**
     * Метод возвращает атрибут "Название" сущности "Приложение".
     *
     * @return string
     */
    public function getName(): string
    {
        return (string)$this->name;
    }

    /**
     * Метод устанавливает атрибут "Идентификатор во внешней системе" сущности "Приложение".
     *
     * @param int $value Новое значение.
     *
     * @return SteamAppInterface
     */
    public function setAppid(int $value): SteamAppInterface
    {
        $this->appid = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Идентификатор" сущности "Приложение".
     *
     * @param int $value Новое значение.
     *
     * @return SteamAppInterface
     */
    public function setId(int $value): SteamAppInterface
    {
        $this->id = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Название" сущности "Приложение".
     *
     * @param string $value Новое значение.
     *
     * @return SteamAppInterface
     */
    public function setName(string $value): SteamAppInterface
    {
        $this->name = $value;
        return $this;
    }
}
