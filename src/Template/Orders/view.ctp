<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>

        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->orderid], ['confirm' => __('Are you sure you want to delete # {0}?', $order->orderid)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>

    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->orderid) ?></h3>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?=$order->currencyid ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Exchange Rate') ?></th>
            <td><?= $this->Number->format($order->exchange_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surcharge') ?></th>
            <td><?= $this->Number->format($order->surcharge_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Purchased') ?></th>
            <td><?= $this->Number->format($order->amount_purchased) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Paid') ?></th>
            <td>R <?= $this->Number->format($order->amount_due) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Of Surcharge') ?></th>
            <td>R <?= $this->Number->format($order->surcharge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($order->date) ?></td>
        </tr>
    </table>
</div>
