<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="<?php echo $fsc->url();?>"<><span class="glyphicon glyphicon-refresh" aria-hidden="true"></a></li>
    <li role="presentation" <?php if( !$fsc->editar ){ ?> class="active" <?php } ?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Listar Categorías</a></li>
    <li role="presentation" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Insertar Categoría</a></li>
   <?php if( $fsc->editar ){ ?>
    <li role="presentation"  class="active"><a href="#editar" aria-controls="editar" role="tab" data-toggle="tab">Editar Categoría</a></li>
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
                      <th class="text-center">Nombre Categoria</th>
                      <th class="text-center">Descripción</th>
                         </tr>
                     </thead>
                      <?php $loop_var1=$fsc->listado; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
                      <tr <?php if( $value1->nombre==$fsc->user->nick ){ ?> class="bg-success" <?php }else{ ?> class="bg-warning" <?php } ?>>
                          <td class="text-center">
                              <a href="<?php echo $fsc->url();?>&id=<?php echo $value1->id;?>"><?php echo $value1->id;?></a>
                          </td>
                          <td class="text-center"><?php echo $value1->nombre;?></td>
                          <td class="text-center"><?php echo $value1->descripcion;?></td>
                       </tr>
                      <?php } ?>
                  </table>
              </div>

      </div>
      <div role="tabpanel" class="tab-pane" id="profile"><!--Nueva Categoria-->
          <form class="form" action="<?php echo $fsc->url();?>" method="post" >
            <div class="container">
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      Nombre Categoria:
                      <input type="text" name="nombre" value="" class="form-control"  autocomplete="off" required/>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      Descripción:
                      <textarea name="descripcion" rows="4" value="" class="form-control" required></textarea>
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
           </div>
        </form>
   </div>
   <?php if( $fsc->editar ){ ?><!--Editar Categoria-->
   <div role="tabpanel" class="tab-pane active" id="editar">
   <form class="form" action="<?php echo $fsc->url();?>" method="post" >
     <input type="hidden" name="id" value="<?php echo $fsc->editar->id;?>"/>
             <div class="container">
                 <h3>Editar Categoría:</h3>
                 <div class="row">
                     <div class="col-md-4">
                       <div class="form-group">
                         Nombre Categoria:
                         <input type="text" name="nombre" value="<?php echo $fsc->editar->nombre;?>" class="form-control"  autocomplete="off" required/>
                       </div>
                     </div>
                     <div class="col-md-8">
                       <div class="form-group">
                         Descripción:
                         <textarea name="descripcion" rows="4" value="" class="form-control" required><?php echo $fsc->editar->descripcion;?></textarea>
                       </div>
                     </div>
                 </div>
                 <div class="row">
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
