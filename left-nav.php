<!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">
                        <?php
                          $getuserDetail = GetRecord("users", "id =".$_SESSION['MR_USER_ID']);

                          if(isset($getuserDetail['photo']) && $getuserDetail['photo'] != '')
                            $uimage = 'image_users/'.$getuserDetail['photo'];
                          else
                            $uimage = "image_users/1.jpg";
                        ?>
                        <img src="<?php echo $uimage;?>" class="dker" alt="...">
                        <i class="on md b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt"><?php echo $_SESSION['MR_USER_NAME']?></strong>
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block"></span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                      <li>
                        <a href="logout.php">Salir</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm"><a href="main.php">Dashboard 1</a></div>
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm"><a href="main2.php">Dashboard 2</a></div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <?php if($_SESSION['MR_USER_ROLE'] == 1) : ?>
                    <li <?php if(isset($userclass)) echo $userclass;?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-dot"></i>
                        <span>Usuarios</span>
                      </a>
                      <ul class="nav dker">
                        <li <?php if(isset($registerclass)) echo $registerclass;?>>
                          <a href="register.php"><i class="i i-dot"></i>
                            <span>Registrar Usuarios</span>
                          </a>
                        </li>
                        <li <?php if(isset($userlistclass)) echo $userlistclass;?>>
                          <a href="users.php"><i class="i i-dot"></i>
                            <span>Ver Usuarios</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  <?php endif; ?>
                    <li <?php if(isset($collaclass)) echo $collaclass;?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-dot"></i>
                        <span>Colaboradores</span>
                      </a>
                      <ul class="nav dker">
                        <li <?php if(isset($registercollaclass)) echo $registercollaclass;?>>
                          <a href="register_collaborator.php"><i class="i i-dot"></i>
                            <span>Registrar Colaborador</span>
                          </a>
                        </li>
                        <li <?php if(isset($viewcollaclass)) echo $viewcollaclass;?>>
                          <a href="collaborator.php"><i class="i i-dot"></i>
                            <span>Ver Colaboradores</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <?php /////////////////////////////////////////////////////////////////////// ?>
                    <li <?php if(isset($cataloge)) echo $cataloge;?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-dot"></i>
                        <span>Catalogo</span>
                      </a>
                      <ul class="nav dker">
                        <li <?php if(isset($registerCntclass)) echo $registerCntclass;?>>
                          <a href="register_customer.php"><i class="i i-dot"></i>
                            <span>Registrar Cliente</span>
                          </a>
                        </li>
                        <li <?php if(isset($editCntclass)) echo $editCntclass;?>>
                          <a href="customers.php"><i class="i i-dot"></i>
                            <span>Ver Clienets</span>
                          </a>
                        </li>
                        <li <?php if(isset($userSellersclass)) echo $userSellersclass;?>>
                          <a href="sellers.php"><i class="i i-dot"></i>
                            <span>Ver Vendedores</span>
                          </a>
                        </li>
                        <li <?php if(isset($registerContactclass)) echo $registerContactclass;?>>
                          <a href="register_contac.php"><i class="i i-dot"></i>
                            <span>Registrar Contacto</span>
                          </a>
                        </li>
                        <li <?php if(isset($Contactlistclass)) echo $Contactlistclass;?>>
                          <a href="contacts.php"><i class="i i-dot"></i>
                            <span>Ver Contactos</span>
                          </a>
                        </li>
                        <?php if($_SESSION['MR_USER_ROLE'] == 1) : ?>
                        <li <?php if(isset($registerCranerclass)) echo $registerCranerclass;?>>
                          <a href="register_crane.php"><i class="i i-dot"></i>
                            <span>Registrar Grua</span>
                          </a>
                        </li>
                      <?php endif; ?>
                        <li <?php if(isset($Grualistclass)) echo $Grualistclass;?>>
                          <a href="craners.php"><i class="i i-dot"></i>
                            <span>Ver Gruas</span>
                          </a>
                        </li>
                        <?php if($_SESSION['MR_USER_ROLE'] == 1) : ?>
                        <li <?php if(isset($registerServiceclass)) echo $registerServiceclass;?>>
                          <a href="register_service.php"><i class="i i-dot"></i>
                            <span>Registrar Servicios</span>
                          </a>
                        </li>
                        <?php endif; ?>
                        <li <?php if(isset($Servicelistclass)) echo $Servicelistclass;?>>
                          <a href="services.php"><i class="i i-dot"></i>
                            <span>Ver Servicios</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <?php /////////////////////////////////////////////////////////////// ?>
                    <li <?php if(isset($entryclass)) echo $entryclass;?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-dot"></i>
                        <span>Ingreso</span>
                      </a>
                      <ul class="nav dker">
                        <li <?php if(isset($regentryclass)) echo $regentryclass;?>>
                          <a href="register_enrtry.php"><i class="i i-dot"></i>
                            <span>Registrar Ingreso</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <?php //////////////////////////////////////////////////////////////// ?>
                    <li <?php if(isset($quotclass)) echo $quotclass;?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-dot"></i>
                        <span>Cotizaciones</span>
                      </a>
                      <ul class="nav dker">
                        <li <?php if(isset($regquotclass)) echo $regquotclass;?>>
                          <a href="quotations.php"><i class="i i-dot"></i>
                            <span>Cotizaciones</span>
                          </a>
                        </li>
                        <li <?php if(isset($billquotclass)) echo $billquotclass;?>>
                          <a href="billing.php"><i class="i i-dot"></i>
                            <span>Cotizaciones Facturacion</span>
                          </a>
                        </li>
                        <li <?php if(isset($hisquotclass)) echo $hisquotclass;?>>
                          <a href="history_quotations.php"><i class="i i-dot"></i>
                            <span>Historial de Cotizaciones</span>
                          </a>
                        </li>
                        <?php if( $_SESSION['MR_USER_ROLE'] == 1){ ?>
                        <li <?php if(isset($disquotclass)) echo $disquotclass;?>>
                          <a href="discard_quolation.php"><i class="i i-dot"></i>
                            <span>Cotizaciones Descartadas</span>
                          </a>
                        </li>
                        <?php } ?>
                        <li <?php if(isset($canquotclass)) echo $canquotclass;?>>
                          <a href="switch_quotations.php"><i class="i i-dot"></i>
                            <span>Reporte Cambio</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li <?php if(isset($conditionclass)) echo $conditionclass;?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-dot"></i>
                        <span>Terminos y Condiciones</span>
                      </a>
                      <ul class="nav dker">
                        <li <?php if(isset($regconditionclass)) echo $regconditionclass;?>>
                          <a href="register_conditions.php"><i class="i i-dot"></i>
                            <span>Crear Condiciones</span>
                          </a>
                        </li>
                        <li <?php if(isset($viewconditionclass)) echo $viewconditionclass;?>>
                          <a href="condition_services.php"><i class="i i-dot"></i>
                            <span>Ver Condiciones</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li <?php if(isset($Reportdclass)) echo $Reportdclass;?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-dot"></i>
                        <span>Logistica</span>
                      </a>
                      <ul class="nav dker">
                        <li <?php if(isset($regReportdclass)) echo $regReportdclass;?>>
                          <a href="report_dialy_craners.php"><i class="i i-dot"></i>
                            <span>Registro Diario</span>
                          </a>
                        </li>
                        <li <?php if(isset($regRepovrtdclass)) echo $regRepovrtdclass;?>>
                          <a href="date_repor_dialy.php"><i class="i i-dot"></i>
                            <span>Ver Registro Diario</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li <?php if(isset($Reportclass)) echo $Reportclass;?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-dot"></i>
                        <span>Reportes</span>
                      </a>
                      <ul class="nav dker">
                        <li <?php if(isset($regReportclass)) echo $regReportclass;?>>
                          <a href="report_coti_concre.php"><i class="i i-dot"></i>
                            <span>Cotizado | Concretado</span>
                          </a>
                        </li>
                        <li <?php if(isset($closedeportclass)) echo $closedeportclass;?>>
                          <a href="report_closed.php"><i class="i i-dot"></i>
                            <span>Cerradas</span>
                          </a>
                        </li>
                      </ul>
                    </li>
              </ul>
            </nav>
          </div>
        </section>
        <footer class="footer hidden-xs no-padder text-center-nav-xs">
          <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
            <i class="i i-logout"></i>
          </a>
          <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
            <i class="i i-circleleft text"></i>
            <i class="i i-circleright text-active"></i>
          </a>
        </footer>
      </section>
    </aside>
