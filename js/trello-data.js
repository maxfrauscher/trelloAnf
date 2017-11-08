
$(document).ready(function() {

    authTrello();
    $( "#trelloSend" ).click(function() {
        console.log("log");
        if(validate() === false) {
            alert("Bitte füllen Sie alle Pflichtfelder aus!");
        } else {
            if(window.location.pathname.indexOf("analytics") > -1) {
                doTrelloAnalytics();
            } else {
                doTrelloSales();
            }
        }
    });

    $( "#trelloPDF" ).click(function() {
        console.log("log");
        if(validate() === false) {
            alert("Bitte füllen Sie alle Pflichtfelder aus!");
        } else {
            if(window.location.pathname.indexOf("analytics") > -1) {
                createPDFAnalytics();
            } else {
                console.log("log");
                createPDFSales();
            }
        }
    });
});

function createPDFSales() {
    //Allgemeine Infos
    var trelloKartenPrefix = $("#trelloKartenPrefix").html();
    var trelloKartenName = trelloKartenPrefix + $("#trelloKartenName").val();
    var anfordererName = $("#anfordererName").val();
    var dienstleisterName = $("#dienstleisterName").val();
    var anforderungsTyp = $("#anforderungsTyp").val();
    var allgemeineBeschreibung = $("#allgemeineBeschreibung").val();

    //Portal & Container
    var portal = $("#portalAuswahl").find("input:checked").val();
    var containerAuswahl = $("#containerAuswahl").find(".selected").find("input:checked");

    //Seitenbeschreibung
    var seitenTyp = $("#seitenTyp").find("input:checked");
    var checkoutStep = $("#checkoutStep").find(".selected").find("input:checked");
    var spezielleSeiten = $("#spezielleSeiten").val();

    //script
    var $scriptFields = $("#javascriptAddField").find(".scriptField");

    //Parameter
    var $rows = $("#paramTable").find(".paramTableRow");

    //Trigger
    var welcheBedingungen = $("#welcheBedingungen").val();
    var welcheBesonderheiten = $("#welcheBesonderheiten").val();

    var form ='<form target="_blank" id="pdfForm" action="../pdfFileSales.php" method="POST">' +
            //Allgemeine Infos
            '<input type="hidden" name="trelloKartenName" value="' + trelloKartenName + '">' +
            '<input type="hidden" name="anfordererName" value="' + anfordererName + '">' +
            '<input type="hidden" name="dienstleisterName" value="' + dienstleisterName + '">' +
            '<input type="hidden" name="anforderungsTyp" value="' + anforderungsTyp + '">' +
            '<input type="hidden" name="allgemeineBeschreibung" value="' + allgemeineBeschreibung + '">' +
            '<input type="hidden" name="portal" value="' + portal + '">';
            for(var i = 0; i<containerAuswahl.length; i++) {
                var container = containerAuswahl[i].getAttribute("value");
                form+= '<input type="hidden" name="container[' + i + ']" value="' + container + '">';
            }
            for(var i = 0; i<seitenTyp.length; i++) {
                var seite = seitenTyp[i].getAttribute("value");
                form+= '<input type="hidden" name="seite[' + i + ']" value="' + seite + '">';
            }
            //Seitenbeschreibung - Checkout
            for(var i = 0; i<checkoutStep.length; i++) {
                var checkout = checkoutStep[i].getAttribute("value");
                form+= '<input type="hidden" name="checkout[' + i + ']" value="' + checkout + '">';
            }

             var i = 0;
             $scriptFields.each(function() {
               var bereich = $(this).find(".javascriptField").val();
               var script = $(this).find(".scriptText").val();
               form += '<input type="hidden" name="scriptFields[' + i++ +']" value="' + bereich + "|" + script + '">' ;
             });

             i = 0;
             $rows.each(function() {
               var name = $(this).find(".paramName").val();
               var descr = $(this).find(".paramDesc").val();
               var type = $(this).find(".paramType").val();
               var value = $(this).find(".paramValue").val();
               var splitter = $(this).find(".paramSplitter").val();
               form += '<input type="hidden" name="variablen[' + i++ +']" value="' + name + "|" + descr + "|" + type + "|" + value + "|" + splitter + '">' ;
             });
             form +=
               '<input type="hidden" name="spezielleSeiten" value="' + spezielleSeiten + '">'+
              '<input type="hidden" name="welcheBedingungen" value="' + welcheBedingungen + '">' +
              '<input type="hidden" name="welcheBesonderheiten" value="' + welcheBesonderheiten + '">';
    form += '</form>';
    $('#pdfForm').remove();
    $(document.body).append(form);
    $('#pdfForm').submit();
}

function createPDFAnalytics() {
    //Allgemeine Infos
    var trelloKartenPrefix = $("#trelloKartenPrefix").html();
    var trelloKartenName = trelloKartenPrefix + $("#trelloKartenName").val();
    var anfordererName = $("#anfordererName").val();
    var dienstleisterName = $("#dienstleisterName").val();
    var anforderungsTyp = $("#anforderungsTyp").val();
    var allgemeineBeschreibung = $("#allgemeineBeschreibung").val();

    //Portal & Container
    var portal = $("#portalAuswahl").find("input:checked").val();
    var containerAuswahl = $("#containerAuswahl").find(".selected").find("input:checked");

    //Seitenbeschreibung
    var seitenTyp = $("#seitenTyp").find("input:checked");
    var checkoutStep = $("#checkoutStep").find(".selected").find("input:checked");
    var spezielleSeiten = $("#spezielleSeiten").val();

    //Google Analytics Informationen
    var trackingArt = $("#trackingArt").val();
    var trigger =  $("#trigger").val();
    var zielBeschreibung = $("#zielBeschreibung").val();

    var form ='<form target="_blank" id="pdfForm" action="../pdfFile.php" method="POST">' +
            //Allgemeine Infos
            '<input type="hidden" name="trelloKartenName" value="' + trelloKartenName + '">' +
            '<input type="hidden" name="anfordererName" value="' + anfordererName + '">' +
            '<input type="hidden" name="dienstleisterName" value="' + dienstleisterName + '">' +
            '<input type="hidden" name="anforderungsTyp" value="' + anforderungsTyp + '">' +
            '<input type="hidden" name="allgemeineBeschreibung" value="' + allgemeineBeschreibung + '">' +
            '<input type="hidden" name="portal" value="' + portal + '">';
            for(var i = 0; i<containerAuswahl.length; i++) {
                var container = containerAuswahl[i].getAttribute("value");
                form+= ">" + '<input type="hidden" name="container[' + i + ']" value="' + container + '">';
            }
            for(var i = 0; i<seitenTyp.length; i++) {
                var seite = seitenTyp[i].getAttribute("value");
                form+= '<input type="hidden" name="seite[' + i + ']" value="' + seite + '">';
            }
            //Seitenbeschreibung - Checkout
            for(var i = 0; i<checkoutStep.length; i++) {
                var checkout = checkoutStep[i].getAttribute("value");
                form+= '<input type="hidden" name="checkout[' + i + ']" value="' + checkout + '">';
            }
            form +=
                 // Seitenbeschreibung - Spezielle Seiten
             '<input type="hidden" name="spezielleSeiten" value="' + spezielleSeiten + '">'+
             '<input type="hidden" name="trackingArt" value="' + trackingArt + '">'+
             '<input type="hidden" name="trigger" value="' + trigger + '">'+
             '<input type="hidden" name="zielBeschreibung" value="' + zielBeschreibung + '">';
    form += '</form>';

    $('#pdfForm').remove();
    $(document.body).append(form);
    $('#pdfForm').submit();
}



function doTrelloAnalytics() {

    //Allgemeine Infos
    var trelloKartenPrefix = $("#trelloKartenPrefix").html();
    var trelloKartenName = trelloKartenPrefix + $("#trelloKartenName").val();
    var anfordererName = $("#anfordererName").val();
    var dienstleisterName = $("#dienstleisterName").val();
    var anforderungsTyp = $("#anforderungsTyp").val();
    var allgemeineBeschreibung = $("#allgemeineBeschreibung").val();

    //Portal & Container
    var portal = $("#portalAuswahl").find("input:checked").val();
    var containerAuswahl = $("#containerAuswahl").find(".selected").find("input:checked");

    //Seitenbeschreibung
    var seitenTyp = $("#seitenTyp").find("input:checked");
    var checkoutStep = $("#checkoutStep").find(".selected").find("input:checked");
    var spezielleSeiten = $("#spezielleSeiten").val();

    //Google Analytics Informationen
    var trackingArt = $("#trackingArt").val();
    var trigger =  $("#trigger").val();
    var zielBeschreibung = $("#zielBeschreibung").val();

    /* Parameter Informationen - Deaktiviert
    var gaPage = $("#gaPage").val();
    var gaCategory = $("#gaCategory").val();
    var gaAction = $("#gaAction").val();
    var gaLabel = $("#gaLabel").val();
    var gaValue = $("#gaValue").val();
    */

    //List Id - Analytics - Template
    var myList = "5821a8e2af4af17a00c3a622";

    var desc =
            "**Aufwand Ist** (trägt e-dynamics ein): *00:00*" + "\n" +
            "**Aufwand Soll** (trägt e-dynamics ein): *00:00*" + "\n" +
            "\n" +
            //Allgemeine Infos
            "#Allgemeine Infos"                 + "\n" +
            "**Name der Trellokarte**:"         + "\n" +
            ">" + trelloKartenName              + "\n" + "\n" +
            "**Ansprechpartner**: "             + "\n" +
            ">" +anfordererName                 + "\n" + "\n" +
            "**Dienstleister**: "               + "\n" +
            ">" +dienstleisterName              + "\n" + "\n" +
            "**Anforderungstyp**:"              + "\n" +
            ">" + anforderungsTyp               + "\n" + "\n" +
            "**Allgemeine Beschreibung**:"      + "\n" +
            ">" + allgemeineBeschreibung        + "\n" + "\n" +
            //Portal & Container
            "#Portal & Bereiche"                + "\n" +
            "**Portal**:"                       + "\n" +
            ">" + portal                        + "\n" + "\n" +
            "**Bereiche**:"                     + "\n";
            for(var i = 0; i<containerAuswahl.length; i++) {
                var container = containerAuswahl[i].getAttribute("value");
                desc+= ">" + container          + "\n";
            }
       desc += "\n" +
            //Seitenbeschreibung
            "#Seitenbeschreibung"               + "\n" +
            "**Seiten-URLs**:"                    + "\n";
           for(var i = 0; i<seitenTyp.length; i++) {
               var seite = seitenTyp[i].getAttribute("value");
               desc+= ">" + seite               + "\n";
           }
       desc += "\n";
                //Seitenbeschreibung - Checkout
           for(var i = 0; i<checkoutStep.length; i++) {
               if(i === 0) desc += "**Checkoutstep**:" + "\n";
               var checkout = checkoutStep[i].getAttribute("value");
               desc+= ">" + checkout            + "\n";
           }

       desc += "\n" +
            // Seitenbeschreibung - Spezielle Seiten
            "**Spezielle Seiten**:"             + "\n" +
            ">" +spezielleSeiten                + "\n" + "\n" +
            "#Google Analytics Informationen"   + "\n" +
            "**Tracking-Art**:"                 + "\n" +
            ">" + trackingArt                   + "\n" + "\n" +
            "**Trigger**:"                      + "\n" +
            ">" + trigger                       + "\n" + "\n" +
            "**Zielbeschreibung**:"             + "\n" +
            ">" + zielBeschreibung;


    //$("#vorschau").text(desc);
    createTrelloCard(trelloKartenName,desc, myList);
}

function doTrelloSales() {

    //Allgemeine Infos
    var trelloKartenPrefix = $("#trelloKartenPrefix").html();
    var trelloKartenName = trelloKartenPrefix + $("#trelloKartenName").val();
    var anfordererName = $("#anfordererName").val();
    var dienstleisterName = $("#dienstleisterName").val();
    var anforderungsTyp = $("#anforderungsTyp").val();
    var allgemeineBeschreibung = $("#allgemeineBeschreibung").val();

    //Portal & Container
    var portal = $("#portalAuswahl").find("input:checked").val();
    var containerAuswahl = $("#containerAuswahl").find(".selected").find("input:checked");

    //Seitenbeschreibung
    var seitenTyp = $("#seitenTyp").find("input:checked");
    var checkoutStep = $("#checkoutStep").find(".selected").find("input:checked");
    var spezielleSeiten = $("#spezielleSeiten").val();

    //script
    var $scriptFields = $("#javascriptAddField").find(".scriptField");

    //Parameter
    var $rows = $("#paramTable").find(".paramTableRow");

    //Trigger
    var welcheBedingungen = $("#welcheBedingungen").val();
    var welcheBesonderheiten = $("#welcheBesonderheiten").val();

    /* Parameter Informationen - Deaktiviert
    var gaPage = $("#gaPage").val();
    var gaCategory = $("#gaCategory").val();
    var gaAction = $("#gaAction").val();
    var gaLabel = $("#gaLabel").val();
    var gaValue = $("#gaValue").val();
    */

    //List Id - Sales - Template
    var myList = "58230f96477c0fc15e0396ab";

    var desc =
            "**Aufwand Ist** (trägt e-dynamics ein): *00:00*" + "\n" +
            "**Aufwand Soll** (trägt e-dynamics ein): *00:00*" + "\n" +
            "\n" +
            //Allgemeine Infos
            "#Allgemeine Infos"                 + "\n" +
            "**Name der Trellokarte**:"         + "\n" +
            ">" + trelloKartenName              + "\n" + "\n" +
            "**Ansprechpartner**: "             + "\n" +
            ">" +anfordererName                 + "\n" + "\n" +
            "**Dienstleister**: "               + "\n" +
            ">" +dienstleisterName              + "\n" + "\n" +
            "**Anforderungstyp**:"              + "\n" +
            ">" + anforderungsTyp               + "\n" + "\n" +
            "**Allgemeine Beschreibung**:"      + "\n" +
            ">" + allgemeineBeschreibung        + "\n" + "\n" +
            //Portal & Container
            "#Portal & Bereiche"               + "\n" +
            "**Portal**:"                       + "\n" +
            ">" + portal                        + "\n" + "\n" +
            "**Bereiche**:"                    + "\n";
            for(var i = 0; i<containerAuswahl.length; i++) {
                var container = containerAuswahl[i].getAttribute("value");
                desc+= ">" + container          + "\n";
            }
       desc += "\n" +
            //Seitenbeschreibung
            "#Seitenbeschreibung"               + "\n" +
            "**Seiten-URLs**:"                    + "\n";
           for(var x = 0; x<seitenTyp.length; x++) {
               var seite = seitenTyp[x].getAttribute("value");
               desc+= ">" + seite               + "\n";
           }
       desc += "\n" +
            //Seitenbeschreibung - Checkout
            "**Checkoutstep**:"                 + "\n";
           for(var j = 0; j<checkoutStep.length; j++) {
               var checkout = checkoutStep[j].getAttribute("value");
               desc+= ">" + checkout            + "\n";
           }

       desc += "\n" +
            /* Seitenbeschreibung - Spezielle Seiten */
            "**Spezielle Seiten**:"             + "\n" +
            ">" +spezielleSeiten                + "\n" + "\n" +
            //Script
            "#Scripts"                          + "\n";
            $scriptFields.each(function() {
              var bereich = $(this).find(".javascriptField").val();
              var script = $(this).find(".scriptText").val();
              desc+= "**Script für " + bereich               + "**: \n";
              desc+= ">" + script                            + "\n";
              desc+= " \n";
            });

            //Parameter
             desc+= "#Parameter/ Variablen"             + "\n" +
            "**Variablen**:"                    + "\n";
            $rows.each(function() {
              var name = $(this).find(".paramName").val();
              var type = $(this).find(".paramType").val();
              var descr = $(this).find(".paramDesc").val();
              var value = $(this).find(".paramValue").val();
              var splitter = $(this).find(".paramSplitter").val();
              desc+= ">" + name + "|" + descr + "|" + type + "|" + value + "|" + splitter + "\n" ;
            });
        desc += "\n" +
             /* Trigger */
             "#Regeln (Trigger)"                + "\n" +
             "**Welche Bedingungen**:"          + "\n" +
             ">" + welcheBedingungen            + "\n" + "\n" +
             "**Welche Besonderheiten**:"       + "\n" +
             ">" + welcheBesonderheiten         + "\n";

    //$("#vorschau").text(desc);
    createTrelloCard(trelloKartenName,desc, myList);
}

function validate() {
    var flag = true;
    var firstError = null;
    $(".required-field").each(function() {
  	if($(this).val() === null || $(this).val() == undefined || $(this).val() == "" || $(this).length <= 0) {
      $(this).parent(".form-group").addClass("has-error");
      $(this).parent(".form-group").removeClass("has-success");
      if(firstError === null) {
         $(this).focus();
         firstError = $(this).closest(".section");
      }
      flag = false;
    } else {
   		$(this).parent(".form-group").addClass("has-success");
    	$(this).parent(".form-group").removeClass("has-error");
    }
    });

    scrollTo(firstError);
    return flag;
}

function scrollTo(cn) {
    if(cn !== null) {
        $('html, body').stop().animate({
            scrollTop: cn.offset().top
        }, 2000, 'easeInOutExpo');
    }
    console.log(cn);
}

//Erstellen einer Karte über die client.js von Trello
//https://developers.trello.com/get-started/start-building#authenticate
function createTrelloCard(cardName, cardDesc, list) {
    var creationSuccess = function(data) {
      alert("Der Auftrag wurde erfolgreich gesendet!");
      console.log('Card created successfully. Data returned:' + JSON.stringify(data));
    };
    var newCard = {
      name: cardName,
      desc: cardDesc,
      idList: list,
      pos: 'top'
    };
    Trello.post('/cards/', newCard, creationSuccess);
}

function authTrello() {
    var authenticationSuccess = function() { console.log('Successful authentication'); };
    var authenticationFailure = function() { console.log('Failed authentication'); };
    Trello.authorize({
      type: 'popup',
      name: 'Trello Anforderungsdokument',
      scope: {
        read: 'true',
        write: 'true' },
      expiration: 'never',
      success: authenticationSuccess,
      error: authenticationFailure
    });
}
