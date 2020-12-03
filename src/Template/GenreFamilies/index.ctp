<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build('/api/genre_families', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('GenreFamilies/index', ['block' => 'scriptBottom']);
?>
<h1>Genre Families</h1> <hr>
<div ng-app="app" ng-controller="GenreFamilyCRUDCtrl">
    <input type="hidden" id="id" ng-model="genreFamily.id" />
    <table>
        <tr>
            <td width="100">Name:</td>
            <td><input type="text" id="name" ng-model="genreFamily.name" /></td>
        </tr>
    </table>
    <br />
    
    <button ng-click="updateGenreFamily(genreFamily)">Update Genre Family</button>
    <button ng-click="addGenreFamily(genreFamily.name)">Add Genre Family</button>
    
    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>
    
    <table class="hoverable bordered">
        <thead>
            <tr>
                <th class="text-align-center" ng-init="getAllGenreFamilies()">ID</th>
                <th class="width-30-pct">Name</th>
                <th class="text-align-center">Actions</th>
            </tr>
        </thead>
        
        <tbody ng-init="getAllGenreFamilies()">
            <tr ng-repeat="genreFamily in genreFamilies| filter:search">
                <td class="text-align-center">
                    {{genreFamily.id}}
                </td>
                <td>
                    {{genreFamily.name}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="getGenreFamily(genreFamily.id)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteGenreFamily(genreFamily.id)">Delete</button>
                </td>
                    
            </tr>
            
        </tbody>
    </table>
    
</div>