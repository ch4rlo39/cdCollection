<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GenreSubfamily $genreSubfamily
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Genre Subfamilies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Genre Families'), ['controller' => 'GenreFamilies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre Family'), ['controller' => 'GenreFamilies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="genreSubfamilies form large-9 medium-8 columns content">
    <?= $this->Form->create($genreSubfamily) ?>
    <fieldset>
        <legend><?= __('Add Genre Subfamily') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('genre_family_id', ['options' => $genreFamilies, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
