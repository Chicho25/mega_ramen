<?php
include("include/config.php");
include("include/defs.php");

if (isset($_GET['id'])) {
  $registro_nota = GetRecords("SELECT
                                  crm_notes.*, users.real_name, users.last_name
                                FROM
                                  crm_notes INNER JOIN users on crm_notes.log_user_register = users.id
                                WHERE
                                  crm_notes.id =".$_GET['id']."
                                ORDER BY 1 desc
                                  ");
}

 ?>
<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Notas</h4>
	    </div>
	    <div class="modal-body">
        <?php foreach ($registro_nota as $key => $value): ?>
	      <div class="row">
          <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th>Nota #</th>
                  <th><?php echo $value['id']; ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Contenido</td>
                  <td><?php echo $value['conten_note']; ?></td>
                </tr>
                <tr>
                  <td>Usuario</td>
                  <td><?php echo $value['real_name'].' '.$value['last_name']; ?></td>
                </tr>
                <tr>
                  <td>Fecha de Registro</td>
                  <td><?php echo $value['log_time']; ?></td>
                </tr>
                <tr>
                  <td>Fecha de Recordatorio</td>
                  <td><?php echo $value['remember_date']; ?></td>
                </tr>
              </tbody>
            </table>
        </div>
        <?php endforeach; ?>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!-- Bootstrap -->
