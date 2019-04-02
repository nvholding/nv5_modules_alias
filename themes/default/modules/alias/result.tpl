<!-- BEGIN: main -->
<input type="hidden" id="hidden_key" value="{HIDDEN_KEY}" />
<ul class="nav nav-tabs m-bottom">
	<li class="active">
		<a>{LANG.search_on} &quot;{MODULE_CUSTOM_TITLE}&quot; &nbsp;&nbsp;<span class="label label-info">{SEARCH_RESULT_NUM}</span></a>
	</li>
	<!-- BEGIN: more -->
	<li class="pull-right">
		<a href="{MORE}"><em class="fa fa-thumb-tack">&nbsp;</em> {LANG.view_all_title}</a>
	</li>
	<!-- END: more -->
</ul>
<!-- BEGIN: result -->
<h2 class="margin-bottom-sm">
<a href="{RESULT.link}" title="{RESULT.title}">{RESULT.title}</a></h2>
<div class="margin-bottom-lg">{RESULT.content}</div>
<!-- END: result -->
<!-- BEGIN: generate_page -->
<div class="text-center">
	{GENERATE_PAGE}
</div>
<!-- END: generate_page -->
<script type="text/javascript">
	$('img').each(function() {
		var AltImg = $(this).attr('alt');
		$(this).attr('title', AltImg);
		});
</script>
<!-- END: main -->