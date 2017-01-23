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

  $("thead > tr > th", $("#userTable")).click(function($e) {
      var orderBy = $(this).data('orderby')
      var sortBy = $(this).data('sortby')
      $(this).data('sortby', sortBy === 'DESC' ? 'ASC':'DESC');
      generateUserTable(orderBy, sortBy);
  });
});


