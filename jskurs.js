
$(document).ready(function(){

    $("#style-grid").click(function () {
      $("#block-tovar-grid").show();
      $("#block-tovar-list").hide();


    });

    $("#style-list").click(function () {
        $("#block-tovar-grid").hide();
        $("#block-tovar-list").show();

    });


   $("#select-sort").click(function (){
       $("#sorting-list").slideToggle(200);
   });


});
