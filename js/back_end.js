$(document).ready(function () {

    /* Sidebar hovers */

    var links = $('#sideBar a');

    var whereArr = window.location.href.split('/');
    var where = whereArr[whereArr.length - 1];

    setActive(where);

    function setActive(where) {

        clear();

        [].forEach.call(links, function (link) {
            var hrefArr = link.getAttribute('href').split('/');

            if (where == hrefArr[hrefArr.length - 1]) {
                link.classList.add('activeLink');
                collapse(link);
            }
        });
    }

    function clear() {
        [].forEach.call(links, function (link) {
            if (link.classList.contains('activeLink')) {
                link.classList.remove('activeLink')
            }
        });
    }

    function collapse(link) {

        if (link.classList.contains('dropped')) {
            var ul = link.parentNode.parentNode;
            var a = ul.previousElementSibling;

            ul.classList.add('in');
            ul.setAttribute('aria-expanded', true);
            a.setAttribute('aria-expanded', true);
        }

    }

    $('#sideBar').click(function (ev) {
        if (ev.target.tagName == 'A')
            clear();
    });

    /* Main Navigation */

    $('#main-nav > li').hover(
            function () {
                var subNavOut = $(this).find('.sub-nav.out-level');

                $(subNavOut).css('visibility', 'visible').animate({
                    opacity: .9
                }, 300);
            },
            function () {
                var subNavOut = $(this).find('.sub-nav.out-level');

                $(subNavOut).css('visibility', 'hidden').animate({
                    opacity: 0
                }, 300);
            }
    );

    $('.downItem').hover(
            function () {
                var subNavInn = $(this).find('.inn-level');

                $(subNavInn).css('visibility', 'visible').animate({
                    opacity: .9
                }, 300);
            },
            function () {
                var subNavInn = $(this).find('.inn-level');

                $(subNavInn).css('visibility', 'hidden').animate({
                    opacity: 0
                }, 300);
            }
    );

    /* AJAX IN COMMON */

    try {

        var firstSelect = $('.ajax-first-select'),
                secondSelect = $('.ajax-second-select'),
                page = window.location.pathname;

        $(firstSelect).change(function () {

            var data = $(this).val();

            if (data == 'default') {

                $(secondSelect).html('').attr('disabled', 'disabled');
                $('#page_url').html('').attr('disabled', 'disabled');
                $('#change_type').html('').attr('disabled', 'disabled');
                return;
            }

            switch (page) {
                case '/admin/products':
                case '/admin/subcat':
                    callAjax('products/filter_by_category', data);
                    break;
                case '/admin/menu_add':
                    callAjax('ajax/add_menu_item', data);
                    break;
                default:
                    break;
            }

        });

    } catch (e) {

        console.log(e.type + ' ' + e.message);

    }

    function callAjax(url, data) {
        console.log(url, data);

        $.post(url, {id: data}, function (content) {
            getSubCat(content, secondSelect);
        });
    }


    function getSubCat(data, parent) {

        $(parent).html('');

        var obj = JSON.parse(data);

        console.log(obj);

        var id = obj['link'];
        var name = obj['name'];

        if (!obj['name']) {
            return;
        }

        parent.removeAttr('disabled');

        if (window.location.pathname == '/admin/menu_add') {           
            $('#change_type').removeAttr('disabled');
        }

        for (var i = 0; i < name.length; i++) {
            var option = document.createElement('option');
            option.setAttribute('value', id[i]);
            option.innerHTML = name[i];

            $(parent).append(option);
        }

    }


});