jQuery(document).ready(function ($) {
  $.ajax({
    url: "/wp-json/api/rest-ajax",
  }).done(function (data) {
    console.log(data);
    data.forEach((block) => {
      $("#ajax-text").append(
        "<h1 id=" +
          block.id +
          '">' +
          block.title.rendered +
          "</h1>" +
          "<p>" +
          "<img src=" +
          block._embedded["wp:featuredmedia"][0].link +
          "/>" +
          "</p>"
      );
    });
  });
});
