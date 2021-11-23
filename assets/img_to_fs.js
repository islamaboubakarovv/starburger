$(function () {
  $(".petite").click(function () {
    if($(window).width() >= 600) {
      var Image = $(this).attr('src');
      $(".grande").html("<img src='" + Image + "'>");
      $(".grande").fadeIn("slow").css("display", "flex");
    }
  });
  $(".grande").click(function () {
      $(".grande").fadeOut("fast");
  });
});