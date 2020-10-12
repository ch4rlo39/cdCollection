<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cover[]|\Cake\Collection\CollectionInterface $covers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cover'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cds'), ['controller' => 'Cds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cd'), ['controller' => 'Cds', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="covers index large-9 medium-8 columns content">
    <h3><?= __('Covers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($covers as $cover): ?>
            <tr>
                <td><?= $this->Number->format($cover->id) ?></td>
                <td><?php echo $this->Html->image($cover->path.$cover->name, [
                    "alt" => $cover->name,
                    "width" => "220px",
                    "height" => "150px",
                    'url' => ['controller' => 'Covers', 'action' => 'view', $cover->id ]
                    ]);
               ?></td>
                <td><?= h($cover->path) ?></td>
                <td><?= h($cover->created) ?></td>
                <td><?= h($cover->modified) ?></td>
                <td><?= h($cover->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cover->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cover->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cover->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cover->id)]) ?>
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
