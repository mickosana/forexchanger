<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $orderid
 * @property float $exchange_rate
 * @property float $surcharge
 * @property float $amount_purchased
 * @property float $amount_paid
 * @property float $amount_of_surcharge
 * @property \Cake\I18n\FrozenTime $date_created
 * @property int $Userid
 * @property int $currencyid
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Currency $currency
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'orderid' => false
    ];
}
