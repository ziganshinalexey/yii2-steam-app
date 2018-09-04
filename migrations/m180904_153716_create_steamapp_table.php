<?php

declare(strict_types = 1);

use Userstory\ComponentMigration\models\db\AbstractMigration;
use Ziganshinalexey\Yii2SteamApp\entities\SteamAppActiveRecord;

/**
 * Класс реализует миграцию для создания основной таблицы пакета.
 */
class m180904_153716_create_steamapp_table extends AbstractMigration
{
    /**
     * Имя класса сущности, связанного с миграцией.
     *
     * @var string
     */
    protected $relationClass = SteamAppActiveRecord::class;

    /**
     * Данный метод создает таблицу и организует базовые связи.
     *
     * @return void
     */
    public function safeUp(): void
    {
        $this->createTable($this->tableName, [
            'id'    => $this->primaryKey()->comment('Идентификатор'),
            'appid' => $this->integer()->notNull()->comment('Идентификатор во внешней системе'),
            'name'  => $this->string(255)->notNull()->comment('Название'),
        ], $this->getTableOptions(['comment' => 'Список приложений']));
    }
}
