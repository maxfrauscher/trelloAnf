$(document).ready(function() {
    $( "#kontoAuswahl" ).click(function() {
        if($(".analytics").hasClass("active")) {
            window.location = "anforderung/analytics.php";
        } else {
            window.location = "anforderung/sales.php";
        }
    });


    $(document).on('click','#addParam',function(){

        var table =
        '<tr class="paramTableRow">' +
          '<td class="form-group"> ' +
            '<input type="text" class="form-control required-field paramName" value="">' +
          '</td>' +
          '<td class="form-group">' +
            '<input type="text" class="form-control required-field paramDesc" value="">' +
         '</td>' +
          '<td class="form-group">' +
            '<select class="form-control match-content paramType">' +
              '<option selected>Statisch</option>' +
              '<option>Dynamisch</option>' +
            '</select>' +
          '</td>' +
          '<td class="form-group">' +
            '<input type="text" class="form-control required-field paramValue" value="">' +
          '</td>' +
          '<td class="form-group">' +
            '<input type="text" class="form-control paramSplitter" value="">' +
          '</td>' +
        '</tr>';
      $(this).parent().parent().parent().parent().find("tbody").append(table);

    });

    $(document).on('click','#addJavascript',function(){
        var javaField =
        '<div class="col-md-12 scriptField">' +
            '<div id="" class="form-group">' +
              '<label for="javascriptField">Bereich des Javascript</label>' +
             ' <div class="input-group">' +
                 ' <input type="text" class="form-control javascriptField" id="javascriptField" placeholder="Bereich">' +
              '</div>' +
            '</div>' +
            '<div class="form-group">' +
              '<b><span>Javascript Code: </span></b><label class="scriptName">  </label>' +
              '<textarea class="form-control scriptText" id="scriptText" rows="3"></textarea>' +
              '<small id="fileHelp" class="form-text text-muted">Wenn ein Script vorhanden ist, fügen Sie es hier ein.</small>' +
            '</div>' +
        '</div>';
        $("#javascriptAddField").append(javaField);

    });

    $(document).on('click', ".scriptField", function() {
        $.each( $(".scriptField"), function() {
                $(this).removeClass("selectedJavascriptfield");
        });
        $(this).addClass("selectedJavascriptfield");
    });

    $(document).on('click','#deleteJavascript',function(){
        $(".selectedJavascriptfield").remove();
        $(".scriptField").first().addClass("selectedJavascriptfield");
    });

    $(document).on('click', ".paramTableRow", function() {
        $.each( $(".paramTableRow"), function() {
                $(this).removeClass("selectedParam");
        });
        $(this).addClass("selectedParam");
    });

    $(document).on('input', '.javascriptField', function(){
        $(this).parent().parent().parent().find(".scriptName").empty();
        $(this).parent().parent().parent().find(".scriptName").append($(this).val());
        //$(this).parent().parent().closest(".scriptName").append("test");
    });


    $(document).on('click','#deleteParam',function(){
        $(".selectedParam").remove();
        $(".paramTableRow").first().addClass("selectedParam");
    });

});
