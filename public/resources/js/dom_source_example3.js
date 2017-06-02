/*global $, SyntaxHighlighter*/

var oTable;


$(document).ready(function () {
	'use strict';

	oTable = $('#example').dataTable({
		// "bStateSave": false
		"paging":   false,
        
        "info":     false,
		aLengthMenu: [
	        [25, 50, 100, 200, -1],
	        [25, 50, 100, 200, "20"]
	    ],
    iDisplayLength: -1
	}).yadcf([
	    {column_number : 0, filter_type: "text"},
	    {column_number : 1, filter_type: "multi_select", select_type: 'chosen'},
	    {column_number : 2, filter_type: "text"},
	    {column_number : 3, filter_type: "range_number"},
	    {column_number : 4, },
		{column_number : 5, filter_type: "text"},
		{column_number : 6, }]);
	SyntaxHighlighter.all();
});