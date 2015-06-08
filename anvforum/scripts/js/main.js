var forum = angular.module("forum", []);

forum.controller("mainController", function($scope, $http) {
	$http.get("forum-test/scripts/php/checkLogged.php")
    	.success(function(response) {
			$scope.loggedin = response.loggedin; 
			console.log(response);
		});
	
	$scope.logged = function () {
		if($scope.loggedin == "true")
		{ return true; }
		else{ return false; }
	}
})