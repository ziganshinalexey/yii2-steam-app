<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamApp\operations\steamApp;

use Userstory\ComponentBase\events\CreateOperationEvent;
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
use Ziganshinalexey\Yii2SteamApp\interfaces\steamApp\operations\SingleCreateOperationInterface;
use Ziganshinalexey\Yii2SteamApp\traits\steamApp\DatabaseHydratorTrait;

/**
 * Операция создания новой сущности "Приложение".
 */
class SingleCreateOperation extends Component implements SingleCreateOperationInterface
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
     * Сущности, над которыми нужно выполнить операцию.
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
     * Метод подготавливает запрос для добавления сущности в базу данных.
     *
     * @param SteamAppInterface $item Список сущностей для вставки в базу данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return Command
     */
    protected function createInsertQuery(SteamAppInterface $item): Command
    {
        $hydrator   = $this->getSteamAppDatabaseHydrator();
        $insertData = $hydrator->extract($item);

        return $this->getDbConnection()->createCommand()->insert(SteamAppActiveRecord::tableName(), $insertData);
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
        $result = $this->getResultPrototype()->copy();
        $item   = $this->getSteamApp();
        $result->setSteamApp($item);

        if (! $this->validateSteamApp($item)) {
            $result->addError('system', 'Item contains invalid data');
            return $result;
        }

        $transaction = $this->getDbConnection()->beginTransaction();

        $insertCommand = $this->createInsertQuery($item);
        if (! $insertCommand->execute()) {
            $transaction->rollBack();
            $result->addError('SteamApp', 'Can not insert item list in database');
            return $result;
        }
        $this->flushCache();
        $lastInsertedId = (int)$this->getDbConnection()->getLastInsertID();
        $item->setId($lastInsertedId);

        $event = Yii::createObject([
            'class'                  => CreateOperationEvent::class,
            'dataTransferObjectList' => [$this->getSteamApp()],
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
     * Метод возвращает сущности, над которыми нужно выполнить операцию.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return SteamAppInterface
     */
    public function getSteamApp(): SteamAppInterface
    {
        if (null === $this->steamApp) {
            throw new InvalidConfigException(__METHOD__ . '() Item can not be empty');
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
     * @return SingleCreateOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleCreateOperationInterface
    {
        $this->resultPrototype = $value;
        return $this;
    }

    /**
     * Метод устанавливает сущности, над которыми необходимо выполнить операцию.
     *
     * @param SteamAppInterface $item Новое значение.
     *
     * @throws InvalidConfigException В случае если в аргументе что-то отличное от SteamAppInterface.
     *
     * @return SingleCreateOperationInterface
     */
    public function setSteamApp(SteamAppInterface $item): SingleCreateOperationInterface
    {
        if (! $item instanceof SteamAppInterface) {
            throw new InvalidConfigException(__METHOD__ . '() Can set only objects, witch implement ' . SteamAppInterface::class);
        }
        $this->steamApp = $item;
        return $this;
    }

    /**
     * Метод устанавливает валидатор ДТО сущности.
     *
     * @param DTOValidatorInterface $validator Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setSteamAppValidator(DTOValidatorInterface $validator): SingleCreateOperationInterface
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * Метод выполняет валидацию переданного списка сущностей.
     *
     * @param SteamAppInterface $item Список сущностей для валидации.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return bool
     */
    protected function validateSteamApp(SteamAppInterface $item): bool
    {
        $result    = true;
        $validator = $this->getSteamAppValidator();

        if (! $validator->validateObject($item)) {
            $item->addErrors($validator->getErrors());
            $result = false;
        }

        return $result;
    }
}
