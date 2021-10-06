
<!DOCTYPE html>
<html>
 <head>
  <title>jQuery Auto Suggest Textbox with Bootstrap 4 using PHP Ajax</title>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="JsLocalSearch.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <style> 
  .mark {
    background-color: #d7ffe7 !important
  }

  .mark .gsearch{
    font-size: 20px
  }

  .unmark {
    background-color: #e8e8e8 !important
  }

  .unmark .gsearch{
    font-size: 10px
  }
  
  .marktext
  {
   font-weight:bold;
   background-color: antiquewhite;
  }
  </style>
 </head>
 <body>
  <br />
  <br />
  <div class="container">
   <h3 align="center">jQuery Auto Suggest Textbox with Bootstrap 4 using PHP Ajax</h3>
   <br />
   <br />
   <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
     <input type="text" id="gsearchsimple" class="form-control input-lg" placeholder="Search..." />

     <ul class="list-group">

     </ul>
     <div id="localSearchSimple"></div>
     <div id="detail" style="margin-top:16px;"></div>
    </div>
    <div class="col-md-3"></div>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){
 $('#gsearchsimple').keyup(function(){
  var query = $('#gsearchsimple').val();
  $('#detail').html('');
  $('.list-group').css('display', 'block');
  if(query.length == 2)
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    success:function(data)
    {
     $('.list-group').html(data);
    }
   })
  }
  if(query.length == 0)
  {
   $('.list-group').css('display', 'none');
  }
 });

 $('#localSearchSimple').jsLocalSearch({
  action:"Show",
  html_search:true,
  mark_text:"marktext"
 });

 $(document).on('click', '.gsearch', function(){
  var email = $(this).text();
  $('#gsearchsimple').val(email);
  $('.list-group').css('display', 'none');
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{email:email},
   success:function(data)
   {
    $('#detail').html(data);
   }
  })
 });
});
</script>
