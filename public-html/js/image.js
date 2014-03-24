var ctrl = function() {
  $("input:text").keydown(function(event) {
      $(this).removeClass("highlight");
  });
  //setColumns();
};
var setColumns = function() {
  var height = Math.max($("#navigation").height(), $("#content").height());
  var h1 = $("#navigation").height();
  var h2 = $("#content").height();
  var finalHeight = (h1 > h2) ? h1 : h2;
  $("#navigation").height(finalHeight);
  $("#content").height(finalHeight);
};
$(document).ready(function () { 
  ctrl();
  //setColumns();
   $("#filePhoto").change(function() {
           readURL(this);
       });
   $("#form").submit(function(){
  var isFormValid = true;
    $("#form input:text").each(function(){
        if ($.trim($(this).val()).length == 0){
            $(this).addClass("highlight");
            isFormValid = false;
        } else {
            $(this).removeClass("highlight");
        }
    });
    if (!isFormValid)
      return false;
  });
});
var readURL=function(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                    var immagine=$("<img src='' id='previewHolder' alt='anteprima immagine da inserire'/>");
                    $('#filePhoto').after(immagine);
                   $('#previewHolder').attr('src', e.target.result);
               }

               reader.readAsDataURL(input.files[0]);
           }
       }