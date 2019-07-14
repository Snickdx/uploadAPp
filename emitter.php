<?php
		
		function getState(){
			return json_decode(file_get_contents("state.json"));
		}

		// make session read-only
		session_start();
        session_write_close();

        // disable default disconnect checks
        ignore_user_abort(true);
		
		$state = getState();
		
		// set headers for stream
        header("Content-Type: text/event-stream");
        header("Cache-Control: no-cache");
        header("Access-Control-Allow-Origin: *");

        // Is this a new stream or an existing one?
        $lastEventId = floatval(isset($_SERVER["HTTP_LAST_EVENT_ID"]) ? $_SERVER["HTTP_LAST_EVENT_ID"] : 0);
        if ($lastEventId == 0) {
            $lastEventId = floatval(isset($_GET["lastEventId"]) ? $_GET["lastEventId"] : 0);
        }

		echo ":" . str_repeat(" ", 2048) . "\n"; // 2 kB padding for IE
		echo "retry: 2000\n";

		// start stream
		while(true){

			if(connection_aborted()){
				exit();
			}

			else{
				
				$newstate = getState();
				if($newstate != $state){
					$latestEventId = $lastEventId+1;
					$state = $newstate;
					echo "id: " . $latestEventId . "\n";
					echo "data: ".$state->num_uploads."\n\n";
					$lastEventId = $latestEventId;
					ob_flush();
					flush();
				}

			}

			sleep(10);

		}
			
?>