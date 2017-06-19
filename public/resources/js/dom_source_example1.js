/*global $, SyntaxHighlighter*/

var oTable;


$(document).ready(function () {
	'use strict';

	oTable = $('#example').dataTable({

		"bStateSave": true

        
        //"info":     false,


	}).yadcf([

	    {column_number : 1, filter_type: "multi_select", select_type: 'chosen'}]);

	SyntaxHighlighter.all();
});