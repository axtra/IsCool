<?php

error_reporting(E_ALL);

pake_desc('Run a batch');
pake_task('run', 'project_exists');

/**
 * Enter description here...
 *
 * @param pakeTask $task 
 * @param array    $args 
 */

function run_run($task, $args) {

	if (empty($args[0])) {
		throw new sfException('Missing batch name');
	}
	
	if (!defined('SF_ROOT_DIR')) {
		// Get SF_ROOT_DIR from config
		define('SF_ROOT_DIR', sfConfig::get('sf_root_dir'));
	}
	
	$batchName = SF_ROOT_DIR.'/batch/'.$args[0].'.php';
	
	if (!file_exists($batchName)) {
		throw new sfException('Can\'t find batch file : '.$batchName);
	}

	// Parse arguments
	$argv = array();
	for ($i = 1; $i < $_SERVER["argc"]; $i++) {
		if ($_SERVER["argv"][$i]{0} === '-') {
			// This is an option (-x or --x)
			
			// Find the value for this option or true is not present
			$value =  (
				isset($_SERVER["argv"][$i+1]) 
				&& 
				$_SERVER["argv"][$i+1]{0} !== '-'
				?
				$_SERVER["argv"][$i+1]
				:
				true
			);
			
			if ($_SERVER["argv"][$i]{1} === '-') {
				// This is a long option (--x)
				$argv[substr($_SERVER["argv"][$i], 2)] = $value;
			}
			else {
				// This is a short option (-x)
				// We can have multiple short option in one string (-xyz)
				foreach (str_split($_SERVER["argv"][$i]) as $arg) {
					if (ereg('[a-zA-Z0-9]', $arg)) {
						// Option must be alphanumeric
						$last_arg   = $arg;
						$argv[$arg] = true;
					}
				}
				
				// Only the last option can have a value (-xyz value => z=value)
				$argv[$last_arg] = $value;
			}
		}
	}
	
	// Define symfony constents
	define('SF_APP',         (isset($argv['app'])?$argv['app']:'frontend'));
	define('SF_ENVIRONMENT', (isset($argv['env'])?$argv['env']:'prod'));
	define('SF_DEBUG',       (isset($argv['debug'])?1:0));
	
	if (!is_dir(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP)) {
		// Invalid application
		throw new sfException(sprintf('Application %s does not exist in the project', SF_APP));
	}
	
	// Include basics
	require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');
	
	if (isset($argv['module'])) {
		// Execute a module from command line
		
		// Emulate request parameters
		foreach ($argv as $arg => $value) {
			sfContext::getInstance()->getRequest()->setParameter($arg, $value);
		}

		// Call the module
		return sfContext::getInstance()->getController()->forward(
			$argv['module'],
			(isset($argv['action'])?$argv['action']:'index')
		);
		
	}
	else {
		// Execute a batch
		require_once($batchName);
	}
}
?>