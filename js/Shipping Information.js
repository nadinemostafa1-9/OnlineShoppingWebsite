$(document).ready(function(){
  $("#card").hide();
  $("#cardnum").hide();
  $("#visa").click(function(){
    $("#card").show();
    $("#cardnum").show();
  });
  $("#cash").click(function(){
    $("#card").hide();
    $("#cardnum").hide();
  });
});