<?php $this->extend('../../Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $genreFamily->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genreFamily->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Genre Families'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Genre Subfamilies'), ['controller' => 'GenreSubfamilies', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Genre Subfamily'), ['controller' => 'GenreSubfamilies', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="genreFamilies form content">
    <?= $this->Form->create($genreFamily) ?>
    <fieldset>
        <legend><?= __('Edit Genre Family') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
