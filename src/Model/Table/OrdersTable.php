<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Currencies
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('orders');
        $this->setDisplayField('Orderid');
        $this->setPrimaryKey('Orderid');

        $this->belongsTo('users', [
            'foreignKey' => 'userid',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('currencies', [
            'foreignKey' => 'currencyid',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('orderid')
            ->allowEmpty('orderid', 'create');

        $validator
            ->numeric('exchange_rate')
            ->allowEmpty('exchange_rate');

        $validator
            ->numeric('surcharge')
            ->allowEmpty('surcharge');

        $validator
            ->numeric('amount_purchased')
            ->allowEmpty('amount_purchased');

        $validator
            ->numeric('amount_paid')
            ->allowEmpty('amount_paid');

        $validator
            ->numeric('amount_of_surcharge')
            ->allowEmpty('amount_of_surcharge');

        $validator
            ->dateTime('date_created')
            ->allowEmpty('date_created');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['userid'], 'Users'));
        $rules->add($rules->existsIn(['currencyid'], 'Currencies'));

        return $rules;
    }
}
