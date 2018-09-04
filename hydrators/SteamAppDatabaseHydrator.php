<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\hydrators;

use Userstory\ComponentHydrator\interfaces\HydratorInterface;
use Userstory\Yii2Exceptions\exceptions\typeMismatch\ExtendsMismatchException;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;

/**
 * Гидратор для работы с сущностью "Приложение" - преобразование в массив для записи в БД и обратно.
 */
class SteamAppDatabaseHydrator implements HydratorInterface
{
    /**
     * Метод преобразует объект в обычный массив для записи в БД.
     *
     * @param SteamAppInterface|null $item Объект для преобразования.
     *
     * @throws ExtendsMismatchException Если распаковывается объект, не имплементирующий нужный интерфейс.
     *
     * @return array
     */
    public function extract($item): array
    {
        if (! $item instanceof SteamAppInterface) {
            throw new ExtendsMismatchException('Object must implement ' . SteamAppInterface::class);
        }

        return [
            'appid' => $item->getAppid(),
            'name'  => $item->getName(),
        ];
    }

    /**
     * Метод загружает данные в объект из массива БД.
     *
     * @param array|null             $data   Данные для загрузки в объект.
     * @param SteamAppInterface|null $object Объект для загрузки данных.
     *
     * @throws ExtendsMismatchException Если распаковывается объект, не имплементирующий нужный интерфейс.
     *
     * @return SteamAppInterface
     */
    public function hydrate($data, $object): SteamAppInterface
    {
        if (! $object instanceof SteamAppInterface) {
            throw new ExtendsMismatchException('Object must implement ' . SteamAppInterface::class);
        }

        $object->setId((int)$data['id']);
        $object->setAppid((int)$data['appid']);
        $object->setName((string)$data['name']);

        return $object;
    }
}
