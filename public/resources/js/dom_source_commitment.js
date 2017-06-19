/*global $, SyntaxHighlighter*/

var oTable;


$(document).ready(function () {
	'use strict';

	oTable = $('#example').dataTable({
		"bStateSave": true
	}).yadcf([
	    {column_number : 0, filter_type: "text"},
	    {column_number : 1, filter_type: "multi_select", select_type: 'chosen'},
	    {column_number : 2, filter_type: "text"},
	    {column_number : 3, filter_type: "text"},
	    {column_number : 4, filter_type: "range_number"}
	    {column_number : 2, filter_type: "text"},
	    {column_number : 3, filter_type: "text"},
	    ]);

	SyntaxHighlighter.all();
});