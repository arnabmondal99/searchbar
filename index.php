<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Ajax Live Data Search using Jquery PHP MySql</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
   <!--modal-->
   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add User</h4>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                        <label for="email">name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">address :</label>
                        <textarea type="text" class="form-control" id="address" placeholder="Enter address" name="address"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="pwd">city:</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter city" name="city">
                    </div>
                    <div class="form-group">
                        <label for="pwd">postalcode:</label>
                        <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postalcode">
                    </div>
                    <div class="form-group">
                        <label for="pwd">country:</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter country">
                    </div>
                    
                    <button type="button" class="btn btn-success" onclick="addData1();">Submit</button>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>
        </div>
    </div>

  </div>
 </body>
</html>


<script>
$(document).ready(function(){


    //function add data

    function addData1(){
        var name =$('#name').val();
        var address=$('#address').val();
        var city=$('#city').val();
        var postalcode=$('#postalcode').val();
        var country=$('#country').val();
        //console.log(name);
        var form_data = new FormData();

        form_data.append("name",name);
        form_data.append("address",address);
        form_data.append("city",city);
        form_data.append("postalcode",postalcode);
        form_data.append("country",country);


        $.ajax({
            type:"POST",
               url:"add.php",
               data: form_data,
               contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                   console.log(result);
                    // when call is sucessfull
                    //result will be  javascript object using JSON.parse.
                    var result = JSON.parse(result);
                    console.log(result);
                    fetchdata();
                    swal("Good job!", result.msg, "success");
                    $("#myModal").modal('hide');

                   
                },
                error: function(err) {
                    // check the err for error details
                    console.log(err);
                }
        });



    }

load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>