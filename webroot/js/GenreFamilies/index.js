var app = angular.module('app', []);

app.controller('GenreFamilyCRUDCtrl', ['$scope', 'GenreFamilyCRUDService', function($scope, GenreFamilyCRUDService){
        $scope.updateGenreFamily = function(genreFamily) {
            GenreFamilyCRUDService.updateGenreFamily(genreFamily)
                    .then(function success(response){
                        $scope.message = 'Genre Family data updated!';
                        $scope.errorMessage = '';
                        $scope.getAllGenreFamilies();
            },
                function error(response) {
                    $scope.errorMessage = 'Error updating Genre Family!';
                    $scope.message = '';
                });
        }
        
        $scope.getGenreFamily = function(id) {
            GenreFamilyCRUDService.getGenreFamily(id)
                .then(function success(response) {
                    $scope.genreFamily = response.data.genreFamily;
                    $scope.genreFamily.id = id;
                    $scope.message = '';
                    $scope.errorMessage = '';
            },
                function error(response) {
                    $scope.message = '';
                    if(response.status === 404){
                        $scope.errorMessage = 'Genre Family not found!';
                    } else {
                        $scope.errorMessage = 'Error getting Genre Family!';
                    }
                });
        }
        
        $scope.addGenreFamily = function() {
            if($scope.genreFamily != null && $scope.genreFamily.name){
                GenreFamilyCRUDService.addGenreFamily($scope.genreFamily.name)
                    .then(function success(response) {
                        $scope.message = 'Genre Family added!';
                        $scope.errorMessage = '';
                        $scope.getAllGenreFamilies();
                },
                    function error(response){
                       $scope.errorMessage = 'Error adding Genre Family!';
                       $scope.message = '';
                    });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }
        
        $scope.deleteGenreFamily = function(id) {
            GenreFamilyCRUDService.deleteGenreFamily(id)
                .then(function success(response){
                    $scope.message = 'Genre Family deleted!';
                    $scope.genreFamily = null;
                    $scope.errorMessage = '';
                    $scope.getAllGenreFamilies();
            },
                function error(response){
                   $scope.errorMessage = 'Error deleting Genre Family!';
                   $scope.message = '';
                });
        }
        
        $scope.getAllGenreFamilies = function(){
            GenreFamilyCRUDService.getAllGenreFamilies()
                .then(function success(response) {
                    $scope.genreFamilies = response.data.genreFamilies;
                    $scope.message = '';
                    $scope.errorMessage = '';
            },
                function error(response){
                   $scope.message = '';
                   $scope.errorMessage = 'Error getting Genre Families!';
                });
        }
}]);

app.service('GenreFamilyCRUDService', ['$http', function($http) {
        this.getGenreFamily = function getGenreFamily(genreFamilyId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + genreFamilyId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }
        
        this.addGenreFamily = function addGenreFamily(name) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }
        
        this.deleteGenreFamily = function deleteGenreFamily(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.updateGenreFamily = function updateGenreFamily(genreFamily) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + genreFamily.id,
                data: {name: genreFamily.name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.getAllGenreFamilies = function getAllGenreFamilies() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }
}]);