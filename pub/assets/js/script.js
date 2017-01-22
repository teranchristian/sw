$(document).ready(function(){
  var populateUser = function() {
    $.ajax({
        url:'api/user',
        type:'GET',
        success:function(data){
          $("#userTable tbody").empty();
          var response = data['response'];
          $.each(response['users'], function(key, user){
            var tr = $('<tr>').append(
              $('<td>').text(user.firstName),
              $('<td>').text(user.lastName),
              $('<td>').text(user.email),
              $('<td>').text(user.role),
              $('<td>').text(user.department)
            );
              $("#userTable tbody").append(tr); 
              
          });
        }
    })
  }();
});


