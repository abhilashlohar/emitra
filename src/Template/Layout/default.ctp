<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Grievance</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php echo $this->Html->css('/bootstrap/css/bootstrap.min.css'); ?>
  <?php echo $this->Html->css('/plugins/select2/select2.min.css'); ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <?php echo $this->Html->css('/dist/css/AdminLTE.min.css'); ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <?php echo $this->Html->css('/dist/css/skins/_all-skins.min.css'); ?>
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header" style="padding: 10px;font-size: 20px;font-weight: bold;">
              <span >GRIEVANCE</span>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php if(!empty($user_id)){ ?>
                <li><?php echo $this->Html->link('<i class="fa fa-fw fa-lock"></i> Logout','/Users/logout',array('escape'=>false)); ?></li>
            <?php }else{ ?>
                <li><?php echo $this->Html->link('<i class="fa fa-fw fa-key"></i> Login','/Users/Login',array('escape'=>false)); ?></li>
            <?php } ?>
            
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <?= $this->Flash->render() ?>
      </section>

      <!-- Main content -->
      <section class="content">
        <?= $this->fetch('content') ?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2017 - Grievance. All Rights Reserved </strong> 
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php echo $this->Html->script('/plugins/jQuery/jquery-2.2.3.min.js'); ?>
<!-- Bootstrap 3.3.6 -->
<?php echo $this->Html->script('/bootstrap/js/bootstrap.min.js'); ?>
<!-- SlimScroll -->
<?php echo $this->Html->script('/plugins/slimScroll/jquery.slimscroll.min.js'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('/plugins/fastclick/fastclick.js'); ?>
<!-- AdminLTE App -->
<?php echo $this->Html->script('/dist/js/app.min.js'); ?>
<!-- AdminLTE for demo purposes -->
<?php echo $this->Html->script('/dist/js/demo.js'); ?>
<?php echo $this->Html->script('/plugins/select2/select2.full.min.js'); ?>
<script>
  $(function () {
    $(".select2").select2();
  });
</script>
</body>
</html>
