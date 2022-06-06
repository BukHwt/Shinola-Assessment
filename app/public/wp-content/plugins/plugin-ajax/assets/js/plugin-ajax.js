jQuery(document).ready(function ($) {
  $.ajax({
    url: "/wp-json/api/rest-ajax",
  }).done(function (data) {
    console.log(data);
    data.forEach((block) => {
      $("#ajax-text").append(
        "<div class='banner-container'>" +
          "<a class='img-link' href=" +
          block.link +
          ">" +
          "<img class='shinola-img' src=" +
          block._embedded["wp:featuredmedia"][0].link +
          "/>" +
          "</a>" +
          "<div class='shinola-post'>" +
          "<a class='title-link' href=" +
          block.link +
          ">" +
          "<h3 class='post-title' id=" +
          +block.id +
          '">' +
          block.title.rendered +
          "</h3>" +
          "</a>" +
          block.excerpt.rendered +
          "</div>" +
          "</div>" +
          "<hr>"
      );
    });
  });
});
