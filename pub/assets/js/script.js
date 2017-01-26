$(document).ready(function() {
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
              $('<td>').text(user.department),
              $("<td class='view' data-id='"+user.id+"' >").text('view')
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

  $(document).on('click', "td.view", function () {
    var userId = $(this).data('id');
    $.ajax({
      url: url+'/api/user/'+userId,
      type:'GET',
      success:function(data){
        var response = data['response'];
        var user = response['user'];
        $('#userFirstName').text(user.firstName);
        $('#userLastName').text(user.lastName);
        $('#userEmail').text(user.email);
        $("#dialog").dialog();
      }
    })
  });

  $(document).on('click', "#dialogClose", function () {
    $('#dialo').dialog('close');
  });
});


