$(document).ready(function () { 
   $("#filePhoto").change(function() {
           readURL(this);
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