<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
        ], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "GenreFamilies",
    "action" => "getGenreFamilies",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Genres/add', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genre $genre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cds'), ['controller' => 'Cds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cd'), ['controller' => 'Cds', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="genres form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="genreFamiliesController">
    <?= $this->Form->create($genre) ?>
    <fieldset>
        <legend><?= __('Add Genre') ?></legend>
        <div>
            <?= __('Genre Families') ?> : 
            <select 
                name="genre_family_id"
                id="genre-family-id"
                ng-model="genreFamily"
                ng-options="genreFamily.name for genreFamily in genreFamilies track by genreFamily.id"
                >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            <?= __('Genre Subfamilies') ?> : 
            <select 
                name="genre_subfamily_id"
                id="genre-subfamily-id"
                ng-disabled="!genreFamily"
                ng-model="genreSubfamily"
                ng-options="genreSubfamily.name for genreSubfamily in genreFamily.genre_subfamilies track by genreSubfamily.id"
                >
                <option value=''>Select</option>
            </select>
        </div>
        <?php
            //echo $this->Form->control('genre_family_id', ['options' => $genreFamilies]);
            //echo $this->Form->control('genre_subfamily_id', ['options' => [__('Please select a Genre Family first')]]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
