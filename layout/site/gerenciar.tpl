<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Informação:</strong> O(s) Campo(s) marcados com <strong>*</strong> são obrigatórios.
			</div>
		</div>
	</div>
	{if $Error}
		{include file="layout/site/error.tpl"}
	{/if}
	{if $Success}
		{include file="layout/site/success.tpl"}
	{/if}
	{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal({
				show: true,
				keyboard: false,
				backdrop: 'static'
			});
		});
	</script>
	{/literal}
</div>