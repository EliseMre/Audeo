<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Starter Template for Bootstrap 3.3.5</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Post Prépa</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">A propos</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            <header class="jumbotron main-jumbo">
                <h1>Bienvenue sur Post-Prépa !</h1>
                <p>Vous êtes en deuxième année de prépa et il est temps de se poser les bonnes questions. Post-Prépa vous aide a trouver l'école la plus adaptée a votre niveau !</p>

                <p><a class="btn btn-primary btn-large" href="#previsions">Aller aux previsions</a></p>
            </header>
            <!--<blockquote>
    <p>“Sans ambition il n’y a pas de talent.”</p>
    <p><small>Nina Berberova</small></p>
</blockquote>-->
            <div class="content" id="previsions">
                <div class="page-header">
                    <h1>Mes prévisions <small>soyez réaliste..</small></h1>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Panel</div>
                            <div class="panel-body">
                                <p>Entrez les notes que vous prevoyez d'avoir a vos concours. Aucune matière n'est obligatoire et les coeafficient sont pris en compte automatiquement et en fonction des écoles.</p>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Matière</th>
                                        <th width="140px">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$raw = file_get_contents("data/data.json");
$data = json_decode($raw);
foreach($data->mat as $mat)
{ ?>
                                        <tr>
                                            <td>
                                                <?=ucwords($mat->name)?>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="<?=$mat->id?>">
                                                        <span class="glyphicon glyphicon-minus"></span>
                                                    </button>
                                                    </span>
                                                    <input type="number" name="<?=$mat->id?>" id="<?=$mat->id?>" class="form-control input-number" value="10" min="0" max="20">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="<?=$mat->id?>">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                </tbody>
                            </table>
                            <div class="panel-footer">
                                <a class="btn btn-primary btn-large aright" id="cal">Calculer</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-lg-offset-2 col-md-offset-0">
                        <div class="panel panel-default">
                            <div class="panel-heading">Résults</div>
                            <table class="table">
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/style.js"></script>
        <script src="js/app.js"></script>
        <style>
            .ui-loading .ui-loader {
                display: block;
            }

            .ui-loader {
                display: none;
                position: absolute;
                opacity: .85;
                z-index: 100;
                left: 50%;
                width: 200px;
                margin-left: -130px;
                margin-top: -35px;
                padding: 10px 30px;
            }

            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        </style>
    </body>

</html>
