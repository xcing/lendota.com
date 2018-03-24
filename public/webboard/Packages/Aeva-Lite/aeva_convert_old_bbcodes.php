<?php
/********************************************************************************
* aeva_convert_old_bbcodes.php v1.01, by Karl Benson							*
*********************************************************************************
* For SMF: Simple Machines Forum												*
* MYSQL USERS ONLY																*
* ==============================================================================*

Clears up and converts old bbcode for video clips to normal links.
The clips should then get caught by Aeva.
It works for various formats that have been mods in the SMF mod site:

[youtube], [yt], [ytplaylist], [stage6], [metacafe], [googlevid], [gv], [google_video],
[gvideo], [dailymotion], [livevideo], [liveleak], [myvideo], [clipfish], [veoh]

This includes bbcode of type [youtube=234,343][/youtube] for all.

Use this at your own risk. This can not be undone.
Backup your database and files completely before using this script.
Upload it to your SMF root folder, run it once and you're done.

This program is distributed in the hope that it is and will be useful, but
WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY
or FITNESS FOR A PARTICULAR PURPOSE.

********************************************************************************/

$version = '1.01';

@set_magic_quotes_runtime(0);
error_reporting(E_ALL);
if (@ini_get('session.save_handler') == 'user')
	@ini_set('session.save_handler', 'files');
@session_start();

// get_magic_quotes_gpc doesn't exist in PHP6
if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc() == 1)
{
	foreach ($_POST as $k => $v)
		$_POST[$k] = stripslashes($v);
}

// All the stats need to be numbers
foreach ($_GET as $k => $v)
	$_GET[$k] = (int) $v;

// PHP4 compatible functions
if (!function_exists('stripos'))
{
	function stripos($haystack, $needle, $offset = 0)
	{
		return strpos(strtolower($haystack), strtolower($needle), $offset);
	}
}

function un_htmlspecialchars($string)
{
	return strtr($string, array_flip(get_html_translation_table(HTML_SPECIALCHARS, ENT_QUOTES)) + array('&#039;' => '\'', '&nbsp;' => ' '));
}

if (isset($_GET['paths']))
	step3();

show_header();

if (isset($_POST['path']))
	step2();
else
	step1();

show_footer();

function step1($error_message = '')
{
	if (file_exists(dirname(__FILE__) . '/Settings.php'))
		include_once(dirname(__FILE__) . '/Settings.php');
	else
	{
		echo '
					<div class="error_message">
						Settings.php was not found. Please ensure this file is in your root SMF folder.
					</div>';
		return false;
	}

	if ($error_message != '')
		echo '
					<div class="error_message">
						', $error_message, '
					</div>';

	if (empty($maintenance))
		echo '
					<div class="error_message">
						Your forum must be in maintenance mode before beginning this process.
					</div>';
	else
		echo '
				<div class="panel">
					<form action="', $_SERVER['PHP_SELF'], '?step=2" method="post">
						<h2>MySQL connection details</h2>
						<h3>Ensure your database details below are correct (these are pulled from Settings.php, so they should be).</h3>

						<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 2ex;">
							<tr>
								<td width="20%" valign="top" class="textbox"><label for="db_server">MySQL server name:</label></td>
								<td>
									<input type="text" name="db_server" id="db_server" value="', $db_server, '" size="30" /><br />
									<div style="font-size: smaller; margin-bottom: 2ex;">This is nearly always localhost - so if you don\'t know, try localhost.</div>
								</td>
							</tr><tr>
								<td valign="top" class="textbox"><label for="db_user">MySQL username:</label></td>
								<td>
									<input type="text" name="db_user" id="db_user" value="', $db_user, '" size="30" /><br />
									<div style="font-size: smaller; margin-bottom: 2ex;">Fill in the username you need to connect to your MySQL database here.<br />If you don\'t know what it is, try the username of your ftp account, most of the time they are the same.</div>
								</td>
							</tr><tr>
								<td valign="top" class="textbox"><label for="db_passwd">MySQL password:</label></td>
								<td>
									<input type="password" name="db_passwd" id="db_passwd" value="', $db_passwd, '" size="30" /><br />
									<div style="font-size: smaller; margin-bottom: 2ex;">Here, put the password you need to connect to your MySQL database.<br />If you don\'t know this, you should try the password to your ftp account.</div>
								</td>
							</tr><tr>
								<td valign="top" class="textbox"><label for="db_name">MySQL database name:</label></td>
								<td>
									<input type="text" name="db_name" id="db_name" value="', empty($db_name) ? 'smf' : $db_name, '" size="30" /><br />
									<div style="font-size: smaller; margin-bottom: 2ex;">Fill in the name of the database you want to use.</div>
								</td>
							</tr>
						</table>

						<div align="right" style="margin: 1ex;"><input type="hidden" name="path" value="1" /><input type="hidden" name="db_prefix" value="', $db_prefix, '" /><input type="submit" value="Proceed" /></div>
					</form>
				</div>';

	return true;
}

function step2()
{
	$starttime = get_time();

	$db_connection = @mysql_connect($_POST['db_server'], $_POST['db_user'], $_POST['db_passwd']);
	if (!$db_connection)
		return step1('Cannot connect to the MySQL database server with the supplied data. If you are not sure about what to type in, please contact your host.<br /><br /><tt>' . mysql_error() . '</tt>');

	if (!mysql_select_db($_POST['db_name'], $db_connection))
		return step1(sprintf('This tool was unable to access the &quot;<i>%s</i>&quot; database. With some hosts, you have to create the database in your administration panel before SMF can use it. Some also add prefixes - like your username - to your database names.', $_POST['db_name']));

	// This is going to *burn* memory... Thankfully we won't be doing this every other day!
	if (@ini_get('memory_limit') < 128)
		@ini_set('memory_limit', '128M');
	@set_time_limit(600);

	// Search tag should match full url (various formats) or id only
	// Replacement will try to do full link to the page, but for others will link directly to the file.
	$tgl = array(
		'youtube' => array(
			// Note it will also match YouTube videos on videos.google.com
			'search' => '(?:http://(?:video\.google\.(?:com|com\.au|co\.uk|de|es|fr|it|nl|pl|ca|cn)(?:[^\[]*?))?(?:(?:www|au|br|ca|es|fr|de|hk|ie|it|jp|mx|nl|nz|pl|ru|tw|uk)\.)?youtube\.com(?:[^\[]*?)?(?:\&|\/|\?|\;|\%3F|\%2F)(?:video_id=|v(?:/|=|\%3D|\%2F)))?([0-9a-z-_]{11})',
			'replace' => 'http://www.youtube.com/watch?v=$1',
			// Is used by http://custom.simplemachines.org/mods/index.php?mod=936
			// Was used by a whole bunch of other youtube mods
		),
		// Same as above
		'yt' => array(
			// Note it will also match YouTube videos on videos.google.com
			'search' => '(?:http://(?:video\.google\.(?:com|com\.au|co\.uk|de|es|fr|it|nl|pl|ca|cn)(?:[^\[]*?))?(?:(?:www|au|br|ca|es|fr|de|hk|ie|it|jp|mx|nl|nz|pl|ru|tw|uk)\.)?youtube\.com(?:[^\[]*?)?(?:\&|\/|\?|\;|\%3F|\%2F)(?:video_id=|v(?:/|=|\%3D|\%2F)))?([0-9a-z-_]{11})',
			'replace' => 'http://www.youtube.com/watch?v=$1',
			// Was used by http://custom.simplemachines.org/mods/index.php?mod=121
		),
		'ytplaylist' => array(
			'search' => '(?:http://(?:(?:www|au|br|ca|es|fr|de|hk|ie|it|jp|mx|nl|nz|pl|ru|tw|uk)\.)?youtube\.com(?:[^\[]*?)?(?:\&|\/|\?|\;)(?:id=|p=|p/))?([0-9a-f]{16})',
			'replace' => 'http://www.youtube.com/view_play_list?p=$1',
			// Was used by http://custom.simplemachines.org/mods/index.php?mod=966
		),
		'stage6' => array(
			'search' => '(?:http://(?:(?:www\.|video\.)?stage6|stage6\.divx)\.com/(?:(?:[^\[]*?)?/video/)?)?([0-9]{1,11})',
			'replace' => 'http://video.stage6.com/$1/.divx',
			//Is used by http://custom.simplemachines.org/mods/index.php?mod=983
			// Was used by a whole bunch of other stage6 mods
		),
		'metacafe' => array(
			'search' => '(?:http://(?:www\.)?metacafe\.com/(?:watch|fplayer)/)?([0-9]{1,10})',
			'replace' => 'http://www.metacafe.com/fplayer/$1/metacafe.swf',
			//Is used by http://custom.simplemachines.org/mods/index.php?mod=974
		),
		'googlevid' => array(
			'search' => '(?:http://video\.google\.(?:com|com\.au|co\.uk|de|es|fr|it|nl|pl|ca|cn)/(?:videoplay|url|googleplayer\.swf)\?(?:[^"]*?)?docid=)?([0-9a-z-_]{1,20})',
			'replace' => 'http://video.google.com/googleplayer.swf?docId=$1',
			// Is used by http://custom.simplemachines.org/mods/index.php?mod=834
		),
		// Same as above
		'gv' => array(
			'search' => '(?:http://video\.google\.(?:com|com\.au|co\.uk|de|es|fr|it|nl|pl|ca|cn)/(?:videoplay|url|googleplayer\.swf)\?(?:[^"]*?)?docid=)?([0-9a-z-_]{1,20})',
			'replace' => 'http://video.google.com/googleplayer.swf?docId=$1',
			// Is used by http://custom.simplemachines.org/mods/index.php?mod=121
		),
		// Same as above
		'google_video' => array(
			'search' => '(?:http://video\.google\.(?:com|com\.au|co\.uk|de|es|fr|it|nl|pl|ca|cn)/(?:videoplay|url|googleplayer\.swf)\?(?:[^"]*?)?docid=)?([0-9a-z-_]{1,20})',
			'replace' => 'http://video.google.com/googleplayer.swf?docId=$1',
			// Was used by http://custom.simplemachines.org/mods/index.php?mod=614
		),
		// Same as above
		'gvideo' => array(
			'search' => '(?:http://video\.google\.(?:com|com\.au|co\.uk|de|es|fr|it|nl|pl|ca|cn)/(?:videoplay|url|googleplayer\.swf)\?(?:[^"]*?)?docid=)?([0-9a-z-_]{1,20})',
			'replace' => 'http://video.google.com/googleplayer.swf?docId=$1',
			// Is used by http://custom.simplemachines.org/mods/index.php?mod=401
		),
		'dailymotion' => array(
			'search' => '(?:http://(?:www\.)?dailymotion\.(?:com|alice\.it)/(?:(?:[^\[]*?)?video|swf)/)?([a-z0-9]{1,8})',
			'replace' => 'http://www.dailymotion.com/swf/$1',
			// Is used by http://custom.simplemachines.org/mods/index.php?mod=801
		),
		'livevideo' => array(
			'search' => '(?:http://(?:www\.)?livevideo\.com/(?:flvplayer/embed/|video/(?:view/)?(?:(?:[^\[]*?)?/)?))?([0-9a-f]{32})',
			'replace' => 'http://www.livevideo.com/flvplayer/embed/$1',
			// Was used by http://custom.simplemachines.org/mods/index.php?mod=741
		),
		'liveleak' => array(
			'search' => '(?:http://(?:www\.)?liveleak\.com/(?:player.swf?autostart=false&token=|view\?(?:[^\[]*?)?i=))?([0-9a-z]{3})_([a-z0-9]{10})',
			'replace' => 'http://www.liveleak.com/player.swf?autostart=false&token=$1_$2',
			// Was used by http://custom.simplemachines.org/mods/index.php?mod=823
		),
		'myvideo' => array(
			'search' => '(?:http://(?:www\.)?myvideo\.de/(?:watch|movie)/)?([0-9]{1,8})',
			'replace' => 'http://www.myvideo.de/watch/$1',
			// Is used by http://custom.simplemachines.org/mods/index.php?mod=791
		),
		'clipfish' => array(
			'search' => '(?:http://(?:www\.)?clipfish\.de/(?:player\.php|videoplayer\.swf)\?(?:[^"]*?)?videoid=)?([a-z0-9]{1,20})',
			'replace' => 'http://www.clipfish.de/videoplayer.swf?as=0&videoid=$1&r=1&c=0067B3',
			// Is used by http://custom.simplemachines.org/mods/index.php?mod=820
		),
		'veoh' => array(
			'search' => '(?:http://(?:www\.)?veoh\.com/(?:videos/|videodetails2\.swf\?permalinkId=))?([0-9a-z]{14,16})',
			'replace' => 'http://www.veoh.com/videos/$1',
			// Is used by http://custom.simplemachines.org/mods/index.php?mod=754
		),
	);
	// Put the tags into a string to search for
	// It's easier to search for closing tag as there are two forms of opening tag
	$search = "((body LIKE '%[\/". implode("]%') OR (body LIKE '%[\/", array_keys($tgl)) ."]%'))";

	// Don't start at message id less than
	$start_id = isset($_GET['start_id']) ? (int) $_GET['start_id'] : 0;

	// Find out how many there were
	if (empty($_GET['total']))
	{
		$query = mysql_query("
			SELECT count(*) as found
			FROM ". $_POST['db_prefix'] ."messages
			WHERE $search
		");
		list($total) = mysql_fetch_row($query);
	}
	else
		$total = (int) $_GET['total'];

	// Fine out how many we've done
	$done = isset($_GET['done']) ? (int) $_GET['done'] : 0;

	// How many rows (messages) do we have to go through? First check to see if we have this...
	// Pull the messages...200 at a time
	$query = mysql_query("
		SELECT ID_MSG as id, body
		FROM ". $_POST['db_prefix'] ."messages
		WHERE ID_MSG > $start_id
			AND $search
		LIMIT 200");
	$rows = @mysql_num_rows($query);
	(int) $rows;
	if ($rows == 0)
		return step1('No instances of ['. implode("], [", array_keys($tgl)) .'] bbcode were found in the messages table of this database.<br /><b>For security reasons, please delete this script now.</b> And don\'t forget to take your forum out of Maintenance Mode!');

	$updated_messages = array();

	while ($result = mysql_fetch_assoc($query))
	{
		// cast integer
		(int) $result['id'];

		// Where we are upto, so we don't restart at a lower message
		$start_id = ($result['id'] > $start_id) ? $result['id'] : $start_id;

		foreach ($tgl as $tag => $arr)
		{
			// If can't position the bbcode tag in the body, please continue with next tag
			if (stripos($result['body'], '['.$tag) === false)
				continue;

			// Replace both formats
			$result['body'] = preg_replace('~\['.$tag.'(?:=(?:[0-9]{1,4}),(?:[0-9]{1,4}))?\]'.$arr['search'].'(?:[^\[]*?)\[\/'.$tag.'\]~im', '[url]'.$arr['replace'].'[/url]', $result['body']);
		}
		// Re-escape the content
		$result['body'] = addslashes($result['body']);
		$updated_messages[] = $result;
	}

	// How many records are we actually going to update in the database?
	$done = $done + $rows;

	$failures = array();
	foreach ($updated_messages as $message)
	{
		$sql = "
			UPDATE {$_POST['db_prefix']}messages
			SET `body` = '$message[body]'
			WHERE `ID_MSG` = $message[id]
			LIMIT 1";

		if (!mysql_query($sql))
		{
			$error_message = mysql_error($db_connection);
			$failures[$message['id']] = $error_message;
		}
	}

	$time = round(get_time() - $starttime + 5 + (!empty($_POST['time']) ? $_POST['time'] : 0),3);

	// More to do?
	if ($rows === 200)
		// We're not done
		nextLine($start_id, $total, $done, $rows, $failures, $time);

	// Looks like we are done, w00t!
	if (!empty($failures))
	{
		echo '
				<div class="error_message">
					<div style="color: red;">Some of the queries were not executed properly. Technical information about the queries:</div>
					<div style="margin: 2.5ex;">';

		foreach ($failures as $line => $fail)
			echo '
						<b>Message #', $line, ':</b> ', nl2br(htmlspecialchars($fail)), '<br />';

		echo '
					</div>
				</div>';
	}

	echo '
				<div class="panel">
					<h2>Conversion complete!</h2>

					Congratulations! All instances of [youtube], [yt], [ytplaylist], [stage6], [metacafe], [googlevid], [gv], [google_video], [gvideo], [dailymotion], [livevideo], [liveleak], [myvideo], [clipfish], [veoh] bbcode have been successfully converted to links.<br />
					<br />
					Stats:<br />
					&nbsp;&nbsp;', $total, ' messages updated.<br />
					&nbsp;&nbsp;Overall, the script took ', $time, ' seconds to execute.<br />';
	if ($total > 0)
		echo '
					&nbsp;&nbsp;About ', $time/$total, ' seconds per message<br />';

		echo '<br /><b>For Security Reasons please delete this script once its completed. And don\'t forget to take your forum out of Maintenance Mode</b>';

	return false;
}

function show_header()
{
	global $version;

	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Convert [ytplaylist] BBCode Tool</title>
		<style type="text/css">
			body
			{
				font-family: Verdana, sans-serif;
				background-color: #D4D4D4;
				margin: 0;
			}
			body, td
			{
				font-size: 10pt;
			}
			div#header
			{
				background: url(Themes/default/images/titlebg.jpg) #E9F0F6 repeat-x;
				padding: 22px 4% 12px 4%;
				font-family: Georgia, serif;
				font-size: x-large;
				border-bottom: 1px solid black;
				height: 40px;
			}
			div#author
			{
				font-size: large;
			}
			div#content
			{
				padding: 20px 30px;
			}
			div.error_message
			{
				border: 2px dashed red;
				background-color: #E1E1E1;
				margin: 1ex 4ex;
				padding: 1.5ex;
			}
			div#warning
			{
				border: 2px dashed red;
				background-color: #E1E1E1;
				margin: 1ex 4ex;
				padding: 1.5ex;
			}
			div#description
			{
				border: 2px dashed #A1A1A1;
				background-color: #E1E1E1;
				margin: 1ex 4ex;
				padding: 1.5ex;
			}
			div.panel
			{
				border: 1px solid gray;
				background-color: #F0F0F0;
				margin: 1ex 4ex;
				padding: 1.5ex;
			}
			div.panel h2
			{
				margin: 0;
				margin-bottom: 0.5ex;
				padding-bottom: 3px;
				border-bottom: 1px dashed black;
				font-size: 14pt;
				font-weight: normal;
			}
			div.panel h3
			{
				margin: 0;
				margin-bottom: 2ex;
				font-size: 10pt;
				font-weight: normal;
			}
			form
			{
				margin: 0;
			}
			td.textbox
			{
				padding-top: 2px;
				font-weight: bold;
				white-space: nowrap;
				padding-right: 2ex;
			}
		</style>
	</head>
	<body>
		<div id="header">
			<div title="v', $version,'">Converting from old Video BBCodes to Aeva, v', $version,'</div>
			<div id="author">By Karl Benson &amp; Nao</div>
		</div>';
	if (empty($_GET['paths']) && empty($_POST['path']))
		echo '<div id="warning">
			Use this at your OWN risk.<br />
This cannot be undone, so backup your database and files prior to running it.<br />
For security reasons, remove the file once completed.
			</div>';
	if (empty($_GET['paths']) && empty($_POST['path']))
	echo '<div id="description">
		This script attempts to convert valid [youtube], [yt], [ytplaylist], [stage6], [metacafe], [googlevid], [gv], [google_video], [gvideo],<br />[dailymotion], [livevideo], [liveleak], [myvideo], [clipfish], [veoh] bbcode back into normal links.
		</div>';
	echo '<div id="content">';
}

function show_footer()
{
	echo '
		</div>
	</body>
</html>';
}

function nextLine($start_id, $total, $done, $max, $failures, $time)
{
	@set_time_limit(300);

	$_GET['total'] = $total;
	$_GET['done'] = $done;
	$_GET['time'] = $time;
	$_GET['start_id'] = $start_id;

	$query_string = '';
	foreach ($_GET as $k => $v)
		$query_string .= '&amp;' . $k . '=' . $v;
	if (strlen($query_string) != 0)
		$query_string = '?' . substr($query_string, 5);

	$percentage = round(($done * 100) / $_GET['total']);

	if (!empty($failures))
	{
		echo '
				<div class="error_message">
					<div style="color: red;">Some of the queries were not executed properly. Technical information about the queries:</div>
					<div style="margin: 2.5ex;">';

		foreach ($failures as $line => $fail)
			echo '
						<b>Line #', $line + 1, ':</b> ', nl2br(htmlspecialchars($fail)), '<br />';

		echo '
					</div>
				</div>';
	}

	echo '
		<div class="panel">
			<h2>Not quite done yet! (approximately ', $percentage, '%)</h2>
			<h3>
				This tool has been paused to avoid overloading your server. Don\'t worry, nothing\'s wrong - simply click the <label for="continue">continue button</label> below to keep going.
			</h3>

			<div style="font-size: 8pt; width: 60%; height: 1.2em; margin: auto; border: 1px solid black; background-color: white; padding: 1px; position: relative;">
				<div style="width: 100%; z-index: 2; color: black; position: absolute; text-align: center; font-weight: bold;">', $percentage, '%</div>
				<div style="width: ', $percentage, '%; height: 1.2em; z-index: 1; background-color: #6279ff;">&nbsp;</div>
			</div>

			<p>Please note that this percentage, regrettably, is not terribly accurate, and is only an approximation of progress.</p>

			<form action="', $_SERVER['PHP_SELF'], $query_string, '" method="post" name="autoSubmit">
				<input type="hidden" name="db_server" value="', $_POST['db_server'], '" />
				<input type="hidden" name="db_user" value="', $_POST['db_user'], '" />
				<input type="hidden" name="db_passwd" value="', $_POST['db_passwd'], '" />
				<input type="hidden" name="db_name" value="', $_POST['db_name'], '" />
				<input type="hidden" name="db_prefix" value="', $_POST['db_prefix'], '" />
				<input type="hidden" name="path" value="', $_POST['path'], '" />
				<input type="hidden" name="total" value="', $total, '" />
				<input type="hidden" name="time" value="', $time, '" />

				<div align="right" style="margin: 1ex;"><input name="b" type="submit" value="Continue" /></div>
			</form>
			<script language="JavaScript" type="text/javascript"><!-- // --><![CDATA[
				window.onload = doAutoSubmit;
				var countdown = 5;

				function doAutoSubmit()
				{
					if (countdown == 0)
					{
						document.autoSubmit.b.disabled = true;
						document.autoSubmit.submit();
					}
					else if (countdown == -1)
						return;

					document.autoSubmit.b.value = "Continue (" + countdown + ")";
					countdown--;

					setTimeout("doAutoSubmit();", 1000);
				}
			// ]]></script>
		</div>';

	show_footer();
	exit;
}

function get_time()
{
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	return $mtime;
}

?>