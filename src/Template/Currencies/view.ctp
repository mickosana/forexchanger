<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Currency'), ['action' => 'edit', $currency->currencyid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Currency'), ['action' => 'delete', $currency->currencyid], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->currencyid)]) ?> </li>
        <li><?= $this->Html->link(__('List Currencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="currencies view large-9 medium-8 columns content">
    <h3><?= h($currency->currencyid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Symbol') ?></th>
            <td><?= h($currency->symbol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currency Name') ?></th>
            <td><?= h($currency->currency_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currencyid') ?></th>
            <td><?= $this->Number->format($currency->currencyid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surcharge') ?></th>
            <td><?= $this->Number->format($currency->surcharge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Charge') ?></th>
            <td><?= $this->Number->format($currency->extra_charge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $this->Number->format($currency->rate) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($currency->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Orderid') ?></th>
                <th scope="col"><?= __('Exchange Rate') ?></th>
                <th scope="col"><?= __('Surcharge') ?></th>
                <th scope="col"><?= __('Amount Purchased') ?></th>
                <th scope="col"><?= __('Amount Paid') ?></th>
                <th scope="col"><?= __('Amount Of Surcharge') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Currency Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($currency->orders as $orders): ?>
            <tr>
                <td><?= h($orders->orderid) ?></td>
                <td><?= h($orders->exchange_rate) ?></td>
                <td><?= h($orders->surcharge) ?></td>
                <td><?= h($orders->amount_purchased) ?></td>
                <td><?= h($orders->amount_paid) ?></td>
                <td><?= h($orders->amount_of_surcharge) ?></td>
                <td><?= h($orders->date_created) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->currency_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->orderid]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->orderid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->orderid], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->orderid)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
