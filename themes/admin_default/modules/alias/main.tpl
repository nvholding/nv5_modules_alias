<!-- BEGIN: main -->
<!-- BEGIN: view -->
<div class="well">
<form action="{NV_BASE_ADMINURL}index.php" method="get">
	<input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
	<input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
	<input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />
	<div class="row">
		<div class="col-xs-24 col-md-6">
			<div class="form-group">
				<input class="form-control" type="text" value="{Q}" name="q" maxlength="255" placeholder="{LANG.search_title}" />
			</div>
		</div>
		<div class="col-xs-12 col-md-3">
			<div class="form-group">
				<input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
			</div>
		</div>
		
		
	</div>
</form>
</div>

<div class="update_alias">
<a class="btn btn-primary" onclick ="update_alias();"><i class="fa fa-refresh" aria-hidden="true"></i>
 {LANG.delete_alias}</a>
</div>

<div class="dongbo_alias row">
	<div class="form-group col-xs-24">
				<div style=" margin-right: 10px;width: 87px;float:left" class="btn btn-primary dongbo_alias_n">{LANG.update_alias}</div>
				<select style="width:200px ;float:left;margin-right:10px" class="form-control" name="mod">
					<option value="0">{LANG.select_mod}</option>
					<!-- BEGIN: mod -->
					<option mod_file="{mod.module_file}" mod_upload="{mod.module_upload}" mod_data="{mod.module_data}" value="1">{mod.custom_title}</option>
					<!-- END: mod -->
				</select>
				
	</div>
</div>
<div class="clear"></div>	
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="w100">{LANG.status}</th>
					<th>{LANG.alias}</th>
					<th>{LANG.module}</th>
					<th>{LANG.op}</th>
					<th class="w150">&nbsp;</th>
				</tr>
			</thead>
			<!-- BEGIN: generate_page -->
			<tfoot>
				<tr>
					<td class="text-center" colspan="6">{NV_GENERATE_PAGE}</td>
				</tr>
			</tfoot>
			<!-- END: generate_page -->
			<tbody>
				<!-- BEGIN: loop -->
				<tr>
					<td>
						{stt}
				</td>
					<td><a href="{VIEW.link}"> {VIEW.alias} </a></td>
					<td> {VIEW.module} </td>
					<td> {VIEW.op} </td>
					<td class="text-center"><i class="fa fa-edit fa-lg">&nbsp;</i> <a href="{VIEW.link_edit}#edit">{LANG.edit}</a></td>
				</tr>
				<!-- END: loop -->
			</tbody>
		</table>
	</div>
</form>
<!-- END: view -->

<script>

	$('.dongbo_alias_n').click(function(){
		var select = $('select[name=mod] option:selected');
		var value = $(select).val();
		var mod_file = $(select).attr('mod_file');
		var mod_data = $(select).attr('mod_data');
		var mod_upload = $(select).attr('mod_upload');
		if(value > 0 && mod_file != '' && mod_data != '')
		{
			if (confirm(nv_is_change_act_confirm[0])) {
			
			$.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main&mod_file='+mod_file+'&mod_data='+mod_data+'&mod_name='+mod_upload, function(res) {
					if(res == 'ok')
					alert('{LANG.update_successfull}');
					else alert('{LANG.update_error}');
					
				});
			}
			
		}
		else
		{
			alert('{LANG.no_select}');
		}
	
	});
	function update_alias()
	{
		if (confirm(nv_is_change_act_confirm[0])) {
			$.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main&update_alias=1', function(res) {
					if(res == 'ok')
					alert('{LANG.update_successfull}');
					else alert('{LANG.update_error}');
					
				});
		}
	}

</script>

<!-- END: main -->