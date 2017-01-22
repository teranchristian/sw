$(document).ready(function(){

  var jqxhr = $.get( "user", function() {
    alert( "success" );
  })
  .done(function() {
    alert( "second success" );
  })
  .fail(function() {
    alert( "error" );
  });

});

