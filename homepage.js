
// const roomContainers = [...document.querySelectorAll('.room-container')];
// const nextBtn = [...document.querySelectorAll('.next-btn')];
// const prevBtn = [...document.querySelectorAll('.prev-btn')];

// roomContainers.forEach((item, i) => {
//     let containerDimensions = item.getBoundingClientRect();
//     let containerWidth = containerDimensions.width;

//     nextBtn[i].addEventListener('click', () => {
//         item.scrollLeft += containerWidth;
//         console.log(1)
//     })

//     prevBtn[i].addEventListener('click', () => {
//         item.scrollLeft -= containerWidth;
//     })
// });

// let slidePosition = 1;
// SlideShow(slidePosition);

// forward/Back controls
// function plusSlides(n) {
//     SlideShow(slidePosition += n);
// }

// //  images controls
// function currentSlide(n) {
//     SlideShow(slidePosition += n);
// }

// function SlideShow(n) {
//     var i;
//     var slides = document.getElementsByClassName("room-card");
//     var circles = document.getElementsByClassName("dots");
//     if (n > slides.length) { slidePosition = 1 }
//     if (n < 1) { slidePosition = slides.length }
//     for (i = 3; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     for (i = 4; i < slides.length; i++) {
//         slides[i].style.display = "grid";
//     }
//     for (i = 1; i < circles.length; i++) {
//         circles[i].className = circles[i].className.replace(" enable", "");
//     }
//     slides[slidePosition - 1].style.display = "flex";
//     circles[slidePosition - 1].className += " enable";
// } 

// const body = document.querySelector('body'),
//       sidebar = body.querySelector('nav'),
//       toggle = body.querySelector(".toggle"),
//       searchBtn = body.querySelector(".search-box"),
//       modeSwitch = body.querySelector(".toggle-switch"),
//       modeText = body.querySelector(".mode-text");


// toggle.addEventListener("click" , () =>{
//     sidebar.classList.toggle("close");
// })

// searchBtn.addEventListener("click" , () =>{
//     sidebar.classList.remove("close");
// })

// modeSwitch.addEventListener("click" , () =>{
//     body.classList.toggle("dark");
    
//     if(body.classList.contains("dark")){
//         modeText.innerText = "Light mode";
//     }else{
//         modeText.innerText = "Dark mode";
        
//     }
// });

const roomTag = document.querySelector(".room-tag").innerText;
function proceedToBook() {
    
    if(roomTag === "Available") {
        window.location.href="booking.php";
    } else if(roomTag === "Unavailable") {
        alert ("Room not available")
        window.location.href="#";
    }
}