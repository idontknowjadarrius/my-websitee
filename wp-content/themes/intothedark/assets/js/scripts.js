

let hamburger = document.querySelector('.header__hamburger');

hamburger.addEventListener("click", function () {

    document.body.classList.toggle('menu-open');
});



//SCroll Animation
ScrollTrigger.batch(".fade-up", {
    start: "top bottom",
    onEnter: (elements, triggers) => {
        gsap.to(elements, { opacity: 1, stagger: 0.5, y: 0, duration: 1.5, ease: "power2.out" });

       
    }
});

//add class on scroll
window.addEventListener('scroll', function(e) {
  if(window.scrollY > 200){
    document.body.classList.add('scroll-down');
  } else {
    document.body.classList.remove('scroll-down');
  }
});

//scroll to
const links = document.querySelectorAll(".scroll-to");

links.forEach((link) => {
  link.addEventListener("click", clickHandler);
})

function clickHandler(e) {
  e.preventDefault();
  const href = this.getAttribute("href");
  const offsetTop = document.querySelector(href).offsetTop - 80; 

  scroll({
    top: offsetTop,
    behavior: "smooth"
  });
}

//Cover Animation
let tl = gsap.timeline();

tl.to(".fade-in", { opacity: 1, y: 0, duration: .3, stagger: .3, ease: "power2.out" }, "1")
.from(".cover__bg", { scale: .6, duration: 4, opacity: 0, ease: "power2.out" }, "0");

gsap.to(".text-reveal", { clipPath: "polygon(0 0, 100% 1%, 100% 100%, 0% 100%)", y: 0, duration: 1, stagger: .3, ease: "power2.out" });


gsap.to(".cover__bg", {
  y: 200,
  scrollTrigger: {
      trigger: ".cover__content",
      start: "top top",
      end: "bottom top",
      scrub: true
  }
});



