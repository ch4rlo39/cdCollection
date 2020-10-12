<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cd $cd
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cd->slug],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cd->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cds form large-9 medium-8 columns content">
    <?= $this->Form->create($cd) ?>
    <fieldset>
        <legend><?= __('Edit Cd') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['type' => 'hidden']);
            echo $this->Form->control('title');
            echo $this->Form->control('artist');
            echo $this->Form->control('released');
            echo $this->Form->control('genres._ids', ['options' => $genres]);
            echo $this->Form->control('covers._ids', ['options' => $covers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
