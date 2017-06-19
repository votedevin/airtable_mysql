/*global $, SyntaxHighlighter*/

var oTable;


$(document).ready(function () {
	'use strict';

	oTable = $('#example').dataTable({
		//"bStateSave": true
		"paging":   false,
        
        "info":     false,
		aLengthMenu: [
	        [20, 50, 100, 200, -1],
	        [20, 50, 100, 200, "50"]
	    ],
    iDisplayLength: -1
	}).yadcf([
]);
	SyntaxHighlighter.all();
});