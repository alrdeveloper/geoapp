<div class="row">
<div class="col-sm-12">
	<div class="form-group">
		<label for="status" class="col-sm-2 control-label top-20">Status: </label>
		<div class="col-sm-10 top-10">
			<div class="btn-group" data-toggle="buttons">
				<label class="btn btn-default {if $Obj->getStatus() == 1 || $Obj->getStatus() == ""}active{/if}"> 
					<input type="radio" name="status" id="status" value="1" {if $Obj->getStatus() == 1 || $Obj->getStatus() == ""}checked="checked"{/if}><i class="glyphicon glyphicon-ok"></i> Ativo
				</label> 
				<label class="btn btn-default {if $Obj->getStatus() == 2}active{/if}"> 
					<input type="radio" name="status" id="status" value="2" {if $Obj->getStatus() == 2}checked="checked"{/if}> <i class="glyphicon glyphicon-remove"></i> Inativo
				</label> 
			</div>
			<!-- btn-group -->
		</div>
		<!-- col-sm-10 -->
	</div>
	<!-- form-group -->
	<input type="hidden" name="id" value="{$Obj->getId()}" />
</div>
<!-- span12 -->
<div class="col-sm-12">
	<div class="form-group">
		<label for="status" class="col-sm-2 control-label top-20">Opções: </label>
		<div class="col-sm-10 top-10">
			<div class="btn-group">
				<button type="submit" name="submit" id="salvar" class="btn btn-primary" value="salvar" ><i class="glyphicon glyphicon-floppy-disk"></i> Salvar </button>
				<button type="reset" name="limpar" id="limpar" class="btn btn-warning"> <i class="glyphicon glyphicon-trash"></i> Limpar </button>
				<a href="{$Link.list}" id="listar" class="btn btn-default"><i class="glyphicon glyphicon-list-alt"></i> Listar </a>
			</div>
			<!-- btn-group -->
		</div>
		<!-- col-sm-10 -->
	</div>
	<!-- form-group -->
</div>	
</div>	
<!-- span12 -->