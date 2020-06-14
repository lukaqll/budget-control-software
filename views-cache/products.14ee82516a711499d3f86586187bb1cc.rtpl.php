<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>
    Orçamentos
  </h1>

</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/index.php/orc/products/create/" class="btn btn-success">Novo Orçamento</a>

              <a href="/index.php/orc/products/dtregister?search=<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-default">Data</a>

              <a id="limparpagos" href="/index.php/orc/products/deletepagos/" class="btn btn-danger hidden" onclick="return confirm('Deseja realmente excluir estes registros?')">Limpar</a>

            <div class="box-tools">
                
                <form action="/index.php/orc/products/<?php echo htmlspecialchars( $order, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="/index.php/orc/products/<?php echo htmlspecialchars( $order, ENT_COMPAT, 'UTF-8', FALSE ); ?>?search=" class="fa fa-close" style="position: relative; margin-left: -20px; margin-top:7px"></a>
                    <input type="text" name="search" id="search" class="form-control pull-right" placeholder="Search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>


            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">Cod</th>
                    <th> <a href="/index.php/orc/products/vlprice?search=<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Cliente</a></th>
                    <th> <a href="/index.php/orc/products/prioridade?search=<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Prioridade</a></th>
                    <th> <a href="/index.php/orc/products/stats?search=<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Status</a></th>
                    <th> <a href="/index.php/orc/products/pago?search=<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Pagamento</a></th>   
                    <th><a href="/index.php/orc/products/price?search=<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Valor</a></th>                  
                  </tr>
                </thead>
                <tbody>
                  
                  <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    

                  	<td><a href="/index.php/orc/product/up/<?php echo htmlspecialchars( $value1["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">
                      <?php echo htmlspecialchars( $value1["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    </a></td>
                    <td>
                    <a href="/index.php/orc/product/up/<?php echo htmlspecialchars( $value1["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">
          						<?php echo htmlspecialchars( $value1["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

          					</a>
          					</td>
                    <td><?php echo htmlspecialchars( $value1["prioridade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["stats"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["pago"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo formatPrice($value1["price"]); ?></td>

                    <td>
                      <a href="/index.php/orc/products/delete/<?php echo htmlspecialchars( $value1["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>


                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

           <div class="box-footer clearfix">
              <a href="/index.php/orc/pdfall/<?php echo htmlspecialchars( $order, ENT_COMPAT, 'UTF-8', FALSE ); ?>/?search=<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn btn-default float-right">Gerar PDF</a>
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>

              </ul>
            </div>
          </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->