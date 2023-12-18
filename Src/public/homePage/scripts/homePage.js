
gsap.registerPlugin(ScrollTrigger);



const locoScroll = new LocomotiveScroll({
    el: document.querySelector("main"),
    smooth: true
});

locoScroll.on("scroll", ScrollTrigger.update);


ScrollTrigger.scrollerProxy("main", {
    scrollTop(value) {
        return arguments.length ? locoScroll.scrollTo(value, 0, 0) : locoScroll.scroll.instance.scroll.y;
    },
    getBoundingClientRect() {
        return { top: 0, left: 0, width: window.innerWidth, height: window.innerHeight };
    },

    pinType: document.querySelector("main").style.transform ? "transform" : "fixed"
});





ScrollTrigger.addEventListener("refresh", () => locoScroll.update());


ScrollTrigger.refresh();




window.addEventListener('scroll', () => {
    document.body.style.setProperty('--scrollTop', window.scrollY + 'px');
});






function mainLoading(){

    gsap.from("#page1 #mid-img",{
        y:300,
        delay:0.1,
        duration:1,
        stagger:0.2
    })

    gsap.from("#page1 #f-img",{
        y:80,
        delay:0.2,
        duration:1,
        stagger:0.2
    })

    gsap.from("#page1 #Sec-img",{
        y:70,
        delay:0.2,
        duration:1,
        stagger:0.2
    })
    gsap.from("#page1 h3",{
        y:-300,
        opacity:0,
        delay:0.2,
        duration:1,
        stagger:0.2
    })
 

    gsap.from("#page1 p",{
        y:-400,
        opacity:0,
        delay:0.2,
        duration:1,
        stagger:0.2
    });
}

mainLoading();


gsap.from("#page1 #mid-img",{
    y:-500,
    opacity:100,
    delay:1,
    duration:2,
    
    
    scrollTrigger:{
        trigger:"#page1",
        scroller:"main",
        scrub:true,
        
    }
})

gsap.from("#page1 #f-img",{
    y:-230,
    opacity:100,
    delay:0.3,
    duration:2,    
    
    scrollTrigger:{
        trigger:"#page1",
        scroller:"main",
        scrub:true 
    }
})


gsap.from("#page1 h3",{
    y:380,
    opacity:100,
    delay:1,
    duration:2,
    
    
    scrollTrigger:{
        trigger:"#page1",
        scroller:"main",
        scrub:true 
    },

   
})




imagesLoaded("main", { background: true }, function () {
    locoScroll.update();
});