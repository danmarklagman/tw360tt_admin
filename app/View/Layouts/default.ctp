<!DOCTYPE html>
<html lang="en">
<head>
    <?=$this->Html->charset()?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Dan Mark Lagman">
    <title><?php echo $this->fetch('title'); ?> - Time Tracker Admin</title>
    <?php
        echo $this->Html->css(array(
            '/css/bootstrap.min.css',
            '/css/plugins/dataTables.bootstrap.css',
            '/css/plugins/metisMenu/metisMenu.min.css',
            '/css/plugins/timeline.css',
            '/css/sb-admin-2.css',
            '/css/plugins/morris.css',
            '/font-awesome-4.1.0/css/font-awesome.min.css'
    )); ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $this->fetch('headerScripts'); ?>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    echo $this->Html->link(
                        'Technowise 360 Time Tracker Admin v1.0', 
                        array(
                            'controller' => 'home', 
                            'action' => 'index'), 
                        array(
                            'class' => 'navbar-brand'
                )); ?>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li>
                    You are logged in as Admin
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-gear fa-fw"></i> Change Password', 
                                    array(
                                        'controller' => 'user', 
                                        'action' => 'changepassword',
                                        //'id' => AuthComponent::user('Id'),
                                        ), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-sign-out fa-fw"></i> Logout', 
                                    array(
                                        'controller' => 'user', 
                                        'action' => 'logout'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-dashboard fa-fw"></i> Dashboard', 
                                    array(
                                        'controller' => 'home', 
                                        'action' => 'index'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-dashboard fa-fw"></i> Employees', 
                                    array(
                                        'controller' => 'employee', 
                                        'action' => 'index'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-dashboard fa-fw"></i> Positions', 
                                    array(
                                        'controller' => 'position', 
                                        'action' => 'index'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-dashboard fa-fw"></i> Departments', 
                                    array(
                                        'controller' => 'department', 
                                        'action' => 'index'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-dashboard fa-fw"></i> Offices', 
                                    array(
                                        'controller' => 'offices', 
                                        'action' => 'index'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-dashboard fa-fw"></i> Log Types', 
                                    array(
                                        'controller' => 'logtype', 
                                        'action' => 'index'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-dashboard fa-fw"></i> Time Logs', 
                                    array(
                                        'controller' => 'timelog', 
                                        'action' => 'index'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-dashboard fa-fw"></i> Users', 
                                    array(
                                        'controller' => 'user', 
                                        'action' => 'index'), 
                                    array(
                                        'escape' => FALSE
                            )); ?>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <ol class="breadcrumb" id="breadcrumb">
                        <?php
                            echo $this->Html->getCrumbs(' > ', 'Technowise 360 Admin', '/admin', false);
                        ?>
                    </ol>
                </div>
            </div>
            <?php echo $this->fetch('content'); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php
        echo $this->Html->script(array(
            '/js/jquery-1.11.0.js',
            '/js/bootstrap.min.js',
            '/js/plugins/dataTables/jquery.dataTables.js',
            '/js/plugins/dataTables/dataTables.bootstrap.js',
            '/js/plugins/metisMenu/metisMenu.min.js',
            '/js/plugins/morris/raphael.min.js',
            '/js/plugins/morris/morris.min.js',
            '/js/plugins/morris/morris-data.js',
            '/js/sb-admin-2.js',
            '/js/jquery.form.js',
            '/js/scripts.js'
    )); ?>
    <?php echo $this->fetch('footerScripts'); ?>
</body>
</html>