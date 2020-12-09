var app = angular.module('app', []);
var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('GenreFamilyCRUDCtrl', ['$scope', 'GenreFamilyCRUDJwtService', function($scope, GenreFamilyCRUDJwtService){
        $scope.updateGenreFamily = function(genreFamily) {
            GenreFamilyCRUDJwtService.updateGenreFamily(genreFamily)
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
            GenreFamilyCRUDJwtService.getGenreFamily(id)
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
                GenreFamilyCRUDJwtService.addGenreFamily($scope.genreFamily.name)
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
            GenreFamilyCRUDJwtService.deleteGenreFamily(id)
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
            GenreFamilyCRUDJwtService.getAllGenreFamilies()
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
        
        $scope.login = function () {
            if ($scope.user != null && $scope.user.username) {
                GenreFamilyCRUDJwtService.login($scope.user)
                        .then(function success(response) {
                            $scope.message = $scope.user.username + ' logged in!';
                            $scope.errorMessage = '';
                            localStorage.setItem('token', response.data.data.token);
                            localStorage.setItem('user_id', response.data.data.id);
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Invalid username or password...';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a username';
                $scope.message = '';
            }

        }
        $scope.logout = function () {
            localStorage.setItem('token', "no token");
            localStorage.setItem('user', "no user");
            $scope.message = 'User logged out!';
            $scope.errorMessage = '';
        }
        $scope.changePassword = function () {
            GenreFamilyCRUDJwtService.changePassword($scope.user.password)
                    .then(function success(response) {
                        $scope.message = 'Password updated!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Password couldn\'t be changed';
                                $scope.message = '';
                            });
        }
}]);

app.service('GenreFamilyCRUDJwtService', ['$http', function($http) {
        this.getGenreFamily = function getGenreFamily(genreFamilyId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + genreFamilyId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")}
            });
        }
        
        this.addGenreFamily = function addGenreFamily(name) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")}
            });
        }
        
        this.deleteGenreFamily = function deleteGenreFamily(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")}
            })
        }

        this.updateGenreFamily = function updateGenreFamily(genreFamily) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + genreFamily.id,
                data: {name: genreFamily.name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")}
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
        
        this.login = function login(user) {
            return $http({
                method: 'POST',
                url: urlToRestApiUsers + '/token',
                data: {username: user.username, password: user.password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }
        this.changePassword = function changePassword(password) {
            return $http({
                method: 'PATCH',
                url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
                data: {password: password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }
}]);