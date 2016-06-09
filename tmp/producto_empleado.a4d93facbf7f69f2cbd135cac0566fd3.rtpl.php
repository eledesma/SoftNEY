<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="<?php echo $fsc->url();?>"<><span class="glyphicon glyphicon-refresh" aria-hidden="true"></a></li>
    <li role="presentation" <?php if( !$fsc->editar ){ ?> class="active" <?php } ?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Listar Productos</a></li>
    <li role="presentation" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Insertar Producto</a></li>
   <?php if( $fsc->editar ){ ?>
    <li role="presentation"  class="active"><a href="#editar" aria-controls="editar" role="tab" data-toggle="tab">Editar Producto</a></li>
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
                      <th class="text-center">Nombre Producto</th>
                      <th class="text-center">Modelo</th>
                      <th class="text-center">Color</th>
                      <th class="text-center">Marca</th>
                      <th class="text-center">Cilindraje</th>
                      <th class="text-center">Cantidad</th>
                      <th class="text-center">Valor Unitario</th>
                      <th class="text-center">Categoria</th>
                         </tr>
                     </thead>
                      <?php $loop_var1=$fsc->listado; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                      <tr <?php if( $value1->nombre==$fsc->user->nick ){ ?> class="bg-success" <?php }else{ ?> class="bg-warning" <?php } ?>>
                          <td class="text-center">
                              <a href="<?php echo $fsc->url();?>&id=<?php echo $value1->id;?>"><?php echo $value1->id;?></a>
                          </td>

                          <td class="text-center"><?php echo $value1->nombre;?></td>
                          <td class="text-center"><?php echo $value1->modelo;?></td>
                          <td class="text-center"><?php echo $value1->color;?></td>
                          <td class="text-center"><?php echo $value1->marca;?></td>
                          <td class="text-center"><?php echo $value1->cilindraje;?></td>
                          <td class="text-center"><?php echo $value1->cantidad;?></td>
                          <td class="text-center"><?php echo $value1->valor;?></td>
                          <td class="text-center"><?php echo $value1->categoria;?></td>
                       </tr>
                      <?php } ?>
                      </table>

              </div>

      </div>
      <div role="tabpanel" class="tab-pane" id="profile"><!--Nuevo Producto-->
          <form class="form" action="<?php echo $fsc->url();?>" method="post" >
            <div class="container">
              <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      Nombre Producto:
                      <input type="text" name="nombre" value="" class="form-control"  autocomplete="off" required/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      Modelo:
                      <input type="number" name="modelo" value="" class="form-control"  autocomplete="off" required/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      Color:
                      <input type="text" name="color" value="" class="form-control"  autocomplete="off" required/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      Marca:
                      <input type="text" name="marca" value="" class="form-control"  autocomplete="off" required/>
                    </div>
                  </div>
              </div>
               <div class="row">
                 <div class="col-md-3">
                   <div class="form-group">
                     Cilindraje:
                     <input type="number" name="cilindraje" value="" class="form-control"  autocomplete="off" required/>
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
                     Valor Unitario:
                     <input type="number" name="valor" value="" class="form-control"  autocomplete="off" required/>
                   </div>
                 </div>
                  <div class="col-md-3">
                    Tipo Categoria:
                      <select name="categoria" class="form-control" required>
                          <option value="">Seleccionar Categoria</option>
                          <option value="">---------</option>
                          <?php $loop_var1=$fsc->consultar; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                          <option> <?php echo $value1['nombre'];?></option>
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
                  </div>
                </div>
           </div>
        </form>
   </div>
   <?php if( $fsc->editar ){ ?><!--Editar Producto-->
   <div role="tabpanel" class="tab-pane active" id="editar">
   <form class="form" action="<?php echo $fsc->url();?>" method="post" >
     <input type="hidden" name="id" value="<?php echo $fsc->editar->id;?>"/>
             <div class="container">
                 <h3>Editar Producto:</h3>
                 <div class="row">
                     <div class="col-md-3">
                       <div class="form-group">
                         Nombre Producto:
                         <input type="text" name="nombre" value="<?php echo $fsc->editar->nombre;?>" class="form-control"  autocomplete="off" required/>
                       </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                         Modelo:
                         <input type="number" name="modelo" value="<?php echo $fsc->editar->modelo;?>" class="form-control"  autocomplete="off" required/>
                       </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                         Color:
                         <input type="text" name="color" value="<?php echo $fsc->editar->color;?>" class="form-control"  autocomplete="off" required/>
                       </div>
                     </div>
                     <div class="col-md-3">
                       <div class="form-group">
                         Marca:
                         <input type="text" name="marca" value="<?php echo $fsc->editar->marca;?>" class="form-control"  autocomplete="off" required/>
                       </div>
                     </div>
                 </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        Cilindraje:
                        <input type="number" name="cilindraje" value="<?php echo $fsc->editar->cilindraje;?>" class="form-control"  autocomplete="off" required/>
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
                        Valor Unitario:
                        <input type="number" name="valor" value="<?php echo $fsc->editar->valor;?>" class="form-control"  autocomplete="off" required/>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        Tipo Categoria:
                         <select name="categoria" class="form-control" required>
                          <option value="<?php echo $fsc->editar->categoria;?>"><?php echo $fsc->editar->categoria;?></option>
                          <option value="">---------</option>
                          <?php $loop_var1=$fsc->consultar; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                          <option <?php if( $value1->nombre==$fsc->editar->categoria ){ ?> selected="selected"<?php } ?>><?php echo $value1['nombre'];?></option>
                          <?php } ?>
                         </select>
                      </div>
                    </div>

                    <div class="text-right">
                      <!-- <a href="<?php echo $fsc->url();?>&delete=<?php echo $fsc->editar->id;?>" class="btn btn-sm btn-danger">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                               &nbsp Eliminar
                           </a> -->
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
