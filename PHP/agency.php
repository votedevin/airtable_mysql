<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Artists</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" media="all" href="stylesheet.css" />		
	</head>

	<body>	
	
		<div class="page-wrapper">
	
			<div class="header-wrapper">	
				<h1>Artists</h1>
			</div>
		
			<div class="content-wrapper">
		
				<ul>
		
					<?php
						//dbconnet
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "ny_airtbale";
						$sql = '';

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);

						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						} 
						echo "Connected successfully";

						$sql = "TRUNCATE TABLE projects;";

						if ($conn->query($sql) === TRUE) {
						    echo "New record created successfully";
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}




					
						// Load the settings.
						require_once ( 'settings.php' );
					
						// Initialize a curl session.
						$ch = curl_init();
						
						// Specify the type of HTTP request that we'll be sending.
						// In this case, we'll be sending GET requests.
						curl_setopt( $ch, CURLOPT_HTTPGET, 1 );		
						
						// Request that the raw output be returned.
						curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );	
						
						// Specify a timeout value (in seconds).
						curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );

						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	
						
						// Create an array to use to pass parameters via HTTP headers.
						$http_headers = array();						
						
						// We need to pass the AirTable API key as an HTTP header, so add it to the array.
						$http_headers[] = 'Authorization: Bearer ' . AIRTABLE_API_KEY;		
						
						// Specify the HTTP headers to send.
						curl_setopt( $ch, CURLOPT_HTTPHEADER, $http_headers );																						

						// Initialize the offset.
						$offset = '';
	
						// Make calls to Airtable, until all of the data has been retrieved...
						while ( ! is_null ( $offset ) ) {
		
							// Create the URL to use to get the next batch of records.
							// Here's the base URL, composed of the API URL
							// and the Airtable base's ID.
							$airtable_url = AIRTABLE_API_URL . AIRTABLE_APP_ID;
							// We're also specifying a table.
							$airtable_url .= '/projects';
							// And we're specifying a view. The API will honor any filters 
							// that have been applied to the view, as well as any sort
							// order that has been applied to it.
							$airtable_url .= '?api_key=' . AIRTABLE_API_KEY;
							// By default, the APi will return 100 records per request.
							// You can specify smaller batch sizes using the "limit"
							// query parameter, as we are here.																					
							$airtable_url .= '&limit=10';
							// We're using an offset to get specific batches of records.
							$airtable_url .= '&offset=' . $offset;							
							// We're also specifying a sort order for the request,
							// which will override any sort order that has been 
							// applied on the view.
							$airtable_url .= '&sortField=projectid&sortDirection=asc';
							
							// Specify the URL to call.
							curl_setopt( $ch, CURLOPT_URL, $airtable_url );		
									
							// Execute the request.
							$response_json = curl_exec( $ch );
		
							// If there was a curl error encountered while making the call...
							if ( curl_errno( $ch ) != 0 ) {
		
								// Show an error message with the CURL error code.
								// For a complete list of error codes, see:
								// http://curl.haxx.se/libcurl/c/libcurl-errors.html 
								echo '<h2>CURL Error</h2>';
								echo 'Code: ' . curl_errno( $ch );
								die;
		
							} 
		
							// Decode the JSON-formatted response that was received from the Airtable API.
							$airtable_response = json_decode( $response_json, TRUE );
		
							// If the Airtable API returned an error...
							if ( array_key_exists ( 'error', $airtable_response ) ) {
		
								// Show an error message.
								echo '<h2>Airtable Error</h2>';
								echo 'Type: ' . $airtable_response['error']['type'] . '<br />';
								echo 'Message: ' . $airtable_response['error']['message'] . '<br />';
								die;			
		
							}

							$sql = '';
							$projects = '';
							$commitments ='';
	
							// Loop over the records received from this request...
							foreach ( $airtable_response['records'] as $record ) {
					
								// Add each artist to the list, wrapped with a URL to the details page.
								// Note that we're passing the Airtable-assigned record ID.
								echo '<li>';
								echo '<a href="artist.php?id=' . $record['id'] . '">';
								echo $record['fields']['projectid'] . '</a>';
								echo '</li>';
						
								$managingagency = implode(",", $record['fields']['managingagency']);
								$commitments = implode(",", $record['fields']['commitments']);

								$sql = "INSERT INTO projects (projects_record_id, projectid, description, citycost, noncitycost, totalcost, managingagency, commitments, createtime)
								VALUES ( '{$record['id']}', '{$record['fields']['projectid']}', '{$record['fields']['description']}', '{$record['fields']['citycost']}', '{$record['fields']['noncitycost']}', '{$record['fields']['totalcost']}', '{$managingagency}', '{$commitments}', '{$record['createdTime']}');";
								

								if ( $conn->query($sql) === TRUE) {
								    echo "New record created successfully";
								} else {
								    echo "Error: " . $sql . "<br>" . $conn->error;
								}
							}

							// Adjust the offset.
							// Airtable returns NULL when the final batch of records has been returned.
							
								$offset = $airtable_response['offset'];

						}

						$conn->close();
						// Close the curl session.
						curl_close( $ch );


		
					?>				
	
				</ul>
		
			</div>
		
		</div>
		
	</body>
	
</html>