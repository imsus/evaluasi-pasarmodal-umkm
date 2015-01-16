{{-- Angular Material Dependencies --}}
{{ HTML::script('bower_components/hammerjs/hammer.min.js') }}
{{ HTML::script('bower_components/angular/angular.min.js') }}
{{ HTML::script('bower_components/angular-animate/angular-animate.min.js') }}
{{ HTML::script('bower_components/angular-aria/angular-aria.min.js') }}

{{-- Angular Material Javascript --}}
{{ HTML::script('bower_components/angular-material/angular-material.min.js') }}

<script>
	// Include app dependency on ngMaterial
	angular.module('UMKM', ['ngMaterial'], function($interpolateProvider){
		$interpolateProvider.startSymbol('<%');
		$interpolateProvider.endSymbol('%>');
	})
    .controller('AppCtrl', function($scope, $timeout, $mdSidenav, $log) {
		$scope.toggleLeft = function() {
    		$mdSidenav('left').toggle()
                .then(function(){
					$log.debug("toggle left is done");
                });
  			};
	})
	.controller('LeftCtrl', function($scope, $timeout, $mdSidenav, $log) {
		$scope.close = function() {
			$mdSidenav('left').close()
				.then(function(){
					$log.debug("close LEFT is done");
				});
		};
	})
</script>
