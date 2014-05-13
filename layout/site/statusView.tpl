<div class="row">
	<div class="col-md-2">
		<label>Status: </label>
	</div>
	<!-- col-md-2 -->
	<div class="col-md-10">
		{if $Obj->getStatus()}<i class="glyphicon glyphicon-ok"></i> Ativo{else}<i class="glyphicon glyphicon-remove"></i> Inativo{/if}
	</div>
	<!-- col-md-10 -->
</div>
<!-- row -->
<div class="row">
	<div class="col-sm-2">
		<label>Opções: </label>
	</div>
	<!-- col-md-2 -->
	<div class="col-md-10">
		<div class="btn-group">
			<a href="{$Link.list}" id="listar" class="btn btn-default"><i class="glyphicon glyphicon-list-alt"></i> Listar </a>
			<a href="{$Link.edit}{$Obj->getId()}" id="edit" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Editar </a>
			<a href="{$Link.delete}{$Obj->getId()}" id="delete" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i> Excluir </a>
		</div>
		<!-- btn-group -->
	</div>
	<!-- col-md-10 -->
</div>	
<!-- row -->