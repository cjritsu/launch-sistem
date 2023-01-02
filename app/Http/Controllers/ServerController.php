<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ServerController extends BaseController {

	public function deploy() {

		SSH::into('production')->run(array(
		    'cd ~/public_html/sis',
		    'git pull origin master'
		), function($line){

		    echo $line.PHP_EOL; // outputs server feedback
		});
	/*
		@import('vendor/package/Envoy.blade.php')

		@servers(['localhost' => '127.0.0.1'])

		@story('deploy')
		    update-code
		@endstory

		@task('update-code')
		    cd /home/git/public_html/sis
		    git pull origin master
		@endtask
	*/
	}
}

