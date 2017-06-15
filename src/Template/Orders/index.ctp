<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Purchase Foreign Currency'), ['action' => 'add']) ?></li>

    </ul>
</nav>

<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('exchange_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('surcharge') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount_purchased') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount_paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount_of_surcharge') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_created') ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>

                <td><?= $this->Number->format($order->exchange_rate) ?></td>
                <td><?= $this->Number->format($order->surcharge) ?></td>
                <td><?= $this->Number->format($order->amount_purchased) ?></td>
                <td>R <?= $this->Number->format($order->amount_due) ?></td>
                <td>R <?= $this->Number->format($order->surcharge) ?></td>
                <td><?= h($order->date) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('More info'), ['action' => 'view', $order->Orderid]) ?>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
