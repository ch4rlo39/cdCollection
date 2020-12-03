var app = angular.module('linkedlists', []);

app.controller('genreFamiliesController', function ($scope, $http) {
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.genreFamilies = response.data.genreFamilies;
        angular.forEach($scope.genreFamilies, function(genreFamily){
            if(genreFamily.id == $scope.genreFamilyId){
                $scope.genreFamily = genreFamily;
                angular.forEach($scope.genreFamily.genre_subfamilies, function(genreSubfamily) {
                    if(genreSubfamily.id == $scope.genreSubfamilyId){
                       $scope.genreSubfamily = genreSubfamily; 
                    }
                    
                })
            }
        })
    });
});