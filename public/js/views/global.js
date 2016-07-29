// Any global JS settings can go here.

function blockUI() {
  $.blockUI({ message: '' });
}

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    var yOffset = window.pageYOffset;
    var xOffset = window.pageXOffset;
    window.location.hash = e.target.hash;
    window.scrollTo(xOffset, yOffset);
});

$(document).ready(function () {
    if($.trim(window.location.hash) != "") {
        $('.nav-tabs a[href="' + window.location.hash + '"]').click();
    }
});

$(document).on('hidden.bs.modal', function (e) {
    $(e.target).removeData('bs.modal');
});

$(document).on('blur', '[data-decimals]', function (event) {
  var decimals = $(this).attr('data-decimals');
  var dec_point = $(this).attr('data-decimal-char');
	var thousands_sep = $(this).attr('data-thousand-sep');
  var show_zero = $(this).attr('data-show-zero');

	if (typeof decimals === 'undefined') {
		decimals = 4;
	}
	
  if (typeof decimal_char === 'undefined') {
    decimal_char = '.';
  }
  if($(event.target).attr('type') == "number") {
    thousands_sep = '';
  }
	$(this).val(number_format($(this).val(), decimals, dec_point, thousands_sep, show_zero));
});

function number_format(number, decimals, dec_point, thousands_sep, show_zero) {
  //  discuss at: http://phpjs.org/functions/number_format/
  // original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: davook
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Theriault
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // bugfixed by: Michael White (http://getsprink.com)
  // bugfixed by: Benjamin Lupton
  // bugfixed by: Allan Jensen (http://www.winternet.no)
  // bugfixed by: Howard Yeend
  // bugfixed by: Diogo Resende
  // bugfixed by: Rival
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  //  revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  //  revised by: Luke Smith (http://lucassmith.name)
  //    input by: Kheang Hok Chin (http://www.distantia.ca/)
  //    input by: Jay Klehr
  //    input by: Amir Habibi (http://www.residence-mixte.com/)
  //    input by: Amirouche
  //   example 1: number_format(1234.56);
  //   returns 1: '1,235'
  //   example 2: number_format(1234.56, 2, ',', ' ');
  //   returns 2: '1 234,56'
  //   example 3: number_format(1234.5678, 2, '.', '');
  //   returns 3: '1234.57'
  //   example 4: number_format(67, 2, ',', '.');
  //   returns 4: '67,00'
  //   example 5: number_format(1000);
  //   returns 5: '1,000'
  //   example 6: number_format(67.311, 2);
  //   returns 6: '67.31'
  //   example 7: number_format(1000.55, 1);
  //   returns 7: '1,000.6'
  //   example 8: number_format(67000, 5, ',', '.');
  //   returns 8: '67.000,00000'
  //   example 9: number_format(0.9, 0);
  //   returns 9: '1'
  //  example 10: number_format('1.20', 2);
  //  returns 10: '1.20'
  //  example 11: number_format('1.20', 4);
  //  returns 11: '1.2000'
  //  example 12: number_format('1.2000', 3);
  //  returns 12: '1.200'
  //  example 13: number_format('1 000,50', 2, '.', ' ');
  //  returns 13: '100 050.00'
  //  example 14: number_format(1e-8, 8, '.', '');
  //  returns 14: '0.00000001'

  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  
  if(s.join(dec) == 0 && show_zero === 'false' ) {
    return '';  
  } else  {
    return s.join(dec);
  }
}

function updateDataTableLength(key, length) {
  blockUI();

  var request = $.ajax({
    method: "POST",
    url: urlDataTableUpdateLengthPost,
    cache: false,
    data: { key: key, length: length}
    });

  request.done(function( msg ) {
    $.unblockUI();

  });

  request.fail(function( jqXHR, textStatus ) {
    $.unblockUI();
    alert( "Request failed: " + textStatus );
  });

}

$(document).on('change', '.dataTables_length select', function() {
  updateDataTableLength('datatable.length', $(this).val());
});

//Adds CleanZone styles to DataTables
$(document).ready(function () {
  $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
  $('.dataTables_length select').select2({minimumResultsForSearch: 6});
  $('.md-modal').css("display", "block");  
});


function uniqueCallback(value, validator, $field, valueFunction, valid, message, passedMessage) {
    if(typeof(valueFunction) == "undefined") {
      valueFunction = function($field) {
        return $.trim($field.val()).toLowerCase();
      }
    }

    if(typeof(valid) == "undefined") {
      valid = true;
    }

    if(typeof(passedMessage) == "undefined") {
      passedMessage = validator.getOptions($field, 'callback', 'message');
    }

    if(typeof(message) == "undefined") {
      message = validator.getOptions($field, 'callback', 'message');
    }

    value = valueFunction($field);

    if(value == "") {
      return {
        valid: valid,
        message: passedMessage
      };
    }

    var count = 0;
    var elements = [];
    var countLast = 0;
    var elementsLast = [];

    if(typeof($field.attr('data-last-value')) == "undefined") {
        $field.attr('data-last-value', '');
    }

    var lastValue = $.trim($field.attr('data-last-value').toLowerCase());
    

    validator.$form.find('[name="' + $field.attr('name') + '"]').each(function (index, element) {
        var elemValue = valueFunction($(element));
        if(!$(element).is($field) 
          && value == elemValue) {
            elements[count] = $(element);
            count += 1;
        }

        if(!$(element).is($field)
            && lastValue != ''
            && lastValue == elemValue
            && lastValue != value) {
            elementsLast[countLast] = $(element);
            countLast += 1;
        }
    });

    $field.attr('data-last-value', value);

    if(countLast == 1) {
        validator.validateField(elementsLast[0]);
        validator.revalidateField(elementsLast[0]);
    }

    if(count == 0) {
      if(valid == false) {
        message = passedMessage;
      }
    } else if(count > 0) {
      for(var i = 0; i < count; i++) {
        validator.updateStatus(elements[i], 'callback', message);
        validator.updateStatus(elements[i], validator.STATUS_INVALID, 'callback');
      }

      if(valid == true) {
        valid = false;
      } else {
        message = passedMessage;
      }
    }

    return {
      valid: valid,
      message: message
    };
}

// $(document).on('click', '.md-trigger', function (event) {
//   var modalSelect = $(event.target.)
// }

// $('.icheck').iCheck();