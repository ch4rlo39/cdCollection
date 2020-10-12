<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cover $cover
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cover->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cover->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Covers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cds'), ['controller' => 'Cds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cd'), ['controller' => 'Cds', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="covers form large-9 medium-8 columns content">
    <?= $this->Form->create($cover) ?>
    <fieldset>
        <legend><?= __('Edit Cover') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('path');
            echo $this->Form->control('status');
            echo $this->Form->control('cds._ids', ['options' => $cds]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
