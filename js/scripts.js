// $(document).ready(function(){
//   featuredCb.checked = false;
// })
// var featuredMore = document.querySelector(".more-featured");
// var featuredPosts = document.querySelector(".featured-posts");
// var featuredCb = document.querySelector("#featured-checkbox");
// console.log(featuredMore);
// console.log(featuredPosts);
// console.log(featuredCb);
//
// featuredMore.addEventListener("click", function(){
// if (featuredCb.checked) {
//   featuredCb.checked = false;
//     featuredPosts.style.paddingTop = "69%";
// featuredMore.innerHTML = "See more..."
// }else{
//   featuredCb.checked = true;
//     featuredPosts.style.paddingTop = "413%";
//     featuredMore.innerHTML = "See less..."
// }
// })



// DOTDOTDOT
// var videoTitles = document.querySelectorAll( ".featured-post-title");
// console.log(document.querySelector( ".featured-post-title"));
// for (var i = 0; i < videoTitles.length; i++) {
// console.log(videoTitles[i]);
//   document.addEventListener( "DOMContentLoaded", () => {
//      let wrapper = videoTitles[i];
//      let options = {
//        truncate: "letter",
//         watch: true,
//      };
//      new Dotdotdot( wrapper, options );
//   });
// }

/*
// MOBILE MENU
var menu = document.querySelector( ".menu-top-menu-container");
var menuIcon = document.querySelector( "#mobile-menu-icon");
var menuCb = document.querySelector( "#menuCb");
var menuBg = document.querySelector( "#menu-top-bg");
var fade = document.querySelector(".fade");

menuCb.checked=false;
menuIcon.addEventListener("click", function(){
  if (menuCb.checked) {
    menu.style.display = "none";
    menuBg.style.display = "none";
    fade.classList.remove("fade-on");
    document.body.classList.remove("body-hide");
    menuIcon.classList.remove("menu-icon-close");
    menuIcon.classList.remove("is-active");
    menuCb.checked = false;
    console.log(menuCb.checked);
  }else{
    menu.style.display = "inline-block";
          menuBg.style.display = "inline-block";
    fade.classList.add("fade-on");
        document.body.classList.add("body-hide");
    menuIcon.classList.add("menu-icon-close");
        menuIcon.classList.add("is-active");
    menuCb.checked = true;
    console.log(menuCb.checked);
  }
})
fade.addEventListener("click", function(){
  if (menuCb.checked) {
    menu.style.display = "none";
        menuBg.style.display = "none";
    fade.classList.remove("fade-on");
        document.body.classList.remove("body-hide");
    menuIcon.classList.remove("menu-icon-close");
        menuIcon.classList.remove("is-active");
    menuCb.checked = false;
    console.log(menuCb.checked);
  }else{
      menu.style.display = "inline-block";
      menuBg.style.display = "inline-block";
          fade.classList.add("fade-on");
              document.body.classList.add("body-hide");
          menuIcon.classList.add("menu-icon-close");
              menuIcon.classList.add("is-active");
    menuCb.checked = true;
    console.log(menuCb.checked);
  }
})
console.log(menu);
console.log(menuIcon);
*/

// AUTHOR PROFILE DESCRIPTION SEE MORE...
function readMoreToggle() {
  const less = 'author-page-header-desc';
  const more = 'author-page-header-desc-open';
  const elText = document.getElementById('more-less');
  const elLink= document.getElementById('button-more');

  if (elText.className === less){
    elText.className = more;
    elLink.innerHTML = 'Read less';
  } else {
    elText.className = less;
    elLink.innerHTML = 'Read more';
  }
}

function initAuthor() {
  const el = document.getElementById('more-less');
  const isOverflow = el.scrollHeight > el.clientHeight;

  if (!isOverflow) {
    const elToHide = document.getElementById('button-more');
    elToHide.style.display = 'none';
  }
};

// Mobile menu
function noScrollOnMenuOpen(checkbox) {
  if (checkbox.checked) document.body.classList.add('noScrollOnMenuOpen');
  else document.body.classList.remove('noScrollOnMenuOpen');
}
