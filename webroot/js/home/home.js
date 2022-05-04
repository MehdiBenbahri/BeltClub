window.addEventListener("DOMContentLoaded", (event) => {
    var modalConnection = new bootstrap.Modal(document.getElementById('connectionModal'), {
        keyboard: false
    });

    var splide = new Splide( '.splide' , {
        perPage: 3,
        rewind : true,
        autoWidth: true,
        autoplay: true,
        type    : 'loop',
        interval : 5000,
        gap    : '.7rem',
        breakpoints: {
            640: {
                perPage: 2,
            },
            480: {
                perPage: 1,
            },
        },
    } ).mount();

});


