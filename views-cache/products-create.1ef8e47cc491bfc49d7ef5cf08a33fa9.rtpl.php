<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   Novo Orçamento <?php echo htmlspecialchars( $codigo, ENT_COMPAT, 'UTF-8', FALSE ); ?>

  </h1>
  <ol class="breadcrumb">
    <li><a href="/index.php/orc"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/index.php/orc/categories">Categorias</a></li>
    <li class="active"><a href="/index.php/orc/categories/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/index.php/orc/products/create/" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">

          	<div class="row">
          		<div class="col-md-5 col-sm-5">
          			<!-- <label style="margin-top: 10px">Responsável</label>
              		<input tabindex="0" type="text" id="desproduct" name="desproduct" class="form-control"> -->

              		<label style="margin-top: 10px">Cliente</label>
              		<input tabindex="0" type="text" id="vlprice" name="vlprice" class="form-control">

              		<label style="margin-top: 10px">Email</label>
              		<input tabindex="0" type="email" id="vlwidth" name="vlwidth" class="form-control">

              		<label style="margin-top: 10px">Telefone</label>
              		<input tabindex="0" type="text" id="vlheight" name="vlheight" class="form-control">
          		</div>


          		<div class="col-md-3 col-sm-3">
          			<label style="margin-top: 10px">Início</label>
            		<input tabindex="-1" type="date" id="vllength" name="vllength"  placeholder="__/__/__" class="form-control">

            		<label style="margin-top: 10px">Prioridade</label>
            		<select tabindex="-1" id="prioridade" id="prioridade" name="prioridade" class="form-control">
	                  <option value="(3)Baixa">(3)Baixa</option>
	                  <option value="(2)Média">(2)Média</option>
	                  <option value="(1)Alta">(1)Alta</option>
	                </select>

	                <label style="margin-top: 10px">Pedido</label>
	                <input tabindex="-1" type="text" id="desurl" name="desurl" class="form-control">

	                <label style="margin-top: 10px">Valor Total</label> <span data-tooltip="Use ' . ' para separar as casas decimais."><b class="obs">!</b></span>
	            	<input type="num" name="price" class="form-control" name="price" step='0.01' placeholder="R$">
          		</div>


          		<div class="col-md-3 col-sm-3">
          			<label style="margin-top: 10px">Previsão</label>
              		<input tabindex="-1" type="text" id="vlweight" name="vlweight" class="form-control">

              		<label style="margin-top: 10px">Status</label>
              		<select tabindex="-1" id="stats" id="stats" name="stats" class="form-control">
	                  <option value="(5)Não Iniciado">(5)Não Iniciado</option>
	                  <option value="(4)Aguardando Aprovação">(4)Aguardando Aprovação</option>
	                  <option value="(3)Em Andamento">(3)Em Andamento</option>
	                  <option value="(2)Concluído">(2)Concluído</option>
	                  <option value="(1)Entregue">(1)Entregue</option>
	                </select>

	                <label style="margin-top: 10px">Nota Fiscal</label>
	                <input tabindex="-1" type="text" id="nota" name="nota" class="form-control">
	                <input type="hidden" name="cod" value="<?php echo htmlspecialchars( $codigo, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                  <label style="margin-top: 10px">Pagamento</label>

                <div id="paydiv" style="">

	                <select tabindex="-1" id="pago" id="pago" name="pago" class="form-control">
	                  <option value="(1)Pendente">Pendente</option>
                    <option value="(2)Entrada">Entrada</option>
	                  <option value="(3)Pago">Pago</option>
	                </select> 

                  <input type="hidden" id="entrada" name="desproduct" class="form-control" placeholder="Entrada R$" step="0.01" value="0.00">

                </div>

	            </div>
          	</div><br><br>

            <input type="file" name="dir"><br>
          	

          </div>

            <div class="row container" >
              <div class="col-6 col-md-2" style="margin-left: -10px;"><label class="form-control">#</label></div>
              <div class="col-6 col-md-4" style="margin-left: -50px;"><label class="form-control">Ítem</label></div>
              <div class="col-6 col-md-2" style="margin-left: -50px;"><label class="form-control">Qtd.</label></div>
              <div class="col-6 col-md-2" style="margin-left: -50px;"><label class="form-control">Valor Un. <span data-tooltip="Use ' . ' para separar as casas decimais."><b class="obs">!</b></span></label></div>
              <div class="col-6 col-md-2" style="margin-left: -30px;"><label class="form-control">Total R$<?php echo htmlspecialchars( $valortotal, ENT_COMPAT, 'UTF-8', FALSE ); ?></label></div>
            </div>

            <div class="row container">

              <div class="col-6 col-md-2" style="margin-left: -10px;">
                <input name="iditem" value="1" class="form-control" readonly="readonly">
              </div>
              <div class="col-6 col-md-4" style="margin-left: -50px;">
                <input name="item" id="item" class="form-control" placeholder="Digite aqui">
              </div>
              <div class="col-6 col-md-2" style="margin-left: -50px;">
                <input type="num" name="qtd" id="qtd" class="form-control">
              </div>
              <div class="col-6 col-md-2" style="margin-left: -50px;">
                <input type="num" name="valor" id="valor" step='0.01' placeholder="R$" class="form-control">
              </div>
              <div class="col-6 col-md-2" style="margin-left: -30px;">
                <input name="valortotalitem" id="total" value="<?php echo htmlspecialchars( $value["qtd"] * $value["valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" step='0.01' type="num" class="form-control" readonly="readonly">
              </div>
              <button style="width: 0px; color: #3C8DBC; position: relative; left: -12px; background-color: #FFF" class="btn fa fa-bars"></button>
            </div><br>

            <div>
            <label for="desction">Observações</label><br>
            <textarea id="desction" name="desction" cols="125" rows="4" wrap="hard"></textarea>
            </div>

            </div>
          <!-- /.box-body -->
            <div class="box-footer">
           <a href="/index.php/orc/products/dtregister" class="fa fa-arrow-left fa-lg" style="margin-right: 10px"></a>
              
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
