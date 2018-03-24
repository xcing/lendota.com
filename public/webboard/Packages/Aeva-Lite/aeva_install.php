<?php
/********************************************************************************
* aeva_install.php v7
* By Rene-Gilles Deberdt & Karl Benson
*********************************************************************************
* This program is distributed in the hope that it is and will be useful, but
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY
* or FITNESS FOR A PARTICULAR PURPOSE.
********************************************************************************/

global $db_prefix, $language, $smcFunc;

// If SSI.php is in the same place as this file, and SMF isn't defined, this is being run standalone.
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
// Hmm... no SSI.php and no SMF?
elseif (!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

$update = array(
	'aeva_enable' => 1, // Enabled by default
	'aeva_lookups' => 1,
	'aeva_max_per_post' => 12,
	'aeva_max_per_page' => 12,
	'aeva_yq' => 0,
	'aeva_titles' => 0,
	'aeva_inlinetitles' => 1,
	'aeva_noscript' => 0,
	'aeva_expins' => 1,
	'aeva_quotes' => 0,
	'aeva_incontext' => 1,
	'aeva_fix_html' => 1,
	'aeva_includeurl' => 1,
	'aeva_debug' => 0,
	'aeva_adult' => 0,
	'aeva_nonlocal' => 0,
	'aeva_mp3' => 0,
	'aeva_flv' => 0,
	'aeva_avi' => 0,
	'aeva_divx' => 0,
	'aeva_mov' => 0,
	'aeva_wmp' => 0,
	'aeva_real' => 0,
	'aeva_swf' => 0,
);

if (isset($smcFunc))
{
	foreach ($update as $name => $value)
		$smcFunc['db_insert']('ignore', $db_prefix . 'settings', array('variable' => 'string', 'value' => 'string'), array($name, $value), '');

	$smcFunc['db_query']('', "DELETE FROM {db_prefix}settings WHERE (variable LIKE 'aevac_%') OR (variable IN ('aeva_quicktime', 'aeva_windowsmedia', 'aeva_realmedia', 'aeva_flash', 'aeva_youtube', 'aeva_ytitles', 'aeva_hq', 'aeva_quality', 'aeva_nossi', 'aeva_copyright'))");
}
elseif (function_exists('mysql_query'))
{
	foreach ($update as $name => $value)
		mysql_query("INSERT IGNORE INTO {$db_prefix}settings (variable, value) VALUES ('$name', '$value')");

	mysql_query("DELETE FROM {$db_prefix}settings WHERE (variable LIKE 'aevac_%') OR (variable IN ('aeva_quicktime', 'aeva_windowsmedia', 'aeva_realmedia', 'aeva_flash', 'aeva_youtube', 'aeva_ytitles', 'aeva_hq', 'aeva_quality', 'aeva_nossi', 'aeva_copyright'))");
}

// If we're using SSI, tell them we're done
if (SMF == 'SSI')
	echo 'Database changes are complete!';

?>