$(function() {
	'use strict'
	
	// Toggle Switches
	$(document).on('click','.main-toggle', function() {
		$(this).toggleClass('on');
	})
	
	// Input Masks
	$('#dateMask').mask('99/99/9999');
	$('#phoneMask').mask('(999) 999-9999');
	$('#phoneExtMask').mask('(999) 999-9999? ext 99999');
	$('#ssnMask').mask('999-99-9999');
	
	
	// Color picker
	if($('#colorpicker').length>0){
		$('#colorpicker').spectrum({
			color: '#17A2B8'
		});
	}
	
	// transparency selection
	if($('#showAlpha').length>0){
		$('#showAlpha').spectrum({
			color: 'rgba(23,162,184,0.5)',
			showAlpha: true
		});
	}
	
	//Palettes selection 
	if($('#showPaletteOnly').length>0){
		$('#showPaletteOnly').spectrum({
			showPaletteOnly: true,
			showPalette: true,
			color: '#DC3545',
			palette: [
				['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
				['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
			]
		});
	}
	
	
	// Fc-datepicker
	if($('.fc-datepicker').length>0){
		$('.fc-datepicker').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true
		});
	}

	if($('.fc-datepicker2').length>0){
		$('.fc-datepicker2').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			minDate: 0
		});
	}
	
	// Datepicker no of months
	if($('#datepickerNoOfMonths').length>0) {
		$('#datepickerNoOfMonths').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			numberOfMonths: 2
		});
	}
	
	// Rangeslider1
	/*$('.rangeslider1').ionRangeSlider();
	
	// Rangeslider2
	$('.rangeslider2').ionRangeSlider({
		min: 100,
		max: 1000,
		from: 550
	});
	
	// Rangeslider3
	$('.rangeslider3').ionRangeSlider({
		type: 'double',
		grid: true,
		min: 0,
		max: 1000,
		from: 200,
		to: 800,
		prefix: '$'
	});
	
	// Rangeslider4
	$('.rangeslider4').ionRangeSlider({
		type: 'double',
		grid: true,
		min: -1000,
		max: 1000,
		from: -500,
		to: 500,
		step: 250
	});*/
	
	// Filebrowser
	$(document).on('change', ':file', function() {
	var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	input.trigger('fileselect', [numFiles, label]);
	});

	// We can watch for our custom `fileselect` event like this
	$(document).ready( function() {
	  $(':file').on('fileselect', function(event, numFiles, label) {

		  var input = $(this).parents('.input-group').find(':text'),
			  log = numFiles > 1 ? numFiles + ' files selected' : label;

		  if( input.length ) {
			  input.val(log);
		  } else {
			  if( log ) alert(log);
		  }

	  });
	});
	
	
	//Date picker
	if($('#datepicker-date').length>0) {
		$('#datepicker-date').bootstrapdatepicker({
			format: "dd-mm-yyyy",
			viewMode: "date",
			multidate: true,
			multidateSeparator: "-",
		})
	}
	
	//Month picker
	if($('#datepicker-month').length>0) {
		$('#datepicker-month').bootstrapdatepicker({
			format: "MM",
			viewMode: "months",
			minViewMode: "months",
			multidate: true,
			multidateSeparator: "-",
		})
	}
	
	//Year picker
	if($('#datepicker-year').length>0) {
		$('#datepicker-year').bootstrapdatepicker({
			format: "yyyy",
			viewMode: "year",
			minViewMode: "years",
			multidate: true,
			multidateSeparator: "-",
		})
	}
// AmazeUI Datetimepicker
	if($('#datetimepicker').length>0) {
		$('#datetimepicker').datetimepicker({
			format: 'yyyy-mm-dd hh:ii:ss',
			autoclose: true
		});
	}
	
	
	
	
});