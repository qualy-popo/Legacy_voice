const AccorTitles = Array.from(document.querySelectorAll(".accor_item"));

const AccorContents = Array.from(document.querySelectorAll(".accor_item .accor_content"));

AccorContents.forEach(function (item) {
  item.addEventListener("click", function (e) {
    e.stopPropagation();
  });
});

const removeClassFromOthers = (array, indx) => {
  array.forEach(function (item, index) {
    if (indx !== index) item.classList.remove("active_item");
  });
};

AccorTitles.forEach(function (title, indx) {
  title.addEventListener("click", function () {
    removeClassFromOthers(AccorTitles, indx);
    this.classList.toggle("active_item");
  });
});

//Voice Detail Image Modal Box
$(".voice_bg_img").click(function () {
  $("#modal").html($(this).prop("outerHTML"));
  $("#modal").fadeIn(200);
  return false;
});

$("#modal").click(function () {
  $("#modal").fadeOut(200);
  return false;
});


// ----- Voice match-height ------
$(".voice_flex .voice_card a .card_body .reason_block").matchHeight();
$(".voice_flex .voice_card .good_point_block").matchHeight();
$(".voice_flex .voice_card .voice_txt").matchHeight();