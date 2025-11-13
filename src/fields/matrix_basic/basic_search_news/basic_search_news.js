$( document ).ready(function() {
    $('#loading').hide();

    $('body').on('change', '#dropdown-category', function() {
        let show_more = $('#show-more-news');
        let limit = 9;
        let category = $(this).val();
        let subcategory = $('#dropdown-subcategory').val();

        $('#loading').show();

        show_more.attr('data-category', category);

        $.ajax({
            url: '/ajax/news/search',
            type: 'POST',
            dataType: 'json',
            data: {
                limit: limit,
                category: category,
                subcategory: subcategory,
            },
            success: function (res) {
                $('#show-news').html(res.html);

                if(limit < res.limit_max) {
                    show_more.show().attr('value', limit);
                } else {
                    show_more.hide();
                }

                $('#loading').hide();
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $('body').on('change', '#dropdown-subcategory', function() {
        let show_more = $('#show-more-news');
        let limit = 9;
        let category = $('#dropdown-category').val();
        let subcategory = $(this).val();

        $('#loading').show();

        show_more.attr('data-category', category);

        $.ajax({
            url: '/ajax/news/search',
            type: 'POST',
            dataType: 'json',
            data: {
                limit: limit,
                category: category,
                subcategory: subcategory,
            },
            success: function (res) {
                $('#show-news').html(res.html);

                if(limit < res.limit_max) {
                    show_more.show().attr('value', limit);
                } else {
                    show_more.hide();
                }

                $('#loading').hide();
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $('body').on('click', '#show-more-news', function() {
        let set_limit = parseInt($(this).attr('data-limit'));
        let limit = parseInt($(this).attr('value')) + set_limit;
        let category = $(this).attr('data-category');
        let subcategory = $(this).attr('data-subcategory');

        $('#loading').show();

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
                $('#show-news').html(res.html);

                if(limit < res.limit_max) {
                    $('#show-more-news').show().attr('value', limit);
                } else {
                    $('#show-more-news').hide();
                }

                $('#loading').hide();
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});