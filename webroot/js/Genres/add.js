var app = angular.module('linkedlists', []);

app.controller('genreFamiliesController', function ($scope, $http) {
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.genreFamilies = response.data.genreFamilies;
    });
});