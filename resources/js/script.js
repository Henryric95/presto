const navbar = document.querySelector("#pNavbar")


document.addEventListener("scroll" , () => {

    if(window.scrollY > 515){
        navbar.classList.add("bg-nav")
        navbar.classList.add("shadow")
        navbar.classList.remove("bg-transparent")
    } else {
        navbar.classList.remove("bg-light")
        navbar.classList.remove("shadow")
        navbar.classList.add("bg-transparent")
    }
})


    const swiper = new Swiper('.swiper', {
        // Optional parameters
       
        loop: true,
      
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      
        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },
      });
      
      