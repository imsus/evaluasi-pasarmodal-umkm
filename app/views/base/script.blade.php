{{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
{{ HTML::script('bower_components/imagesloaded/imagesloaded.pkgd.min.js') }}
{{ HTML::script('bower_components/fluidbox/jquery.fluidbox.min.js') }}
<script>
$(function() {
    $(".col-md-9>a").fluidbox();
});
</script>
