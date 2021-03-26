<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TMMS | Teacher Module Management System</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />

  @yield('styles')

</head>
  <body>
    @yield('content')

  </body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>


<script type="text/javascript">
  $(function(){
    $('#faculties').change(function(){
     $("#facultyModules option").remove();
     var id = $(this).val();
     console.log(id);
     $.ajax({
      url : "{{URL::route('loadFacultyModules')}}",
      data: {
        "_token": "{{ csrf_token() }}",
        "id": id
      },
      type: 'post',
      dataType: 'json',
      success: function( result )
      {
       $.each( result, function(k, v) {
        $('#facultyModules').append($('<option>', {value:k, text:v}));
      });
     },
     error: function()
     {
             //handle errors
             alert('error...');
           }
         });
   });
  });
</script>
</html>