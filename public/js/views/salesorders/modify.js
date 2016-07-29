function laborCreateInit(event) {
	event.preventDefault();
	$('tr.labor-create-row').show();
	$('button.js-create-init').hide();
    
	laborCreate(event);
}

function laborCreate(event) {
	event.preventDefault();

	var row = $('tr.labor-create-row');
	var type = $(event.target).attr('data-type');

	blockUI();

	var request = $.ajax({
		method: "GET",
		url: urlLaborAjaxCreateRowGet.replace("_type_", type),
		cache: false,
	});
	
	request.done(function( html ) {
		row.before(html);
		row = row.prev();
		//Reactivate JQuery events on new HTML
		row.find('a').tooltip();
		row.find('.md-trigger').modalEffects();
		row.find('.select2').select2();
		if(row.attr("data-type") == "item") {
			// row.find('select.item').focus();
			// $('form#labor').formValidation('addField', row.find('select.item'));
			// $('form#labor').formValidation('addField', row.find('.parts'));
			// $('form#labor').formValidation('addField', row.find('.quantity'));
			// $('form#labor').formValidation('addField', row.find('.lot-number'));
		} else {
			// row.find('select.instruction-type').focus();
			// $('form#labor').formValidation('addField', row.find('select.instruction-type'));
			// $('form#labor').formValidation('addField', row.find('.instruction-description'));
			// $('form#labor').formValidation('addField', row.find('.instruction-comment'));
		}

		row.find('.js-batch-line-delete-row').click(function (event) {
			batchLineDeleteRow(event);
		});
		row.find('button.js-save-row').click(function (event) {
	        newItemRow = $(event.target).closest('tr');
	    });

		$.unblockUI();
	});

	request.fail(function( jqXHR, textStatus ) {
		$.unblockUI();
		alert( "Request failed: " + textStatus );
	});

}

function laborCreate(event) {
	event.preventDefault();

	var row = $('tr.labor-create-row');
	var type = $(event.target).attr('data-type');

	blockUI();

	var request = $.ajax({
		method: "GET",
		url: urlLaborAjaxCreateRowGet.replace("_type_", type),
		cache: false,
	});
	
	request.done(function( html ) {
		row.before(html);
		row = row.prev();
		//Reactivate JQuery events on new HTML
		row.find('a').tooltip();
		row.find('.md-trigger').modalEffects();
		row.find('.select2').select2();
			// row.find('select.item').focus();
			// $('form#batch-lines').formValidation('addField', row.find('select.item'));
			// $('form#batch-lines').formValidation('addField', row.find('.parts'));
			// $('form#batch-lines').formValidation('addField', row.find('.quantity'));
			// $('form#batch-lines').formValidation('addField', row.find('.lot-number'));
		

		row.find('.js-labor-delete-row').click(function (event) {
			laborDeleteRow(event);
		});
		row.find('button.js-save-row').click(function (event) {
	        newLaborRow = $(event.target).closest('tr');
	    });

		$.unblockUI();
	});

	request.fail(function( jqXHR, textStatus ) {
		$.unblockUI();
		alert( "Request failed: " + textStatus );
	});

}

function laborDeleteRow(event) {
	event.preventDefault();
	var row = $(event.target).closest('tr');

	/* Remove the inputs from formValidation */
    // $('form#batch-lines').formValidation('removeField', row.find('select.item'));
	// $('form#batch-lines').formValidation('removeField', row.find('.parts'));
	// $('form#batch-lines').formValidation('removeField', row.find('.quantity'));
	// $('form#batch-lines').formValidation('removeField', row.find('.lot-number'));
	

	row.remove();

	if($('table.labor tfoot tr').size() == 1) {
		$('tr.labor-create-row').hide();
		$('button.js-create-init').show();

	}
}

function batchLineCreateDone(event) {
	event.preventDefault();

	/* Revalidate the form fields */
	// $('form#labor').formValidation('revalidateField', $('table.labor tfoot tr select.item'));
	// $('form#labor').formValidation('revalidateField', $('table.labor tfoot tr .parts'));
	// $('form#labor').formValidation('revalidateField', $('table.labor tfoot tr .quantity'));
	// $('form#labor').formValidation('revalidateField', $('table.labor tfoot tr .lot-number'));
	// $('form#labor').formValidation('revalidateField', $('table.labor tfoot tr select.instruction-type'));
	// $('form#labor').formValidation('revalidateField', $('table.labor tfoot tr .instruction-description'));
	// $('form#labor').formValidation('revalidateField', $('table.labor tfoot tr .instruction-comment'));

	if ($('table.labor tfoot .has-error').size() > 0) {
		return;
	}

	$('tr.labor-create-row').hide();
	$('button.js-labor-create-init').show();
	
	blockUI();

	var labor = [];
	$('table.labor tfoot tr.labor-row').each(function(index, element) {
		labor[index] = {
			type: "labor",
			employee_id: '',
			date: '',
			quantity: '',
			rate_type: ''
		}
	});

	var request = $.ajax({
		method: "POST",
		url: urlLaborAjaxCreateRowsPost,
		data: {
			labor: labor
		},
		cache: false
	});

	request.done(function( html ) {

		/* Remove the inputs from formValidation */
		// $('form#batch-lines').formValidation('removeField', $('table.batch-lines tfoot tr select.item'));
		// $('form#batch-lines').formValidation('removeField', $('table.batch-lines tfoot tr .parts'));
		// $('form#batch-lines').formValidation('removeField', $('table.batch-lines tfoot tr .quantity'));
		// $('form#batch-lines').formValidation('removeField', $('table.batch-lines tfoot tr .lot-number'));
		// $('form#batch-lines').formValidation('removeField', $('table.batch-lines tfoot tr select.instruction-type'));
		// $('form#batch-lines').formValidation('removeField', $('table.batch-lines tfoot tr .instruction-description'));
		// $('form#batch-lines').formValidation('removeField', $('table.batch-lines tfoot tr .instruction-comment'));

		$('table.labor tfoot tr.labor-row').remove();

		tbody = $('table.batch-lines tbody').html(html);
		//Reactivate JQuery events on new HTML
		tbody.find('a').tooltip();
		tbody.find('.md-trigger').modalEffects();
		tbody.find('.js-labor-edit').click(function (event) {
			laborEdit(event);
		});
		tbody.find('.js-labor-delete-prep').click(function (event) {
			batchLaborDeletePrep(event);
		});

		updateLaborTotals()

		$.unblockUI();
	});

	request.fail(function( jqXHR, textStatus ) {
		$.unblockUI();
		alert( "Request failed: " + textStatus );

	});

}