$(".side-toggle").click(function () {
  $(".sidebar").toggleClass("hide-sidebar");
  $(".right-content").toggleClass("right-content-0");
});

// search
$(".head-search .input-group-text").click(function () {
  $('.head-search').addClass("open-search");
});
$(".mobile-close-search").click(function () {
  $(".head-search").removeClass("open-search");
});

// table js
$(document).ready(function () {
  $('#example').DataTable({
    language: {
      oPaginate: {
        sNext: '<i class="arrow-icon next-arrow"></i>',
        sPrevious: '<i class="arrow-icon"></i>',
      }
    }
  });
});