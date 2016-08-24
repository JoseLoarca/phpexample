<?php include ("loginuser.php");
      include ("dbconnection.php");?>
<?php if(isset($_SESSION['username'])) : ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/starter/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/starter/css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">Proyecto <b>PHP</b></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo  $_SESSION['username']?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header"><em>Opciones</em>
                        </li>
                        <li><a href="logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- Page Content -->
<div class="container">
    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h2>Proyecto <b>PHP</b></h2>
        <p>El proyecto consiste en manejar una pequeña base de datos sobre <em>razas de perros</em>, en las pestañas se podrá seleccionar la acción
            a realizar (insertar, eliminar, editar o listar).</p>
    </header>
    <hr>
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#insertar" aria-controls="home" role="tab" data-toggle="tab">Insertar</a></li>
            <li role="presentation"><a href="#eliminar" aria-controls="profile" role="tab" data-toggle="tab">Eliminar</a></li>
            <li role="presentation"><a href="#editar" aria-controls="messages" role="tab" data-toggle="tab">Editar</a></li>
            <li role="presentation"  class="active"><a href="#listar" aria-controls="settings" role="tab" data-toggle="tab">Listar</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="insertar">
                <br>
                <form method="post" action="agregarraza.php">
                    <div class="form-group">
                        <label>Nombre de la Raza</label>
                        <input type="text" class="form-control" name="nombreRaza" required>
                    </div>
                    <div class="form-group">
                        <label>Breve descripción</label>
                        <textarea class="form-control" rows="5" name="descripcion" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Agregar</button>
                </form>
            </div>
            <?php
            $conn = mysqli_connect($host, $user, $password, $db)
            or die("No se ha podido conectar al servidor..");

            if ($conn == false) {
                die("ERROR AL CONECTAR. " . mysqli_connect_error());
            }

            $sql_query = "SELECT * FROM razasperros";

            $sql_array = mysqli_query($conn, $sql_query);

            ?>
            <div role="tabpanel" class="tab-pane fade" id="eliminar">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Razas de Perros</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Raza</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($array = mysqli_fetch_assoc($sql_array)){
                                $array_result[] = $array;
                            }
                            foreach ($array_result as $item) {
                                echo '<tr>
                                         <td class="col-md-2">' . $item['nombreRaza'] . '</td>
                                         <td>' . $item['descripcion'] . '</td>
                                         <td>
                                            <form action="deletebreed.php" method="post">
                                                <input value='. $item['id'].' name="id" type="hidden">
                                                <input class="btn btn-danger" type="submit" value="Eliminar">
                                            </form>
                                         </td>
                                      </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="editar">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Razas de Perros</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Raza</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($array = mysqli_fetch_assoc($sql_array)){
                                $array_result[] = $array;
                            }
                            foreach ($array_result as $item) {
                                echo '<tr>
                                         <td class="col-md-2">' . $item['nombreRaza'] . '</td>
                                         <td>' . $item['descripcion'] . '</td>
                                         <td>
                                            <form action="details.php" method="post">
                                                <input value='. $item['id'].' name="id" type="hidden">
                                                <input class="btn btn-warning" type="submit" value="Editar">
                                            </form>
                                         </td>
                                      </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div role="tabpanel" class="tab-pane fade  in active" id="listar">
                <div class="box">
                    <br>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Éxito!</strong> El registro seleccionado ha sido modificado con éxito.
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Razas de Perros</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Raza</th>
                                <th>Descripción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($array = mysqli_fetch_assoc($sql_array)){
                                $array_result[] = $array;
                            }
                            foreach ($array_result as $item) {
                                echo '<tr>
                                         <td class="col-md-2">' . $item['nombreRaza'] . '</td>
                                         <td>' . $item['descripcion'] . '</td>
                                      </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </div>
    <hr>
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <em>José Loarca</em> 2016</p>
            </div>
        </div>
    </footer>
</div>
<!-- /.container -->
<!-- jQuery -->
<script src="assets/starter/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="assets/starter/js/bootstrap.min.js"></script>
</body>
</html>
<?php else: ?>
    <script>
        window.location.replace('http://localhost:8083/PHPLoginExample/unauthorized.php');
    </script>";
<?php endif; ?>