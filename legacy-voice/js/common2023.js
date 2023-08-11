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
// $(document).ready(function () {
//   $(".voice_card .card_head .service_block").matchHeight();
//   $(".voice_card .card_body .evaluation_block").matchHeight();
//   $(".voice_card .card_body .reason_block").matchHeight();
//   $(".voice_card .card_body .good_point_block").matchHeight();
//   $(".voice_card .card_body .voice_img_container").matchHeight();
//   $(".voice_card .card_body .voice_txt").matchHeight();
// });

(function ($) {
  $(".voice_card .card_head .service_block").length && $(".voice_card .card_head .service_block")?.matchHeight();
  $(".voice_card .card_body .evaluation_block").length && $(".voice_card .card_body .evaluation_block")?.matchHeight();
  $(".voice_card .card_body .reason_block").length && $(".voice_card .card_body .reason_block")?.matchHeight();
  $(".voice_card .card_body .good_point_block").length && $(".voice_card .card_body .good_point_block")?.matchHeight();
  // $(".voice_card .card_body .img_txt_container").length && $(".voice_card .card_body .img_txt_container")?.matchHeight();
  $(".voice_card .card_body .voice_img_container").length && $(".voice_card .card_body .voice_img_container")?.matchHeight();
  $(".voice_card .card_body .voice_txt").length && $(".voice_card .card_body .voice_txt")?.matchHeight();
})(jQuery);

// window.addEventListener("load", function () {
//   const cardHeaders = document.querySelectorAll(".voice_card .card_head");
//   const evaluationBlocks = this.document.querySelectorAll(".voice_card .card_body .evaluation_block");
//   const reasonBlocks = this.document.querySelectorAll(".voice_card .card_body .reason_block");

//   let maxHeight = 0;
//   let evaluationmaxHeight = 0;
//   let reasonmaxHeight = 0;
//   cardHeaders.forEach((cardHeader) => {
//     maxHeight = Math.max(maxHeight, cardHeader.offsetHeight);
//   });
//   evaluationBlocks.forEach((evaluationBlock) => {
//     evaluationmaxHeight = Math.max(evaluationmaxHeight, evaluationBlock.offsetHeight);
//   });
//   reasonBlocks.forEach((reasonBlock) => {
//     reasonmaxHeight = Math.max(reasonmaxHeight, reasonBlock.offsetHeight);
//   });

//   cardHeaders.forEach((cardHeader) => {
//     cardHeader.style.height = maxHeight + "px";
//   });
//   evaluationBlocks.forEach((evaluationBlock) => {
//     evaluationBlock.style.height = evaluationmaxHeight + "px";
//   });
//   reasonBlocks.forEach((reasonBlock) => {
//     reasonBlock.style.height = reasonmaxHeight + "px";
//   });
// });
