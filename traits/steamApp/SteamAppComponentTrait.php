<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\traits\steamApp;

use yii;
use yii\base\InvalidConfigException;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\ComponentInterface;

/**
 * Трейт, содержащий логику доступа к компоненту "Приложение".
 */
trait SteamAppComponentTrait
{
    /**
     * Экземпляр объекта компонента "Приложение".
     *
     * @var ComponentInterface|null
     */
    protected $steamAppComponent;

    /**
     * Метод возвращает объект компонента "Приложение".
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return ComponentInterface
     */
    public function getSteamAppComponent(): ComponentInterface
    {
        if (! $this->steamAppComponent) {
            $this->steamAppComponent = Yii::$app->get('steamApp');
        }
        return $this->steamAppComponent;
    }

    /**
     * Метод устанавливает объект компонента "Приложение".
     *
     * @param ComponentInterface $component Новое значение компонента.
     *
     * @return void
     */
    public function setSteamAppComponent(ComponentInterface $component): void
    {
        $this->steamAppComponent = $component;
    }
}
