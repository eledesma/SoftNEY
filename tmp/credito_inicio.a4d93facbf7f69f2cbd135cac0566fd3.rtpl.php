<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="<?php echo $fsc->url();?>"<><span class="glyphicon glyphicon-refresh" aria-hidden="true"></a></li>
    <li role="presentation" <?php if( !$fsc->editar ){ ?> class="active" <?php } ?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Listar Créditos</a></li>
    <li role="presentation" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Crear Crédito</a></li>
   <?php if( $fsc->editar ){ ?>
    <li role="presentation"  class="active"><a href="#editar" aria-controls="editar" role="tab" data-toggle="tab">Editar Crédito</a></li>
   <?php } ?>
 </ul><br>

  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel"  class=" tab-pane <?php if( !$fsc->editar ){ ?> active <?php } ?>"  id="home"><!--listado-->

              <div class="table-responsive"><!--Listado-->
                  <table class="table table-hover">
                     <thead>
                         <tr>
                           <th class="text-center">Codigo</th>
                           <th class="text-center">Tipo Financiación</th>
                           <th class="text-center">Tiempo</th>
                           <th class="text-center">Valor Crédito</th>
                           <th class="text-center">Cantidad Cuotas</th>
                           <th class="text-center">Valor Cuotas Mensual</th>
                         </tr>
                     </thead>
                      <?php $loop_var1=$fsc->listado; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                      <tr <?php if( $value1->financiar==$fsc->user->nick ){ ?> class="bg-success" <?php }else{ ?> class="bg-warning" <?php } ?>>
                          <td class="text-center">
                              <a href="<?php echo $fsc->url();?>&id=<?php echo $value1->id;?>"><?php echo $value1->id;?></a>
                          <?php if( $value1->completado ){ ?>
                          <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                          <?php } ?>
                          </td>

                          <td class="text-center"><?php echo $value1->financiar;?></td>
                          <td class="text-center"><?php echo $value1->tiempo;?></td>
                          <td class="text-center"><?php echo $value1->valor;?></td>
                          <td class="text-center"><?php echo $value1->cuotas;?></td>
                          <td class="text-center"><?php echo $value1->valorcuotas;?></td>
                       </tr>
                      <?php } ?>
                      </table>

              </div>

      </div>
      <div role="tabpanel" class="tab-pane" id="profile"><!--Nuevo Credito-->
          <form class="form" action="<?php echo $fsc->url();?>" method="post" >
          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                      Tipo Crédito:
                      <input type="text" name="financiar" value="" class="form-control"  autocomplete="off" required/>
                  </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                      Tiempo Financiación:
                        <input type="text" name="tiempo" value="" class="form-control"  autocomplete="off" required/>
                  </div>
                  </div>
                  <div class="col-md-4">
                 <div class="form-group">
                     Valor Crédito:
                      <input type="number" name="valor" value="" class="form-control"  autocomplete="off" required/>
                 </div>
                 </div>
              </div>
               <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                      Cantidad Cuotas a Cancelar:
                      <input type="number" name="cuotas" value="" class="form-control" autocomplete="off" required/>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                      Valor Mensual de Cuotas:
                      <input type="number" name="valorcuotas" value="" class="form-control" autocomplete="off" required/>
                  </div>
                  </div>
                </div>
                <div class="row">
                      <div class="text-right">
                          <button class="btn btn-sm btn-primary" type="sutmit">
                          <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                              &nbsp Guardar
                          </button>
                      </div>
                 </div>
          </form>
       </div>
   </div>
   <?php if( $fsc->editar ){ ?><!--editar credito-->
   <div role="tabpanel" class="tab-pane active" id="editar">
   <form class="form" action="<?php echo $fsc->url();?>" method="post" >
    <input type="hidden" name="id" value="<?php echo $fsc->editar->id;?>"/>
             <div class="container">
                 <h3>Editar Crédito:</h3>
                 <div class="row">
                     <div class="col-md-4">
                     <div class="form-group">
                         Tipo Crédito:
                         <input type="text" name="financiar" value="<?php echo $fsc->editar->financiar;?>" class="form-control"  autocomplete="off" required/>
                    </div>
                     </div>
                     <div class="col-md-4">
                       <div class="form-group">
                         Tiempo Financiación:
                         <input type="text" name="tiempo" value="<?php echo $fsc->editar->tiempo;?>" class="form-control"  autocomplete="off" required/>
                       </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        Valor Crédito:
                        <input type="number" name="valor" value="<?php echo $fsc->editar->valor;?>" class="form-control"  autocomplete="off" required/>
                      </div>
                   </div>
                 </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        Cantidad Cuotas a Cancelar:
                       <input type="text" name="cuotas" value="<?php echo $fsc->editar->cuotas;?>" class="form-control" required/>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        Valor Mensual de Cuotas:
                          <input type="number" name="valorcuotas" value="<?php echo $fsc->editar->valorcuotas;?>" class="form-control" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="completado" value="TRUE" <?php if( $fsc->editar->completado ){ ?> checked="checked"<?php } ?>></input>
                            Crédito Terminado
                        </label>
                      </div>
                    </div>
                    <div class="text-right">
                        <a href="<?php echo $fsc->url();?>&delete=<?php echo $fsc->editar->id;?>" class="btn btn-sm btn-danger">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            &nbsp Eliminar
                        </a>
                        <button class="btn btn-sm btn-primary" type="sutmit">
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            &nbsp Actualizar
                        </button>
                    </div>
             </div>
       </div>
     </form>
   </div>
   <?php } ?>
<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>
