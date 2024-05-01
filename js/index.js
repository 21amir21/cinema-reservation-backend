$(document).ready(function () {
  var currentIndex = 0;
  var slides = $(".slide");
  var totalSlides = slides.length;

  // Show the first slide
  slides.eq(currentIndex).show();

  // Function to show next slide
  function nextSlide() {
    slides.eq(currentIndex).hide();
    currentIndex = (currentIndex + 1) % totalSlides;
    slides.eq(currentIndex).show();
  }

  // Function to show previous slide
  function prevSlide() {
    slides.eq(currentIndex).hide();
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    slides.eq(currentIndex).show();
  }

  // Show next slide on button click
  $("#next").click(nextSlide);

  // Show previous slide on button click
  $("#prev").click(prevSlide);

  // Automatic slideshow
  var slideshowInterval = setInterval(nextSlide, 5000);

  // Pause slideshow on hover
  $("#slideshow").hover(
    function () {
      clearInterval(slideshowInterval);
    },
    function () {
      slideshowInterval = setInterval(nextSlide, 5000);
    }
  );

  // The Button Up
  var btn = $("#backToTop");
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass("show");
    } else {
      btn.removeClass("show");
    }
  });
  btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      500
    );
  });
});
