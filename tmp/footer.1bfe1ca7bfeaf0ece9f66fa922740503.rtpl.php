<?php if(!class_exists('raintpl')){exit;}?>   <hr style="margin-top: 50px;" class="hidden-print"/>
   
   <div class="container-fluid hidden-print" style="margin-bottom: 10px;">
      <?php if( FS_DEMO ){ ?>

      <div class="well" style="margin-bottom: 20px;">
         <div class="row">
            <div class="col-sm-3">
               <h3>Índice de ayuda:</h3>
               <ul>
                  <li>
                     <a href="https://www.facturascripts.com/comm3/index.php?page=community_questions#instalacion">Instalación.</a>
                     <ul>
                        <li>
                           <a href="https://www.facturascripts.com/comm3/index.php?page=community_item&id=370">Instalación sobre Linux.</a>
                        </li>
                        <li>
                           <a href="https://www.facturascripts.com/comm3/index.php?page=community_item&tag=eneboo">Eneboo / Abanq.</a>
                        </li>
                     </ul>
                  </li>
                  <li><a href="https://www.facturascripts.com/comm3/index.php?page=community_questions#primerospasos">Primeros pasos.</a></li>
                  <li><a href="https://www.facturascripts.com/comm3/index.php?page=community_questions#menuventas">El menú ventas.</a></li>
                  <li><a href="https://www.facturascripts.com/comm3/index.php?page=community_questions#menucompras">El menú compras.</a></li>
               </ul>
            </div>
            <div class="col-sm-6">
               <h3>
                  <a href="https://www.facturascripts.com/store">Tienda de plugins</a>:
               </h3>
               <ul>
                  <li>
                     <a href="https://www.facturascripts.com/store/producto/plantillas-pdf/">Plantillas PDF</a>:
                     permite personalizar los documentos PDF de facturas, albaranes, pedidos y presupuestos.
                  </li>
                  <li>
                     <a href="https://www.facturascripts.com/store/producto/prestashop/">PrestaShop</a>:
                     sincroniza tu catálogo de artículos con tu tienda PrestaShop y consulta los pedidos
                  a golpe de clic. Todo sin salir de FacturaScripts.
                  </li>
                  <li>
                     <a href="https://www.facturascripts.com/store/producto/plugin-woocommerce/">WooCommerce</a>:
                     importa a golpe de clic tus pedidos, clientes y artículos de tu tienda WooCommerce.
                  </li>
                  <li>
                     <a href="https://www.facturascripts.com/store">Más...</a>
                  </li>
               </ul>
            </div>
            <div class="col-sm-3">
               <h3>¿Te ha convencido?</h3>
               <a href="https://www.facturascripts.com/comm3/index.php?page=community_download" class="btn btn-lg btn-primary">
                  <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp; Descargar
               </a>
            </div>
         </div>
      </div>
      <?php } ?>

      
      <div class="row">
         <div class="col-sm-12">
            <?php if( FS_DB_HISTORY ){ ?>

               <div class="panel panel-default hidden-print">
                  <div class="panel-heading">
                     <h3 class="panel-title">Consultas SQL:</h3>
                  </div>
                  <div class="panel-body">
                     <ol style="font-size: 11px; margin: 0px; padding: 0px 0px 0px 20px;">
                        <?php $loop_var1=$fsc->get_db_history(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?><li><?php echo $value1;?></li><?php } ?>

                     </ol>
                  </div>
               </div>
               <?php $loop_var1=$fsc->extensions; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <?php if( $value1->type=='hidden_iframe' ){ ?>

                  <iframe src="index.php?page=<?php echo $value1->from;?><?php echo $value1->params;?>" width="100%"></iframe>
                  <?php } ?>

               <?php } ?>

            <?php }else{ ?>

               <div class="hidden">
               <?php $loop_var1=$fsc->extensions; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <?php if( $value1->type=='hidden_iframe' ){ ?>

                  <iframe src="index.php?page=<?php echo $value1->from;?><?php echo $value1->params;?>"></iframe>
                  <?php } ?>

               <?php } ?>

               </div>
            <?php } ?>

         </div>
      </div>
      <div class="row">
         <div class="col-sm-4 col-xs-6">
            <small>
              <p> Creado Por <B>SoftNEY.COM</B> </p>.
            </small>
         </div>
         <div class="col-sm-4 hidden-xs text-center">
            <span class="label label-default">Dirreccion : Calle 45 # 56-23  B/ Santarder</span>
            <span class="label label-default">Telefono : 665-45-78  314-456-45-78</span>
         </div>
         <div class="col-sm-4 col-xs-6 text-right">
            <span class="label label-default">
               <span class="glyphicon glyphicon-time" aria-hidden="true" title="Página procesada en <?php echo $fsc->duration();?>"></span>
               &nbsp; <?php echo $fsc->hour();?>

            </span>
         </div>
      </div>
   </div>
</body>
</html>
