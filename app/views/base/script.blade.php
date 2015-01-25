<%-- Angular Material Dependencies --%>
<% HTML::script('bower_components/hammerjs/hammer.min.js')  %>
<% HTML::script('bower_components/angular/angular.min.js')  %>
<% HTML::script('bower_components/angular-animate/angular-animate.min.js')  %>
<% HTML::script('bower_components/angular-aria/angular-aria.min.js')  %>

<%-- Angular Material Javascript --%>
<% HTML::script('bower_components/angular-material/angular-material.min.js')  %>

<script>
	// Include app dependency on ngMaterial
	angular.module('UMKM', ['ngMaterial'])
    .controller('ApplicationCtrl', function($scope, $timeout, $mdSidenav, $log) {
		$scope.toggleLeft = function() {
    		$mdSidenav('left').toggle()
                .then(function(){
					$log.debug("toggle left is done");
                });
  			};
	})
	.controller('SidenavCtrl', function($scope, $timeout, $mdSidenav, $log, $mdDialog) {
		$scope.close = function() {
			$mdSidenav('left').close()
				.then(function(){
					$log.debug("close LEFT is done");
				});
		};
		$scope.showTentang = function($event) {
			$mdDialog.show({
				targetEvent: $event,
				controller: 'DialogCtrl',
		        template:
		            '<md-dialog><md-content><h1>Aplikasi Pasar Modal v3.0</h1><span>oleh <strong>Imam Susanto</strong></span><h2>Changelog</h2><ul><li><strong>2015 v3.0</strong> &mdash; Material Design by <strong>Imam Susanto</strong></li><li><strong>2014 v2.0</strong> &mdash; Major Upgrade by <strong>Imam Susanto</strong></li><li><strong>2009 v1.0</strong> &mdash; Initial Release by <em>"semuut"</em></li></ul><h2>Teknologi</h2><ul><li>AngularJS &mdash; Front End</li><li>Laravel &mdash; Back End</li><li>Sqlite &mdash; Database</li><li>Apache &mdash; Web Server</li></ul></md-content><div class="md-actions"><md-button ng-click="closeDialog()">Tutup</md-button></div></md-dialog>',
			});
		};
	})
	.controller('DialogCtrl', function($scope, $mdDialog) {
		$scope.closeDialog = function() {
			$mdDialog.hide();
		};
	})
</script>
