<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Punches extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        // テーブルの作成
        $table = $this->table('punches', ['id' => false, 'primary_key' => 'id']);
        $table
            ->addColumn('id', 'integer', [
                'default' => null,
                'identity' => true,
                'limit' => MysqlAdapter::INT_BIG,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => MysqlAdapter::INT_BIG,
                'null' => false,
            ])
            ->addColumn('date', 'date')
            ->addColumn('time', 'time')
            ->addColumn('identify', 'integer', [
                'default' => null,
                'limit' => MysqlAdapter::INT_TINY,
                'null' => false,
            ])
            ->addColumn('modified_info', 'boolean', [
                'default' => false,
                'null' => false,
            ])
            ->addForeignKey('user_id', 'users', 'id')
            ->create();
    }
}
