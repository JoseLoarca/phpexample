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
    <?php
    if(isset($_POST['id']) && !empty($_POST['id'])){

        $id = $_POST['id'];

        $conn = mysqli_connect($host, $user, $password, $db)
        or die("No se ha podido conectar al servidor..");

        $sql_query = "SELECT * FROM razasperros WHERE id = '$id'";

        $sql_array = mysqli_query($conn, $sql_query);
    }
    ?>
    <div class="container">
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Editar Elemento<hr></h3>
                    <p>
                    <form method="post" action="editelement.php">
                        <?php
                        while ($array = mysqli_fetch_assoc($sql_array)){
                            $array_result[] = $array;
                        }
                        foreach ($array_result as $item) {
                            echo ' <input value='. $item['id'].' name="id" type="hidden">
                                   <div class="form-group">
                                    <label>Nombre de la Raza</label>
                                    <input type="text" class="form-control" name="nombreRaza" value="'.$item['nombreRaza'].'" required>
                                   </div>
                                   <div class="form-group">
                                     <label>Breve descripción</label>
                                     <textarea class="form-control" rows="5" name="descripcion" required style="resize: none">'.$item['descripcion'].'</textarea>
                                   </div>';
                        }
                        ?>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                    </p>
                </div>
            </div>
        </div>
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