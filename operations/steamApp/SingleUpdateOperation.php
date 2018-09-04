<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\operations\steamApp;

use Userstory\ComponentBase\events\UpdateOperationEvent;
use Userstory\ComponentBase\interfaces\DTOValidatorInterface;
use Userstory\Database\traits\ObjectWithDbConnectionTrait;
use Userstory\Yii2Cache\traits\ObjectWithQueryCacheTrait;
use yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Command;
use yii\db\Exception;
use Ziganshinalexey\Yii2SteamApp\entities\SteamAppActiveRecord;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\OperationResultInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\dto\SteamAppInterface;
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleUpdateOperationInterface;
use Ziganshinalexey\Yii2SteamApp\traits\steamApp\DatabaseHydratorTrait;

/**
 * Операция общновления имеющейся сущности "Приложение".
 */
class SingleUpdateOperation extends Component implements SingleUpdateOperationInterface
{
    use ObjectWithDbConnectionTrait;
    use DatabaseHydratorTrait;
    use ObjectWithQueryCacheTrait;

    /**
     * Прототип объекта-ответа команды.
     *
     * @var OperationResultInterface|null
     */
    protected $resultPrototype;

    /**
     * Сущность, над которой нужно выполнить операцию.
     *
     * @var SteamAppInterface|null
     */
    protected $steamApp;

    /**
     * Объект-валидатора ДТО сущности.
     *
     * @var DTOValidatorInterface|null
     */
    protected $validator;

    /**
     * Метод подготавливает запрос для обновления сущности в базе данных.
     *
     * @param SteamAppInterface $item Сущность для выполнения операции.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return Command
     */
    protected function createUpdateQuery(SteamAppInterface $item): Command
    {
        $updateData = $this->getSteamAppDatabaseHydrator()->extract($item);

        return $this->getDbConnection()->createCommand()->update(SteamAppActiveRecord::tableName(), $updateData, [
            'id' => $item->getId(),
        ]);
    }

    /**
     * Метод выполняет операцию.
     *
     * @throws Exception              Если выполнение команды не удалось.
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface
    {
        $result = $this->getResultPrototype();
        $item   = $this->getSteamApp();
        $result->setSteamApp($item);

        $validator = $this->getSteamAppValidator();
        if (! $validator->validateObject($item)) {
            $item->addErrors($validator->getErrors());
            $result->addErrors($validator->getErrors());
            return $result;
        }

        $transaction = $this->getDbConnection()->beginTransaction();

        $updateCommand = $this->createUpdateQuery($item);
        if (! $updateCommand->execute()) {
            $transaction->rollBack();
            $result->addError('SteamApp', 'Can not update item in database');
            return $result;
        }
        $this->flushCache();

        $event = Yii::createObject([
            'class'              => UpdateOperationEvent::class,
            'dataTransferObject' => $this->getSteamApp(),
        ]);
        $this->trigger(self::DO_EVENT, $event);
        $transaction->commit();
        return $result;
    }

    /**
     * Метод возвращает объект-результат ответа команды.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return OperationResultInterface
     */
    public function getResultPrototype(): OperationResultInterface
    {
        if (null === $this->resultPrototype) {
            throw new InvalidConfigException(__METHOD__ . '() Operation result object can not be null');
        }
        return $this->resultPrototype;
    }

    /**
     * Метод возвращает сущность, над которой нужэно выполнить операцию.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SteamAppInterface
     */
    public function getSteamApp(): SteamAppInterface
    {
        if (null === $this->steamApp) {
            throw new InvalidConfigException(__METHOD__ . '() SteamApp can not be null');
        }
        return $this->steamApp;
    }

    /**
     * Метод возвращает валидатор ДТО сущности.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return DTOValidatorInterface
     */
    public function getSteamAppValidator(): DTOValidatorInterface
    {
        if (null === $this->validator) {
            throw new InvalidConfigException(__METHOD__ . '() Validator object can not be null');
        }
        return $this->validator;
    }

    /**
     * Метод устанавливает объект прототипа ответа команды.
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleUpdateOperationInterface
    {
        $this->resultPrototype = $value;
        return $this;
    }

    /**
     * Метод устанавливает сущность, над которой необходимо выполнить операцию.
     *
     * @param SteamAppInterface $value Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setSteamApp(SteamAppInterface $value): SingleUpdateOperationInterface
    {
        $this->steamApp = $value;
        return $this;
    }

    /**
     * Метод устанавливает валидатор ДТО сущности.
     *
     * @param DTOValidatorInterface $validator Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setSteamAppValidator(DTOValidatorInterface $validator): SingleUpdateOperationInterface
    {
        $this->validator = $validator;
        return $this;
    }
}
