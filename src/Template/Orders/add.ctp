<?php
echo $this->Html->script(array('jquery',FALSE));
?>

<div class="orders form large-4 medium-4 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->control('currencyid', ['options' => $currencies]);

            echo $this->Form->control('amount_purchased');



        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>

<script>
    $(function()){

    }
</script>
