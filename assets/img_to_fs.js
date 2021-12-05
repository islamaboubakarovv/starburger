$(function () {
  $(".petite").click(function () {
    if($(window).width() >= 600) {
      var Image = $(this).attr('src');
      var Desc = $(this).attr('alt');
      $(".lightbox-img").attr("src", Image);
      $(".lightbox-desc").text(Desc);
      $(".grande").fadeIn("slow").css("display", "flex");
    }
  });
  $(".grande").click(function () {
      $(".grande").fadeOut("fast");
  });
});