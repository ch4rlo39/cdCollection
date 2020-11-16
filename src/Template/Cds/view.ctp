<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cd $cd
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cd'), ['action' => 'edit', $cd->slug]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cd'), ['action' => 'delete', $cd->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $cd->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cd'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
        <li><?php
            $this->request->getSession()->write('Cd.id', $cd->id);
            $this->request->getSession()->write('Cd.slug', $cd->slug);
            echo $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']);
            ?></li>
    </ul>
</nav>
<div class="cds view large-9 medium-8 columns content">
    <h3><?= h($cd->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $this->Html->link($cd->user->username, ['controller' => 'Users', 'action' => 'view', $cd->user_id]) /*: ''*/ ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($cd->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Artist') ?></th>
            <td><?= h($cd->artist['name']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Released') ?></th>
            <td><?= h($cd->released) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cd->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cd->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Genres') ?></h4>
        <?php if (!empty($cd->genres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cd->genres as $genre): ?>
            <tr>
                <td><?= h($genre->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Genres', 'action' => 'view', $genre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Genres', 'action' => 'edit', $genre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Genres', 'action' => 'delete', $genre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genre->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($cd->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cd->reviews as $review): ?>
                <tr>
                    <td><?= h($review->name) ?></td>
                    <td><?= h($review->created) ?></td>
                    <td><?= h($review->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $review->id]) ?>
                        <?php $this->request->getSession()->write('Cd.slug', $cd->slug);
                        echo $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $review->id]) ?>
                        <?php $this->request->getSession()->write('Cd.slug', $cd->slug);
                        echo $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $review->id], ['confirm' => __('Are you sure you want to delete # {0}?', $review->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
    
    <div class="related">
        <h4><?= __('Related Covers') ?></h4>
        <?php if (!empty($cd->covers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cd->covers as $cover): ?>
            <tr>
                <td><?php echo $this->Html->image($cover->path.$cover->name, [
                    "alt" => $cover->name,
                    "width" => "220px",
                    "height" => "150px",
                    'url' => ['controller' => 'Covers', 'action' => 'view', $cover->id ]
                    ]);
               ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Covers', 'action' => 'view', $cover->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Covers', 'action' => 'edit', $cover->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Covers', 'action' => 'delete', $cover->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cover->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
