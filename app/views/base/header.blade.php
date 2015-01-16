<md-toolbar>
	<div class="md-toolbar-tools">
		<md-button class="menu-icon" ng-click="toggleLeft()" hide-gt-md aria-label="Toggle Menu">
			<svg viewBox="0 0 24 24" style="height:24;width:24"><path fill="#ffffff" d="M3 6H21V8H3V6ZM3 11H21V13H3V11ZM3 16H21V18H3V16Z"/></svg>
        </md-button>
		<span>Home</span>
		<!-- fill up the space between left and right area -->
		<span flex></span>
		@if (Auth::user())
			<md-button href="/logout" style="display: flex; align-items: center">
				<svg viewBox="0 0 24 24" style="height:24;width:24"><path fill="#fff" d="M17 17.3V14H10V10H17V6.8L22.3 12 17 17.3ZM13 2A2 2 0 0 1 15 4V8H13V4H4V20H13V16H15V20A2 2 0 0 1 13 22H4A2 2 0 0 1 2 20V4A2 2 0 0 1 4 2H13Z"/></svg>
				Logout
			</md-button>
		@else
		<md-button href="/login" style="display: flex; align-items: center">
			<svg viewBox="0 0 24 24" style="height:24px;width:24px">
  				<path fill="#fff" d="M10 17.25V14H3V10H10V6.75L15.25 12 10 17.25ZM8 2H17A2 2 0 0 1 19 4V20A2 2 0 0 1 17 22H8A2 2 0 0 1 6 20V16H8V20H17V4H8V8H6V4A2 2 0 0 1 8 2Z"/>
			</svg>
			Login
		</md-button>
		@endif
	</div>
</md-toolbar>
