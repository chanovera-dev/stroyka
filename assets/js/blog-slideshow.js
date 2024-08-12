const slideshowBlog = document.querySelector('#main .container .blog.slideshow.section .posts');
let slideBlog = document.querySelectorAll('#main .container .blog.slideshow.section .posts li');

function nextPost() {
  let firstSlideBlog = document.querySelectorAll('#main .container .blog.slideshow.section .posts li')[0];
  slideshowBlog.style.transition = "all .5s ease";
  slideshowBlog.style.transform = "translateX(-12.5%)";
  setTimeout(function() {
    slideshowBlog.style.transition = "none";
    slideshowBlog.insertAdjacentElement('beforeend', firstSlideBlog);
    slideshowBlog.style.transform = "translateX(0)";
  }, 500);
}

function prevPost() {
  let slideBlog = document.querySelectorAll('#main .container .blog.slideshow.section .posts li');
  let lastSlideBlog = slideBlog[slideBlog.length -1];
  slideshowBlog.style.transform = "translateX(12.5%)";
  slideshowBlog.style.transition = "all .5s ease";
  setTimeout(function() {
    slideshowBlog.style.transition = "none";
    slideshowBlog.insertAdjacentElement('afterbegin', lastSlideBlog);
    slideshowBlog.style.transform = "translateX(0)";
  }, 500);
}