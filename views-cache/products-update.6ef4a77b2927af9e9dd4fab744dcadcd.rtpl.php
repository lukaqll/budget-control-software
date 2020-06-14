<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>
    Editar Orçamento <?php echo htmlspecialchars( $product["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->


           <form role="form" action="/index.php/orc/product/up/<?php echo htmlspecialchars( $product["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <div class="row">
              <div class="col-md-5 col-sm-5">
                <!-- <label style="margin-top: 10px">Responsável</label>
                <input tabindex="0" type="text" id="desproduct" name="desproduct" class="form-control" value="<?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> -->

                <label style="margin-top: 10px">Cliente</label>
                <input tabindex="0" type="text" id="vlprice" name="vlprice" class="form-control" value="<?php echo htmlspecialchars( $product["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                <label style="margin-top: 10px">Email</label>
                <input tabindex="0" type="email" id="vlwidth" name="vlwidth" class="form-control" value="<?php echo htmlspecialchars( $product["vlwidth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                <label style="margin-top: 10px">Telefone</label>
                <input tabindex="0" type="text" id="vlheight" name="vlheight" class="form-control" value="<?php echo htmlspecialchars( $product["vlheight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                <label style="margin-top: 10px">Arquivos</label>

                <span data-tooltip="Os arquivos serão salvos na pasta 'arquivos'. você poderá baixá-los novamente para outra pasta de sua escolha."><b class="obs">!</b></span><br>
                <label class="btn btn-primary" for="dir">Adicionar um arquivo</label>
                <input type="file" name="dir" id="dir" style="display: none">
                <span id="lbdir" ></span>

              </div>


              <div class="col-md-3 col-sm-3">
                <label style="margin-top: 10px">Início</label>
                <input tabindex="-1" type="date" id="vllength" name="vllength"  placeholder="__/__/__" class="form-control" value="<?php echo htmlspecialchars( $product["vllength"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                <label style="margin-top: 10px">Prioridade</label>
                <select tabindex="-1" id="prioridade" id="prioridade" name="prioridade" class="form-control">
                  <option value="<?php echo htmlspecialchars( $product["prioridade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $product["prioridade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <option value="(3)Baixa">(3)Baixa</option>
                  <option value="(2)Média">(2)Média</option>
                  <option value="(1)Alta">(1)Alta</option>
                 </select>

                  <label style="margin-top: 10px">Pedido</label>
                 <input tabindex="-1" type="text" id="desurl" name="desurl" class="form-control" value="<?php echo htmlspecialchars( $product["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                 <label style="margin-top: 10px">Valor Total</label> <span data-tooltip="Use ' . ' para separar as casas decimais."><b class="obs">!</b></span>
                 <input tabindex="-1" type="num"  id="price" name="price" step='0.01' placeholder="R$" class="form-control" value='<?php echo formatPrice($product["price"]); ?>'  >
              </div>


              <div class="col-md-3 col-sm-3">
                <label style="margin-top: 10px">Previsão</label>
                <input tabindex="-1" type="text" id="vlweight" name="vlweight" class="form-control" value="<?php echo htmlspecialchars( $product["vlweight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                <label style="margin-top: 10px">Status</label>
                <select tabindex="-1" id="stats" id="stats" name="stats" class="form-control">
                  <option value="<?php echo htmlspecialchars( $product["stats"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $product["stats"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <option value="(5)Não Iniciado">(5)Não Iniciado</option>
                  <option value="(4)Aguardando Aprovação">(4)Aguardando Aprovação</option>
                  <option value="(3)Em Andamento">(3)Em Andamento</option>
                  <option value="(2)Concluído">(2)Concluído</option>
                  <option value="(1)Entregue">(1)Entregue</option>
                </select>

                  <label style="margin-top: 10px">Nota Fiscal</label>
                <input tabindex="-1" type="text" id="nota" name="nota" class="form-control" value="<?php echo htmlspecialchars( $product["nota"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <input type="hidden" name="cod" value="<?php echo htmlspecialchars( $product["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                 <label style="margin-top: 10px">Pagamento</label>

                 <div id="paydiv">

                  <select tabindex="-1" id="pago" name="pago" class="form-control"  style=" transition: width 1s;">
                    <option value="<?php echo htmlspecialchars( $product["pago"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $product["pago"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <option value="(1)Pendente">Pendente</option>
                    <option value="(2)Entrada">Entrada</option>
                    <option value="(3)Pago">Pago</option>
                  </select>

                  <input type="hidden" id="entrada" name="desproduct" class="form-control" style="width: 100px" placeholder="Entrada R$" value='<?php echo formatPrice($product["desproduct"]); ?>'>

                 </div>
              </div>
            </div>

            <br><br>
              <?php $counter1=-1;  if( isset($resultsArq) && ( is_array($resultsArq) || $resultsArq instanceof Traversable ) && sizeof($resultsArq) ) foreach( $resultsArq as $key1 => $value1 ){ $counter1++; ?>

              
              <div style="margin-top: 5px" class="row">
                <div class="col-md-5 col-sm-5">
                  <input readonly="" value='<?php echo getNomeDir($value1["dir"]); ?>' class="form-control" style="background-color: #FFF">
                </div>
                <a href="/<?php echo htmlspecialchars( $value1["dir"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="fa fa-download" target="_blank" style="margin-top: 10px; margin-left: 10px"></a>
                  <a href="/index.php/orc/product/deletearq/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="fa fa-trash" style="color: red; margin-top: 10px; margin-left: 10px"></a>
              </div>
              <?php } ?>

            <br><br>


            <div class="row container">
              <div class="col-6 col-md-2" style="margin-left: -10px;"><label class="form-control">#</label></div>
              <div class="col-6 col-md-4" style="margin-left: -50px;"><label class="form-control">Ítem</label></div>
              <div class="col-6 col-md-2" style="margin-left: -50px;"><label class="form-control">Qtd.</label></div>
              <div class="col-6 col-md-2" style="margin-left: -50px;"><label class="form-control">Valor Un. <span data-tooltip="Use ' . ' para separar as casas decimais."><b class="obs">!</b></span></label></div>
              <div class="col-6 col-md-2" style="margin-left: -30px;"><label id="lbvalortotal" class="form-control">Total R$ <?php echo formatPrice($valortotal); ?></label></div>
            </div> 

          <?php $counter1=-1;  if( isset($results) && ( is_array($results) || $results instanceof Traversable ) && sizeof($results) ) foreach( $results as $key1 => $value1 ){ $counter1++; ?>

            <div class="row container">

              <input type="hidden" name="id<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >

              <div class="col-6 col-md-2" style="margin-left: -10px;">
                <input name="iditem<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["iditem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="readonly">
              </div>

              <div class="col-6 col-md-4" style="margin-left: -50px;">
                <input name="item<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["item"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
              </div>

              <div class="col-6 col-md-2" style="margin-left: -50px;">
                <input name="qtd<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
              </div>

              <div class="col-6 col-md-2" style="margin-left: -50px;">
                <input name="valor<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" step='0.01'>
              </div>

              <div class="col-6 col-md-2" style="margin-left: -30px;">
                <input name="valortotalitem" id="total" value='<?php echo formatPrice($value1["qtd"] * $value1["valor"]); ?>' step='0.01' class="form-control" readonly="readonly">
              </div>

              <a href="/index.php/orc/product/deleteitem/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="fa fa-trash" style="color: red"></a>
              
            </div>
          <?php } ?>


          <a href="/index.php/orc/product/item/addrow/<?php echo htmlspecialchars( $product["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="fa fa-bars" style="margin-left: 7px"></a> <span data-tooltip="Antes de adicionar uma nova linha, salve as alterações feitas."><b class="obs">!</b></span><br><br><br>

            <div>
            <label for="desction">Observações</label><br>
            <textarea id="desction" name="desction" cols="125" rows="4" wrap="hard"><?php echo htmlspecialchars( $product["desction"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
            </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
           <a href="/index.php/orc/products/dtregister" class="fa fa-arrow-left fa-lg" style="margin-right: 10px"></a>
            <button type="submit" class="btn btn-success">Salvar</button>

            <span data-tooltip="Salve o arquivo na pasta 'arquivos' para que possa abrí-lo pelo campo 'Arquivos'.">
              <b class="obs">
                <a href="/index.php/orc/product/pdf/<?php echo htmlspecialchars( $product["cod"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn btn-primary">Gerar PDF</a>
              </b>
            </span>
           

          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- <script>
document.querySelector('#file').addEventListener('change', function(){
  
  var file = new FileReader();

  file.onload = function() {
    
    document.querySelector('#image-preview').src = file.result;

  }

  file.readAsDataURL(this.files[0]);

document.getElementById('total').addEventListener('change', function(){
   this.value = parseFloat(this.value).toFixed(2);
});

});
</script> -->