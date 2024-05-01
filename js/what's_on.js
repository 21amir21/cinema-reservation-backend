// javascript for showing movie tooltip on card hover (on up from the poppy hill card)
const myDiv = document.getElementById("activate");
myDiv.addEventListener("mouseover", showTooltip);
myDiv.addEventListener("mouseout", hideTooltip);

window.onload = function () {
  hideTooltip();
};

function hideTooltip() {
  const tooltip = document.querySelector("#tooltip");
  tooltip.style.display = "none";
}
function showTooltip() {
  const tooltip = document.querySelector("#tooltip");
  tooltip.style.display = "block";
}

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
