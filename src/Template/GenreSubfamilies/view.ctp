<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GenreSubfamily $genreSubfamily
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Genre Subfamily'), ['action' => 'edit', $genreSubfamily->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Genre Subfamily'), ['action' => 'delete', $genreSubfamily->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genreSubfamily->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Genre Subfamilies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre Subfamily'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genre Families'), ['controller' => 'GenreFamilies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre Family'), ['controller' => 'GenreFamilies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="genreSubfamilies view large-9 medium-8 columns content">
    <h3><?= h($genreSubfamily->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($genreSubfamily->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Genre Family') ?></th>
            <td><?= $genreSubfamily->has('genre_family') ? $this->Html->link($genreSubfamily->genre_family->name, ['controller' => 'GenreFamilies', 'action' => 'view', $genreSubfamily->genre_family->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($genreSubfamily->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Genres') ?></h4>
        <?php if (!empty($genreSubfamily->genres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Genre Family Id') ?></th>
                <th scope="col"><?= __('Genre Subfamily Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($genreSubfamily->genres as $genres): ?>
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
