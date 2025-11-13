$( document ).ready(function() {
    $('#loading-teaser').hide();

    var teaserCareer = new Swiper('.basic_teaser_career_swiper', {
        slidesPerView: 3,
        spaceBetween: 30,
        allowTouchMove: true,
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 5000,
        },
        breakpoints: {
            // when window width is <= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        pagination: {
            el: '.swiper-pagination-career',
            clickable: true,
        },
    });

    $('body').on('click', '#show-more-news-teaser', function() {
        let set_limit = parseInt($(this).attr('data-limit'));
        let limit = parseInt($(this).attr('value')) + set_limit;
        let category = $(this).attr('data-category');
        let subcategory = $(this).attr('data-subcategory');

        $('#loading-teaser').show();

        $.ajax({
            url: '/ajax/news/loadmore',
            type: 'POST',
            dataType: 'json',
            data: {
                limit: limit,
                category: category,
                subcategory: subcategory,
            },
            success: function (res) {
                $('#show-news-teaser').html(res.html);

                if(limit < res.limit_max) {
                    $('#show-more-news-teaser').show().attr('value', limit);
                } else {
                    $('#show-more-news-teaser').remove();
                }

                $('#loading-teaser').hide();
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});