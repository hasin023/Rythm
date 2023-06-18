$(document).ready(function () {
  $("#hideLogin").click(function () {
    $("#loginForm").hide();
    $("#registrationForm").show();
  });
  $("#hideRegister").click(function () {
    $("#registrationForm").hide();
    $("#loginForm").show();
  });
});
