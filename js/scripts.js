$(document).ready(function(){
  featuredCb.checked = false;
})
var featuredMore = document.querySelector(".more-featured");
var featuredPosts = document.querySelector(".featured-posts");
var featuredCb = document.querySelector("#featured-checkbox");
console.log(featuredMore);
console.log(featuredPosts);
console.log(featuredCb);

featuredMore.addEventListener("click", function(){
if (featuredCb.checked) {
  featuredCb.checked = false;
featuredPosts.style.maxHeight = "70vw";
featuredMore.innerHTML = "See more..."
}else{
  featuredCb.checked = true;
    featuredPosts.style.maxHeight = "none";
    featuredMore.innerHTML = "See less..."
}
})
