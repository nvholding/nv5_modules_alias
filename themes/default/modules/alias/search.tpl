<!-- BEGIN: main -->
	<div class="title_list_tags">Danh sách tags</div>
	<ul class="list_tags">
		<!-- BEGIN: loop -->
		<li><a href="{row.link}" title="{row.alias}"><i class="fa fa-angle-right" aria-hidden="true"></i> {row.alias}</a></li>
		<!-- END: loop -->
	</ul>
	<div class="clear"></div>
	<!-- BEGIN: generate_page -->
		{NV_GENERATE_PAGE}
	<!-- END: generate_page -->
			
<!-- END: main -->