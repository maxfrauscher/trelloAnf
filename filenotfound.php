<!DOCTYPE html>
<html lang="de">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>e-dynamics Anforderungsprofil</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href=""><img width="120px" src="http://www.e-dynamics.de/wp-content/themes/e-dynamics/images/logo.png"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#page-top">Auswahl</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section id="allgemein" class="auswahl-section ">
        <div class="container">
            <div class="row">
                <!-- Form -->
                <form>
                    <div class="col-md-12">
                         <h1>Willkommen beim e-dynamics Anforderungswizard</h1>
                          <legend>Wählen Sie das gewünschte Konto aus:</Legend>
                          <div class="form-group">
                              <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active konto sales">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Sales
                                </label>
                                <label class="btn btn-primary konto analytics">
                                    <input type="radio" autocomplete="off"> Analytics
                                </label>
                              </div>
                          </div>
                          <div id="pageNavigation">
                              <a class="btn btn-default btn-lg page-scroll" id="kontoAuswahl"href="#portal">Zum Anforderungsprofil <span class="glyphicon glyphicon-arrow-right"></span></a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Mail Script -->
    <script src="js/smtp.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    <script src="js/buttons.js"></script>

</body>

</html>
