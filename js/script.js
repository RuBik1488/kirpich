$(window).load(function() {
    $('#preloader_wrapper').fadeOut('300');
});

window.mobilecheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};

(function() {
  /**
   * Корректировка округления десятичных дробей.
   *
   * @param {String}  type  Тип корректировки.
   * @param {Number}  value Число.
   * @param {Integer} exp   Показатель степени (десятичный логарифм основания корректировки).
   * @returns {Number} Скорректированное значение.
   */
  function decimalAdjust(type, value, exp) {
    // Если степень не определена, либо равна нулю...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Если значение не является числом, либо степень не является целым числом...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Сдвиг разрядов
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Обратный сдвиг
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
  }

  // Десятичное округление к ближайшему
  if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
  }
  // Десятичное округление вниз
  if (!Math.floor10) {
    Math.floor10 = function(value, exp) {
      return decimalAdjust('floor', value, exp);
    };
  }
  // Десятичное округление вверх
  if (!Math.ceil10) {
    Math.ceil10 = function(value, exp) {
      return decimalAdjust('ceil', value, exp);
    };
  }
})();

/******** TABS  *********/
$(document).ready(function() {

	$('.left-menu-toogle').on('click',function(){
		$('#left-menu').slideToggle();
	});
	$(".tab_content").hide(); //Hide all content
	$(".tabs span:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	$(".tabs span").click(function() {

        $(".tabs span").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".tab_content").hide(); //Hide all tab content

        var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
        $(activeTab).fadeIn(0); //Fade in the active ID content
		return false;
    });

	$('.tabs_button_detail li').on('click', function(){
		var curTab = $(this);
		var id = curTab.attr('data-id');
		$('.tabs_button_detail li.active').removeClass('active');
		curTab.addClass('active');
		$('.yes_display').removeClass('yes_display').addClass('not_display').css('display', 'none');
		$(id).fadeIn('300', function(){
			$(id).addClass('yes_display').removeClass('not_display');

		})
	});

	if ( mobilecheck() ) {
		if( $('.mobile_scroll').length > 0 ) {
			var scrolling = $('.mobile_scroll').offset().top;
			$('body,html').animate({scrollTop: scrolling}, 0);
		}

		$('#left-menu ul.child-ul').addClass('ul-closed');
		$('#left-menu li.its_parent a.its_parent_link').on('click', function(event){
			event.preventDefault();
			if ( $(this).parent().hasClass('selected')) {
				$('#left-menu ul.child-ul').addClass('ul-closed');
				$(this).parent().removeClass('selected');
			} else {
				$('#left-menu ul.child-ul').addClass('ul-closed');
				$('#left-menu li.selected').removeClass('selected');
				$(this).parent().addClass('selected');
				$(this).parent().find('ul').removeClass('ul-closed');
			}
		});
	}

});


// BACK TOP
$(document).ready(function(){
    $("#edit-qty-wrapper .count_plus").on('click', function () {
        var step = parseFloat($(this).attr('data-count')),
            curVal = parseFloat($("#edit-qty").attr("data-qty")),
            quantity = curVal + step,
            id = $("#edit-qty-wrapper #detail_id_item").val();
        detailCount(quantity, id);
    });

    $("#edit-qty-wrapper .count_minus").on('click', function () {
        var step = parseFloat($(this).attr('data-count')),
            curVal = parseFloat($("#edit-qty").attr("data-qty")),
            quantity = curVal - step,
            id = $("#edit-qty-wrapper #detail_id_item").val();
        if (quantity < 1) {
            return false;
        }
        detailCount(quantity, id);
    });

   /* $("#edit-qty-wrapper #edit-qty").on('blur', function () {
        var step = $(this).attr('data-step'),
            quantity = $(this).val(),
            id = $("#edit-qty-wrapper #detail_id_item").val();
        if (quantity < 1) {
            return false;
        }
        detailCount(quantity, id);
    });*/

	$('#sort_products').on('change', function(event) {
		event.preventDefault();
		$('#sort_type_input').val('asc');
		$('#sorts_form').submit();
	});

	$('.order-type-sort').on('click', function(event) {
		event.preventDefault();
		var sort = $(this).attr('data-sort');
		$('#sort_type_input').val(sort);
		$('#sorts_form').submit();
	});

	$('.city-area select').on('change', function(){
		var obj = $(this);
		var name = obj.find('option:selected').text();
		var phone = obj.val();
		$.get(
        	'/ajax/geo.php',
			{
				'city': name,
				'TYPE_REQUEST': 'new_geo'
			},
        	function(data) {
        		var phone_href = phone.replace(/[+()-]|[ ]/g,"");
				$('.main-top-phone span, .footer-phone span').html('<a href="tel:+'+phone_href+'">'+phone+'</a>');
				$('.main-top-phone img, .footer-phone img').attr('alt', 'Наш телефон: '+phone);

        	},
        	'json'
    	);

	});

	ajax_geo();

	$("a#back-top").hide();
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 500) {
				$('a#back-top').fadeIn();
			} else {
				$('a#back-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('a#back-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});


});

function detailCount(quantity, id)
{
	quantity = Math.floor10(quantity, -1);
    $.post(
        '/ajax/cart_in_detail.php',
        {
            'id': id,
            'quantity': quantity
        },
        function(data) {
            var maxSht = $("#edit-qty").attr("data-sht");
            if (maxSht != "" && maxSht > quantity) {
                $('p.norma-inform').slideDown();
            } else {
                $('p.norma-inform').slideUp();
            }
            $('.poddon_count').text(number_format(quantity, 2, '.', ' '));
            $('#outprc b').text(data.total_price);
            $('.addCartButton').attr('data-poddon', quantity);
            $("#edit-qty").attr("data-qty", quantity).val(number_format(quantity, 2, '.', ' '));
            $("#get_kredit_form").attr({'data-sign': data.sign, 'data-order': data.base64});
            //доставка
            var total_sum = $('#priceform').val();
            $('#plus_price_val').html(number_format(parseInt(total_sum)/quantity, 2, '.', ' '));
        },
        'json'
    );
}

function NOGEO_modal_content(text)
{
	$.fancybox.open([
        	{
			content		: text,
			maxWidth	: 1000,
			maxHeight	: 700,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'fade',
			scrolling 	: 'no',
			topRatio	: '0.08',
			leftRatio	: '0.35',
			helpers : {
				overlay : null
    			},
			afterShow: function () {
				ajax_select_geo();
			}
	        }
	]);
}

function INSOLUT_modal_content(text){
	$.fancybox.open([
        	{
			content		: text,
			maxWidth	: 1000,
			maxHeight	: 700,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'fade',
			scrolling 	: 'no',
			helpers : {
				overlay : null
    			},
			afterShow: function () {
				ajax_geo();
			}
	        },
	]);
}
function ajax_select_geo() {
	$('.select-city-user li').on('click', function(){
		var name = $(this).text();
		$.get(
        	'/ajax/geo.php',
			{
				'city': name,
				'TYPE_REQUEST': 'yes_geo'
			},
        	function(data) {
				location.reload();
        	},
        	'json'
    	);
	});
}
function ajax_geo() {
	$('#yes_geo').on('click', function(){
		var name = $('.cityQuestionPanel #city').text();
		$.get(
        	'/ajax/geo.php',
			{
				'city': name,
				'TYPE_REQUEST': 'yes_geo'
			},
        	function(data) {
				location.reload();
        	},
        	'json'
    	);
	});
	$('#no_geo').on('click', function(){
		if ( $('#city-select').length > 0 ) {
			var text = $('#city-select').html();
			$('.cityQuestionPanel').css('display', 'none');
			NOGEO_modal_content(text);
		}
	});
}

function number_format( number, decimals, dec_point, thousands_sep ) {	// Format a number with grouped thousands
    //
    // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +	 bugfix by: Michael White (http://crestidg.com)

    var i, j, kw, kd, km;

    // input sanitation & defaults
    if( isNaN(decimals = Math.abs(decimals)) ){
        decimals = 2;
    }
    if( dec_point == undefined ){
        dec_point = ",";
    }
    if( thousands_sep == undefined ){
        thousands_sep = ".";
    }

    i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

    if( (j = i.length) > 3 ){
        j = j % 3;
    } else{
        j = 0;
    }

    km = (j ? i.substr(0, j) + thousands_sep : "");
    kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
    //kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
    kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");
    if(kd[2]==0) { kd = kd.slice(0, -1); }
    if(kd[1]==0) { kd = kd.slice(0, -2); }
    //alert(kd);

    return km + kw + kd;
}
// GET_CONTACTS
$(document).ready(function() {
	$("#get_kp_button").fancybox(
		{
			href: '#form-inner',
			maxWidth	: 1000,
			maxHeight	: 700,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'fade',
			scrolling 	: 'no',
		}
	);
	$('.fast_order').fancybox(
        {
            href: '#fast_order_form',
            maxWidth	: 1000,
            maxHeight	: 700,
            fitToView	: false,
            width		: '70%',
            height		: '70%',
            autoSize	: true,
            closeClick	: false,
            openEffect	: 'none',
            closeEffect	: 'fade',
            scrolling 	: 'no',
            beforeShow  : function() {
                $('#fast_order_form span.order-count').html($('#edit-qty').val() + ' x ');
                $('#item_count').val($('#edit-qty').val());
                $('#fast_order_form form').on('submit', function(e) {
                    e.preventDefault();
                    var form = $(this),
                        url = form.attr("action"),
                        btn = form.find('input[type="submit"]'),
                        sendData = form.serialize();
                    btn.prop('disabled', 'true');
                    $.post(
                        url,
                        sendData,
                        function(data) {
                            $('#fast_order_form').html('<h2 style="text-align:center;">' + data + '</h2>');
                            btn.removeAttr('disabled');
                        },
                        'html'
                    );
                });
            }
        }
    );
});
$(document).ready(function() {
	$("#get_kp_button2").fancybox(
		{
			href: '#form-inner',
			maxWidth	: 1000,
			maxHeight	: 800,
			fitToView	: false,
			width		: '70%',
			height		: '75%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'fade',
			scrolling 	: 'no',
		}
	);
});
$(document).ready(function() {
	$("#callback").fancybox(
		{
			href: '#callback-inner',
			maxWidth	: 1000,
			maxHeight	: 700,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'fade',
			scrolling 	: 'no',
		}
	);
    $(".price-guarantee a.highslide-form").fancybox(
        {
			href		: "#webform-best-price",
            maxWidth	: 1000,
            maxHeight	: 700,
            fitToView	: false,
            width		: '70%',
            height		: '70%',
            autoSize	: true,
            closeClick	: false,
            openEffect	: 'none',
            closeEffect	: 'fade',
            scrolling 	: 'no',
        }
    );
});

