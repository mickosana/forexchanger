<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * orders_tblFixture
 *
 */
class orders_tblFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'orders';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'orderid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'currency_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exchange_rate' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'surcharge' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'amount_purchased' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'amount_paid' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'amount_of_surcharge' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'users_userid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'currencies_currencyid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date_created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_orders_users1_idx' => ['type' => 'index', 'columns' => ['users_userid'], 'length' => []],
            'fk_orders_currencies1_idx' => ['type' => 'index', 'columns' => ['currencies_currencyid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['orderid'], 'length' => []],
            'fk_orders_currencies1' => ['type' => 'foreign', 'columns' => ['currencies_currencyid'], 'references' => ['currencies', 'currencyid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_orders_users1' => ['type' => 'foreign', 'columns' => ['users_userid'], 'references' => ['users', 'userid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'orderid' => 1,
            'currency_id' => 1,
            'exchange_rate' => 1,
            'surcharge' => 1,
            'amount_purchased' => 1,
            'amount_paid' => 1,
            'amount_of_surcharge' => 1,
            'users_userid' => 1,
            'currencies_currencyid' => 1,
            'date_created' => '2017-05-30 02:39:49'
        ],
    ];
}
