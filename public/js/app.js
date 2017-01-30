//globals
var autocomplete, components = [];
// init bxslider
var slider = $('.bxslider').bxSlider({
    minSlides: 3,
    maxSlides: 6,
    slideWidth: 300,
    slideMargin: 10,
    controls: false,
    pagerType: 'full'
});
// init time and datedropper
$("#from").timeDropper({
    backgroundColor: "#A0785F",
    primaryColor: "#fff",
    borderColor: "#A4EAEC"
});
$("#until").timeDropper({
    backgroundColor: "#A0785F",
    primaryColor: "#fff",
    borderColor: "#A4EAEC"
});

$('#date').dateDropper();
if($(location).attr('pathname').substr(1,6) == 'ticket'){
    $('#wrapper').scrollTo('#item5', 800);
    $('a[href=#item1]').parent().removeClass('active');
    $('a[href=#item5]').parent().addClass('active');
    $('a[href=#item5]').parent().removeClass('disabled');
}
// make maidcard html
function makeMaidCard(id, name, img, rate) {
    return `<div class="maid-card" data-content="` + id + `">
                            <div class="maid-image">
                                <img src="https://placeholdit.imgix.net/~text?txtsize=19&txt=200%C3%97400&w=200&h=400">
                            </div>
                            <div class="maid-info">
                                <h5>` + name + `</h5>
                                <h6>` + rate + `€/h</h6>
                            </div>
                        </div>`;
}

$('#confirm').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        url: 'http://' + $(location).attr('hostname') + '/saveReservation',
        data: {
            start: new Date($('#date').val() + ' ' + $('#from').val()).getTime() / 1000,
            end:  new Date($('#date').val() + ' ' + $('#until').val()).getTime() / 1000,
            address: $('#confirm-address').val(),
            name: $('#confirm-name').val(),
            email: $('#confirm-email').val(),
            phone: $('#confirm-phone').val(),
            maid: $('#confirm-maid').attr('data-content'),
            rate:  parseFloat($('#confirm-rate').val())
        }
    }).done(function (data) {
        $('a[href=#item4]').parent().removeClass('active');
        $('a[href=#item5]').parent().addClass('active');
        $('a[href=#item5]').parent().removeClass('disabled');
        $('#wrapper').scrollTo('#item5', 800);
        window.history.pushState("object or string", "Title", 'http://' + $(location).attr('hostname') + '/ticket/' + data.token);
        $('#reservation-url').val($(location).attr('hostname') + '/ticket/' + data.token);
        $('#reservation-name').val(data.name);
        $('#reservation-phone').val(data.phone);
        $('#reservation-email').val(data.email);
        $('#reservation-address').val(data.address);
        $('#reservation-date').val(data.date);
        $('#reservation-from').val(data.from);
        $('#reservation-until').val(data.until);
        $('#reservation-maid').val(data.maidName);
        $('#reservation-rate').val(data.rate + '€/h');
    }).error(function (data) {
        console.log(data);
    });
});
// override submit
$(document).on('submit', '#contact', function (e) {
    e.preventDefault();
    return false;
});

$('#maids').on('click', function (e) {
    if ($(this).parent().parent()[0].checkValidity()) {
        start = new Date($('#date').val() + ' ' + $('#from').val()).getTime() / 1000;
        end = new Date($('#date').val() + ' ' + $('#until').val()).getTime() / 1000;
        $.ajax({
            type: 'POST',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: 'http://' + $(location).attr('hostname') + '/getMaids',
            data: {
                start: start,
                end: end,
                county: components.administrative_area_level_1
            }
        }).done(function (data) {
            $('#wrapper').scrollTo('#item3', 800);
            if(data.length != 0) {
                $('#item3').find('#no-maids').hide();
                $('#item3').find('#maid-display').show();
                $('.bxslider li').remove();
                $('.maid-card').remove();
                slider.reloadSlider();
                $.each(data, function (i, maid) {
                    if (i == 0 || i == 1) {
                        $('.maids').append(makeMaidCard(i, maid['name'], maid['img'], maid['rate']));
                    } else {
                        $('.bxslider').append('<li>' + makeMaidCard(i, maid['name'], maid['img'], maid['rate']) + '</li>');
                    }
                    $('a[href=#item2]').parent().removeClass('active');
                    $('a[href=#item3]').parent().addClass('active');
                    $('a[href=#item3]').parent().removeClass('disabled');
                });
                slider.reloadSlider();
                $('.maid-card').on('click', function () {
                    $('#confirm-maid').attr('data-content', data[$(this).attr('data-content')]['id']);
                    $('#rate').val(data[$(this).attr('data-content')]['rate']);
                    $('#confirm-maid').val(data[$(this).attr('data-content')]['name']);
                    $('#confirm-rate').val(data[$(this).attr('data-content')]['rate'] + '€/h');
                    $('#wrapper').scrollTo('#item4', 800);
                    $('a[href=#item3]').parent().removeClass('active');
                    $('a[href=#item4]').parent().addClass('active');
                    $('a[href=#item4]').parent().removeClass('disabled');
                });
            } else {
                $('#item3').find('#maid-display').hide();
                $('#item3').find('#no-maids').show();
            }
        }).error(function (data) {
            console.log(data);
        });
        $('#confirm-name').val($('#name').val());
        $('#confirm-phone').val($('#phone').val());
        $('#confirm-email').val($('#email').val());
        $('#confirm-address').val($('#address').val());
        $('#confirm-date').val($('#date').val());
        $('#confirm-from').val($('#from').val());
        $('#confirm-until').val($('#until').val());
    }
});
// cancel submit
$('#cancel').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        url: 'cancel',
        data: {
            token: $(location).attr('pathname').substr(8,$(location).attr('pathname').length)
        }
    }).done(function (data) {
        window.location='http://' + window.location.hostname;
    }).error(function (data) {
        console.log(data);
    });
});
// google map callback
function initMap() {
    autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('address')),
        {types: ['geocode']});
    autocomplete.addListener('place_changed', fillInAddress);
}
// custom html validation
function fillInAddress() {
    var place = autocomplete.getPlace();
    $.each(place.address_components, function (i, component) {
        components[component.types[0]] = component.long_name;
    });
    console.log($('#address'));
    if (components.street_number != undefined) {
        $('#address').each(function () {
            console.log(this);
            this.setCustomValidity('');
        });
        $('#address').val(components.route + ' ' + components.street_number + ', ' + components.locality + ', ' + components.administrative_area_level_1 + ', ' + components.country);
    }
    else {
        $('#address').each(function () {
            console.log(this);
            this.setCustomValidity('Address must be more percise');
        });
    }
}
// link on click scroll
$('a').click(function () {
    if($(this).parent().hasClass('disabled')){
        return false;
    }
    $('a').parent().removeClass('active');
    $(this).parent().addClass('active');

    current = $(this);

    $('#wrapper').scrollTo($(this).attr('href'), 800);

    return false;
});

$(window).resize(function () {
    resizePanel();
});
// full page handlerer
function resizePanel() {

    width = $(window).width();
    height = $(window).height();
    mask_width = width * $('.item').length;
    $('#debug').html(width + ' ' + height + ' ' + mask_width);
    $('#wrapper, .item').css({width: width, height: height});
    $('#mask').css({width: mask_width, height: height});
    $('#wrapper').scrollTo($('a.selected').attr('href'), 0);

}