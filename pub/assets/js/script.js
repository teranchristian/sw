$(document).ready(function(){
  var generateUserTable = function (orderBy, sortBy) {
    $.ajax({
        url:'api/user',
        type:'GET',
        data: { 
          orderBy: orderBy,
          sortBy: sortBy
        },
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
  };
  generateUserTable();

  $myTable = $("#userTable");

  $("thead > tr > th", $myTable).click(function($e) {
      // $("tbody > tr", $myTable).fadeOut();
      var orderBy = $(this).data('orderby')
      var sortBy = $(this).data('sortby')
      generateUserTable(orderBy, sortBy);
  });
});


