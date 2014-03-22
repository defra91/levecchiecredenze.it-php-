$(document).ready(function () { 
   $("#filePhoto").change(function() {
           readURL(this);
       });
   $("#form").submit(function(){
  var isFormValid = true;
    $("#form input:text").each(function(){ // Note the :text
        if ($.trim($(this).val()).length == 0){
            $(this).addClass("highlight");
            isFormValid = false;
        } else {
            $(this).removeClass("highlight");
        }
    });
    if (!isFormValid)
      event.preventDefault();
    return isFormValid;
  
  });
});
var readURL=function(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                   $('#previewHolder').attr('src', e.target.result);
               }

               reader.readAsDataURL(input.files[0]);
           }
       }