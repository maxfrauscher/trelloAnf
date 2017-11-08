<?php ?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Anforderungsprofil - Analytics</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/scrolling-nav.css" rel="stylesheet">
    <link href="../css/analytics.css" rel="stylesheet">
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
                <a class="navbar-brand page-scroll" href="../"><img width="120px" src="http://www.e-dynamics.de/wp-content/themes/e-dynamics/images/logo.png"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#page-top">Allgemeine Infos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portal">Schritt 1</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#seitenbeschreibung">Schritt 2</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#googleAnalytics">Schritt 3</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#sendData">Fertig <span class="glyphicon">&#xe013;</span></a>
                    </li>
                    <li id="kontoSwitcher">
                        <button id="analyticsButton" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Analytics <span class="glyphicon glyphicon-menu-down"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menuKonto" aria-labelledby="btnGroupDrop1">
                            <a id="salesButton" href="../anforderung/sales.php" class="btn btn-secondary dropdown-toggle"  aria-haspopup="true" aria-expanded="false">
                              Sales
                          </a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section id="allgemein" class="anforderungs-section section ">
        <div class="container">
            <div class="row">
                <!-- Form -->
                <form>
                    <div class="col-md-8">
                         <h1>Anforderungsprofil - Analytics </h1>
                          <h2>Allgemeine Infos</h2>
                          <div class="form-group">
                            <label for="trelloKartenName">Name der Trello Karte<span style="color:red;"> *</span></label>
                            <div class="input-group">
                                <span class="input-group-addon" id="trelloKartenPrefix">A-ANALYTICS | </span>
                                <input type="text" class="form-control required-field " id="trelloKartenName" placeholder="Name der Trello Karte">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="anfordererName">Ansprechpartner<span style="color:red;"> *</span></label>
                            <input type="text" class="form-control required-field" id="anfordererName" placeholder="Name des Ansprechpartner">
                          </div>
                          <div class="form-group">
                            <label for="dienstleisterName">Dienstleister</label>
                            <input type="text" class="form-control" id="dienstleisterName" placeholder="Name des Dienstleisters">
                          </div>
                          <div class="form-group">
                            <label for="anforderungsTyp">Anforderungstyp<span style="color:red;"> *</span></label>
                            <select class="form-control required-field" id="anforderungsTyp">
                              <option value="" disabled selected>Wählen Sie eine Option.</option>
                              <option>Analyse</option>
                              <option>Neuanforderung</option>
                              <option>Erweiterung</option>
                              <option>Änderung</option>
                              <option>Testing</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="allgemeineBeschreibung">Allgemeine Beschreibung<span style="color:red;"> *</span></label>
                            <textarea class="form-control required-field" id="allgemeineBeschreibung" rows="3"></textarea>
                            <small id="fileHelp" class="form-text text-muted">Beschreiben Sie kurz das Ziel des Auftrages und eventuelle Zusatzinformationen.</small>
                          </div>
                          <a class="btn btn-default page-scroll" href="#portal">Weiter <span class="glyphicon glyphicon-arrow-down"></span></a>
                      </div>
                  </form>
              </div>
          </div>
    </section>

    <section id="portal" class="portal-section section">
        <div class="container">
            <div class="row">
    <!-- Form -->
      <h2>Anforderungsprofil Schritt 1 - Portal und Bereiche</h2>

        <div class="col-md-6">
            <form>
              <fieldset class="form-group containerRadio" id="portalAuswahl">
                <legend><strong>Wählen Sie ein Portal</strong></legend>
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input type="radio" class="form-check-input " name="optionsRadios" id="optionsRadios1" value="o2" checked>
                    o2
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="Blau">
                    Blau
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="Base">
                    Base
                  </label>
                </div>
              </fieldset>
            </form>
        </div>
        <div id="containerAuswahl">
          <div id="o2Container" class="col-md-6 containerAuswahl selected">
             <legend><strong>Welche Bereiche im O2 Portal?</strong></legend>
             <div class="btn-group" data-toggle="buttons">
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="dsl.o2online.de (GTM-M6ZSB4)">
                dsl.o2online.de
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2-Germany (GTM-T8SGC3)">
                o2-Germany
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/ecare (GTM-W4RXBN)">
                o2online.de/ecare
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/esnacks (GTM-M3ZFJX)">
                o2online.de/esnacks
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/mehr-o2/ (GTM-MBVSB33)">
                o2online.de/mehr-o2/
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/ecare-prepaid/ (GTM-M29CSQ)">
                o2online.de/ecare-prepaid/
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/blog (GTM-T7N6JX)">
                o2online.de/blog
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/sky-ticket/ (GTM-MG5M84L)">
                 o2online.de/sky-ticket/
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/willkommen (GTM-KPSK5M)">
                 o2online.de/willkommen
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/e-shop (GTM-TX88N4)">
                 o2online.de/e-shop
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="o2online.de/econtract (GTM-WXXDNP)">
                 o2online.de/econtract
               </label>
             </div>
          </div>
          <!-- Blau Container -->
          <div id="blauContainer" class="col-md-6 containerAuswahl">
             <legend><strong>Welche Bereiche im Blau Portal?</strong></legend>
             <div class="btn-group" data-toggle="buttons">
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="blau.de/ecare (GTM-KTWBHL)">
                 blau.de/ecare
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="blau.de/econtract (GTM-MXHFX6)">
                blau.de/econtract
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="blau.de/esnacks (GTM-PR6LQ3)">
                blau.de/esnacks
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="CMS + Eshop (GTM-PHH9ZC)">
                CMS + Eshop
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="blau.de/willkommen (GTM-NG33BB)">
                blau.de/willkommen
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="blau.de/ecare-prepaid/ (GTM-M29CSQ)">
                blau.de/ecare-prepaid/
               </label>
             </div>
          </div>
          <!-- Base Container -->
          <div id="baseContainer" class="col-md-6 containerAuswahl">
             <legend><strong>Welche Bereiche im Base Portal?</strong></legend>
             <div class="btn-group" data-toggle="buttons">
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="CMS + Eshop (GTM-KDQGXR)">
                 CMS + Eshop
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="Kunden (GTM-TB8JSV)">
                Kunden
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="BLOG (GTM-5KZGWP)">
                BLOG
               </label>
             </div>
          </div>
        </div>
        </div>
        <br><br>
        <a class="btn btn-default page-scroll" href="#allgemein">Zurück <span class="glyphicon glyphicon-arrow-up"></span></a>
        /
        <a class="btn btn-default page-scroll" href="#seitenbeschreibung">Weiter <span class="glyphicon glyphicon-arrow-down"></span></a>
    </div>
    </section>

    <section id="seitenbeschreibung" class="seitenbeschreibung-section section">
        <div class="container">
            <div class="row">
        <h2>Anforderungsprofil Schritt 2 - Seitenbeschreibung</h2>
          <!-- Seitentypen -->
          <div id="seitenTyp" class="col-md-6">
             <legend><strong>Beschreibung der Seiten</strong></legend>
             <div class="btn-group" data-toggle="buttons">
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="Startseite">
                 Startseite
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="Contentseite">
                Contentseite
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="Übersichtsseite">
                Übersichtsseite
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="Detailseite">
                Detailseite
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="Warenkorbseite">
                Warenkorbseite
               </label>
               <label class="btn btn-primary">
                 <input id= "checkboxCheckout" type="checkbox" class="form-check-input" value="Checkoutseite">
                Checkoutseite
               </label>
               <label class="btn btn-primary">
                 <input type="checkbox" class="form-check-input" value="Bestellbestätigungsseite">
                Bestellbestätigungsseite
               </label>
             </div>
          </div>

          <div id="checkoutStep" class="">
              <div class="col-md-6 checkoutStep">
                <legend><strong>Welche Schritte im Checkout?</strong></legend>
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary">
                    <input type="checkbox" class="form-check-input" value="myData">
                    Personaldaten - (myData)
                  </label>
                  <label class="btn btn-primary">
                    <input type="checkbox" class="form-check-input " value="myConnection">
                   Verbindung - (myConnection nur O2 DSL-Bereich)
                  </label>
                  <label class="btn btn-primary">
                    <input type="checkbox" class="form-check-input" value="myPayment">
                   Zahlungsdaten - (myPayment)
                  </label>
                  <label class="btn btn-primary">
                    <input type="checkbox" class="form-check-input" value="summary">
                   Zusammenfassung - (summary)
                  </label>
                </div>
            </div>
        </div>
          <div class="col-md-8">
          </br></br><legend><strong>Details über die Seiten</strong></legend>
              <div class="form-group">
                <label for="spezielleSeiten">Seiten-URLs</label>
                <textarea class="form-control" id="spezielleSeiten" rows="3"></textarea>
                <small id="fileHelp" class="form-text text-muted">Listen Sie die betreffenden Seiten-URLs auf‚.</small>
              </div>
            </div>
        </div>
        <br><br>
        <a class="btn btn-default page-scroll" href="#portal">Zurück <span class="glyphicon glyphicon-arrow-up"></span></a>
        /
        <a class="btn btn-default page-scroll" href="#googleAnalytics">Weiter <span class="glyphicon glyphicon-arrow-down"></span></a>
        </div>
    </section>
    <!-- Google Analytics Daten -->
    <section id="googleAnalytics" class="ga-section section">
        <div class="container">
            <div class="row">
            <h2>Anforderungsprofil Schritt 3 - Google Analytics-Tracking</h2>
              <!-- Seitentypen -->
          <legend><strong>Google Analytics Informationen</strong></legend>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="trackingArt">Tracking-Art<span style="color:red;"> *</span></label>
                      <select class="form-control required-field" id="trackingArt">
                        <option value="" disabled selected>Wählen Sie eine Option.</option>
                        <option>Pageview</option>
                        <option>Event</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="trigger">Trigger<span style="color:red;"> *</span></label>
                      <select class="form-control required-field" id="trigger">
                        <option value="" disabled selected>Wählen Sie eine Option.</option>
                        <option>Klicks</option>
                        <option>Datalayer-Push</option>
                        <option>Seitenaufruf</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="zielBeschreibung">Zielbeschreibung<span style="color:red;"> *</span></label>
                      <textarea class="form-control required-field" id="zielBeschreibung" rows="3"></textarea>
                      <small id="fileHelp" class="form-text text-muted">Beschreiben Sie kurz Ihr vorhaben.</small>
                    </div>
                </div>
            </div>
            <br><br>
            <a class="btn btn-default page-scroll" href="#seitenbeschreibung">Zurück <span class="glyphicon glyphicon-arrow-up"></span></a>
            /
            <a class="btn btn-default page-scroll" href="#sendData">Weiter <span class="glyphicon glyphicon-arrow-down"></span></a>
        </div>
        </div>
    </section>
    <!-- Google Analytics Parameter -->
    <section id="googleAnalyticsParams" style="display:none;" class="gaParam-section section">
        <div class="container">
            <div class="row">
            <h2>Anforderungsprofil Schritt 4 - Google Analytics Parameter</h2>
              <!-- Seitentypen -->
             <legend><strong>Google Analytics - Parameter Informationen</strong></legend>
             <div class="col-md-6">
                 <div class="form-group">
                   <label for="ga-page">Page</label>
                   <input type="text" class="form-control" id="gaPage" placeholder="">
                 </div>
                 <div class="form-group">
                   <label for="ga-category">Kategory</label>
                   <input type="text" class="form-control" id="gaCategory" placeholder="">
                 </div>
                 <div class="form-group">
                   <label for="ga-action">Action</label>
                   <input type="text" class="form-control" id="gaAction" placeholder="">
                 </div>
                 <div class="form-group">
                   <label for="ga-label">Label</label>
                   <input type="text" class="form-control" id="gaLabel" placeholder="">
                 </div>
                 <div class="form-group">
                   <label for="ga-value">Value</label>
                   <input type="text" class="form-control" id="gaValue" placeholder="">
                 </div>
            </div>
            </div>
            <br><br>
            <a class="btn btn-default page-scroll" href="#googleAnalytics">Zurück <span class="glyphicon glyphicon-arrow-up"></span></a>
            /
            <a class="btn btn-default page-scroll" href="#sendData">Weiter <span class="glyphicon glyphicon-arrow-down"></span></a>
        </div>
        </div>
    </section>
    <!-- Sende Daten -->
    <section id="sendData" class="sendData-section section">
        <div class="container">
            <div class="row">
                <div class="middle">
                    <h2>Sie haben alle Informationen korrekt ausgefüllt? </h2></br>
                    <h4>Bitte überprufen Sie, ob alle Informationen richtig ausgefüllt wurden. </br>
                    Falls dies der Fall sein sollte, klicken Sie auf senden.</h4><hr>
                    <div class="col-md-4">
                        <a class="btn btn-default page-scroll" href="#googleAnalytics" style="width:100%; padding:20px; font-size: 20px;">
                        Zurück <span class="glyphicon glyphicon-arrow-up"></span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a id="trelloSend" class="btn btn-primary" style="width:100%; padding:20px; font-size: 20px;">
                        Senden  <span class="glyphicon">&#xe013;</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a id="trelloPDF" class="btn btn-warning" style="width:100%; padding:20px; font-size: 20px;">
                            Export To PDF <span class="glyphicon glyphicon-open-file"></span>
                        </a>
                    </div>
                 </div>

            </div>
            <br><br>


        </div>
        </div>
    </section>


    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Mail Script -->
    <script src="../js/smtp.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/scrolling-nav.js"></script>

    <!-- Script for Collecting and Sending Data to Trello -->
    <script src="https://api.trello.com/1/client.js?key=679be2c43cf799668f639c9ea9078e85"></script>
    <script src="../js/trello-data.js"></script>


</body>

</html>
