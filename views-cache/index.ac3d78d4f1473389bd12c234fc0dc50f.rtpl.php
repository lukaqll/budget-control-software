<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Principal
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <div class="col-md-3 col-sm-6">
      <div class="">
          <h2 class="footer-wid-title">Categorias</h2>
          <ul style="font-family: Arial; color: green ">
              <?php require $this->checkTemplate("categories-menu");?>            
              
          </ul>                        
      </div>
  </div>

  <!-- Main content -->
  <section class="content">


<section class="content">


            <div class="button">
              <a href="/index.php/orc/products/create/" class="btn btn-success">Novo Orçamento</a>
            </div>

    <!-- Your Page Content Here -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->