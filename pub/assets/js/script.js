$(document).ready(function(){
  var getLocation = window.location;
  var app = getLocation.pathname.split('/')[1]
  var url = '//'+getLocation.host+'/'+app;
  var generateUserTable = function (orderBy, sortBy) {
    $.ajax({
        url: url+'/api/user',
        type:'GET',
        data: { 
          orderBy: orderBy,
          sortBy: sortBy
        },
        success:function(data){
          $("#userTable tbody").empty();
          var response = data['response'];
          $("#totalUsers").text(response['total']); 
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
      var orderBy = $(this).attr('data-orderby')
      var sortBy = $(this).attr('data-sortby')
      var sort = 'DESC';
      var arrow = 'glyphicon-arrow-up'

      if (sortBy === 'DESC') {
        sort = 'ASC';
        arrow = 'glyphicon-arrow-down'
      }
      $(this).attr('data-sortby', sort);

      $("thead > tr > th >span").removeClass()
      $(this).children().addClass('glyphicon '+arrow);
      generateUserTable(orderBy, sortBy);
  });
});


