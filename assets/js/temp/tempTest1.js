/****
Javascript	: temp/tempTest1.js
created	: 14-11-2015 23:46:28
By		: Gunawan Wibisono
Using 	: CI3 Main Model
 ****/

$(function () {
	$("#buah").autocomplete({
		source : urlSource,
		minLength : 2,
		select : function (event, ui) {
			console.log(event);
			console.log(ui);
		}
	});

	var availableTags = [
		"ActionScript",
		"AppleScript",
		"Asp",
		"BASIC",
		"C",
		"C++",
		"Clojure",
		"COBOL",
		"ColdFusion",
		"Erlang",
		"Fortran",
		"Groovy",
		"Haskell",
		"Java",
		"JavaScript",
		"Lisp",
		"Perl",
		"PHP",
		"Python",
		"Ruby",
		"Scala",
		"Scheme"
	];
	$("#tags").autocomplete({
		source : availableTags
	});
});
