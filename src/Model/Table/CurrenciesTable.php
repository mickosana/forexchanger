<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Currencies Model
 *
 * @property \Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\Currency get($primaryKey, $options = [])
 * @method \App\Model\Entity\Currency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Currency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Currency|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Currency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Currency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Currency findOrCreate($search, callable $callback = null, $options = [])
 */
class CurrenciesTable extends Table
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

        $this->setTable('currencies');
        $this->setDisplayField('currency_name');
        //$this->setPrimaryKey('currencyid');

        $this->hasMany('Orders', [
            'foreignKey' => 'currencyid'
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
            ->integer('currencyid')
            ->allowEmpty('currencyid', 'create');

        $validator
            ->requirePresence('symbol', 'create')
            ->notEmpty('symbol');

        $validator
            ->requirePresence('currency_name', 'create')
            ->notEmpty('currency_name');

        $validator
            ->numeric('surcharge')
            ->requirePresence('surcharge', 'create')
            ->notEmpty('surcharge');

        $validator
            ->numeric('extra_charge')
            ->allowEmpty('extra_charge');

        $validator
            ->numeric('rate')
            ->requirePresence('rate', 'create')
            ->notEmpty('rate');

        return $validator;
    }
}
