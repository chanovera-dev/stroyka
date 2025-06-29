const slideshowBlog = document.querySelector('.site-main .container--posts .content .blog .posts');
let slidePost = document.querySelectorAll('.site-main .container--posts .content .blog .posts .archive-post');

function nextPost() {
  let firstSlidePost = document.querySelectorAll('.site-main .container--posts .content .blog .posts .archive-post')[0];
  slideshowBlog.style.transition = "all .5s ease-in-out";
  slideshowBlog.style.transform = "translateX(-12.5%)";
  setTimeout(function() {
    slideshowBlog.style.transition = "none";
    slideshowBlog.insertAdjacentElement('beforeend', firstSlidePost);
    slideshowBlog.style.transform = "translateX(0)";
  }, 500);
}

function prevPost() {
  let slidePost = document.querySelectorAll('.site-main .container--posts .content .blog .posts .archive-post');
  let lastSlidePost = slidePost[slidePost.length -1];

  slideshowBlog.style.transition = "none";
  slideshowBlog.insertAdjacentElement('afterbegin', lastSlidePost);

  slideshowBlog.style.transform = "translateX(-12.5%)";

  void slideshowBlog.offsetWidth;
  slideshowBlog.style.transition = "all .5s ease-in-out";
  slideshowBlog.style.transform = "translateX(0)";
}

// Solo usando listeners, sin onclick
document.querySelector('.backward-button-b')?.addEventListener('click', prevPost);
document.querySelector('.forward-button-b')?.addEventListener('click', nextPost);

console.log('Blog slideshow ready');