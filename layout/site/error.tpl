<div class="row">
	<div class="col-sm-12">
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Atenção: </h4>
			{foreach $Error as $Item}
				<i class='glyphicon glyphicon-warning-sign'></i> {$Item} <br />
			{/foreach}
			</p>
		</div>
	</div>
</div>
<div class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Atenção</h4>
			</div>
			<div class="modal-body">
				{foreach $Error as $Item}
					<p><i class='glyphicon glyphicon-warning-sign'></i> {$Item} </p>
				{/foreach}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class='glyphicon glyphicon-remove'></i> Fechar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
