<?php
use Migrations\AbstractMigration;

class ChangeStatusToBidinfo extends AbstractMigration
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
        $table = $this->table('bidinfo');
      $table->changeColumn('status', 'integer', [
        'default' => 0,
        'limit' => Phinx\Db\Adapter\MysqlAdapter::INT_TINY,
        'null' => false,
      ]);
      $table->update();
    }
}
