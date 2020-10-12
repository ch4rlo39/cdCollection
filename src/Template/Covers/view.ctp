<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cover $cover
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cover'), ['action' => 'edit', $cover->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cover'), ['action' => 'delete', $cover->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cover->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Covers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cover'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cds'), ['controller' => 'Cds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cd'), ['controller' => 'Cds', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="covers view large-9 medium-8 columns content">
    <h3><?= h($cover->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?php echo $this->Html->image($cover->path.$cover->name, [
        "alt" => $cover->name,
        ]);
    ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($cover->path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cover->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cover->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cover->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $cover->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cds') ?></h4>
        <?php if (!empty($cover->cds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Artist') ?></th>
                <th scope="col"><?= __('Released') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Cover Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cover->cds as $cds): ?>
            <tr>
                <td><?= h($cds->id) ?></td>
                <td><?= h($cds->user_id) ?></td>
                <td><?= h($cds->title) ?></td>
                <td><?= h($cds->slug) ?></td>
                <td><?= h($cds->artist) ?></td>
                <td><?= h($cds->released) ?></td>
                <td><?= h($cds->created) ?></td>
                <td><?= h($cds->modified) ?></td>
                <td><?= h($cds->cover_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cds', 'action' => 'view', $cds->slug]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cds', 'action' => 'edit', $cds->slug]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cds', 'action' => 'delete', $cds->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $cds->slug)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
