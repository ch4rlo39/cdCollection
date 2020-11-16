<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GenreFamily $genreFamily
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Genre Families'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Genre Subfamilies'), ['controller' => 'GenreSubfamilies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre Subfamily'), ['controller' => 'GenreSubfamilies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="genreFamilies form large-9 medium-8 columns content">
    <?= $this->Form->create($genreFamily) ?>
    <fieldset>
        <legend><?= __('Add Genre Family') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
