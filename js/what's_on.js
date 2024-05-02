const myDiv = document.getElementsByClassName("activate");

for (let i = 0; i < myDiv.length; i++) {
  myDiv[i].addEventListener("mouseover", function () {
    const tooltip = document.querySelectorAll(".tooltip").item(i);
    tooltip.style.display = "block";
  });
  myDiv[i].addEventListener("mouseout", function () {
    const tooltips = document.querySelectorAll(".tooltip").item(i);
    tooltips.style.display = "none";
  });
}

function hideTooltip(i) {
  const tooltips = document.querySelectorAll(".tooltip").item(i);
  tooltips.style.display = "none";
}

window.onload = function () {
  for (let i = 0; i < myDiv.length; i++) {
    hideTooltip(i);
  }
};

// jQuery for show more and show less button
if ($(".card").length > 8) {
  $(".card:gt(7)").hide();
  $(".show-more").show();
}

$(".show-more").on("click", function () {
  //toggle elements with class .ty-compact-list that their index is bigger than 2
  $(".card:gt(7)").toggle();
  //change text of show more element just for demonstration purposes to this demo
  // $(this).text() === "Show more"
  //   ? $(this).text("Show less")
  //   : $(this).text("Show more");

  if ($(this).text() === "Show more") {
    $(this).text("Show less");
    $(".bar").css("width", "100%");
  } else {
    $(this).text("Show more");
    $(".bar").css("width", "50%");
  }
});

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
