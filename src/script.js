
const sections = gsap.utils.toArray(".section");

let maxWidth = 0;

const getMaxWidth = () => {
  maxWidth = 0;
  sections.forEach((section) => {
    maxWidth += section.offsetWidth;
  });
};
getMaxWidth();
ScrollTrigger.addEventListener("refreshInit", getMaxWidth);



let scrollTween = gsap.to(sections, {
    x: () => -(maxWidth - window.innerWidth),
    ease: "none", 
    scrollTrigger: {
      trigger: ".container",
      pin: true,
      scrub: true,
      start: 1,
      end: "+=5000",
      invalidateOnRefresh: true, 
      onLeave: self => {
           self.scroll(2);
            ScrollTrigger.update();
        },
      onLeaveBack: self => {
            self.scroll(ScrollTrigger.maxScroll(window)-2);
            ScrollTrigger.update();
        }
    }
  });



