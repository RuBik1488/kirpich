// =============================================================================
// HELPERS //
// =============================================================================
function is_array(mixed_var) {
  return (mixed_var instanceof Array);
}
function empty(mixed_var) {
  return ((typeof(mixed_var) === "undefined") || mixed_var === undefined || mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null  || mixed_var === false  || ( is_array(mixed_var) && mixed_var.length === 0 ));
}
function implode( glue, pieces ) {
  return ((pieces instanceof Array) ? pieces.join (glue) : pieces);
}
// =============================================================================
$(document).ready(function () {
// =============================================================================
google.maps.event.addDomListener(window, 'load', function (){
  var options = {
    types: ['(cities)'],
    componentRestrictions: {country: "ru"}
  };
  var from = document.getElementById('from');
  var where = document.getElementById('where');
  // console.log(google);
  var autocomplete = new google.maps.places.Autocomplete(from, options);
  var autocomplete2 = new google.maps.places.Autocomplete(where, options);
    //main//google.maps.event.addListener(autocomplete, 'place_changed', recalc);
    //main//google.maps.event.addListener(autocomplete2, 'place_changed', recalc);
});
var service = new google.maps.DistanceMatrixService();
//main//$("#from, #where, #volume, #kind").on('change', recalc);
// =============================================================================
$('select').each(function () {
  $(this).siblings('p').text($(this).children('option:selected').text());
});
$('select').change(function () {
  $(this).siblings('p').text($(this).children('option:selected').text());
});
//
$('a.popupp').click(function (e) {
  e.preventDefault();
  $('#popupp').bPopup({
    closeClass: 'close-popup', amsl: 0
  });
})
// =============================================================================
/* window thanks */
$('.send-form').submit(function () {
  var formData = $(this).serialize(); //new FormData($('form')[0]);
  $('#tel, #tel-two, #tel-three, #name, #name-two, #name-three, #mail-two').val('');
  $.ajax({
    url: $(this).attr('action'),
    type: 'POST',
    data: formData,
    cache: false,
    dataType: 'json',
    success: function (res) {
      if (res.success == 1) {
        $('#popupp').bPopup().close();
        $('#okthanks').bPopup({
          closeClass: 'close-popup',
          amsl: 0
        });
        setTimeout(function () {
          $('#okthanks').bPopup().close();
        }, 6000);
      }
      else {
        alert(res.text);
      }
    },
  });
  return false;
});
// =============================================================================
$(document).ready(function () {
  $(".pricepu").click(function () {
    $(".pricepu").addClass("hideblock");
  });
});
// =============================================================================
/**
 *
 */
function callback(response, status) {
  var option = parseInt(jQuery('#kind').val());
  var volume = parseInt(jQuery("input[name='dimension']:checked").val());
  var distance = 0;
  var total_sum = 0;
  //
  var errs = [];
  var errsImportant = [];
  //
  // Step 1: Messing up with distance
  if (response.rows[0].elements[0].status == "OK") {
    distance = Math.round(response.rows[0].elements[0].distance.value / 1000);
    distance = parseInt(distance);
    jQuery('#distance').html(number_format(distance, 0, '.', ' ') + ' км');
    //jQuery('#distanceform').val(distance);
  } else {
    // errs.push("Ошибка в подсчете дистанции. Google maps API вернул код ошибки: " + response.rows[0].elements[0].status);
    errsImportant.push("Ошибка в подсчете дистанции по Google maps API");
  }
  console.log('response.rows[0].elements[0].status:' + response.rows[0].elements[0].status);
  //

  if (isNaN(option)) {
    errs.push('Не указан тип грузового транспорта!');
  }
  if (isNaN(volume)) {
    errs.push('Не указан объем груза!');
  }
  // Step 4: Finalizing our calculations
  if (errs.length == 0) {
    if (errsImportant.length == 0) {
      total_sum = distance * typelist[option].price;
      //
      if (typelist[option].useVolumeCoefficient == 1) {
        total_sum *= volumeCoefficients[volume];
        console.log('volumeCoefficients[volume]: ' + volumeCoefficients[volume]);
      }
      if (typelist[option].useDistanceCoefficient == 1) {
        var distanceCoefficient = 1;
        for (distanceFrom in distanceCoefficients) {
          if (!distanceCoefficients.hasOwnProperty(distanceFrom)) continue;
          if (distance > distanceFrom) {
            distanceCoefficient = parseFloat(distanceCoefficients[distanceFrom]);
          } else {
            break;
          }
        }
        total_sum *= distanceCoefficient;
        //
        console.log('distanceCoefficient: ' + distanceCoefficient);
      }
      //
        jQuery('#price').html(number_format(parseInt(total_sum), 2, '.', ' ') + ' <i class="fa fa-rub" aria-hidden="true"></i>');
      //jQuery('#priceform').val(parseInt(total_sum));
      $(".pricepu").removeClass("hideblock");
      //
      console.log('response.rows[0].elements[0].distance');
      console.log(response.rows[0].elements[0].distance);
    } else {
      // alert(errsImportant.join("\r\n"))
    }
  }
}
// =============================================================================
function recalc(){
  var from = document.getElementById('from').value;
  var where = document.getElementById('where').value;
  if (!empty(from) && !empty(where)) {
    if (where.length > 2) {
      service.getDistanceMatrix({
          origins: [from],
          destinations: [where],
          travelMode: google.maps.TravelMode.DRIVING,
          avoidHighways: false,
          avoidTolls: false
        }, callback);
    }
  }
}
// =============================================================================
$(".form-one-bottom input[type='submit']").click(function (e) {
  var errors = '';
  if ($('#priceform').val() == '') {
    errors += "Заполните форму расчета стоимости доставки.\r\n";
  }
  if ($('#name-two').val() == '') {
    errors += "Введите ваше имя.\r\n";
  }
  if (($('#tel-two').val() == '') && ($('#mail-two').val() == '')) {
    errors += "Введите телефон и/или e-mail.\r\n";
  }
  if (errors != '') {
    alert(errors);
    e.preventDefault();
  }
});

$(".cal_sub input[type='submit']").click(function (e) {
  recalc();
  jQuery('#get-in').html((jQuery("#from").val()));
  jQuery('#get-out').html((jQuery("#where").val()));
  jQuery('#get-weight').html((jQuery("input[name='dimension']:checked").attr('data-val')));
  return false;
});
// =============================================================================
});