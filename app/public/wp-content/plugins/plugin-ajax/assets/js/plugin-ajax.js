jQuery(document).ready(function ($) {
  $.ajax({
    url: "/wp-json/api/rest-ajax",
  }).done(function (data) {
    console.log(data);
    data.forEach((block) => {
      $("#ajax-text").append(
        "<div class='banner-container'>" +
          "<a>" +
          "<img class='shinola-img' src=" +
          block._embedded["wp:featuredmedia"][0].link +
          "/>" +
          "<div class='shinola-post'>" +
          "<h1 class='post-title' id=" +
          block.id +
          '">' +
          block.title.rendered +
          "</h1>" +
          block.excerpt.rendered +
          "</div>" +
          "</div>" +
          "<hr>"
      );
    });
  });
});
