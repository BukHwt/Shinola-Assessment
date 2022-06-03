jQuery(document).ready(function ($) {
  $.ajax({
    url: "/wp-json/api/rest-ajax",
  }).done(function (data) {
    console.log(data);
    data.forEach((block) => {
      $("#ajax-text").append(
        "<h1 class='post-title' id=" +
          block.id +
          '">' +
          block.title.rendered +
          "</h1>" +
          "<div class='shinola-post'>" +
          "<p>" +
          "<img class='shinola-img' src=" +
          block._embedded["wp:featuredmedia"][0].link +
          "/>" +
          block.excerpt.rendered +
          "</p>" +
          "</div>"
      );
    });
  });
});
