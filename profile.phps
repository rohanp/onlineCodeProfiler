<?php
	$fname = substr(hash("md5", $_POST["top_code"] . time() . "SALT"),-5);
        $pyx_name = "c" . $fname . ".pyx";
	$py_name = "p" . $fname . ".py";       

        chdir("scripts");
        mkdir($fname);
        chdir($fname);
	exec("cp ../../print_profile.py . ");
	exec("cp ../../cython_profiler.py . ");

	$pyx_file = fopen($pyx_name, "w");
	fwrite($pyx_file, $_POST["top_code"]);
        $py_file = fopen($py_name, "w");
        fwrite($py_file,  $_POST["bot_code"]);
       
       	exec("chmod a+x+w+r *");
	exec("python3 -m cProfile -o bot_profile.prof -s tottime " . $py_name);

	$cython_profile = shell_exec("python cython_profiler.py " . 'c' . $fname . " 2>&1" );
	$python_profile =  shell_exec("python3 print_profile.py 2>&1");
	$a = array($cython_profile, $python_profile);
	$json = json_encode($a);

	echo $json;



?>
