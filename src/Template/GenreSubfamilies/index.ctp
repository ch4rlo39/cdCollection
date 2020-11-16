<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GenreSubfamily[]|\Cake\Collection\CollectionInterface $genreSubfamilies
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Genre Subfamily'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genre Families'), ['controller' => 'GenreFamilies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre Family'), ['controller' => 'GenreFamilies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="genreSubfamilies index large-9 medium-8 columns content">
    <h3><?= __('Genre Subfamilies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('genre_family_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($genreSubfamilies as $genreSubfamily): ?>
            <tr>
                <td><?= $this->Number->format($genreSubfamily->id) ?></td>
                <td><?= h($genreSubfamily->name) ?></td>
                <td><?= $genreSubfamily->has('genre_family') ? $this->Html->link($genreSubfamily->genre_family->name, ['controller' => 'GenreFamilies', 'action' => 'view', $genreSubfamily->genre_family->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $genreSubfamily->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $genreSubfamily->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $genreSubfamily->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genreSubfamily->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
