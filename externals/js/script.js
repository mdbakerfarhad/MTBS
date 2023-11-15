// error images trigger
const errorImages = document.querySelectorAll(".error-img");
errorImages.forEach((element) => {
    element.onerror = () => {
        element.alt = "No Image Available";
    }
})

// livesearch.php page 

// Retrieve the value from "ajax.php".
function fill(Value) {
    // Assign the value to the "search" div in "search.php".
    $('#search').val(Value);
    // Hide the "display" div in "search.php".
    $('#display').hide();
}
$(document).ready(function () {
    // When a key is pressed in the "Search box" of "search.php", this function will be called.
    $("#search").keyup(function () {
        // Assign the search box value to a JavaScript variable named "name".
        var name = $('#search').val();
        // Validate if "name" is empty.
        if (name == "") {
            // Assign an empty value to the "display" div in "search.php".
            $("#display").html("");
        }
        // If the name is not empty.
        else {
            // Initiate an AJAX request.
            $.ajax({
                // Set the AJAX type as "POST".
                type: "POST",
                // Send data to "ajax.php".
                url: "livesearch.php",
                // Pass the value of "name" into the "search" variable.
                data: {
                    search: name
                },
                // If a result is found, this function will be called.
                success: function (html) {
                    // Assign the result to the "display" div in "search.php".
                    $("#display").html(html).show();
                }
            });
        }
    });
});

// index.php swipper slider script 

 // swipper for top banner 
 const slideshowswiper = new Swiper(".top-banner", {
    spaceBetween: 10,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    }
});
// swipper for all shows 
const allshows = new Swiper('.all-shows', {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: false,
    },
    breakpoints: {
        50: {
            slidesPerView: 1,
            spaceBetween: 25,
        },
        700: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1011: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1339: {
            slidesPerView: 4,
            spaceBetween: 20,
        }
    }
});
// swipper for reviews
const allreviewswiper = new Swiper('.slider-for-review', {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        50: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        700: {
            slidesPerView: 2,
            spaceBetween: 20,
        }
    }
});


// writting messages in console 

const style = 'background-image:linear-gradient(to bottom right , #00827f, #90ee90); color:#eee; padding:50px; border-radius:7px; font-size:1.2rem; ';
console.log("%c MTBS - Movie Ticket Booking System",style);