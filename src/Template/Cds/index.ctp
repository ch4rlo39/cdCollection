<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cd[]|\Cake\Collection\CollectionInterface $cds
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cd'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Covers'), ['controller' => 'Covers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('GenreFamilies'), ['controller' => 'GenreFamilies', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cds index large-9 medium-8 columns content">
    <h3><?= __('Cds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('artist_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('released') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cover') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cds as $cd): ?>
            <tr>
                <td><?= $cd->has('user') ? $this->Html->link($cd->user->username, ['controller' => 'Users', 'action' => 'view', $cd->user_id]) : '' ?></td>
                <td><?= h($cd->title) ?></td>
                <td><?= $cd->has('artist') ? h($cd->artist->name) : '' ?></td>
                <td><?= h($cd->released) ?></td>
                <td><?php 
                    if(isset($cd->covers[0])) {
                         echo $this->Html->image($cd->covers[0]->path.$cd->covers[0]->name, [
                            "alt" => $cd->covers[0]->name,
                            "width" => "220px",
                            "height" => "150px",
                            'url' => ['controller' => 'Covers', 'action' => 'view', $cd->covers[0]->id ]
                        ]);
               
                    }
               ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cd->slug]) ?>
                    <?= $this->Html->link('(pdf)', ['action' => 'view', $cd->slug . '.pdf']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cd->slug]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cd->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $cd->slug)]) ?>
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
