<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Cambiar Password </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			      <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Password</label>
              <div class="col-lg-7">
                <input type="password" class="form-control" name="pass" value="">
              </div>
            </div>
			      </div>
			  </div>
      </div>
	    <div class="modal-footer">
	      <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
	      <button type="submit" name="submitpass" class="btn btn-primary">Ok</button>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
