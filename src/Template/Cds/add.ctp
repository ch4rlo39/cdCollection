<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cd $cd
 */
?>
<?php
$urlToArtistsAutocomplete = $this->Url->build([
    "controller" => "Artists",
    "action" => "findArtists",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToArtistsAutocomplete . '";', ['block' => true]);
echo $this->Html->script('Cds/add_edit/artistsAutocomplete', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cds form large-9 medium-8 columns content">
    <?= $this->Form->create($cd) ?>
    <fieldset>
        <legend><?= __('Add Cd') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('artist_id', ['label' => __('Artist'), 'type' => 'hidden', 'id' => "artist-id"]);
        ?>
        <div class="input text">
            <label for="autocomplete"><?= __("Artist") ?></label>
            <input id="autocomplete" type="text">
        </div>
        <?php
            echo $this->Form->control('released');
            echo $this->Form->control('genres._ids', ['options' => $genres]);
            echo $this->Form->control('covers._ids', ['options' => $covers]); 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
