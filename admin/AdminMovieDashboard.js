// put the on hover for the button here bad fel css
$(document).ready(function () {
  alert("Welcome Admin");
  // edit button
  $(".editmovie").hover(
    function () {
      $(this).css("font-size", "17px");
      $(this).css("background", "#146fef");
      $(this).css("box-shadow", "0px 0px 10px 2px rgba(0,0,0,.8)");
    },
    function () {
      $(this).css("font-size", "15px");
      $(this).css("background", " #33b0de");
      $(this).css("text-decoration", "none");
      $(this).css("box-shadow", "inset 0 0 50px #146fef");
    }
  );
  // add movie button
  $(".addmovie").hover(
    function () {
      $(this).css("font-size", "20px");
      $(this).css("background", "#146fef");

      $(this).css("box-shadow", "0px 0px 10px 2px rgba(0,0,0,.8)");
    },
    function () {
      $(this).css("font-size", "15px");
      $(this).css("background", " #33b0de");
      $(this).css("text-decoration", "none");
      $(this).css("box-shadow", "inset 0 0 50px #146fef");
    }
  );
});
