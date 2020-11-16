<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GenreFamily $genreFamily
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Genre Family'), ['action' => 'edit', $genreFamily->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Genre Family'), ['action' => 'delete', $genreFamily->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genreFamily->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Genre Families'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre Family'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genre Subfamilies'), ['controller' => 'GenreSubfamilies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre Subfamily'), ['controller' => 'GenreSubfamilies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="genreFamilies view large-9 medium-8 columns content">
    <h3><?= h($genreFamily->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($genreFamily->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($genreFamily->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Genre Subfamilies') ?></h4>
        <?php if (!empty($genreFamily->genre_subfamilies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Genre Family Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($genreFamily->genre_subfamilies as $genreSubfamilies): ?>
            <tr>
                <td><?= h($genreSubfamilies->id) ?></td>
                <td><?= h($genreSubfamilies->name) ?></td>
                <td><?= h($genreSubfamilies->genre_family_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GenreSubfamilies', 'action' => 'view', $genreSubfamilies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GenreSubfamilies', 'action' => 'edit', $genreSubfamilies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GenreSubfamilies', 'action' => 'delete', $genreSubfamilies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genreSubfamilies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Genres') ?></h4>
        <?php if (!empty($genreFamily->genres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Genre Family Id') ?></th>
                <th scope="col"><?= __('Genre Subfamily Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($genreFamily->genres as $genres): ?>
            <tr>
                <td><?= h($genres->id) ?></td>
                <td><?= h($genres->name) ?></td>
                <td><?= h($genres->genre_family_id) ?></td>
                <td><?= h($genres->genre_subfamily_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Genres', 'action' => 'view', $genres->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Genres', 'action' => 'edit', $genres->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Genres', 'action' => 'delete', $genres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genres->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
