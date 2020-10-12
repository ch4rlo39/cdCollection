<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genre $genre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Genre'), ['action' => 'edit', $genre->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Genre'), ['action' => 'delete', $genre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genre->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cds'), ['controller' => 'Cds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cd'), ['controller' => 'Cds', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="genres view large-9 medium-8 columns content">
    <h3><?= h($genre->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($genre->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($genre->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cds') ?></h4>
        <?php if (!empty($genre->cds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Artist') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($genre->cds as $cds): ?>
            <tr>
                <td><?= h($cds->id) ?></td>
                <td><?= h($cds->user_id) ?></td>
                <td><?= h($cds->title) ?></td>
                <td><?= h($cds->slug) ?></td>
                <td><?= h($cds->artist) ?></td>
                <td><?= h($cds->created) ?></td>
                <td><?= h($cds->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cds', 'action' => 'view', $cds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cds', 'action' => 'edit', $cds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cds', 'action' => 'delete', $cds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
