<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="<?php echo $fsc->url();?>"<><span class="glyphicon glyphicon-refresh" aria-hidden="true"></a></li>
    <li role="presentation" <?php if( !$fsc->editar ){ ?> class="active" <?php } ?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Consultar Facturas</a></li>
    <li role="presentation" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Crear Factura</a></li>
   <?php if( $fsc->editar ){ ?>
    <li role="presentation"  class="active"><a href="#editar" aria-controls="editar" role="tab" data-toggle="tab">Editar Factura</a></li>
   <?php } ?>
 </ul>
  <!-- Tab panes -->
  <div class="tab-content">
      <br><div role="tabpanel"  class=" tab-pane <?php if( !$fsc->editar ){ ?> active <?php } ?>"  id="home"><!--listado-->

              <div class="table-responsive"><!--Listado-->
                  <table class="table table-hover">
                     <thead>
                         <tr>
                      <th class="text-center">Codigo</th>
                      <th class="text-center">Fecha Compra</th>
                      <th class="text-center">Empresa</th>
                      <th class="text-center">Empleado</th>
                      <th class="text-center">Cliente</th>
                      <th class="text-center">Producto</th>
                      <th class="text-center">Cantidad</th>
                      <th class="text-center">Garantía</th>
                      <th class="text-center">Valor Total</th>
                      <th class="text-center">Forma de Pago</th>
                      <th class="text-center">Crédito</th>
                         </tr>
                     </thead>
                      <?php $loop_var1=$fsc->listado; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                      <tr <?php if( $value1->empleado==$fsc->user->nick ){ ?> class="bg-success" <?php }else{ ?> class="bg-warning" <?php } ?>>
                          <td class="text-center">
                              <a href="<?php echo $fsc->url();?>&id=<?php echo $value1->id;?>"><?php echo $value1->id;?></a>
                          </td>

                          <td class="text-center"><?php echo $value1->fecha;?></td>
                          <td class="text-center"><?php echo $value1->empresa;?></td>
                          <td class="text-center"><?php echo $value1->empleado;?></td>
                          <td class="text-center"><?php echo $value1->cliente;?></td>
                          <td class="text-center"><?php echo $value1->producto;?></td>
                          <td class="text-center"><?php echo $value1->cantidad;?></td>
                          <td class="text-center"><?php echo $value1->garantia;?></td>
                          <td class="text-center"><?php echo $value1->total;?></td>
                          <td class="text-center"><?php echo $value1->pago;?></td>
                          <td class="text-center"><?php echo $value1->credito;?></td>
                       </tr>
                      <?php } ?>
                      </table>

              </div>

      </div>
      <div role="tabpanel" class="tab-pane" id="profile"><!--Nueva Factura-->
          <form class="form" action="<?php echo $fsc->url();?>" method="post" >
            <div class="container">
              <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      Fecha Compra:
                      <input type="date" name="fecha" value="" class="form-control"  autocomplete="off" required/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      Empresa:
                      <select name="empresa" class="form-control" required>
                          <option value="">Seleccionar Empresa</option>
                          <option value="">---------</option>
                          <?php $loop_var1=$fsc->consulta1; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                          <option> <?php echo $value1['nombre'];?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      Empleado:
                      <select name="empleado" class="form-control" required>
                          <option value="">Seleccionar Empleado</option>
                          <option value="">---------</option>
                          <?php $loop_var1=$fsc->consulta2; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                          <option> <?php echo $value1['nick'];?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      Cliente:
                      <select name="cliente" class="form-control" required>
                          <option value="">Seleccionar Cliente</option>
                          <option value="">---------</option>
                          <?php $loop_var1=$fsc->consulta3; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                          <option> <?php echo $value1['nombre'];?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
              </div>
               <div class="row">
                 <div class="col-md-3">
                   <div class="form-group">
                     Producto:
                     <select name="producto" class="form-control" required>
                         <option value="">Seleccionar Producto</option>
                         <option value="">---------</option>
                         <?php $loop_var1=$fsc->consulta4; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                         <option> <?php echo $value1['nombre'];?></option>
                         <?php } ?>
                     </select>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     Cantidad:
                     <input type="number" name="cantidad" value="" class="form-control"  autocomplete="off" required/>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     Tiempo Garantía:
                     <input type="text" name="garantia" value="" class="form-control"  autocomplete="off" required/>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     Valor Total:
                     <input type="number" name="total" value="" class="form-control"  autocomplete="off" required/>
                   </div>
                 </div>
               </div>
              <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      Forma de Pago:
                      <input type="text" name="pago" value="" class="form-control"  autocomplete="off" required/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    Codigo Crédito:
                      <select name="credito" class="form-control" required>
                          <option value="">Seleccionar Crédito</option>
                          <option value="">---------</option>
                          <option value="Ninguno">Ninguno</option>
                          <?php $loop_var1=$fsc->consulta5; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                          <option> <?php echo $value1['id'];?></option>
                          <?php } ?>
                        </select>
                   </div>
               </div>
                <div class="row">
                  <div class="text-right">
                      <button class="btn btn-sm btn-primary" type="sutmit">
                      <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                          &nbsp Guardar
                      </button>
                      <button class="btn btn-sm btn-success" type="" name="imprimir" value="Imprimir" onclick="window.print();">
                      <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                          &nbsp Imprimir
                      </button>
                  </div>
                </div>
           </div>
        </form>
   </div>
   <?php if( $fsc->editar ){ ?><!--Editar factura-->
   <div role="tabpanel" class="tab-pane active" id="editar">
   <form class="form" action="<?php echo $fsc->url();?>" method="post" >
     <input type="hidden" name="id" value="<?php echo $fsc->editar->id;?>"/>
             <div class="container">
                 <h3>Editar Factura:</h3>
                 <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        Fecha Compra:
                        <input type="date" name="fecha" value="<?php echo $fsc->editar->fecha;?>" class="form-control"  autocomplete="off" required/>
                      </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                         Empresa:
                          <select name="empresa" class="form-control" required>
                           <option value="<?php echo $fsc->editar->empresa;?>"><?php echo $fsc->editar->empresa;?></option>
                           <option value="">---------</option>
                           <?php $loop_var1=$fsc->consulta1; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                           <option <?php if( $value1->nombre==$fsc->editar->empresa ){ ?> selected="selected"<?php } ?>><?php echo $value1['nombre'];?></option>
                           <?php } ?>
                          </select>
                       </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                         Empleado:
                          <select name="empleado" class="form-control" required>
                           <option value="<?php echo $fsc->editar->empleado;?>"><?php echo $fsc->editar->empleado;?></option>
                           <option value="">---------</option>
                           <?php $loop_var1=$fsc->consulta2; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                           <option <?php if( $value1->nick==$fsc->editar->empleado ){ ?> selected="selected"<?php } ?>><?php echo $value1['nick'];?></option>
                           <?php } ?>
                          </select>
                       </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                         Cliente:
                          <select name="cliente" class="form-control" required>
                           <option value="<?php echo $fsc->editar->cliente;?>"><?php echo $fsc->editar->cliente;?></option>
                           <option value="">---------</option>
                           <?php $loop_var1=$fsc->consulta3; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                           <option <?php if( $value1->nombre==$fsc->editar->cliente ){ ?> selected="selected"<?php } ?>><?php echo $value1['nombre'];?></option>
                           <?php } ?>
                          </select>
                       </div>
                     </div>
                 </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        Producto:
                         <select name="producto" class="form-control" required>
                          <option value="<?php echo $fsc->editar->producto;?>"><?php echo $fsc->editar->producto;?></option>
                          <option value="">---------</option>
                          <?php $loop_var1=$fsc->consulta4; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                          <option <?php if( $value1->nombre==$fsc->editar->producto ){ ?> selected="selected"<?php } ?>><?php echo $value1['nombre'];?></option>
                          <?php } ?>
                         </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        Cantidad:
                        <input type="number" name="cantidad" value="<?php echo $fsc->editar->cantidad;?>" class="form-control"  autocomplete="off" required/>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        Tiempo Garantía:
                        <input type="text" name="garantia" value="<?php echo $fsc->editar->garantia;?>" class="form-control"  autocomplete="off" required/>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        Valor Total:
                        <input type="number" name="total" value="<?php echo $fsc->editar->total;?>" class="form-control"  autocomplete="off" required/>
                      </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                       Forma de Pago:
                       <input type="text" name="pago" value="<?php echo $fsc->editar->pago;?>" class="form-control"  autocomplete="off" required/>
                     </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                        Codigo Crédito:
                         <select name="credito" class="form-control" required>
                          <option value="<?php echo $fsc->editar->credito;?>"><?php echo $fsc->editar->credito;?></option>
                          <option value="">---------</option>
                          <option value="Ninguno">Ninguno</option>
                          <?php $loop_var1=$fsc->consulta5; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                          <option <?php if( $value1->id==$fsc->editar->credito ){ ?> selected="selected"<?php } ?>><?php echo $value1['id'];?></option>
                          <?php } ?>
                         </select>
                      </div>
                    </div>
                    </div>
                     <div class="row">
                    <div class="text-right">
                      <!-- <a href="<?php echo $fsc->url();?>&delete=<?php echo $fsc->editar->id;?>" class="btn btn-sm btn-danger">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                               &nbsp Eliminar
                           </a> -->
                        <button class="btn btn-sm btn-primary" type="sutmit">
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            &nbsp Actualizar
                        </button>
                        <button class="btn btn-sm btn-success" type="sutmit" name="imprimir" value="Imprimir" onclick="window.print();">
                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                            &nbsp Imprimir
                        </button>
                    </div>
             </div>
       </div>
     </form>
   </div>
   <?php } ?>
<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>
