$('#loginButton').click(function() {
  $('#loginModal').show();
});

$('#loginModal .close, #loginModal .btn-secondary').click(function() {
  $('#loginModal').hide();
});