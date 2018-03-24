# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.5.8
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2011-09-24 16:42:56
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table 7dot.smf_admin_info_files
CREATE TABLE IF NOT EXISTS `smf_admin_info_files` (
  `id_file` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `parameters` varchar(255) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `filetype` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_file`),
  KEY `filename` (`filename`(30))
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_admin_info_files: 7 rows
/*!40000 ALTER TABLE `smf_admin_info_files` DISABLE KEYS */;
INSERT INTO `smf_admin_info_files` (`id_file`, `filename`, `path`, `parameters`, `data`, `filetype`) VALUES
	(1, 'current-version.js', '/smf/', 'version=%3$s', 'window.smfVersion = "SMF 2.0.1";', 'text/javascript'),
	(2, 'detailed-version.js', '/smf/', 'language=%1$s&version=%3$s', 'window.smfVersions = {\n	\'SMF\': \'SMF 2.0.1\',\n	\'SourcesAdmin.php\': \'2.0\',\n	\'SourcesBoardIndex.php\': \'2.0\',\n	\'SourcesCalendar.php\': \'2.0\',\n	\'SourcesClass-Graphics.php\': \'2.0\',\n	\'SourcesClass-Package.php\': \'2.0\',\n	\'SourcesDbExtra-mysql.php\': \'2.0\',\n	\'SourcesDbExtra-postgresql.php\': \'2.0\',\n	\'SourcesDbExtra-sqlite.php\': \'2.0\',\n	\'SourcesDbPackages-mysql.php\': \'2.0\',\n	\'SourcesDbPackages-postgresql.php\': \'2.0\',\n	\'SourcesDbPackages-sqlite.php\': \'2.0\',\n	\'SourcesDbSearch-mysql.php\': \'2.0\',\n	\'SourcesDbSearch-postgresql.php\': \'2.0\',\n	\'SourcesDbSearch-sqlite.php\': \'2.0\',\n	\'SourcesDisplay.php\': \'2.0\',\n	\'SourcesDumpDatabase.php\': \'2.0\',\n	\'SourcesErrors.php\': \'2.0\',\n	\'SourcesGroups.php\': \'2.0\',\n	\'SourcesHelp.php\': \'2.0\',\n	\'SourcesKarma.php\': \'2.0\',\n	\'SourcesLoad.php\': \'2.0.1\',\n	\'SourcesLockTopic.php\': \'2.0\',\n	\'SourcesLogInOut.php\': \'2.0\',\n	\'SourcesManageAttachments.php\': \'2.0\',\n	\'SourcesManageBans.php\': \'2.0\',\n	\'SourcesManageBoards.php\': \'2.0\',\n	\'SourcesManageCalendar.php\': \'2.0\',\n	\'SourcesManageErrors.php\': \'2.0\',\n	\'SourcesManageMail.php\': \'2.0\',\n	\'SourcesManageMaintenance.php\': \'2.0.1\',\n	\'SourcesManageMembergroups.php\': \'2.0\',\n	\'SourcesManageMembers.php\': \'2.0\',\n	\'SourcesManageNews.php\': \'2.0\',\n	\'SourcesManagePaid.php\': \'2.0\',\n	\'SourcesManagePermissions.php\': \'2.0\',\n	\'SourcesManagePosts.php\': \'2.0\',\n	\'SourcesManageRegistration.php\': \'2.0\',\n	\'SourcesManageScheduledTasks.php\': \'2.0\',\n	\'SourcesManageSearch.php\': \'2.0\',\n	\'SourcesManageSearchEngines.php\': \'2.0\',\n	\'SourcesManageServer.php\': \'2.0\',\n	\'SourcesManageSettings.php\': \'2.0\',\n	\'SourcesManageSmileys.php\': \'2.0\',\n	\'SourcesMemberlist.php\': \'2.0\',\n	\'SourcesMessageIndex.php\': \'2.0\',\n	\'SourcesModerationCenter.php\': \'2.0.1\',\n	\'SourcesModlog.php\': \'2.0\',\n	\'SourcesMoveTopic.php\': \'2.0\',\n	\'SourcesNews.php\': \'2.0\',\n	\'SourcesNotify.php\': \'2.0\',\n	\'SourcesPackageGet.php\': \'2.0\',\n	\'SourcesPackages.php\': \'2.0\',\n	\'SourcesPersonalMessage.php\': \'2.0\',\n	\'SourcesPoll.php\': \'2.0\',\n	\'SourcesPost.php\': \'2.0\',\n	\'SourcesPostModeration.php\': \'2.0\',\n	\'SourcesPrintpage.php\': \'2.0\',\n	\'SourcesProfile.php\': \'2.0\',\n	\'SourcesProfile-Actions.php\': \'2.0\',\n	\'SourcesProfile-Modify.php\': \'2.0\',\n	\'SourcesProfile-View.php\': \'2.0\',\n	\'SourcesQueryString.php\': \'2.0\',\n	\'SourcesRecent.php\': \'2.0\',\n	\'SourcesRegister.php\': \'2.0\',\n	\'SourcesReminder.php\': \'2.0\',\n	\'SourcesRemoveTopic.php\': \'2.0\',\n	\'SourcesRepairBoards.php\': \'2.0\',\n	\'SourcesReports.php\': \'2.0\',\n	\'SourcesSSI.php\': \'2.0\',\n	\'SourcesScheduledTasks.php\': \'2.0\',\n	\'SourcesSearch.php\': \'2.0\',\n	\'SourcesSearchAPI-Custom.php\': \'2.0\',\n	\'SourcesSearchAPI-Fulltext.php\': \'2.0\',\n	\'SourcesSearchAPI-Standard.php\': \'2.0\',\n	\'SourcesSecurity.php\': \'2.0\',\n	\'SourcesSendTopic.php\': \'2.0\',\n	\'SourcesSplitTopics.php\': \'2.0\',\n	\'SourcesStats.php\': \'2.0\',\n	\'SourcesSubs.php\': \'2.0\',\n	\'SourcesSubs-Admin.php\': \'2.0\',\n	\'SourcesSubs-Auth.php\': \'2.0\',\n	\'SourcesSubs-BoardIndex.php\': \'2.0\',\n	\'SourcesSubs-Boards.php\': \'2.0\',\n	\'SourcesSubs-Calendar.php\': \'2.0\',\n	\'SourcesSubs-Categories.php\' : \'2.0\',\n	\'SourcesSubs-Charset.php\' : \'2.0\',\n	\'SourcesSubs-Compat.php\': \'2.0\',\n	\'SourcesSubs-Db-mysql.php\': \'2.0\',\n	\'SourcesSubs-Db-postgresql.php\': \'2.0\',\n	\'SourcesSubs-Db-sqlite.php\': \'2.0\',\n	\'SourcesSubs-Editor.php\': \'2.0\',\n	\'SourcesSubs-Graphics.php\': \'2.0\',\n	\'SourcesSubs-List.php\': \'2.0\',\n	\'SourcesSubs-Membergroups.php\': \'2.0\',\n	\'SourcesSubs-Members.php\': \'2.0.1\',\n	\'SourcesSubs-MembersOnline.php\': \'2.0\',\n	\'SourcesSubs-Menu.php\': \'2.0.1\',\n	\'SourcesSubs-MessageIndex.php\': \'2.0\',\n	\'SourcesSubs-OpenID.php\': \'2.0\',\n	\'SourcesSubs-Package.php\': \'2.0.1\',\n	\'SourcesSubs-Post.php\': \'2.0\',\n	\'SourcesSubs-Recent.php\': \'2.0\',\n	\'SourcesSubscriptions-PayPal.php\': \'2.0\',\n	\'Sourcessubscriptions.php\': \'2.0\',\n	\'SourcesSubs-Sound.php\': \'2.0\',\n	\'SourcesThemes.php\': \'2.0\',\n	\'SourcesViewQuery.php\': \'2.0\',\n	\'SourcesWho.php\': \'2.0\',\n	\'SourcesXml.php\': \'2.0\',\n	\'DefaultAdmin.template.php\': \'2.0\',\n	\'DefaultBoardIndex.template.php\': \'2.0\',\n	\'DefaultCalendar.template.php\': \'2.0\',\n	\'DefaultCompat.template.php\': \'2.0\',\n	\'DefaultDisplay.template.php\': \'2.0\',\n	\'DefaultErrors.template.php\': \'2.0\',\n	\'DefaultGenericControls.template.php\': \'2.0\',\n	\'DefaultGenericList.template.php\': \'2.0\',\n	\'DefaultGenericMenu.template.php\': \'2.0\',\n	\'DefaultHelp.template.php\': \'2.0\',\n	\'DefaultLogin.template.php\': \'2.0\',\n	\'DefaultManageAttachments.template.php\': \'2.0\',\n	\'DefaultManageBans.template.php\': \'2.0\',\n	\'DefaultManageBoards.template.php\': \'2.0\',\n	\'DefaultManageCalendar.template.php\': \'2.0\',\n	\'DefaultManageMail.template.php\': \'2.0\',\n	\'DefaultManageMaintenance.template.php\': \'2.0\',\n	\'DefaultManageMembergroups.template.php\': \'2.0\',\n	\'DefaultManageMembers.template.php\': \'2.0\',\n	\'DefaultManageNews.template.php\': \'2.0\',\n	\'DefaultManagePaid.template.php\': \'2.0\',\n	\'DefaultManagePermissions.template.php\': \'2.0\',\n	\'DefaultManageScheduledTasks.template.php\': \'2.0\',\n	\'DefaultManageSearch.template.php\': \'2.0\',\n	\'DefaultManageSmileys.template.php\': \'2.0\',\n	\'DefaultMemberlist.template.php\': \'2.0\',\n	\'DefaultMessageIndex.template.php\': \'2.0\',\n	\'DefaultModerationCenter.template.php\': \'2.0\',\n	\'DefaultMoveTopic.template.php\': \'2.0\',\n	\'DefaultNotify.template.php\': \'2.0\',\n	\'DefaultPackages.template.php\': \'2.0\',\n	\'DefaultPersonalMessage.template.php\': \'2.0\',\n	\'DefaultPoll.template.php\': \'2.0\',\n	\'DefaultPost.template.php\': \'2.0\',\n	\'DefaultPrintpage.template.php\': \'2.0\',\n	\'DefaultProfile.template.php\': \'2.0\',\n	\'DefaultRecent.template.php\': \'2.0\',\n	\'DefaultRegister.template.php\': \'2.0\',\n	\'DefaultReminder.template.php\': \'2.0\',\n	\'DefaultReports.template.php\': \'2.0\',\n	\'DefaultSearch.template.php\': \'2.0\',\n	\'DefaultSendTopic.template.php\': \'2.0\',\n	\'DefaultSettings.template.php\': \'2.0\',\n	\'DefaultSplitTopics.template.php\': \'2.0\',\n	\'DefaultStats.template.php\': \'2.0\',\n	\'DefaultThemes.template.php\': \'2.0\',\n	\'DefaultWho.template.php\': \'2.0\',\n	\'DefaultWireless.template.php\': \'2.0\',\n	\'DefaultXml.template.php\': \'2.0\',\n	\'Defaultindex.template.php\': \'2.0\',\n	\'TemplatesAdmin.template.php\': \'2.0\',\n	\'TemplatesBoardIndex.template.php\': \'2.0\',\n	\'TemplatesCalendar.template.php\': \'2.0\',\n	\'TemplatesDisplay.template.php\': \'2.0\',\n	\'TemplatesErrors.template.php\': \'2.0\',\n	\'TemplatesGenericControls.template.php\': \'2.0\',\n	\'TemplatesGenericList.template.php\': \'2.0\',\n	\'TemplatesGenericMenu.template.php\': \'2.0\',\n	\'TemplatesHelp.template.php\': \'2.0\',\n	\'TemplatesLogin.template.php\': \'2.0\',\n	\'TemplatesManageAttachments.template.php\': \'2.0\',\n	\'TemplatesManageBans.template.php\': \'2.0\',\n	\'TemplatesManageBoards.template.php\': \'2.0\',\n	\'TemplatesManageCalendar.template.php\': \'2.0\',\n	\'TemplatesManageMail.template.php\': \'2.0\',\n	\'TemplatesManageMaintenance.template.php\': \'2.0\',\n	\'TemplatesManageMembergroups.template.php\': \'2.0\',\n	\'TemplatesManageMembers.template.php\': \'2.0\',\n	\'TemplatesManageNews.template.php\': \'2.0\',\n	\'TemplatesManagePaid.template.php\': \'2.0\',\n	\'TemplatesManagePermissions.template.php\': \'2.0\',\n	\'TemplatesManageSearch.template.php\': \'2.0\',\n	\'TemplatesManageSmileys.template.php\': \'2.0\',\n	\'TemplatesMemberlist.template.php\': \'2.0\',\n	\'TemplatesMessageIndex.template.php\': \'2.0\',\n	\'TemplatesModerationCenter.template.php\': \'2.0\',\n	\'TemplatesModlog.template.php\': \'2.0\',\n	\'TemplatesMoveTopic.template.php\': \'2.0\',\n	\'TemplatesNotify.template.php\': \'2.0\',\n	\'TemplatesPackages.template.php\': \'2.0\',\n	\'TemplatesPersonalMessage.template.php\': \'2.0\',\n	\'TemplatesPoll.template.php\': \'2.0\',\n	\'TemplatesPost.template.php\': \'2.0\',\n	\'TemplatesPrintpage.template.php\': \'2.0\',\n	\'TemplatesProfile.template.php\': \'2.0\',\n	\'TemplatesRecent.template.php\': \'2.0\',\n	\'TemplatesRegister.template.php\': \'2.0\',\n	\'TemplatesReminder.template.php\': \'2.0\',\n	\'TemplatesReports.template.php\': \'2.0\',\n	\'TemplatesSearch.template.php\': \'2.0\',\n	\'TemplatesSendTopic.template.php\': \'2.0\',\n	\'TemplatesSettings.template.php\': \'2.0\',\n	\'TemplatesSplitTopics.template.php\': \'2.0\',\n	\'TemplatesStats.template.php\': \'2.0\',\n	\'TemplatesThemes.template.php\': \'2.0\',\n	\'TemplatesWho.template.php\': \'2.0\',\n	\'TemplatesWireless.template.php\': \'2.0\',\n	\'TemplatesXml.template.php\': \'2.0\',\n	\'Templatesindex.template.php\': \'2.0\'\n};\n\nwindow.smfLanguageVersions = {\n	\'Admin\': \'2.0\',\n	\'EmailTemplates\': \'2.0\',\n	\'Errors\': \'2.0\',\n	\'Help\': \'2.0\',\n	\'index\': \'2.0\',\n	\'Install\': \'2.0\',\n	\'Login\': \'2.0\',\n	\'ManageBoards\': \'2.0\',\n	\'ManageCalendar\': \'2.0\',\n	\'ManageMail\': \'2.0\',\n	\'ManageMaintenance\': \'2.0\',\n	\'ManageMembers\': \'2.0\',\n	\'ManagePaid\': \'2.0\',\n	\'ManagePermissions\': \'2.0\',\n	\'ManageScheduledTasks\': \'2.0\',\n	\'ManageSettings\': \'2.0\',\n	\'ManageSmileys\': \'2.0\',\n	\'Manual\': \'2.0\',\n	\'ModerationCenter\': \'2.0\',\n	\'Modifications\': \'2.0\',\n	\'Modlog\': \'2.0\',\n	\'Packages\': \'2.0\',\n	\'PersonalMessage\': \'2.0\',\n	\'Post\': \'2.0\',\n	\'Profile\': \'2.0\',\n	\'Reports\': \'2.0\',\n	\'Search\': \'2.0\',\n	\'Settings\': \'2.0\',\n	\'Stats\': \'2.0\',\n	\'Themes\': \'2.0\',\n	\'Who\': \'2.0\',\n	\'Wireless\': \'2.0\'\n};\n', 'text/javascript'),
	(3, 'latest-news.js', '/smf/', 'language=%1$s&format=%2$s', '\nwindow.smfAnnouncements = [\n	{\n		subject: \'SMF 2.0.1 and 1.1.15 security patches have been released.\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=452888.0\',\n		time: \'September 18, 2011, 04:48:18 PM\',\n		author: \'Norv\',\n		message: \'Critical security patches have been released, addressing vulnerabilities in SMF 2.0 and SMF 1.1.x. We urge all administrators to upgrade as soon as possible. Just visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 2.0 Gold\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=421547.0\',\n		time: \'June 04, 2011, 05:00:00 PM\',\n		author: \'Norv\',\n		message: \'SMF 2.0 has gone Gold! Please upgrade your forum from older versions, as 2.0 is now the stable version, and mods and themes will be built on it.\'\n	},\n	{\n		subject: \'SMF 1.1.13, 2.0 RC4 security patch and SMF 2.0 RC5 released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=421547.0\',\n		time: \'February 11, 2011, 03:16:35 PM\',\n		author: \'Norv\',\n		message: \'Simple Machines announces the release of important security patches for SMF 1.1.x and SMF 2.0 RC4, along with the fifth Release Candidate of SMF 2.0. Please visit the Simple Machines site for more information on how you can help test this new release.\'\n	},\n	{\n		subject: \'SMF 2.0 RC4 and SMF 1.1.12 released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=407256.0\',\n		time: \'November 01, 2010, 12:14:21 PM\',\n		author: \'Norv\',\n		message: \'Simple Machines is pleased to announce the release of the fourth Release Candidate of SMF 2.0, along with an important security patch for SMF 1.1.x. Please visit the Simple Machines site for more information on how you can help test this new release.\'\n	},\n	{\n		subject: \'SMF 2.0 RC3 Public released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=369616.0\',\n		time: \'March 08, 2010, 06:03:11 PM\',\n		author: \'Aaron\',\n		message: \'Simple Machines is pleased to announce the release of the third Release Candidate of SMF 2.0. Please visit the Simple Machines site for more information on how you can help test this new release.\'\n	},\n	{\n		subject: \'SMF 1.1.11 released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=351341.0\',\n		time: \'December 01, 2009, 05:59:19 PM\',\n		author: \'SleePy\',\n		message: \'A patch has been released, addressing multiple vulnerabilites.  We urge all forum administrators to upgrade to 1.1.11. Simply visit the package manager to install the patch. Also for those still using the 1.0 branch, version 1.0.19 has been released.\'\n	},\n	{\n		subject: \'SMF 2.0 RC2 Public released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=346813.0\',\n		time: \'November 08, 2009, 07:10:03 PM\',\n		author: \'Aaron\',\n		message: \'Simple Machines is very pleased to announce the release of the second Release Candidate of SMF 2.0. Please visit the Simple Machines site for more information on how you can help test this new release.\'\n	},\n	{\n		subject: \'SMF 1.1.10 and 2.0 RC1.2 released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=324169.0\',\n		time: \'July 14, 2009, 07:05:19 PM\',\n		author: \'Compuart\',\n		message: \'A patch has been released, addressing a few security vulnerabilites.  We urge all forum administrators to upgrade to either 1.1.10 or 2.0 RC1.2, depending on the current version. Simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 1.1.9 and 2.0 RC1-1 released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=311899.0\',\n		time: \'May 20, 2009, 08:40:41 PM\',\n		author: \'Compuart\',\n		message: \'A patch has been released, addressing multiple security vulnerabilites.  We urge all forum administrators to upgrade to either 1.1.9 or 2.0 RC1-1, depending on the current version. Simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 2.0 RC1 Public Released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=290609.0\',\n		time: \'February 04, 2009, 11:10:01 PM\',\n		author: \'Compuart\',\n		message: \'Simple Machines are very pleased to announce the release of the first Release Candidate of SMF 2.0. Please visit the Simple Machines site for more information on how you can help test this new release.\'\n	},\n	{\n		subject: \'SMF 1.1.8\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=290608.0\',\n		time: \'February 04, 2009, 11:08:44 PM\',\n		author: \'Compuart\',\n		message: \'A patch has been released, addressing multiple security vulnerabilites.  We urge all forum administrators to upgrade to SMF 1.1.8&mdash;simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 1.1.7\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=272861.0\',\n		time: \'November 07, 2008, 02:15:36 PM\',\n		author: \'Compuart\',\n		message: \'A patch has been released, addressing multiple security vulnerabilites.  We urge all forum administrators to upgrade to SMF 1.1.7&mdash;simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 1.1.6\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=260145.0\',\n		time: \'September 07, 2008, 04:38:05 AM\',\n		author: \'Compuart\',\n		message: \'A patch has been released fixing a few bugs and addressing a security vulnerability.  We urge all forum administrators to upgrade to SMF 1.1.6&mdash;simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 1.1.5\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=236816.0\',\n		time: \'April 20, 2008, 09:56:14 PM\',\n		author: \'Compuart\',\n		message: \'A patch has been released fixing a few bugs and addressing some security vulnerabilities.  We urge all forum administrators to upgrade to SMF 1.1.5&mdash;simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 2.0 Beta 3 Public Released\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=228921.0\',\n		time: \'March 17, 2008, 03:20:21 PM\',\n		author: \'Grudge\',\n		message: \'Simple Machines are very pleased to announce the release of the first public beta of SMF 2.0. Please visit the Simple Machines site for more information on how you can help test this new release.\'\n	},\n	{\n		subject: \'SMF 1.1.4\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=196380.0\',\n		time: \'September 24, 2007, 09:07:36 PM\',\n		author: \'Compuart\',\n		message: \'A patch has been released to address some security vulnerabilities discovered in SMF 1.1.3.  We urge all forum administrators to upgrade to SMF 1.1.4&mdash;simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 2.0 Beta 1 Released to Charter Members\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=190812.0\',\n		time: \'August 25, 2007, 07:29:25 AM\',\n		author: \'Grudge\',\n		message: \'Simple Machines are pleased to announce the first beta of SMF 2.0 has been released to our Charter Members. Visit the Simple Machines site for information on what\\\'s new\'\n	},\n	{\n		subject: \'SMF 1.1.3\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=178757.0\',\n		time: \'June 24, 2007, 09:52:40 PM\',\n		author: \'Thantos\',\n		message: \'A number of small bugs and a potential security issue have been discovered in SMF 1.1.2.  We urge all forum administrators to upgrade to SMF 1.1.3&mdash;simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 1.1.2\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=149553.0\',\n		time: \'February 11, 2007, 08:35:45 AM\',\n		author: \'Grudge\',\n		message: \'A patch has been released to address a number of outstanding bugs in SMF 1.1.1, including several around UTF-8 language support. In addition this patch offers improved image verification support and fixes a couple of low risk security related bugs. If you need any help upgrading please visit our forum.\'\n	},\n	{\n		subject: \'SMF 1.1.1\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=134971.0\',\n		time: \'December 17, 2006, 09:33:41 AM\',\n		author: \'Grudge\',\n		message: \'A number of small bugs and a potential security issue have been discovered in SMF 1.1. We urge all forum administrators to upgrade to SMF 1.1.1 - simply visit the package manager to install the patch.\'\n	},\n	{\n		subject: \'SMF 1.1\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=131008.0\',\n		time: \'December 02, 2006, 02:53:16 PM\',\n		author: \'Grudge\',\n		message: \'SMF 1.1 has gone gold!  If you are using an older version, please upgrade as soon as possible - many things have been changed and fixed, and mods and packages will expect you to be using 1.1.  If you need any help upgrading custom modifications to the new version, please feel free to ask us at our forum.\'\n	},\n	{\n		subject: \'SMF 1.0.9 and patch for SMF 1.1 RC3\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=123285.0\',\n		time: \'October 29, 2006, 05:57:14 AM\',\n		author: \'Compuart\',\n		message: \'A security issue has been discovered in both SMF 1.0 and SMF 1.1. Therefore a patch has been released that will upgrade SMF 1.0.8 to 1.0.9 and update SMF 1.1 RC3. You are encouraged to update immediately, using the package manager or otherwise.\'\n	},\n	{\n		subject: \'SMF 1.1 RC3\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=107112.0\',\n		time: \'August 21, 2006, 07:32:19 PM\',\n		author: \'Grudge\',\n		message: \'Release Candidate 3 of SMF 1.1 has been released! This is the final update to SMF 1.1 before it goes final - and includes UTF support as well as numerous bug fixes. Please read the announcement for details - and only upgrade if you are comfortable running software yet to go gold.\'\n	},\n	{\n		subject: \'SMF 1.0.8\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=107135.0\',\n		time: \'August 21, 2006, 07:32:19 PM\',\n		author: \'Compuart\',\n		message: \'A security issue has been reported in PHP causing a vulnerability in SMF. A patch has been released to upgrade Simple Machines Forum from 1.0.7 to 1.0.8. You are encouraged to update immediately, using the package manager or otherwise.\'\n	},\n	{\n		subject: \'SMF 1.0.7 and patch for SMF 1.1 RC2\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=78841.0\',\n		time: \'March 29, 2006, 05:32:12 PM\',\n		author: \'Compuart\',\n		message: \'A security issue has been discovered in both SMF 1.0 and SMF 1.1. Therefor a patch has been released that will upgrade SMF 1.0.6 to 1.0.7 and update SMF 1.1 RC2. You are encouraged to update immediately, using the package manager or otherwise.\'\n	},\n	{\n		subject: \'SMF 1.0.6\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=68110.0\',\n		time: \'January 28, 2006, 06:36:25 AM\',\n		author: \'Grudge\',\n		message: \'SMF 1.0.6 has been released.  This release addresses a potential security issue as well as a few minor bugs found since the 1.0.5 release. You are encouraged to update immediately, using the package manager or otherwise. This update does not apply to the 1.1 line!\'\n	},\n	{\n		subject: \'Bug in Firefox 1.5\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=66862.0\',\n		time: \'January 24, 2006, 08:09:45 AM\',\n		author: \'Grudge\',\n		message: \'There is a bug in Firefox 1.5 which can cause server issues for forums running SMF 1.1 (RC1/RC2). There is a simple fix which can be downloaded from the Simple Machines forum.\'\n	},\n	{\n		subject: \'SMF 1.1 RC2\',\n		href: \'http://www.simplemachines.org/community/index.php?topic=62731.0\',\n		time: \'December 31, 2005, 02:58:20 PM\',\n		author: \'Grudge\',\n		message: \'The second (and final) Release Candidate of SMF 1.1 has been released! Please read the announcement for details - and please update only if you are certain you are comfortable with software that hasn\\\'t gone gold yet. There is no package manager style update for this version.\'\n	}\n];\nif (window.smfVersion < "SMF 1.1")\n{\n	window.smfUpdateNotice = \'SMF 1.1 Final has now been released. To take advantage of the improvements available in SMF 1.1 we recommend upgrading as soon as is practical.\';\n	window.smfUpdateCritical = false;\n}\n\nif (document.getElementById("yourVersion"))\n{\n	var yourVersion = getInnerHTML(document.getElementById("yourVersion"));\n	if (yourVersion == "SMF 1.0.4")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_1-0-5_package.tar.gz";\n	else if (yourVersion == "SMF 1.0.5" || yourVersion == "SMF 1.0.6")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.7_1.1-RC2-1.tar.gz";\n		window.smfUpdateCritical = false;\n	}\n	else if (yourVersion == "SMF 1.0.7")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_1-0-8_package.tar.gz";\n	else if (yourVersion == "SMF 1.0.8")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1-0-9_1-1-rc3-1.tar.gz";\n	else if (yourVersion == "SMF 1.0.9")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_1-0-10_patch.tar.gz";\n	else if (yourVersion == "SMF 1.0.10" || yourVersion == "SMF 1.1.2")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.1.3_1.0.11.tar.gz";\n	else if (yourVersion == "SMF 1.0.11" || yourVersion == "SMF 1.1.3" || yourVersion == "SMF 2.0 beta 1")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.12_1.1.4_2.0.b1.1.tar.gz";\n		window.smfUpdateCritical = true;\n	}\n	else if (yourVersion == "SMF 1.0.12" || yourVersion == "SMF 1.1.4" || yourVersion == "SMF 2.0 beta 3 Public")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.13_1.1.5_2.0-b3.1.zip";\n	else if (yourVersion == "SMF 1.0.13" || yourVersion == "SMF 1.1.5")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.14_1.1.6.zip";\n		window.smfUpdateCritical = true;\n	}\n	else if (yourVersion == "SMF 1.0.14" || yourVersion == "SMF 1.1.6")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.15_1.1.7.zip";\n		window.smfUpdateCritical = true;\n	}\n	else if (yourVersion == "SMF 1.0.15" || yourVersion == "SMF 1.1.7")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.16_1.1.8.zip";\n		window.smfUpdateCritical = false;\n	}\n	else if (yourVersion == "SMF 1.0.16" || yourVersion == "SMF 1.1.8" || yourVersion == "SMF 2.0 RC1")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.17_1.1.9_2.0-RC1-1.zip";\n	else if (yourVersion == "SMF 1.0.17" || yourVersion == "SMF 1.1.9" || yourVersion == "SMF 2.0 RC1-1")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.18_1.1.10-2.0-RC1.2.zip";\n	else if (yourVersion == "SMF 1.0.18" || yourVersion == "SMF 1.1.10")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.19_1.1.11.zip";\n		window.smfUpdateCritical = true;\n	}\n	else if (yourVersion == "SMF 1.0.19" || yourVersion == "SMF 1.1.11")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.20_1.1.12.tar.gz";\n	}\n	else if (yourVersion == "SMF 1.0.20" || yourVersion == "SMF 1.1.12")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.21_1.1.13.tar.gz";\n		window.smfUpdateCritical = true;\n	}\n	else if (yourVersion == "SMF 1.1.14")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_1.1.15.tar.gz";\n		window.smfUpdateCritical = true;\n	}\n	else if (yourVersion == "SMF 2.0")\n	{\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_patch_2.0.1.tar.gz";\n		window.smfUpdateCritical = true;\n	}\n	else if (yourVersion == "SMF 1.1")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_1-1-1_patch.tar.gz";\n	else if (yourVersion == "SMF 1.1.1")\n		window.smfUpdatePackage = "http://custom.simplemachines.org/mods/downloads/smf_1-1-2_patch.tar.gz";\n}\n\nif (document.getElementById(\'credits\'))\n	setInnerHTML(document.getElementById(\'credits\'), getInnerHTML(document.getElementById(\'credits\')).replace(/anyone we may have missed/, \'<span title="And you thought you had escaped the credits, hadn\\\'t you, Zef Hemel?">anyone we may have missed</span>\'));', 'text/javascript'),
	(4, 'latest-packages.js', '/smf/', 'language=%1$s&version=%3$s', 'var actionurl = \'?action=admin;area=packages;sa=download;get;package=\';if (typeof(window.smfForum_sessionvar) == "undefined")\n	window.smfForum_sessionvar = \'sesc\';\n\nif (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0")\n	window.smfLatestPackages = \'As was inevitable, a few small mistakes have been found in 1.0.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-0-1_update.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.1")\n	window.smfLatestPackages = \'A few problems have been found in the package manager\\\'s modification code, among a few other issues.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-0-2_update.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.2")\n	window.smfLatestPackages = \'A problem has been found in the system that sends critical database messages.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-0-3_package.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.3")\n	window.smfLatestPackages = \'A few bugs have been fixed since SMF 1.0.3, and a problem with parsing nested BBC tags addressed. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-0-4_package.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled. Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.4")\n	window.smfLatestPackages = \'A security issue has been identified in SMF 1.0.4.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-0-5_package.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.5")\n	window.smfLatestPackages = \'A bbc security issue has been identified in SMF 1.0.5.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.7_1.1-RC2-1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.6")\n	window.smfLatestPackages = \'A security issue has been identified in SMF 1.0.6.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.7_1.1-RC2-1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.7")\n	window.smfLatestPackages = \'A security issue has been identified in SMF 1.0.7.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-0-8_package.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\n\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.8")\n	window.smfLatestPackages = \'A security issue has been identified in SMF 1.0.8.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1-0-9_1-1-rc3-1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.9")\n	window.smfLatestPackages = \'A security issue has been identified in SMF 1.0.9.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-0-10_patch.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.10")\n	window.smfLatestPackages = \'A security issue has been identified in SMF 1.0.10.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.1.3_1.0.11.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.11")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.11 as well as a few small bugs. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.12_1.1.4_2.0.b1.1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.12.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.12")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.12 as well as a few small bugs. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.13_1.1.5_2.0-b3.1.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.12.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.13")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.13 as well as a few small bugs. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.14_1.1.6.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.14.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.14")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.14. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.15_1.1.7.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.15.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.15")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.15. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.16_1.1.8.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.16.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.16")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.16. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.17_1.1.9_2.0-RC1-1.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.17.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.17")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.17. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.18_1.1.10-2.0-RC1.2;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.18.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.18")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.18. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.19_1.1.11.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.19.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.19")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.19. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.20_1.1.12.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.20.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.0.20")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.0.20. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.21_1.1.13.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.0.21.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1 Beta 2" && !in_array("smf:smf_1-1-beta2-fix1", window.smfInstalledPackages))\n	window.smfLatestPackages = \'A few bugs have been fixed since SMF 1.1 Beta 2, and a problem with parsing nested BBC tags addressed.  You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-1-beta2-fix1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily fix the problem.<br /><br />Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> or in the helpdesk if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1 RC2" && !in_array("smf:smf-1.0.7", window.smfInstalledPackages))\n	window.smfLatestPackages = \'A security issue has been identified in SMF 1.1 RC2. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.7_1.1-RC2-1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to easily update yourself to the latest version.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1 RC2" && !in_array("smf:smf_1-1-rc2-2", window.smfInstalledPackages))\n	window.smfLatestPackages = \'A bug in PHP causes a vulnerability in SMF 1.1 RC2-1. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-1-rc2-2_package.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to patch your version of 1.1 RC2 to 1.1 RC2-2.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1")\n	window.smfLatestPackages = \'A number of small bugs and a security issue have been identified in SMF 1.1 Final. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-1-1_patch.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.1.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.1")\n	window.smfLatestPackages = \'A number of bugs and a couple of low risk security issues have been identified in SMF 1.1.1 - and some improvements have been made to the visual verification images on registration. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_1-1-2_patch.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.2.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.2")\n	window.smfLatestPackages = \'A number of bugs and a couple of low risk security issues have been identified in SMF 1.1.2 - and some improvements have been made to the package manager. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.1.3_1.0.11.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.3.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.3")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.3 as well as a few small bugs. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.12_1.1.4_2.0.b1.1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.4.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.4")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.4 as well as a few small bugs. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.13_1.1.5_2.0-b3.1.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.5.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.5")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.5 as well as a few small bugs. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.14_1.1.6.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.6.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.6")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.6. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.15_1.1.7.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.7.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.7")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.7. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.16_1.1.8.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.8.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.8")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.8. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.17_1.1.9_2.0-RC1-1.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.9.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.9")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.9. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.18_1.1.10-2.0-RC1.2.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.10.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.10")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.10. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.19_1.1.11.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.11.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.11")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.11. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.20_1.1.12.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.12.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.12")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 1.1.12. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.21_1.1.13.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.13.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.13")\n	window.smfLatestPackages = \'A security vulnerability have been identified in SMF 1.1.13. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.1.14.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.14.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled if you use the full package.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 1.1.14")\n	window.smfLatestPackages = \'A security vulnerability have been identified in SMF 1.1.14. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.1.15.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 1.1.15.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled if you use the full package.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 2.0 beta 1")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 2.0 beta 1 as well as a few small bugs. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.12_1.1.4_2.0.b1.1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 2.0 beta 1.1.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 2.0 Beta 3 Public")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 2.0 beta 3 as well as a few small bugs. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.13_1.1.5_2.0-b3.1.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 2.0 beta 3.1.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 2.0 RC1")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 2.0 RC1. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.17_1.1.9_2.0-RC1-1.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 2.0-RC1-1.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 2.0 RC1-1")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 2.0 RC1-1. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.18_1.1.10-2.0-RC1.2.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to update your version of SMF to 2.0-RC1.2 .<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 2.0 RC4"  && typeof(window.smfRC4patch) == "undefined")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 2.0 RC4. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_2.0-RC4_security.zip;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to install the security patch for SMF 2.0 RC4.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) != "undefined" && window.smfVersion == "SMF 2.0")\n	window.smfLatestPackages = \'A few security vulnerabilities have been identified in SMF 2.0. You can install <a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_2.0.1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">this patch (click here to install)</a> to install the security patch for SMF 2.0.<br /><br />If you have any problems applying it, you can use the version posted on the downloads page - although, any modifications you have installed will need to be uninstalled.  Please post on the <a href="http://www.simplemachines.org/community/index.php">forum</a> if you need more help.\';\nelse if (typeof(window.smfVersion) == "undefined")\n	window.smfLatestPackages = \'For the package manager to function properly, please upgrade to the latest version of SMF.\';\nelse\n{\nvar smf_modificationInfo = {\n\n	3181: {\n		name: \'Author In Display 1.0\',\n		versions: [\'63\', \'65\'],\n		desc: \'<div align="center"><span style="color: purple;" class="bbc_color"><span style="font-size: 16pt;" class="bbc_size"><strong>Author In Display</strong></span></span><br /><strong>Developed by</strong> <strong><a href="http://www.smfsimple.com/index.php?action=profile;u=55" class="bbc_link" target="_blank">4kstore</a></strong> <strong>for </strong><strong><a href="http://www.smfsimple.com/" class="bbc_link" target="_blank">SMFSimple.com</a></strong><br /><em><strong>SMF 2.0</strong></em></div><br /><hr /><br /><div align="center"><span style="color: orange;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size"><strong>El soporte oficial de los desarrolladores de nuestros mods lo encontraras en SMFSimple.com</strong></span></span></div><br /><hr /><br /><br /><span style="color: orange;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Description:</strong></span></span><br /><em><strong>With this modification can show the creator of the thread in the display and get more data when creating the thread</strong></em><br /><br /><span style="color: orange;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Descripcion:</strong></span></span><br /><em><strong>Con está modificación podrás mostrar el creador del tema en el Display y así obtener mayor datos al momento de crear el tema.</strong></em><br /><br /><hr /><br /><span style="color: orange;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Features:</strong></span></span><br /><ul class="bbc_list"><li>Show author of thread in display</li></ul><br /><span style="color: orange;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Caracteristicas:</strong></span></span><br /><ul class="bbc_list"><li>Mostrar el autor del tema en el Display</li></ul><br /><hr /><br /><br /><div align="center"><span style="color: red;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Screenshots | Imagenes</strong></span></span></div><br /><div align="center"><img src="http://i.imgur.com/jMk8u.png" alt="" width="600" height="208" class="bbc_img resized" /></div><br /><hr /><br /><span style="color: teal;" class="bbc_color"><strong>Language Support | Lenguajes Soportados</strong></span><br /><span style="color: teal;" class="bbc_color"><strong>- All</strong></span><br /><hr /><br /><br /><div align="center"><span style="color: green;" class="bbc_color"><span style="font-size: 15pt;" class="bbc_size"><strong>Author in Display</strong></span></span></div><br /><div align="center"><span style="color: green;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Copyright 2011 | <a href="http://www.smfsimple.com/" class="bbc_link" target="_blank">SMFSimple.com</a></strong></span></span></div><br />\',\n		file: \'Autor In Display.zip\'\n	},\n	3179: {\n		name: \'Glow And Color Title V1 V1\',\n		versions: [\'63\'],\n		desc: \'<div align="center"><img src="http://bit.ly/kZVDB6" alt="" width="443" height="115" class="bbc_img resized" /></div><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: purple;" class="bbc_color"><span style="font-size: 16pt;" class="bbc_size"><strong>Glow And Color Title V1</strong></span></span></span><br /><strong>Developed by</strong> <strong><a href="http://www.smfsimple.com/index.php?action=profile;u=55" class="bbc_link" target="_blank">4kstore</a></strong> <strong>for </strong><strong><a href="http://www.smfsimple.com" class="bbc_link" target="_blank">SMFSimple.com</a></strong><br /><em><strong>SMF 2.0</strong></em></div><br /><hr /><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: orange;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size"><strong>El soporte oficial de los desarrolladores de nuestros mods lo encontraras en SMFSimple.com</strong></span></span></span></div><br /><hr /><br /><span style="text-shadow: black 1px 1px 1px"><span style="color: orange;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><span class="bbc_u"><strong>Description:</strong></span></span></span></span><br /><em><strong>With this mod you can allow your users to select from profile the color name in the post and also the color of the shadow</strong></em><br /><br /><span style="text-shadow: black 1px 1px 1px"><span style="color: orange;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><span class="bbc_u"><strong>Descripcion:</strong></span></span></span></span><br /><em><strong>Con este mod podrás permitirle a tus usuarios seleccionar desde su perfil el color de su nombre en los post y también el color de la sombra que tendrá, puede elegir uno u el otro</strong></em><br /><br /><hr /><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: red;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Screenshots | Imágenes</strong></span></span></span></div><br /><div align="center"><img src="http://i.imgur.com/RlY33.jpg" alt="" width="600" height="347" class="bbc_img resized" /></div><br /><div align="center"><img src="http://i.imgur.com/fXyeB.jpg" alt="" width="600" height="183" class="bbc_img resized" /></div><br /><hr /><span style="color: teal;" class="bbc_color"><span class="bbc_u"><strong>Language Support | Lenguajes Soportados</strong></span></span><br /><span style="color: teal;" class="bbc_color"><strong><br />- English<br />- English-utf8<br />- Spanish_latin<br />- Spanish_latin-utf8<br />- Spanish_es<br />- Spanish_es-utf8</strong></span><br /><hr /><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: green;" class="bbc_color"><span style="font-size: 15pt;" class="bbc_size"><strong>Glow And Color Title</strong></span></span></span></div><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: green;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Copyright 2011 | <a href="http://www.smfsimple.com" class="bbc_link" target="_blank">SMFSimple.com</a></strong></span></span></span></div><br /><div align="center"><a href="http://creativecommons.org/licenses/by-nc-sa/3.0/" class="bbc_link" target="_blank"><img src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" alt="" width="88" height="31" class="bbc_img resized" /></a></div>\',\n		file: \'Glow And Color Title.zip\'\n	},\n	3178: {\n		name: \'BBC Spoiler SMFSimple V1\',\n		versions: [\'63\'],\n		desc: \'<div align="center"><img src="http://bit.ly/kZVDB6" alt="" width="443" height="115" class="bbc_img resized" /></div><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: purple;" class="bbc_color"><span style="font-size: 16pt;" class="bbc_size"><strong>BBC Spoiler v1</strong></span></span></span><br /><strong>Developed by</strong> <strong><a href="http://www.smfsimple.com/index.php?action=profile;u=425" class="bbc_link" target="_blank">Daniiel</a></strong> <strong>for </strong><strong><a href="http://www.smfsimple.com" class="bbc_link" target="_blank">SMFSimple.com</a></strong><br /><em><strong>SMF 2.0</strong></em></div><br /><hr /><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: orange;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size"><strong>El soporte oficial de los desarrolladores de nuestros mods lo encontraras en SMFSimple.com</strong></span></span></span></div><br /><hr /><br /><span style="text-shadow: black 1px 1px 1px"><span style="color: orange;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><span class="bbc_u"><strong>Description:</strong></span></span></span></span><br /><em><strong>Hide any content of a message.</strong></em><br /><br /><span style="text-shadow: black 1px 1px 1px"><span style="color: orange;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><span class="bbc_u"><strong>Descripcion:</strong></span></span></span></span><br /><em><strong>Oculta cualquier contenido de un mensaje.</strong></em><br /><br /><hr /><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: red;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Screenshots | Imagenes</strong></span></span></span></div><br /><div align="center"><img src="http://i.imgur.com/jCIyi.png" alt="" width="600" height="63" class="bbc_img resized" /></div><br /><hr /><span style="color: teal;" class="bbc_color"><span class="bbc_u"><strong>Language Support | Lenguajes Soportados</strong></span></span><br /><span style="color: teal;" class="bbc_color"><strong>- English<br />- Spanish_latin<br />- Spanish_latin-utf8<br />- Spanish_es<br />- Spanish_es-utf8</strong></span><br /><hr /><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: green;" class="bbc_color"><span style="font-size: 15pt;" class="bbc_size"><strong>BBC Spoiler v1</strong></span></span></span></div><br /><div align="center"><span style="text-shadow: black 1px 1px 1px"><span style="color: green;" class="bbc_color"><span style="font-size: 13pt;" class="bbc_size"><strong>Copyright 2011 | <a href="http://www.smfsimple.com" class="bbc_link" target="_blank">SMFSimple.com</a></strong></span></span></span></div><br /><div align="center"><a href="http://creativecommons.org/licenses/by-nc-sa/3.0/" class="bbc_link" target="_blank"><img src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" alt="" width="88" height="31" class="bbc_img resized" /></a></div>\',\n		file: \'BBC Spoiler V1 By SMFSimple.com.zip\'\n	},\n	1962: {\n		name: \'Admin ban button in post 1.2\',\n		versions: [\'46\', \'49\', \'55\', \'50\', \'57\'],\n		desc: \'<div align="center"><span style="color: orange;" class="bbc_color"><span style="font-size: 1.35em;" class="bbc_size"><strong>Admin ban button in post</strong></span></span><br />by <a href="http://www.simplemachines.org/community/index.php?action=profile;u=154709" class="bbc_link" target="_blank">Dzonny</a></div><br /><img src="http://www.dodaj.rs/f/1n/tv/1AtcqVgO/banbutton.png" alt="" class="bbc_img" /><br /><br />- This is simply mod wich allow<span class="bbc_u"> Admins </span> and other members who has persmissions to ban, to have ban button in post view, and easely ban members.<br /><br />Please note that on custom themes you&#039;ll have to install this mod manually. <a href="http://docs.simplemachines.org/index.php?topic=402" class="bbc_link" target="_blank">(Manual Installation of Mods)</a><br /><br /><span style="font-size: 1.35em;" class="bbc_size"><span style="color: green;" class="bbc_color"><span class="bbc_u"><strong>Versions:</strong></span></span></span><br /><span style="color: red;" class="bbc_color"><strong>1.0</strong></span> for smf 1.1.8 and 1.1.9<br />&nbsp;-&nbsp;&nbsp; Admin_ban_button.zip <br />&nbsp;-&nbsp;&nbsp; This version will add ban button <span class="bbc_u">just for admins!</span><br /><br /><span style="color: red;" class="bbc_color"><strong>2.0</strong></span> for smf 2.0 RC4<br />- Updated to work with smf 2.0 RC4<br /><br /><span style="color: red;" class="bbc_color"><strong>1.1</strong></span> for smf 1.1.8 - 1.1.10 and for all 2.0 Versions<br />&nbsp;-&nbsp;&nbsp; Ban_button_1.1.zip <br />&nbsp;-&nbsp;&nbsp; This version will add button for members who has persmissions to ban users, and for admin. <br /><br /><span style="color: red;" class="bbc_color"><strong>1.2</strong></span> for smf 1.1.12 and 2.0 RC4.<br />&nbsp;-&nbsp;&nbsp; Ban_button_1.2.zip <br />&nbsp;-&nbsp;&nbsp; Just an update version.\',\n		file: \'ban_button_2.0.zip\'\n	}};\nvar smf_latestModifications = [3181, 3179, 3178];\n\nfunction smf_packagesMoreInfo(id)\n{\n	window.smfLatestPackages_temp = document.getElementById("smfLatestPackagesWindow").innerHTML;\n\n	setInnerHTML(document.getElementById("smfLatestPackagesWindow"),\n	\'\\\n		<h3 style="margin: 0; padding: 4px;">\' + smf_modificationInfo[id].name + \'</h3>\\\n		<h4 style="padding: 4px; margin: 0;"><a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/\' + id + \'/\' + smf_modificationInfo[id].file + \';\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">Install Now!</a></h4>\\\n		<div style="margin: 4px;">\' + smf_modificationInfo[id].desc.replace(/<a href/g, \'<a href\') + \'</div>\\\n		<div class="titlebg" style="padding: 4px; margin: 0;"><a href="javascript:smf_packagesBack();void(0);">(go back)</a></div>\');\n}\n\nfunction smf_packagesBack()\n{\n	setInnerHTML(document.getElementById("smfLatestPackagesWindow"), window.smfLatestPackages_temp);\n	window.scrollTo(0, findTop(document.getElementById("smfLatestPackagesWindow")) - 10);\n}\n\nwindow.smfLatestPackages = \'\\\n	<div id="smfLatestPackagesWindow"style="overflow: auto;">\\\n		<h3 style="margin: 0; padding: 4px;">New Packages:</h3>\\\n		<img src="http://www.simplemachines.org/smf/images/package.png" width="102" height="98" style="float: right; margin: 4px;" alt="(package)" />\\\n		<ul style="list-style: none; margin-top: 3px; padding: 0 4px;">\';\n\nfor (var i = 0; i < smf_latestModifications.length; i++)\n{\n	var id_mod = smf_latestModifications[i];\n\n	window.smfLatestPackages += \'<li><a href="javascript:smf_packagesMoreInfo(\' + id_mod + \');void(0);">\' + smf_modificationInfo[id_mod].name + \'</a></li>\';\n}\n\nwindow.smfLatestPackages += \'\\\n		</ul>\';\n\nif (typeof(window.smfVersion) != "undefined" && (window.smfVersion < "SMF 1.0.6" || (window.smfVersion == "SMF 1.1 RC2" && !in_array(\'smf:smf-1.0.7\', window.smfInstalledPackages))))\n	window.smfLatestPackages += \'\\\n		<h3 class="error" style="margin: 0; padding: 4px;">Updates for SMF:</h3>\\\n		<div style="padding: 0 4px;">\\\n			<a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/smf_patch_1.0.7_1.1-RC2-1.tar.gz;\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">Security update (X-Forwarded-For header vulnerability)</a>\\\n		</div>\';\nelse\n	window.smfLatestPackages += \'\\\n		<h3 style="margin: 0; padding: 4px;">Package of the Moment:</h3>\\\n		<div style="padding: 0 4px;">\\\n			<a href="javascript:smf_packagesMoreInfo(1962);void(0);">Admin ban button in post 1.2</a>\\\n		</div>\';\n\nwindow.smfLatestPackages += \'\\\n	</div>\';\n}\n\nfunction findTop(el)\n{\n	if (typeof(el.tagName) == "undefined")\n		return 0;\n\n	var skipMe = in_array(el.tagName.toLowerCase(), el.parentNode ? ["tr", "tbody", "form"] : []);\n	var coordsParent = el.parentNode ? "parentNode" : "offsetParent";\n\n	if (el[coordsParent] == null || typeof(el[coordsParent].offsetTop) == "undefined")\n		return skipMe ? 0 : el.offsetTop;\n	else\n		return (skipMe ? 0 : el.offsetTop) + findTop(el[coordsParent]);\n}\n\nfunction in_array(item, array)\n{\n	for (var i in array)\n	{\n		if (array[i] == item)\n			return true;\n	}\n\n	return false;\n}\n', 'text/javascript'),
	(5, 'latest-smileys.js', '/smf/', 'language=%1$s&version=%3$s', 'var actionurl = \'?action=admin;area=smileys;sa=install;set_gz=\';\nif (typeof(window.smfForum_sessionvar) == "undefined")\n	window.smfForum_sessionvar = \'sesc\';\n\nvar smf_smileysInfo = {\n\n	2905: {\n		name: \'Emotions Smiley v1.0 1.0\',\n		versions: [\'55\', \'58\', \'57\', \'61\'],\n		desc: \'<div align="center"><span style="font-size: 1.45em;" class="bbc_size"><span style="color: green;" class="bbc_color"><strong>Emotions Smiley v1.0</strong></span></span></div><div align="center"><a href="http://www.simplemachines.org/community/index.php?topic=419253.msg2929870#msg2929870" class="bbc_link" target="_blank">English Support</a> | <a href="http://smf-portal.hu" class="bbc_link" target="_blank">Hungarian Support</a> | <a href="http://custom.simplemachines.org/mods/index.php?action=profile;u=221448" class="bbc_link" target="_blank">My Mods</a><br /><span style="color: orangered;" class="bbc_color">The smileys used in this pack are copyrighted to <a href="http://www.2s-space.com/" class="bbc_link" target="_blank">http://www.2s-space.com/</a>.&nbsp; The author of this smiley set nor Simple Machines are in any way associated and or affiliated with the respective owners.</span></div><hr /><br /><strong>Autor:</strong><br /><span style="color: blue;" class="bbc_color">2s-space</span><br /><br /><strong>Description (Hungarian):</strong> <br />Érzelmes mosolygó arcok<br /><br /><strong>Description (English):</strong><br />Emotions Smiley package<br /><br /><img src="http://smf-portal.hu/Download/Egyeb/emotionssmiley.png" alt="" width="600" height="274" class="bbc_img resized" /><br /><br /><strong>Compatibility: </strong><br /><ul class="bbc_list"><li>1.1.11</li><li>1.1.12</li><li>1.1.13</li><li>1.1.14</li><li>2.0RC3</li><li>2.0RC4</li><li>2.0RC5</li><li>2.0</li></ul>\',\n		file: \'Emotions_smiley.zip\'\n	},\n	2903: {\n		name: \'Popos Smiley 1.0\',\n		versions: [\'55\', \'58\', \'62\', \'57\', \'61\', \'63\'],\n		desc: \'<div align="center"><span style="font-size: 1.45em;" class="bbc_size"><span style="color: green;" class="bbc_color"><strong>Popos Smiley</strong></span></span></div><div align="center"><a href="http://www.simplemachines.org/community/index.php?topic=419124.msg2928849#msg2928849" class="bbc_link" target="_blank">English Support</a> | <a href="http://smf-portal.hu" class="bbc_link" target="_blank">Hungarian Support</a> | <a href="http://custom.simplemachines.org/mods/index.php?action=profile;u=221448" class="bbc_link" target="_blank">My Mods</a></div><hr /><div align="center"><span style="color: orangered;" class="bbc_color">The smileys used in this pack are copyrighted to Netease and <a href="http://www.rokey.net" class="bbc_link" target="_blank">www.rokey.net</a>.&nbsp; The author of this smiley set nor Simple Machines are in any way associated and or affiliated with the respective owners.</span></div><br /><strong>Autor:</strong><br />Rokey.net<br /><br /><strong>Description (Hungarian):</strong> <br />Popos mosolygó arcok<br /><br /><strong>Description (English):</strong><br />Popos Smiley package<br /><br /><img src="http://smf-portal.hu/Download/Egyeb/poposmiley.png" alt="" width="600" height="307" class="bbc_img resized" /><br /><br /><strong>Compatibility: </strong><br /><ul class="bbc_list"><li>1.1.11</li><li>1.1.12</li><li>1.1.13</li><li>1.1.14</li><li>2.0RC3</li><li>2.0RC4</li><li>2.0RC5</li><li>2.0</li></ul>\',\n		file: \'popos_smiley.zip\'\n	},\n	2892: {\n		name: \'Blue Smiley 1.0\',\n		versions: [\'55\', \'58\', \'62\', \'57\', \'61\', \'63\'],\n		desc: \'<div align="center"><span style="font-size: 1.45em;" class="bbc_size"><span style="color: green;" class="bbc_color"><strong>Blue Smiley</strong></span></span></div><div align="center"><a href="http://www.simplemachines.org/community/index.php?topic=417663.0" class="bbc_link" target="_blank">English Support</a> | <a href="http://smf-portal.hu" class="bbc_link" target="_blank">Hungarian Support</a> | <a href="http://custom.simplemachines.org/mods/index.php?action=profile;u=221448" class="bbc_link" target="_blank">My Mods</a></div><hr /><br /><strong>Autor:</strong><br /><a href="http://www.simplemachines.org/community/index.php?action=profile;u=221448" class="bbc_link" target="_blank">WasdMan</a><br /><br /><strong>Description (Hungarian):</strong> <br />Kék mosolygó arcok<br /><br /><strong>Description (English):</strong><br />Blue Smiley package<br /><br /><img src="http://smf-portal.hu/Download/Egyeb/keksmiley.png" alt="" width="600" height="237" class="bbc_img resized" /><br /><br /><strong>Compatibility: </strong><br /><ul class="bbc_list"><li>1.1.11</li><li>1.1.12</li><li>1.1.13</li><li>1.1.14</li><li>2.0RC3</li><li>2.0RC4</li><li>2.0RC5</li><li>2.0</li></ul>\',\n		file: \'blue_smiley.zip\'\n	},\n	1666: {\n		name: \'Alphabetic Smileys 1.0\',\n		versions: [\'44\', \'53\', \'42\', \'54\'],\n		desc: \'42 Animated Smileys. These Smileys have the letters of the alphabet as well as numbers and other characters.<br /><br />You can view them here at <a href="http://mysmfmods.co.cc/index.php/topic,6.0.html" class="bbc_link" target="_blank">My S-M-F Mods</a><br /><br />If you like my avatar packs you can <br /><br /><a href="http://mysmfmods.co.cc/index.php?action=treasury" class="bbc_link" target="_blank"><img src="http://mysmfmods.co.cc/Themes/default/images/x-click-but21.gif" alt="" class="bbc_img" /></a>\',\n		file: \'Alphabetic_Smileys.zip\'\n	},};\nvar smf_latestSmileys = [2905, 2903, 2892];\n\nfunction smf_packagesMoreInfo(id)\n{\n	window.smfLatestSmileys_temp = document.getElementById("smfLatestSmileysWindow").innerHTML;\n\n	setInnerHTML(document.getElementById("smfLatestSmileysWindow"),\n	\'\\\n		<h3 style="margin: 0; padding: 4px;">\' + smf_smileysInfo[id].name + \'</h3>\\\n		<h4 style="padding: 4px; margin: 0;"><a href="\' + window.smfForum_scripturl + actionurl + \'http://custom.simplemachines.org/mods/downloads/\' + id + \'/\' + smf_smileysInfo[id].file + \';\' + window.smfForum_sessionvar + \'=\' + window.smfForum_sessionid + \'">Install Now!</a></h4>\\\n		<div style="margin: 4px;">\' + smf_smileysInfo[id].desc.replace(/<a href/g, \'<a href\') + \'</div>\\\n		<div class="titlebg" style="padding: 4px; margin: 0;"><a href="javascript:smf_packagesBack();void(0);">(go back)</a></div>\');\n}\n\nfunction smf_packagesBack()\n{\n	setInnerHTML(document.getElementById("smfLatestSmileysWindow"), window.smfLatestSmileys_temp);\n	window.scrollTo(0, findTop(document.getElementById("smfLatestSmileysWindow")) - 10);\n}\n\nwindow.smfLatestSmileys = \'\\\n	<div id="smfLatestSmileysWindow" style="overflow: auto;">\\\n		<img src="http://www.simplemachines.org/smf/images/smileys.png" width="102" height="98" style="float: right; margin: 4px;" alt="(package)" />\\\n		<h3 style="margin: 0; padding: 4px;">Smiley of the Moment:</h3>\\\n		<div style="padding: 0 4px;">\\\n			<a href="javascript:smf_packagesMoreInfo(1666);void(0);">Alphabetic Smileys 1.0</a>\\\n		</div>\';\n\nwindow.smfLatestSmileys += \'\\\n		<h3 style="margin: 0; padding: 4px;">New Smileys:</h3>\\\n		<ul style="list-style: none; margin-top: 3px; padding: 0 4px;">\';\n\nfor (var i = 0; i < smf_latestSmileys.length; i++)\n{\n	var id_mod = smf_latestSmileys[i];\n\n	window.smfLatestSmileys += \'<li><a href="javascript:smf_packagesMoreInfo(\' + id_mod + \');void(0);">\' + smf_smileysInfo[id_mod].name + \'</a></li>\';\n}\n\nwindow.smfLatestSmileys += \'\\\n		</ul>\';\n\nwindow.smfLatestSmileys += \'\\\n	</div>\';\n\nfunction findTop(el)\n{\n	if (typeof(el.tagName) == "undefined")\n		return 0;\n\n	var skipMe = in_array(el.tagName.toLowerCase(), el.parentNode ? ["tr", "tbody", "form"] : []);\n	var coordsParent = el.parentNode ? "parentNode" : "offsetParent";\n\n	if (el[coordsParent] == null || typeof(el[coordsParent].offsetTop) == "undefined")\n		return skipMe ? 0 : el.offsetTop;\n	else\n		return (skipMe ? 0 : el.offsetTop) + findTop(el[coordsParent]);\n}\n\nfunction in_array(item, array)\n{\n	for (var i in array)\n	{\n		if (array[i] == item)\n			return true;\n	}\n\n	return false;\n}', 'text/javascript'),
	(6, 'latest-support.js', '/smf/', 'language=%1$s&version=%3$s', 'window.smfLatestSupport = \'<div style="font-size: 0.85em;"><div style="font-weight: bold;">SMF 1.1.14</div>A vulnerability has been fixed in this new release.  Please <a href="http://www.simplemachines.org/download.php">try it</a> before requesting support.</div>\';\n\nif (document.getElementById(\'credits\'))\n	setInnerHTML(document.getElementById(\'credits\'), getInnerHTML(document.getElementById(\'credits\')).replace(/thank you!/, \'<span onclick="alert(\\\'Kupo!\\\');">thank you!</span>\'));\n', 'text/javascript'),
	(7, 'latest-themes.js', '/smf/', 'language=%1$s&version=%3$s', '\r\nvar smf_themeInfo = {\r\n	2321: {\r\n		name: \'Sunblox Theme\',\r\n		desc: \'<div align="center"><img src="http://i1135.photobucket.com/albums/m638/smfsimple/logo-1.png" alt="" class="bbc_img" /></div><hr /><div align="center"><span style="color: red;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size"><strong>Key Features of the theme</strong></span></span></div><ul class="bbc_list"><li>nice and warm style. Ideal for online video games</li><li>Ability to choose the width of the board from the administration.</li><li>Ability to choose the logo of the forum from the administration. </li><li>Ability to include advertising in the top of the theme from the administration. None of mods that modify the codes of their forums! If you do not activate the advertising will focus on logo to put a very large</li><li>From the administration to put the copyright in your forum easy and simple way without mods. </li></ul><br /><div align="center"><span style="color: red;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size"><strong>Caracteristicas principales del theme</strong></span></span></div><ul class="bbc_list"><li>Estilo agradable y calido. Ideal para foros de Video juegos!</li><li>Posibilidad de elegir el ancho del foro desde la administracion.</li><li>Posibilidad de elegir el logo del foro desde la administracion.</li><li>Posibilidad de incluir una publicidad en la parte superior del theme desde la administracion. Nada de mods que modifiquen los codigos de sus foros! Si no activas la publicidad tendras centrado el logo para poner uno muy grande!</li><li>Desde la administracion podras poner el copyright de tu foro de forma facil y sencilla sin necesidad de mods.</li></ul><hr /><div align="center"><span style="color: red;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size"><strong>Capturas del theme</strong></span></span></div><div align="center"><img src="http://i1135.photobucket.com/albums/m638/smfsimple/SUNBLOX1.png?t=1295116218" alt="" width="600" height="338" class="bbc_img resized" /><br /><img src="http://i1135.photobucket.com/albums/m638/smfsimple/SUNBLOX2.png?t=1295116557" alt="" width="600" height="338" class="bbc_img resized" /><br /><img src="http://i1135.photobucket.com/albums/m638/smfsimple/SUNBLOX3.png?t=1295116484" alt="" width="600" height="167" class="bbc_img resized" /></div><br /><hr /><div align="center"><span style="color: red;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size"><strong>Demostración</strong></span></span></div><div align="center"><a href="http://www.smfsimple.com/themesdemo" class="bbc_link" target="_blank">www.smfsimple.com/themesdemo</a></div>\',\r\n		file: \'Sunblox_Theme_RC4.zip\',\r\n		author: \'Lean\'\r\n	},\r\n	2493: {\r\n		name: \'Theme : Red it Random \',\r\n		desc: \'<span style="color: green;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size">Red it Random</span></span><br /><hr /><strong> By : Ricky. |&nbsp; <a href="http://ifandbut.com/talk/index.php?topic=62.0" class="bbc_link" target="_blank">Theme Support</a>&nbsp; | <a href="http://custom.simplemachines.org/themes/index.php?action=profile;u=34192" class="bbc_link" target="_blank">My More Themes</a> </strong><br /><br />A Red colored dark theme with Glossy yet clean futuristic looks. Supported by beautiful random background feature which allows you to set various background&nbsp; from list of beautiful background through <strong>Theme Admin Page</strong>. Theme also lets you to set random background so that on every page load, your user will see a new background. <br /><br /><span style="color: green;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size">Features</span></span><br /><hr /><ul class="bbc_list"><li>Ability to set various trendy backgrounds</li><li>Allows you to set random background rotation automatically</li><li>Red Glossy theme yet with clean layout</li><li>A Dark theme</li><li>Fixed Width</li><li>Drop Down menu with transparency</li><li>Utilizing CSS3 supported by all modern browser</li><li>Allows you to add custom copyright in footer</li></ul><br /><br /><span style="color: green;" class="bbc_color"><span style="font-size: 14pt;" class="bbc_size">How to set Random or Static Backgrounds</span></span><br /><hr /><strong>Theme : Red it Random </strong> comes with ability to change background images, for that when you have selected this..<br /><br /><strong><span class="bbc_u">For Static Background:</span></strong><br /><strong>Goto --&gt; Admin --&gt; Configuration --&gt; Current Theme </strong><br />and choose your background from the list apart of &quot;Random Background&quot; . <br /><br /><br /><strong><span class="bbc_u">For Random Background:</span></strong><br /><strong>Goto --&gt; Admin --&gt; Configuration --&gt; Current Theme </strong><br />and choose &quot;Random Background&quot; from drop down menu <br /><br />Don&#039;t forget to save settings in order to see the results. <br /><br /><strong><span class="bbc_u">Updates:</span></strong><br />9/12/2011 - Made menu arrangements so that you can have multi-line buttons without breaking layout.<br />9/13/2011 - Fixed some icon issues.\',\r\n		file: \'red-it-random.zip\',\r\n		author: \'Ricky.\'\r\n	},\r\n	2487: {\r\n		name: \'Multi Milk 2\',\r\n		desc: \'A remade version of the theme used by <a href="http://multitalk2.com" class="bbc_link" target="_blank">Multi Talk 2</a>, featuring more options than a previous 1.1 theme of mine, Around the World in 80 Settings. <br /><br /><strong>DESIGNED BY</strong>: <a href="http://multitalk2.com" class="bbc_link" target="_blank">MT2-Soft</a>, header background banner designed by Leif Jensen.<br /><br /><a href="http://multitalk2.com/index.php?topic=6526" class="bbc_link" target="_blank">[Click Here for an MT2-Soft FAQ]</a><br /><br /><strong>LANGUAGES SUPPORTED</strong><br />English<br />English British (&quot;Translated&quot; by Gary M. Gadsdon)<br /><br />UTF-8 options are available for all languages supported.<br /><br /><strong>NOTES</strong>:<br />This theme contains CSS3, which some browsers (specifically) IE (all versions) do not render properly. Also, this theme is totally incompatible with IE versions 6 and 7. Also, this theme is incompatible with RTL languages.<br /><br /><strong>EXTRAS</strong>:<br />The following features are available in the &quot;Current Theme&quot; Section of your Admin Center.<br /><ul class="bbc_list"><li><strong>Colourforms</strong>: User changeable skins to change the theme&#039;s colour, this can be turned on or off at will and a default colour can also be set. Available colours are Blue, Pink, Green and Red</li><li><strong>Custom Logo</strong>: You can apply your own custom logo.</li><li><strong>Favicon</strong>: You can define your own shortcut icon.</li><li><strong>Banner Image</strong>: You can set a banner image to go above the template_menu()</li><li><strong>Navigation Menu Styles</strong>: You can set your template_menu() to look like previous default themes of SMF, all four options (Curve, Core, Babylon and Classic YaBB SE) are available.</li><li><strong>Dropdown menus</strong>: Only available in Curve style</li><li><strong>Menu icons</strong>: Always available in Babylon and Classic, optional in Curve, not available in Core</li><li><strong>Registration Bar</strong>: Display a bar across the top of the forum for guests</li><li><strong>Member Box</strong>: Display a box on the BoardIndex to &quot;persuade&quot; new members to post</li><li><strong>BoardIndex Cells</strong>: You can allow for one cell like in the Core theme, or Two like in the Classic YaBB SE, along with larger stat numbers.</li><li><strong>Rename Child Boards</strong>: You can rename the string used to identify Child Boards in public areas. (Admin Areas are not effected)</li><li><strong>Board Icon Filetype</strong>: You can change the filetype that Board icons use</li><li><strong>Custom Board Icons</strong>: You can give each board their own icon. The above setting does apply to Custom Board Icons.</li><li><strong>RSS Button</strong>: Each board can have their own RSS Button</li><li><strong>Linktree style</strong>: You can change the linktree style to look like Curve, Babylon/Classic or even vBulletin 3.8&#039;s method</li><li><strong>Moderator Location</strong>: You can adjust where the listed names of moderators appear</li><li><strong>Moderator Buttons</strong>: You can also adjust where the buttons for moderating are (Quote, Modify, Delete, Split etc..)</li><li><strong>Attachment Alignment</strong>: You can place attachments horizontally or vertically from each other</li><li><strong>Ad Support</strong>: You can place an ad without having to install any mods, though support for Sinan&#039;s <a href="http://custom.simplemachines.org/mods/index.php?mod=2557" class="bbc_link" target="_blank">Simple Ad Mod</a> is available.</li><li><strong>More Display info</strong>: You can display icons for topic starters, Locations, Join Dates and direct links for copying and pasting in posts</li><li><strong>More Moderation Options</strong>: You can quick jump posts and ban members directly from their posts</li><li><strong>Custom Copyright Notice</strong>: You can add your own copyright notice after the SMF and MT2-Soft notices.</li></ul><br /><strong>MODS SUPPORTED</strong><br /><ul class="bbc_list"><li>Related Topics by Niko</li><li>Users Online Today by Carceri</li><li>Country Flags by JayBachatero and vbgamer45</li><li>Member Awards by JayBachatero and Spuds</li><li>SMF Tags by vbgamer45</li><li>Topics on Display by digger</li><li>Delete Spam Posts by Kays</li><li>Copy Topics by karlbenson and vbgamer45</li><li>Board Message Icon by Yağız...</li><li>Post Unapproval by SleePy</li><li>OS and Browser Detection by X3mE</li><li>Additional Polls by Windy</li><li>Topic Notices by Akyhne</li><li>Previous/Next Topic by SoLoGHoST</li><li>Enhanced PMs by Spuds and cσσкιє мσηѕтєя</li><li>Tidy Child Boards by Robbo_</li><li>Multi Quote by Nibogo</li><li>Board Notices by Windy</li><li>Server Load Detection by Paulpbaker</li><li>Nickname to Reply by Bugo</li></ul><br />Support for all portals (Except Dream Portal) are available as well as support for ADK-Blog and SimpleDesk.<br /><br /><strong>LICENCE:</strong><br />Multi Milk 2 is bound by the MT2-Soft Licence which allows you to use and modify the theme free of charge provided our copyright notice is included fully legible unchanged. To remove the copyright notice, you must <a href="mailto:gazmanafc@simplemachines.org" class="bbc_email">contact me directly</a> and pay a set fee.<br /><br /><strong>DEMO: </strong>A Demo of this theme is available at <a href="http://multitalk2.com" class="bbc_link" target="_blank">MultiTalk2.com</a><br /><br /><strong>LOCALISATION:</strong> If you would like to translate Multi Milk 2 into your language, please send me a message directly so I can provide you with a special translating package. <br /><br /><strong>BONUS CREDITS:</strong><br /><ul class="bbc_list"><li>RunicWarrior: For suggestions on features to implement into the theme.</li><li>Leif Jensen: For designing the coloured banner background image.</li></ul>\',\r\n		file: \'multimilk2.zip\',\r\n		author: \'Gary\'\r\n	},\r\n	2482: {\r\n		name: \'Ubuntu Theme\',\r\n		desc: \'Ubuntu Theme is a beautiful Curve variation. <br />Theme uses Google Font API which brings Ubuntu font on the whole forum.<br /><br />With my theme you can create fan site or local community about Ubuntu.<br />Author of the theme is not affiliated with Ubuntu or Canonical Ltd.<br />If you want to use my theme on sites not related to the Ubuntu, you must remove logos and images that are property of Ubuntu and Canonical Ltd.<br /><br />Theme uses CSS3 so some browsers can view theme not properly.<br /><br />Demo: <a href="http://demo.wizzi.pl/" class="bbc_link" target="_blank">http://demo.wizzi.pl</a>\',\r\n		file: \'Ubuntu_Theme.zip\',\r\n		author: \'Nolt\'\r\n	},\r\n	1878: {\r\n		name: \'Dilek\',\r\n		desc: \'SMF 2.0 Themes .<br /><br /><strong><a href="http://www.simpleturk.com/demosite" class="bbc_link" target="_blank">Live Demo - SimpleTurk.Com/Demosite</a></strong>\',\r\n		file: \'dilek.zip\',\r\n		author: \'N a t i\'\r\n	}\r\n};\r\nvar smf_featured = 2321;\r\nvar smf_random = 1878;\r\nvar smf_latestThemes = [2493, 2487, 2482];\r\nfunction smf_themesMoreInfo(id)\r\n{\r\n	window.smfLatestThemes_temp = document.getElementById("smfLatestThemesWindow").innerHTML;\n\n	// !!! Why not just always auto?\n	document.getElementById("smfLatestThemesWindow").style.overflow = "auto";\n	setInnerHTML(document.getElementById("smfLatestThemesWindow"),\n	\'\\\n		<h3 style="margin: 0; padding: 4px;">\' + smf_themeInfo[id].name + \'</h3>\\\r\n		<h4 style="margin: 0;padding: 4px;"><a href="http://custom.simplemachines.org/themes/index.php?lemma=\' + id + \'">View Theme Now!</a></h4>\\\r\n		<div style="overflow: auto;">\\\r\n			<img src="http://custom.simplemachines.org/themes/index.php?action=download;lemma=\'+id+\';image=thumb" alt="" style="float: right; margin: 10px;" />\\\r\n			<div style="padding:8px;">\' + smf_themeInfo[id].desc.replace(/<a href/g, \'<a href\') + \'</div>\\\r\n		</div>\\\r\n		<div style="padding: 4px;" class="smalltext"><a href="javascript:smf_themesBack();void(0);">(go back)</a></div>\');\n}\r\n\r\nfunction smf_themesBack()\r\n{\r\n	document.getElementById("smfLatestThemesWindow").style.overflow = "";\n	setInnerHTML(document.getElementById("smfLatestThemesWindow"), window.smfLatestThemes_temp);\n	window.scrollTo(0, findTop(document.getElementById("smfLatestThemesWindow")) - 10);\r\n}\r\n\r\nwindow.smfLatestThemes = \'\\\r\n	<div id="smfLatestThemesWindow">\\\r\n		<div>\\\r\n			<img src="http://www.simplemachines.org/smf/images/themes.png" width="102" height="98" style="float: right; margin: 0 0 10px 10px;" alt="(package)" />\\\r\n			<ul style="list-style: none; padding: 0; margin: 0 0 0 5px;">\';\r\nfor(var i=0; i < smf_latestThemes.length; i++)\r\n{\r\n	var id_theme = smf_latestThemes[i];\r\n	window.smfLatestThemes += \'\\\r\n				<li style="list-style: none;"><a href="javascript:smf_themesMoreInfo(\' + id_theme + \');void(0);">\' + smf_themeInfo[id_theme].name + \' by \' + smf_themeInfo[id_theme].author + \'</a></li>\';\r\n}\r\n\r\nwindow.smfLatestThemes += \'\\\r\n			</ul>\';\r\nif ( smf_featured !=0 || smf_random != 0 )\r\n{\r\n\r\n	if ( smf_featured != 0 )\r\n		window.smfLatestThemes += \'\\\r\n				<h4 style="padding: 4px 4px 0 4px; margin: 0;">Featured Theme</h4>\\\r\n				<p style="padding: 0 4px; margin: 0;">\\\r\n					<a href="javascript:smf_themesMoreInfo(\'+smf_featured+\');void(0);">\'+smf_themeInfo[smf_featured].name + \' by \' + smf_themeInfo[smf_featured].author+\'</a>\\\r\n				</p>\';\r\n	if ( smf_random != 0 )\r\n		window.smfLatestThemes += \'\\\r\n				<h4 style="padding: 4px 4px 0 4px;margin: 0;">Theme of the Moment</h4>\\\r\n				<p style="padding: 0 4px; margin: 0;">\\\r\n					<a href="javascript:smf_themesMoreInfo(\'+smf_random+\');void(0);">\'+smf_themeInfo[smf_random].name + \' by \' + smf_themeInfo[smf_random].author+\'</a>\\\r\n				</p>\';\r\n}\r\nwindow.smfLatestThemes += \'\\\r\n		</div>\\\r\n	</div>\';\r\n\r\nfunction findTop(el)\r\n{\r\n	if (typeof(el.tagName) == "undefined")\r\n		return 0;\r\n\r\n	var skipMe = in_array(el.tagName.toLowerCase(), el.parentNode ? ["tr", "tbody", "form"] : []);\r\n	var coordsParent = el.parentNode ? "parentNode" : "offsetParent";\r\n\r\n	if (el[coordsParent] == null || typeof(el[coordsParent].offsetTop) == "undefined")\r\n		return skipMe ? 0 : el.offsetTop;\r\n	else\r\n		return (skipMe ? 0 : el.offsetTop) + findTop(el[coordsParent]);\r\n}\r\n\r\nfunction in_array(item, array)\r\n{\r\n	for (var i in array)\r\n	{\r\n		if (array[i] == item)\r\n			return true;\r\n	}\r\n\r\n	return false;\r\n}', 'text/javascript');
/*!40000 ALTER TABLE `smf_admin_info_files` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_approval_queue
CREATE TABLE IF NOT EXISTS `smf_approval_queue` (
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  `id_attach` int(10) unsigned NOT NULL DEFAULT '0',
  `id_event` smallint(5) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_approval_queue: 0 rows
/*!40000 ALTER TABLE `smf_approval_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_approval_queue` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_attachments
CREATE TABLE IF NOT EXISTS `smf_attachments` (
  `id_attach` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_thumb` int(10) unsigned NOT NULL DEFAULT '0',
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_folder` tinyint(3) NOT NULL DEFAULT '1',
  `attachment_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `file_hash` varchar(40) NOT NULL DEFAULT '',
  `fileext` varchar(8) NOT NULL DEFAULT '',
  `size` int(10) unsigned NOT NULL DEFAULT '0',
  `downloads` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `width` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `height` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `mime_type` varchar(20) NOT NULL DEFAULT '',
  `approved` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_attach`),
  UNIQUE KEY `id_member` (`id_member`,`id_attach`),
  KEY `id_msg` (`id_msg`),
  KEY `attachment_type` (`attachment_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_attachments: 0 rows
/*!40000 ALTER TABLE `smf_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_attachments` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_ban_groups
CREATE TABLE IF NOT EXISTS `smf_ban_groups` (
  `id_ban_group` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `ban_time` int(10) unsigned NOT NULL DEFAULT '0',
  `expire_time` int(10) unsigned DEFAULT NULL,
  `cannot_access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `cannot_register` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `cannot_post` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `cannot_login` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `notes` text NOT NULL,
  PRIMARY KEY (`id_ban_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_ban_groups: 0 rows
/*!40000 ALTER TABLE `smf_ban_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_ban_groups` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_ban_items
CREATE TABLE IF NOT EXISTS `smf_ban_items` (
  `id_ban` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id_ban_group` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ip_low1` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ip_high1` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ip_low2` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ip_high2` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ip_low3` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ip_high3` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ip_low4` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ip_high4` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `hostname` varchar(255) NOT NULL DEFAULT '',
  `email_address` varchar(255) NOT NULL DEFAULT '',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hits` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ban`),
  KEY `id_ban_group` (`id_ban_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_ban_items: 0 rows
/*!40000 ALTER TABLE `smf_ban_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_ban_items` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_boards
CREATE TABLE IF NOT EXISTS `smf_boards` (
  `id_board` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_cat` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `child_level` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `id_parent` smallint(5) unsigned NOT NULL DEFAULT '0',
  `board_order` smallint(5) NOT NULL DEFAULT '0',
  `id_last_msg` int(10) unsigned NOT NULL DEFAULT '0',
  `id_msg_updated` int(10) unsigned NOT NULL DEFAULT '0',
  `member_groups` varchar(255) NOT NULL DEFAULT '-1,0',
  `id_profile` smallint(5) unsigned NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `num_topics` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `num_posts` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `count_posts` tinyint(4) NOT NULL DEFAULT '0',
  `id_theme` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `override_theme` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `unapproved_posts` smallint(5) NOT NULL DEFAULT '0',
  `unapproved_topics` smallint(5) NOT NULL DEFAULT '0',
  `redirect` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_board`),
  UNIQUE KEY `categories` (`id_cat`,`id_board`),
  KEY `id_parent` (`id_parent`),
  KEY `id_msg_updated` (`id_msg_updated`),
  KEY `member_groups` (`member_groups`(48))
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_boards: 1 rows
/*!40000 ALTER TABLE `smf_boards` DISABLE KEYS */;
INSERT INTO `smf_boards` (`id_board`, `id_cat`, `child_level`, `id_parent`, `board_order`, `id_last_msg`, `id_msg_updated`, `member_groups`, `id_profile`, `name`, `description`, `num_topics`, `num_posts`, `count_posts`, `id_theme`, `override_theme`, `unapproved_posts`, `unapproved_topics`, `redirect`) VALUES
	(1, 1, 0, 0, 1, 1, 1, '-1,0,2', 1, 'General Discussion', 'Feel free to talk about anything and everything in this board.', 1, 1, 0, 0, 0, 0, 0, '');
/*!40000 ALTER TABLE `smf_boards` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_board_permissions
CREATE TABLE IF NOT EXISTS `smf_board_permissions` (
  `id_group` smallint(5) NOT NULL DEFAULT '0',
  `id_profile` smallint(5) unsigned NOT NULL DEFAULT '0',
  `permission` varchar(30) NOT NULL DEFAULT '',
  `add_deny` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_group`,`id_profile`,`permission`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_board_permissions: 334 rows
/*!40000 ALTER TABLE `smf_board_permissions` DISABLE KEYS */;
INSERT INTO `smf_board_permissions` (`id_group`, `id_profile`, `permission`, `add_deny`) VALUES
	(-1, 1, 'poll_view', 1),
	(0, 1, 'remove_own', 1),
	(0, 1, 'lock_own', 1),
	(0, 1, 'mark_any_notify', 1),
	(0, 1, 'mark_notify', 1),
	(0, 1, 'modify_own', 1),
	(0, 1, 'poll_add_own', 1),
	(0, 1, 'poll_edit_own', 1),
	(0, 1, 'poll_lock_own', 1),
	(0, 1, 'poll_post', 1),
	(0, 1, 'poll_view', 1),
	(0, 1, 'poll_vote', 1),
	(0, 1, 'post_attachment', 1),
	(0, 1, 'post_new', 1),
	(0, 1, 'post_reply_any', 1),
	(0, 1, 'post_reply_own', 1),
	(0, 1, 'post_unapproved_topics', 1),
	(0, 1, 'post_unapproved_replies_any', 1),
	(0, 1, 'post_unapproved_replies_own', 1),
	(0, 1, 'post_unapproved_attachments', 1),
	(0, 1, 'delete_own', 1),
	(0, 1, 'report_any', 1),
	(0, 1, 'send_topic', 1),
	(0, 1, 'view_attachments', 1),
	(2, 1, 'moderate_board', 1),
	(2, 1, 'post_new', 1),
	(2, 1, 'post_reply_own', 1),
	(2, 1, 'post_reply_any', 1),
	(2, 1, 'post_unapproved_topics', 1),
	(2, 1, 'post_unapproved_replies_any', 1),
	(2, 1, 'post_unapproved_replies_own', 1),
	(2, 1, 'post_unapproved_attachments', 1),
	(2, 1, 'poll_post', 1),
	(2, 1, 'poll_add_any', 1),
	(2, 1, 'poll_remove_any', 1),
	(2, 1, 'poll_view', 1),
	(2, 1, 'poll_vote', 1),
	(2, 1, 'poll_lock_any', 1),
	(2, 1, 'poll_edit_any', 1),
	(2, 1, 'report_any', 1),
	(2, 1, 'lock_own', 1),
	(2, 1, 'send_topic', 1),
	(2, 1, 'mark_any_notify', 1),
	(2, 1, 'mark_notify', 1),
	(2, 1, 'delete_own', 1),
	(2, 1, 'modify_own', 1),
	(2, 1, 'make_sticky', 1),
	(2, 1, 'lock_any', 1),
	(2, 1, 'remove_any', 1),
	(2, 1, 'move_any', 1),
	(2, 1, 'merge_any', 1),
	(2, 1, 'split_any', 1),
	(2, 1, 'delete_any', 1),
	(2, 1, 'modify_any', 1),
	(2, 1, 'approve_posts', 1),
	(2, 1, 'post_attachment', 1),
	(2, 1, 'view_attachments', 1),
	(3, 1, 'moderate_board', 1),
	(3, 1, 'post_new', 1),
	(3, 1, 'post_reply_own', 1),
	(3, 1, 'post_reply_any', 1),
	(3, 1, 'post_unapproved_topics', 1),
	(3, 1, 'post_unapproved_replies_any', 1),
	(3, 1, 'post_unapproved_replies_own', 1),
	(3, 1, 'post_unapproved_attachments', 1),
	(3, 1, 'poll_post', 1),
	(3, 1, 'poll_add_any', 1),
	(3, 1, 'poll_remove_any', 1),
	(3, 1, 'poll_view', 1),
	(3, 1, 'poll_vote', 1),
	(3, 1, 'poll_lock_any', 1),
	(3, 1, 'poll_edit_any', 1),
	(3, 1, 'report_any', 1),
	(3, 1, 'lock_own', 1),
	(3, 1, 'send_topic', 1),
	(3, 1, 'mark_any_notify', 1),
	(3, 1, 'mark_notify', 1),
	(3, 1, 'delete_own', 1),
	(3, 1, 'modify_own', 1),
	(3, 1, 'make_sticky', 1),
	(3, 1, 'lock_any', 1),
	(3, 1, 'remove_any', 1),
	(3, 1, 'move_any', 1),
	(3, 1, 'merge_any', 1),
	(3, 1, 'split_any', 1),
	(3, 1, 'delete_any', 1),
	(3, 1, 'modify_any', 1),
	(3, 1, 'approve_posts', 1),
	(3, 1, 'post_attachment', 1),
	(3, 1, 'view_attachments', 1),
	(-1, 2, 'poll_view', 1),
	(0, 2, 'remove_own', 1),
	(0, 2, 'lock_own', 1),
	(0, 2, 'mark_any_notify', 1),
	(0, 2, 'mark_notify', 1),
	(0, 2, 'modify_own', 1),
	(0, 2, 'poll_view', 1),
	(0, 2, 'poll_vote', 1),
	(0, 2, 'post_attachment', 1),
	(0, 2, 'post_new', 1),
	(0, 2, 'post_reply_any', 1),
	(0, 2, 'post_reply_own', 1),
	(0, 2, 'post_unapproved_topics', 1),
	(0, 2, 'post_unapproved_replies_any', 1),
	(0, 2, 'post_unapproved_replies_own', 1),
	(0, 2, 'post_unapproved_attachments', 1),
	(0, 2, 'delete_own', 1),
	(0, 2, 'report_any', 1),
	(0, 2, 'send_topic', 1),
	(0, 2, 'view_attachments', 1),
	(2, 2, 'moderate_board', 1),
	(2, 2, 'post_new', 1),
	(2, 2, 'post_reply_own', 1),
	(2, 2, 'post_reply_any', 1),
	(2, 2, 'post_unapproved_topics', 1),
	(2, 2, 'post_unapproved_replies_any', 1),
	(2, 2, 'post_unapproved_replies_own', 1),
	(2, 2, 'post_unapproved_attachments', 1),
	(2, 2, 'poll_post', 1),
	(2, 2, 'poll_add_any', 1),
	(2, 2, 'poll_remove_any', 1),
	(2, 2, 'poll_view', 1),
	(2, 2, 'poll_vote', 1),
	(2, 2, 'poll_lock_any', 1),
	(2, 2, 'poll_edit_any', 1),
	(2, 2, 'report_any', 1),
	(2, 2, 'lock_own', 1),
	(2, 2, 'send_topic', 1),
	(2, 2, 'mark_any_notify', 1),
	(2, 2, 'mark_notify', 1),
	(2, 2, 'delete_own', 1),
	(2, 2, 'modify_own', 1),
	(2, 2, 'make_sticky', 1),
	(2, 2, 'lock_any', 1),
	(2, 2, 'remove_any', 1),
	(2, 2, 'move_any', 1),
	(2, 2, 'merge_any', 1),
	(2, 2, 'split_any', 1),
	(2, 2, 'delete_any', 1),
	(2, 2, 'modify_any', 1),
	(2, 2, 'approve_posts', 1),
	(2, 2, 'post_attachment', 1),
	(2, 2, 'view_attachments', 1),
	(3, 2, 'moderate_board', 1),
	(3, 2, 'post_new', 1),
	(3, 2, 'post_reply_own', 1),
	(3, 2, 'post_reply_any', 1),
	(3, 2, 'post_unapproved_topics', 1),
	(3, 2, 'post_unapproved_replies_any', 1),
	(3, 2, 'post_unapproved_replies_own', 1),
	(3, 2, 'post_unapproved_attachments', 1),
	(3, 2, 'poll_post', 1),
	(3, 2, 'poll_add_any', 1),
	(3, 2, 'poll_remove_any', 1),
	(3, 2, 'poll_view', 1),
	(3, 2, 'poll_vote', 1),
	(3, 2, 'poll_lock_any', 1),
	(3, 2, 'poll_edit_any', 1),
	(3, 2, 'report_any', 1),
	(3, 2, 'lock_own', 1),
	(3, 2, 'send_topic', 1),
	(3, 2, 'mark_any_notify', 1),
	(3, 2, 'mark_notify', 1),
	(3, 2, 'delete_own', 1),
	(3, 2, 'modify_own', 1),
	(3, 2, 'make_sticky', 1),
	(3, 2, 'lock_any', 1),
	(3, 2, 'remove_any', 1),
	(3, 2, 'move_any', 1),
	(3, 2, 'merge_any', 1),
	(3, 2, 'split_any', 1),
	(3, 2, 'delete_any', 1),
	(3, 2, 'modify_any', 1),
	(3, 2, 'approve_posts', 1),
	(3, 2, 'post_attachment', 1),
	(3, 2, 'view_attachments', 1),
	(-1, 3, 'poll_view', 1),
	(0, 3, 'remove_own', 1),
	(0, 3, 'lock_own', 1),
	(0, 3, 'mark_any_notify', 1),
	(0, 3, 'mark_notify', 1),
	(0, 3, 'modify_own', 1),
	(0, 3, 'poll_view', 1),
	(0, 3, 'poll_vote', 1),
	(0, 3, 'post_attachment', 1),
	(0, 3, 'post_reply_any', 1),
	(0, 3, 'post_reply_own', 1),
	(0, 3, 'post_unapproved_replies_any', 1),
	(0, 3, 'post_unapproved_replies_own', 1),
	(0, 3, 'post_unapproved_attachments', 1),
	(0, 3, 'delete_own', 1),
	(0, 3, 'report_any', 1),
	(0, 3, 'send_topic', 1),
	(0, 3, 'view_attachments', 1),
	(2, 3, 'moderate_board', 1),
	(2, 3, 'post_new', 1),
	(2, 3, 'post_reply_own', 1),
	(2, 3, 'post_reply_any', 1),
	(2, 3, 'post_unapproved_topics', 1),
	(2, 3, 'post_unapproved_replies_any', 1),
	(2, 3, 'post_unapproved_replies_own', 1),
	(2, 3, 'post_unapproved_attachments', 1),
	(2, 3, 'poll_post', 1),
	(2, 3, 'poll_add_any', 1),
	(2, 3, 'poll_remove_any', 1),
	(2, 3, 'poll_view', 1),
	(2, 3, 'poll_vote', 1),
	(2, 3, 'poll_lock_any', 1),
	(2, 3, 'poll_edit_any', 1),
	(2, 3, 'report_any', 1),
	(2, 3, 'lock_own', 1),
	(2, 3, 'send_topic', 1),
	(2, 3, 'mark_any_notify', 1),
	(2, 3, 'mark_notify', 1),
	(2, 3, 'delete_own', 1),
	(2, 3, 'modify_own', 1),
	(2, 3, 'make_sticky', 1),
	(2, 3, 'lock_any', 1),
	(2, 3, 'remove_any', 1),
	(2, 3, 'move_any', 1),
	(2, 3, 'merge_any', 1),
	(2, 3, 'split_any', 1),
	(2, 3, 'delete_any', 1),
	(2, 3, 'modify_any', 1),
	(2, 3, 'approve_posts', 1),
	(2, 3, 'post_attachment', 1),
	(2, 3, 'view_attachments', 1),
	(3, 3, 'moderate_board', 1),
	(3, 3, 'post_new', 1),
	(3, 3, 'post_reply_own', 1),
	(3, 3, 'post_reply_any', 1),
	(3, 3, 'post_unapproved_topics', 1),
	(3, 3, 'post_unapproved_replies_any', 1),
	(3, 3, 'post_unapproved_replies_own', 1),
	(3, 3, 'post_unapproved_attachments', 1),
	(3, 3, 'poll_post', 1),
	(3, 3, 'poll_add_any', 1),
	(3, 3, 'poll_remove_any', 1),
	(3, 3, 'poll_view', 1),
	(3, 3, 'poll_vote', 1),
	(3, 3, 'poll_lock_any', 1),
	(3, 3, 'poll_edit_any', 1),
	(3, 3, 'report_any', 1),
	(3, 3, 'lock_own', 1),
	(3, 3, 'send_topic', 1),
	(3, 3, 'mark_any_notify', 1),
	(3, 3, 'mark_notify', 1),
	(3, 3, 'delete_own', 1),
	(3, 3, 'modify_own', 1),
	(3, 3, 'make_sticky', 1),
	(3, 3, 'lock_any', 1),
	(3, 3, 'remove_any', 1),
	(3, 3, 'move_any', 1),
	(3, 3, 'merge_any', 1),
	(3, 3, 'split_any', 1),
	(3, 3, 'delete_any', 1),
	(3, 3, 'modify_any', 1),
	(3, 3, 'approve_posts', 1),
	(3, 3, 'post_attachment', 1),
	(3, 3, 'view_attachments', 1),
	(-1, 4, 'poll_view', 1),
	(0, 4, 'mark_any_notify', 1),
	(0, 4, 'mark_notify', 1),
	(0, 4, 'poll_view', 1),
	(0, 4, 'poll_vote', 1),
	(0, 4, 'report_any', 1),
	(0, 4, 'send_topic', 1),
	(0, 4, 'view_attachments', 1),
	(2, 4, 'moderate_board', 1),
	(2, 4, 'post_new', 1),
	(2, 4, 'post_reply_own', 1),
	(2, 4, 'post_reply_any', 1),
	(2, 4, 'post_unapproved_topics', 1),
	(2, 4, 'post_unapproved_replies_any', 1),
	(2, 4, 'post_unapproved_replies_own', 1),
	(2, 4, 'post_unapproved_attachments', 1),
	(2, 4, 'poll_post', 1),
	(2, 4, 'poll_add_any', 1),
	(2, 4, 'poll_remove_any', 1),
	(2, 4, 'poll_view', 1),
	(2, 4, 'poll_vote', 1),
	(2, 4, 'poll_lock_any', 1),
	(2, 4, 'poll_edit_any', 1),
	(2, 4, 'report_any', 1),
	(2, 4, 'lock_own', 1),
	(2, 4, 'send_topic', 1),
	(2, 4, 'mark_any_notify', 1),
	(2, 4, 'mark_notify', 1),
	(2, 4, 'delete_own', 1),
	(2, 4, 'modify_own', 1),
	(2, 4, 'make_sticky', 1),
	(2, 4, 'lock_any', 1),
	(2, 4, 'remove_any', 1),
	(2, 4, 'move_any', 1),
	(2, 4, 'merge_any', 1),
	(2, 4, 'split_any', 1),
	(2, 4, 'delete_any', 1),
	(2, 4, 'modify_any', 1),
	(2, 4, 'approve_posts', 1),
	(2, 4, 'post_attachment', 1),
	(2, 4, 'view_attachments', 1),
	(3, 4, 'moderate_board', 1),
	(3, 4, 'post_new', 1),
	(3, 4, 'post_reply_own', 1),
	(3, 4, 'post_reply_any', 1),
	(3, 4, 'post_unapproved_topics', 1),
	(3, 4, 'post_unapproved_replies_any', 1),
	(3, 4, 'post_unapproved_replies_own', 1),
	(3, 4, 'post_unapproved_attachments', 1),
	(3, 4, 'poll_post', 1),
	(3, 4, 'poll_add_any', 1),
	(3, 4, 'poll_remove_any', 1),
	(3, 4, 'poll_view', 1),
	(3, 4, 'poll_vote', 1),
	(3, 4, 'poll_lock_any', 1),
	(3, 4, 'poll_edit_any', 1),
	(3, 4, 'report_any', 1),
	(3, 4, 'lock_own', 1),
	(3, 4, 'send_topic', 1),
	(3, 4, 'mark_any_notify', 1),
	(3, 4, 'mark_notify', 1),
	(3, 4, 'delete_own', 1),
	(3, 4, 'modify_own', 1),
	(3, 4, 'make_sticky', 1),
	(3, 4, 'lock_any', 1),
	(3, 4, 'remove_any', 1),
	(3, 4, 'move_any', 1),
	(3, 4, 'merge_any', 1),
	(3, 4, 'split_any', 1),
	(3, 4, 'delete_any', 1),
	(3, 4, 'modify_any', 1),
	(3, 4, 'approve_posts', 1),
	(3, 4, 'post_attachment', 1),
	(3, 4, 'view_attachments', 1);
/*!40000 ALTER TABLE `smf_board_permissions` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_calendar
CREATE TABLE IF NOT EXISTS `smf_calendar` (
  `id_event` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL DEFAULT '0001-01-01',
  `end_date` date NOT NULL DEFAULT '0001-01-01',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_event`),
  KEY `start_date` (`start_date`),
  KEY `end_date` (`end_date`),
  KEY `topic` (`id_topic`,`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_calendar: 0 rows
/*!40000 ALTER TABLE `smf_calendar` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_calendar` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_calendar_holidays
CREATE TABLE IF NOT EXISTS `smf_calendar_holidays` (
  `id_holiday` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `event_date` date NOT NULL DEFAULT '0001-01-01',
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_holiday`),
  KEY `event_date` (`event_date`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_calendar_holidays: 115 rows
/*!40000 ALTER TABLE `smf_calendar_holidays` DISABLE KEYS */;
INSERT INTO `smf_calendar_holidays` (`id_holiday`, `event_date`, `title`) VALUES
	(1, '0004-01-01', 'New Year\'s'),
	(2, '0004-12-25', 'Christmas'),
	(3, '0004-02-14', 'Valentine\'s Day'),
	(4, '0004-03-17', 'St. Patrick\'s Day'),
	(5, '0004-04-01', 'April Fools'),
	(6, '0004-04-22', 'Earth Day'),
	(7, '0004-10-24', 'United Nations Day'),
	(8, '0004-10-31', 'Halloween'),
	(9, '2010-05-09', 'Mother\'s Day'),
	(10, '2011-05-08', 'Mother\'s Day'),
	(11, '2012-05-13', 'Mother\'s Day'),
	(12, '2013-05-12', 'Mother\'s Day'),
	(13, '2014-05-11', 'Mother\'s Day'),
	(14, '2015-05-10', 'Mother\'s Day'),
	(15, '2016-05-08', 'Mother\'s Day'),
	(16, '2017-05-14', 'Mother\'s Day'),
	(17, '2018-05-13', 'Mother\'s Day'),
	(18, '2019-05-12', 'Mother\'s Day'),
	(19, '2020-05-10', 'Mother\'s Day'),
	(20, '2008-06-15', 'Father\'s Day'),
	(21, '2009-06-21', 'Father\'s Day'),
	(22, '2010-06-20', 'Father\'s Day'),
	(23, '2011-06-19', 'Father\'s Day'),
	(24, '2012-06-17', 'Father\'s Day'),
	(25, '2013-06-16', 'Father\'s Day'),
	(26, '2014-06-15', 'Father\'s Day'),
	(27, '2015-06-21', 'Father\'s Day'),
	(28, '2016-06-19', 'Father\'s Day'),
	(29, '2017-06-18', 'Father\'s Day'),
	(30, '2018-06-17', 'Father\'s Day'),
	(31, '2019-06-16', 'Father\'s Day'),
	(32, '2020-06-21', 'Father\'s Day'),
	(33, '2010-06-21', 'Summer Solstice'),
	(34, '2011-06-21', 'Summer Solstice'),
	(35, '2012-06-20', 'Summer Solstice'),
	(36, '2013-06-21', 'Summer Solstice'),
	(37, '2014-06-21', 'Summer Solstice'),
	(38, '2015-06-21', 'Summer Solstice'),
	(39, '2016-06-20', 'Summer Solstice'),
	(40, '2017-06-20', 'Summer Solstice'),
	(41, '2018-06-21', 'Summer Solstice'),
	(42, '2019-06-21', 'Summer Solstice'),
	(43, '2020-06-20', 'Summer Solstice'),
	(44, '2010-03-20', 'Vernal Equinox'),
	(45, '2011-03-20', 'Vernal Equinox'),
	(46, '2012-03-20', 'Vernal Equinox'),
	(47, '2013-03-20', 'Vernal Equinox'),
	(48, '2014-03-20', 'Vernal Equinox'),
	(49, '2015-03-20', 'Vernal Equinox'),
	(50, '2016-03-19', 'Vernal Equinox'),
	(51, '2017-03-20', 'Vernal Equinox'),
	(52, '2018-03-20', 'Vernal Equinox'),
	(53, '2019-03-20', 'Vernal Equinox'),
	(54, '2020-03-19', 'Vernal Equinox'),
	(55, '2010-12-21', 'Winter Solstice'),
	(56, '2011-12-22', 'Winter Solstice'),
	(57, '2012-12-21', 'Winter Solstice'),
	(58, '2013-12-21', 'Winter Solstice'),
	(59, '2014-12-21', 'Winter Solstice'),
	(60, '2015-12-21', 'Winter Solstice'),
	(61, '2016-12-21', 'Winter Solstice'),
	(62, '2017-12-21', 'Winter Solstice'),
	(63, '2018-12-21', 'Winter Solstice'),
	(64, '2019-12-21', 'Winter Solstice'),
	(65, '2020-12-21', 'Winter Solstice'),
	(66, '2010-09-22', 'Autumnal Equinox'),
	(67, '2011-09-23', 'Autumnal Equinox'),
	(68, '2012-09-22', 'Autumnal Equinox'),
	(69, '2013-09-22', 'Autumnal Equinox'),
	(70, '2014-09-22', 'Autumnal Equinox'),
	(71, '2015-09-23', 'Autumnal Equinox'),
	(72, '2016-09-22', 'Autumnal Equinox'),
	(73, '2017-09-22', 'Autumnal Equinox'),
	(74, '2018-09-22', 'Autumnal Equinox'),
	(75, '2019-09-23', 'Autumnal Equinox'),
	(76, '2020-09-22', 'Autumnal Equinox'),
	(77, '0004-07-04', 'Independence Day'),
	(78, '0004-05-05', 'Cinco de Mayo'),
	(79, '0004-06-14', 'Flag Day'),
	(80, '0004-11-11', 'Veterans Day'),
	(81, '0004-02-02', 'Groundhog Day'),
	(82, '2010-11-25', 'Thanksgiving'),
	(83, '2011-11-24', 'Thanksgiving'),
	(84, '2012-11-22', 'Thanksgiving'),
	(85, '2013-11-21', 'Thanksgiving'),
	(86, '2014-11-20', 'Thanksgiving'),
	(87, '2015-11-26', 'Thanksgiving'),
	(88, '2016-11-24', 'Thanksgiving'),
	(89, '2017-11-23', 'Thanksgiving'),
	(90, '2018-11-22', 'Thanksgiving'),
	(91, '2019-11-21', 'Thanksgiving'),
	(92, '2020-11-26', 'Thanksgiving'),
	(93, '2010-05-31', 'Memorial Day'),
	(94, '2011-05-30', 'Memorial Day'),
	(95, '2012-05-28', 'Memorial Day'),
	(96, '2013-05-27', 'Memorial Day'),
	(97, '2014-05-26', 'Memorial Day'),
	(98, '2015-05-25', 'Memorial Day'),
	(99, '2016-05-30', 'Memorial Day'),
	(100, '2017-05-29', 'Memorial Day'),
	(101, '2018-05-28', 'Memorial Day'),
	(102, '2019-05-27', 'Memorial Day'),
	(103, '2020-05-25', 'Memorial Day'),
	(104, '2010-09-06', 'Labor Day'),
	(105, '2011-09-05', 'Labor Day'),
	(106, '2012-09-03', 'Labor Day'),
	(107, '2013-09-09', 'Labor Day'),
	(108, '2014-09-08', 'Labor Day'),
	(109, '2015-09-07', 'Labor Day'),
	(110, '2016-09-05', 'Labor Day'),
	(111, '2017-09-04', 'Labor Day'),
	(112, '2018-09-03', 'Labor Day'),
	(113, '2019-09-09', 'Labor Day'),
	(114, '2020-09-07', 'Labor Day'),
	(115, '0004-06-06', 'D-Day');
/*!40000 ALTER TABLE `smf_calendar_holidays` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_categories
CREATE TABLE IF NOT EXISTS `smf_categories` (
  `id_cat` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `cat_order` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `can_collapse` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_categories: 1 rows
/*!40000 ALTER TABLE `smf_categories` DISABLE KEYS */;
INSERT INTO `smf_categories` (`id_cat`, `cat_order`, `name`, `can_collapse`) VALUES
	(1, 0, 'General Category', 1);
/*!40000 ALTER TABLE `smf_categories` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_collapsed_categories
CREATE TABLE IF NOT EXISTS `smf_collapsed_categories` (
  `id_cat` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cat`,`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_collapsed_categories: 0 rows
/*!40000 ALTER TABLE `smf_collapsed_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_collapsed_categories` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_custom_fields
CREATE TABLE IF NOT EXISTS `smf_custom_fields` (
  `id_field` smallint(5) NOT NULL AUTO_INCREMENT,
  `col_name` varchar(12) NOT NULL DEFAULT '',
  `field_name` varchar(40) NOT NULL DEFAULT '',
  `field_desc` varchar(255) NOT NULL DEFAULT '',
  `field_type` varchar(8) NOT NULL DEFAULT 'text',
  `field_length` smallint(5) NOT NULL DEFAULT '255',
  `field_options` text NOT NULL,
  `mask` varchar(255) NOT NULL DEFAULT '',
  `show_reg` tinyint(3) NOT NULL DEFAULT '0',
  `show_display` tinyint(3) NOT NULL DEFAULT '0',
  `show_profile` varchar(20) NOT NULL DEFAULT 'forumprofile',
  `private` tinyint(3) NOT NULL DEFAULT '0',
  `active` tinyint(3) NOT NULL DEFAULT '1',
  `bbc` tinyint(3) NOT NULL DEFAULT '0',
  `can_search` tinyint(3) NOT NULL DEFAULT '0',
  `default_value` varchar(255) NOT NULL DEFAULT '',
  `enclose` text NOT NULL,
  `placement` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_field`),
  UNIQUE KEY `col_name` (`col_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_custom_fields: 0 rows
/*!40000 ALTER TABLE `smf_custom_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_custom_fields` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_group_moderators
CREATE TABLE IF NOT EXISTS `smf_group_moderators` (
  `id_group` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_group`,`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_group_moderators: 0 rows
/*!40000 ALTER TABLE `smf_group_moderators` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_group_moderators` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_actions
CREATE TABLE IF NOT EXISTS `smf_log_actions` (
  `id_action` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_log` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ip` char(16) NOT NULL DEFAULT '',
  `action` varchar(30) NOT NULL DEFAULT '',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  `extra` text NOT NULL,
  PRIMARY KEY (`id_action`),
  KEY `id_log` (`id_log`),
  KEY `log_time` (`log_time`),
  KEY `id_member` (`id_member`),
  KEY `id_board` (`id_board`),
  KEY `id_msg` (`id_msg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_actions: 0 rows
/*!40000 ALTER TABLE `smf_log_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_actions` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_activity
CREATE TABLE IF NOT EXISTS `smf_log_activity` (
  `date` date NOT NULL DEFAULT '0001-01-01',
  `hits` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topics` smallint(5) unsigned NOT NULL DEFAULT '0',
  `posts` smallint(5) unsigned NOT NULL DEFAULT '0',
  `registers` smallint(5) unsigned NOT NULL DEFAULT '0',
  `most_on` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`date`),
  KEY `most_on` (`most_on`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_activity: 0 rows
/*!40000 ALTER TABLE `smf_log_activity` DISABLE KEYS */;
INSERT INTO `smf_log_activity` (`date`, `hits`, `topics`, `posts`, `registers`, `most_on`) VALUES
	('2011-09-24', 0, 1, 1, 1, 2);
/*!40000 ALTER TABLE `smf_log_activity` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_banned
CREATE TABLE IF NOT EXISTS `smf_log_banned` (
  `id_ban_log` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ip` char(16) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ban_log`),
  KEY `log_time` (`log_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_banned: 0 rows
/*!40000 ALTER TABLE `smf_log_banned` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_banned` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_boards
CREATE TABLE IF NOT EXISTS `smf_log_boards` (
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_member`,`id_board`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_boards: 0 rows
/*!40000 ALTER TABLE `smf_log_boards` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_boards` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_comments
CREATE TABLE IF NOT EXISTS `smf_log_comments` (
  `id_comment` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `member_name` varchar(80) NOT NULL DEFAULT '',
  `comment_type` varchar(8) NOT NULL DEFAULT 'warning',
  `id_recipient` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `recipient_name` varchar(255) NOT NULL DEFAULT '',
  `log_time` int(10) NOT NULL DEFAULT '0',
  `id_notice` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `counter` tinyint(3) NOT NULL DEFAULT '0',
  `body` text NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_recipient` (`id_recipient`),
  KEY `log_time` (`log_time`),
  KEY `comment_type` (`comment_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_comments: 0 rows
/*!40000 ALTER TABLE `smf_log_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_comments` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_digest
CREATE TABLE IF NOT EXISTS `smf_log_digest` (
  `id_topic` mediumint(8) unsigned NOT NULL,
  `id_msg` int(10) unsigned NOT NULL,
  `note_type` varchar(10) NOT NULL DEFAULT 'post',
  `daily` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `exclude` mediumint(8) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_digest: 0 rows
/*!40000 ALTER TABLE `smf_log_digest` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_digest` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_errors
CREATE TABLE IF NOT EXISTS `smf_log_errors` (
  `id_error` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ip` char(16) NOT NULL DEFAULT '',
  `url` text NOT NULL,
  `message` text NOT NULL,
  `session` char(32) NOT NULL DEFAULT '',
  `error_type` char(15) NOT NULL DEFAULT 'general',
  `file` varchar(255) NOT NULL DEFAULT '',
  `line` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_error`),
  KEY `log_time` (`log_time`),
  KEY `id_member` (`id_member`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_errors: 0 rows
/*!40000 ALTER TABLE `smf_log_errors` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_errors` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_floodcontrol
CREATE TABLE IF NOT EXISTS `smf_log_floodcontrol` (
  `ip` char(16) NOT NULL DEFAULT '',
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  `log_type` varchar(8) NOT NULL DEFAULT 'post',
  PRIMARY KEY (`ip`,`log_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_floodcontrol: 0 rows
/*!40000 ALTER TABLE `smf_log_floodcontrol` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_floodcontrol` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_group_requests
CREATE TABLE IF NOT EXISTS `smf_log_group_requests` (
  `id_request` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_group` smallint(5) unsigned NOT NULL DEFAULT '0',
  `time_applied` int(10) unsigned NOT NULL DEFAULT '0',
  `reason` text NOT NULL,
  PRIMARY KEY (`id_request`),
  UNIQUE KEY `id_member` (`id_member`,`id_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_group_requests: 0 rows
/*!40000 ALTER TABLE `smf_log_group_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_group_requests` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_karma
CREATE TABLE IF NOT EXISTS `smf_log_karma` (
  `id_target` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_executor` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  `action` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_target`,`id_executor`),
  KEY `log_time` (`log_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_karma: 0 rows
/*!40000 ALTER TABLE `smf_log_karma` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_karma` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_mark_read
CREATE TABLE IF NOT EXISTS `smf_log_mark_read` (
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_member`,`id_board`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_mark_read: 0 rows
/*!40000 ALTER TABLE `smf_log_mark_read` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_mark_read` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_member_notices
CREATE TABLE IF NOT EXISTS `smf_log_member_notices` (
  `id_notice` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  PRIMARY KEY (`id_notice`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_member_notices: 0 rows
/*!40000 ALTER TABLE `smf_log_member_notices` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_member_notices` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_notify
CREATE TABLE IF NOT EXISTS `smf_log_notify` (
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `sent` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_member`,`id_topic`,`id_board`),
  KEY `id_topic` (`id_topic`,`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_notify: 0 rows
/*!40000 ALTER TABLE `smf_log_notify` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_notify` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_online
CREATE TABLE IF NOT EXISTS `smf_log_online` (
  `session` varchar(32) NOT NULL DEFAULT '',
  `log_time` int(10) NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_spider` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  PRIMARY KEY (`session`),
  KEY `log_time` (`log_time`),
  KEY `id_member` (`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_online: 0 rows
/*!40000 ALTER TABLE `smf_log_online` DISABLE KEYS */;
INSERT INTO `smf_log_online` (`session`, `log_time`, `id_member`, `id_spider`, `ip`, `url`) VALUES
	('1vc9ipl7d6d4qkrhqtjssrt5u7', 1316857119, 1, 0, 2130706433, 'a:1:{s:10:"USER_AGENT";s:106:"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.186 Safari/535.1";}');
/*!40000 ALTER TABLE `smf_log_online` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_packages
CREATE TABLE IF NOT EXISTS `smf_log_packages` (
  `id_install` int(10) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `package_id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `version` varchar(255) NOT NULL DEFAULT '',
  `id_member_installed` mediumint(8) NOT NULL DEFAULT '0',
  `member_installed` varchar(255) NOT NULL DEFAULT '',
  `time_installed` int(10) NOT NULL DEFAULT '0',
  `id_member_removed` mediumint(8) NOT NULL DEFAULT '0',
  `member_removed` varchar(255) NOT NULL DEFAULT '',
  `time_removed` int(10) NOT NULL DEFAULT '0',
  `install_state` tinyint(3) NOT NULL DEFAULT '1',
  `failed_steps` text NOT NULL,
  `themes_installed` varchar(255) NOT NULL DEFAULT '',
  `db_changes` text NOT NULL,
  PRIMARY KEY (`id_install`),
  KEY `filename` (`filename`(15))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_packages: 0 rows
/*!40000 ALTER TABLE `smf_log_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_packages` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_polls
CREATE TABLE IF NOT EXISTS `smf_log_polls` (
  `id_poll` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_choice` tinyint(3) unsigned NOT NULL DEFAULT '0',
  KEY `id_poll` (`id_poll`,`id_member`,`id_choice`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_polls: 0 rows
/*!40000 ALTER TABLE `smf_log_polls` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_polls` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_reported
CREATE TABLE IF NOT EXISTS `smf_log_reported` (
  `id_report` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `membername` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `time_started` int(10) NOT NULL DEFAULT '0',
  `time_updated` int(10) NOT NULL DEFAULT '0',
  `num_reports` mediumint(6) NOT NULL DEFAULT '0',
  `closed` tinyint(3) NOT NULL DEFAULT '0',
  `ignore_all` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_report`),
  KEY `id_member` (`id_member`),
  KEY `id_topic` (`id_topic`),
  KEY `closed` (`closed`),
  KEY `time_started` (`time_started`),
  KEY `id_msg` (`id_msg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_reported: 0 rows
/*!40000 ALTER TABLE `smf_log_reported` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_reported` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_reported_comments
CREATE TABLE IF NOT EXISTS `smf_log_reported_comments` (
  `id_comment` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id_report` mediumint(8) NOT NULL DEFAULT '0',
  `id_member` mediumint(8) NOT NULL,
  `membername` varchar(255) NOT NULL DEFAULT '',
  `email_address` varchar(255) NOT NULL DEFAULT '',
  `member_ip` varchar(255) NOT NULL DEFAULT '',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `time_sent` int(10) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_report` (`id_report`),
  KEY `id_member` (`id_member`),
  KEY `time_sent` (`time_sent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_reported_comments: 0 rows
/*!40000 ALTER TABLE `smf_log_reported_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_reported_comments` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_scheduled_tasks
CREATE TABLE IF NOT EXISTS `smf_log_scheduled_tasks` (
  `id_log` mediumint(8) NOT NULL AUTO_INCREMENT,
  `id_task` smallint(5) NOT NULL DEFAULT '0',
  `time_run` int(10) NOT NULL DEFAULT '0',
  `time_taken` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_scheduled_tasks: 0 rows
/*!40000 ALTER TABLE `smf_log_scheduled_tasks` DISABLE KEYS */;
INSERT INTO `smf_log_scheduled_tasks` (`id_log`, `id_task`, `time_run`, `time_taken`) VALUES
	(1, 2, 1316856095, 0),
	(2, 3, 1316856106, 0),
	(3, 5, 1316856206, 0),
	(4, 6, 1316856296, 0),
	(5, 7, 1316856324, 8),
	(6, 9, 1316856329, 0);
/*!40000 ALTER TABLE `smf_log_scheduled_tasks` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_search_messages
CREATE TABLE IF NOT EXISTS `smf_log_search_messages` (
  `id_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_search`,`id_msg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_search_messages: 0 rows
/*!40000 ALTER TABLE `smf_log_search_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_search_messages` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_search_results
CREATE TABLE IF NOT EXISTS `smf_log_search_results` (
  `id_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  `relevance` smallint(5) unsigned NOT NULL DEFAULT '0',
  `num_matches` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_search`,`id_topic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_search_results: 0 rows
/*!40000 ALTER TABLE `smf_log_search_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_search_results` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_search_subjects
CREATE TABLE IF NOT EXISTS `smf_log_search_subjects` (
  `word` varchar(20) NOT NULL DEFAULT '',
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`word`,`id_topic`),
  KEY `id_topic` (`id_topic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_search_subjects: 0 rows
/*!40000 ALTER TABLE `smf_log_search_subjects` DISABLE KEYS */;
INSERT INTO `smf_log_search_subjects` (`word`, `id_topic`) VALUES
	('SMF', 1),
	('to', 1),
	('Welcome', 1);
/*!40000 ALTER TABLE `smf_log_search_subjects` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_search_topics
CREATE TABLE IF NOT EXISTS `smf_log_search_topics` (
  `id_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_search`,`id_topic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_search_topics: 0 rows
/*!40000 ALTER TABLE `smf_log_search_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_search_topics` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_spider_hits
CREATE TABLE IF NOT EXISTS `smf_log_spider_hits` (
  `id_hit` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_spider` smallint(5) unsigned NOT NULL DEFAULT '0',
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `processed` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_hit`),
  KEY `id_spider` (`id_spider`),
  KEY `log_time` (`log_time`),
  KEY `processed` (`processed`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_spider_hits: 0 rows
/*!40000 ALTER TABLE `smf_log_spider_hits` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_spider_hits` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_spider_stats
CREATE TABLE IF NOT EXISTS `smf_log_spider_stats` (
  `id_spider` smallint(5) unsigned NOT NULL DEFAULT '0',
  `page_hits` smallint(5) unsigned NOT NULL DEFAULT '0',
  `last_seen` int(10) unsigned NOT NULL DEFAULT '0',
  `stat_date` date NOT NULL DEFAULT '0001-01-01',
  PRIMARY KEY (`stat_date`,`id_spider`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_spider_stats: 0 rows
/*!40000 ALTER TABLE `smf_log_spider_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_spider_stats` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_subscribed
CREATE TABLE IF NOT EXISTS `smf_log_subscribed` (
  `id_sublog` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_subscribe` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_member` int(10) NOT NULL DEFAULT '0',
  `old_id_group` smallint(5) NOT NULL DEFAULT '0',
  `start_time` int(10) NOT NULL DEFAULT '0',
  `end_time` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `payments_pending` tinyint(3) NOT NULL DEFAULT '0',
  `pending_details` text NOT NULL,
  `reminder_sent` tinyint(3) NOT NULL DEFAULT '0',
  `vendor_ref` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_sublog`),
  UNIQUE KEY `id_subscribe` (`id_subscribe`,`id_member`),
  KEY `end_time` (`end_time`),
  KEY `reminder_sent` (`reminder_sent`),
  KEY `payments_pending` (`payments_pending`),
  KEY `status` (`status`),
  KEY `id_member` (`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_subscribed: 0 rows
/*!40000 ALTER TABLE `smf_log_subscribed` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_subscribed` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_log_topics
CREATE TABLE IF NOT EXISTS `smf_log_topics` (
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_msg` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_member`,`id_topic`),
  KEY `id_topic` (`id_topic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_log_topics: 0 rows
/*!40000 ALTER TABLE `smf_log_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_log_topics` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_mail_queue
CREATE TABLE IF NOT EXISTS `smf_mail_queue` (
  `id_mail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time_sent` int(10) NOT NULL DEFAULT '0',
  `recipient` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `headers` text NOT NULL,
  `send_html` tinyint(3) NOT NULL DEFAULT '0',
  `priority` tinyint(3) NOT NULL DEFAULT '1',
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_mail`),
  KEY `time_sent` (`time_sent`),
  KEY `mail_priority` (`priority`,`id_mail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_mail_queue: 0 rows
/*!40000 ALTER TABLE `smf_mail_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_mail_queue` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_membergroups
CREATE TABLE IF NOT EXISTS `smf_membergroups` (
  `id_group` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(80) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `online_color` varchar(20) NOT NULL DEFAULT '',
  `min_posts` mediumint(9) NOT NULL DEFAULT '-1',
  `max_messages` smallint(5) unsigned NOT NULL DEFAULT '0',
  `stars` varchar(255) NOT NULL DEFAULT '',
  `group_type` tinyint(3) NOT NULL DEFAULT '0',
  `hidden` tinyint(3) NOT NULL DEFAULT '0',
  `id_parent` smallint(5) NOT NULL DEFAULT '-2',
  PRIMARY KEY (`id_group`),
  KEY `min_posts` (`min_posts`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_membergroups: 8 rows
/*!40000 ALTER TABLE `smf_membergroups` DISABLE KEYS */;
INSERT INTO `smf_membergroups` (`id_group`, `group_name`, `description`, `online_color`, `min_posts`, `max_messages`, `stars`, `group_type`, `hidden`, `id_parent`) VALUES
	(1, 'Administrator', '', '#FF0000', -1, 0, '5#staradmin.gif', 1, 0, -2),
	(2, 'Global Moderator', '', '#0000FF', -1, 0, '5#stargmod.gif', 0, 0, -2),
	(3, 'Moderator', '', '', -1, 0, '5#starmod.gif', 0, 0, -2),
	(4, 'Newbie', '', '', 0, 0, '1#star.gif', 0, 0, -2),
	(5, 'Jr. Member', '', '', 50, 0, '2#star.gif', 0, 0, -2),
	(6, 'Full Member', '', '', 100, 0, '3#star.gif', 0, 0, -2),
	(7, 'Sr. Member', '', '', 250, 0, '4#star.gif', 0, 0, -2),
	(8, 'Hero Member', '', '', 500, 0, '5#star.gif', 0, 0, -2);
/*!40000 ALTER TABLE `smf_membergroups` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_members
CREATE TABLE IF NOT EXISTS `smf_members` (
  `id_member` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `member_name` varchar(80) NOT NULL DEFAULT '',
  `date_registered` int(10) unsigned NOT NULL DEFAULT '0',
  `posts` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_group` smallint(5) unsigned NOT NULL DEFAULT '0',
  `lngfile` varchar(255) NOT NULL DEFAULT '',
  `last_login` int(10) unsigned NOT NULL DEFAULT '0',
  `real_name` varchar(255) NOT NULL DEFAULT '',
  `instant_messages` smallint(5) NOT NULL DEFAULT '0',
  `unread_messages` smallint(5) NOT NULL DEFAULT '0',
  `new_pm` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `buddy_list` text NOT NULL,
  `pm_ignore_list` varchar(255) NOT NULL DEFAULT '',
  `pm_prefs` mediumint(8) NOT NULL DEFAULT '0',
  `mod_prefs` varchar(20) NOT NULL DEFAULT '',
  `message_labels` text NOT NULL,
  `passwd` varchar(64) NOT NULL DEFAULT '',
  `openid_uri` text NOT NULL,
  `email_address` varchar(255) NOT NULL DEFAULT '',
  `personal_text` varchar(255) NOT NULL DEFAULT '',
  `gender` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `birthdate` date NOT NULL DEFAULT '0001-01-01',
  `website_title` varchar(255) NOT NULL DEFAULT '',
  `website_url` varchar(255) NOT NULL DEFAULT '',
  `location` varchar(255) NOT NULL DEFAULT '',
  `icq` varchar(255) NOT NULL DEFAULT '',
  `aim` varchar(255) NOT NULL DEFAULT '',
  `yim` varchar(32) NOT NULL DEFAULT '',
  `msn` varchar(255) NOT NULL DEFAULT '',
  `hide_email` tinyint(4) NOT NULL DEFAULT '0',
  `show_online` tinyint(4) NOT NULL DEFAULT '1',
  `time_format` varchar(80) NOT NULL DEFAULT '',
  `signature` text NOT NULL,
  `time_offset` float NOT NULL DEFAULT '0',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `pm_email_notify` tinyint(4) NOT NULL DEFAULT '0',
  `karma_bad` smallint(5) unsigned NOT NULL DEFAULT '0',
  `karma_good` smallint(5) unsigned NOT NULL DEFAULT '0',
  `usertitle` varchar(255) NOT NULL DEFAULT '',
  `notify_announcements` tinyint(4) NOT NULL DEFAULT '1',
  `notify_regularity` tinyint(4) NOT NULL DEFAULT '1',
  `notify_send_body` tinyint(4) NOT NULL DEFAULT '0',
  `notify_types` tinyint(4) NOT NULL DEFAULT '2',
  `member_ip` varchar(255) NOT NULL DEFAULT '',
  `member_ip2` varchar(255) NOT NULL DEFAULT '',
  `secret_question` varchar(255) NOT NULL DEFAULT '',
  `secret_answer` varchar(64) NOT NULL DEFAULT '',
  `id_theme` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `is_activated` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `validation_code` varchar(10) NOT NULL DEFAULT '',
  `id_msg_last_visit` int(10) unsigned NOT NULL DEFAULT '0',
  `additional_groups` varchar(255) NOT NULL DEFAULT '',
  `smiley_set` varchar(48) NOT NULL DEFAULT '',
  `id_post_group` smallint(5) unsigned NOT NULL DEFAULT '0',
  `total_time_logged_in` int(10) unsigned NOT NULL DEFAULT '0',
  `password_salt` varchar(255) NOT NULL DEFAULT '',
  `ignore_boards` text NOT NULL,
  `warning` tinyint(4) NOT NULL DEFAULT '0',
  `passwd_flood` varchar(12) NOT NULL DEFAULT '',
  `pm_receive_from` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_member`),
  KEY `member_name` (`member_name`),
  KEY `real_name` (`real_name`),
  KEY `date_registered` (`date_registered`),
  KEY `id_group` (`id_group`),
  KEY `birthdate` (`birthdate`),
  KEY `posts` (`posts`),
  KEY `last_login` (`last_login`),
  KEY `lngfile` (`lngfile`(30)),
  KEY `id_post_group` (`id_post_group`),
  KEY `warning` (`warning`),
  KEY `total_time_logged_in` (`total_time_logged_in`),
  KEY `id_theme` (`id_theme`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_members: 0 rows
/*!40000 ALTER TABLE `smf_members` DISABLE KEYS */;
INSERT INTO `smf_members` (`id_member`, `member_name`, `date_registered`, `posts`, `id_group`, `lngfile`, `last_login`, `real_name`, `instant_messages`, `unread_messages`, `new_pm`, `buddy_list`, `pm_ignore_list`, `pm_prefs`, `mod_prefs`, `message_labels`, `passwd`, `openid_uri`, `email_address`, `personal_text`, `gender`, `birthdate`, `website_title`, `website_url`, `location`, `icq`, `aim`, `yim`, `msn`, `hide_email`, `show_online`, `time_format`, `signature`, `time_offset`, `avatar`, `pm_email_notify`, `karma_bad`, `karma_good`, `usertitle`, `notify_announcements`, `notify_regularity`, `notify_send_body`, `notify_types`, `member_ip`, `member_ip2`, `secret_question`, `secret_answer`, `id_theme`, `is_activated`, `validation_code`, `id_msg_last_visit`, `additional_groups`, `smiley_set`, `id_post_group`, `total_time_logged_in`, `password_salt`, `ignore_boards`, `warning`, `passwd_flood`, `pm_receive_from`) VALUES
	(1, 'admin', 1316855538, 0, 1, '', 1316857119, 'admin', 0, 0, 0, '', '', 0, '', '', '4ddac314c53341408a54b16ce0fa33e360615d9e', '', 'benzmeijin@hotmail.com', '', 0, '0001-01-01', '', '', '', '', '', '', '', 0, 1, '', '', 0, '', 0, 0, 0, '', 1, 1, 0, 2, '127.0.0.1', '127.0.0.1', '', '', 0, 1, '', 1, '', '', 0, 1045, '0049', '', 0, '', 1);
/*!40000 ALTER TABLE `smf_members` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_messages
CREATE TABLE IF NOT EXISTS `smf_messages` (
  `id_msg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_topic` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `poster_time` int(10) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_msg_modified` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `poster_name` varchar(255) NOT NULL DEFAULT '',
  `poster_email` varchar(255) NOT NULL DEFAULT '',
  `poster_ip` varchar(255) NOT NULL DEFAULT '',
  `smileys_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `modified_time` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_name` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `icon` varchar(16) NOT NULL DEFAULT 'xx',
  `approved` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_msg`),
  UNIQUE KEY `topic` (`id_topic`,`id_msg`),
  UNIQUE KEY `id_board` (`id_board`,`id_msg`),
  UNIQUE KEY `id_member` (`id_member`,`id_msg`),
  KEY `approved` (`approved`),
  KEY `ip_index` (`poster_ip`(15),`id_topic`),
  KEY `participation` (`id_member`,`id_topic`),
  KEY `show_posts` (`id_member`,`id_board`),
  KEY `id_topic` (`id_topic`),
  KEY `id_member_msg` (`id_member`,`approved`,`id_msg`),
  KEY `current_topic` (`id_topic`,`id_msg`,`id_member`,`approved`),
  KEY `related_ip` (`id_member`,`poster_ip`,`id_msg`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_messages: 1 rows
/*!40000 ALTER TABLE `smf_messages` DISABLE KEYS */;
INSERT INTO `smf_messages` (`id_msg`, `id_topic`, `id_board`, `poster_time`, `id_member`, `id_msg_modified`, `subject`, `poster_name`, `poster_email`, `poster_ip`, `smileys_enabled`, `modified_time`, `modified_name`, `body`, `icon`, `approved`) VALUES
	(1, 1, 1, 1316855251, 0, 1, 'Welcome to SMF!', 'Simple Machines', 'info@simplemachines.org', '127.0.0.1', 1, 0, '', 'Welcome to Simple Machines Forum!<br /><br />We hope you enjoy using your forum.&nbsp; If you have any problems, please feel free to [url=http://www.simplemachines.org/community/index.php]ask us for assistance[/url].<br /><br />Thanks!<br />Simple Machines', 'xx', 1);
/*!40000 ALTER TABLE `smf_messages` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_message_icons
CREATE TABLE IF NOT EXISTS `smf_message_icons` (
  `id_icon` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL DEFAULT '',
  `filename` varchar(80) NOT NULL DEFAULT '',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `icon_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_icon`),
  KEY `id_board` (`id_board`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_message_icons: 12 rows
/*!40000 ALTER TABLE `smf_message_icons` DISABLE KEYS */;
INSERT INTO `smf_message_icons` (`id_icon`, `title`, `filename`, `id_board`, `icon_order`) VALUES
	(1, 'Standard', 'xx', 0, 0),
	(2, 'Thumb Up', 'thumbup', 0, 1),
	(3, 'Thumb Down', 'thumbdown', 0, 2),
	(4, 'Exclamation point', 'exclamation', 0, 3),
	(5, 'Question mark', 'question', 0, 4),
	(6, 'Lamp', 'lamp', 0, 5),
	(7, 'Smiley', 'smiley', 0, 6),
	(8, 'Angry', 'angry', 0, 7),
	(9, 'Cheesy', 'cheesy', 0, 8),
	(10, 'Grin', 'grin', 0, 9),
	(11, 'Sad', 'sad', 0, 10),
	(12, 'Wink', 'wink', 0, 11);
/*!40000 ALTER TABLE `smf_message_icons` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_moderators
CREATE TABLE IF NOT EXISTS `smf_moderators` (
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_board`,`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_moderators: 0 rows
/*!40000 ALTER TABLE `smf_moderators` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_moderators` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_openid_assoc
CREATE TABLE IF NOT EXISTS `smf_openid_assoc` (
  `server_url` text NOT NULL,
  `handle` varchar(255) NOT NULL DEFAULT '',
  `secret` text NOT NULL,
  `issued` int(10) NOT NULL DEFAULT '0',
  `expires` int(10) NOT NULL DEFAULT '0',
  `assoc_type` varchar(64) NOT NULL,
  PRIMARY KEY (`server_url`(125),`handle`(125)),
  KEY `expires` (`expires`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_openid_assoc: 0 rows
/*!40000 ALTER TABLE `smf_openid_assoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_openid_assoc` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_package_servers
CREATE TABLE IF NOT EXISTS `smf_package_servers` (
  `id_server` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_server`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_package_servers: 1 rows
/*!40000 ALTER TABLE `smf_package_servers` DISABLE KEYS */;
INSERT INTO `smf_package_servers` (`id_server`, `name`, `url`) VALUES
	(1, 'Simple Machines Third-party Mod Site', 'http://custom.simplemachines.org/packages/mods');
/*!40000 ALTER TABLE `smf_package_servers` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_permissions
CREATE TABLE IF NOT EXISTS `smf_permissions` (
  `id_group` smallint(5) NOT NULL DEFAULT '0',
  `permission` varchar(30) NOT NULL DEFAULT '',
  `add_deny` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_group`,`permission`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_permissions: 40 rows
/*!40000 ALTER TABLE `smf_permissions` DISABLE KEYS */;
INSERT INTO `smf_permissions` (`id_group`, `permission`, `add_deny`) VALUES
	(-1, 'search_posts', 1),
	(-1, 'calendar_view', 1),
	(-1, 'view_stats', 1),
	(-1, 'profile_view_any', 1),
	(0, 'view_mlist', 1),
	(0, 'search_posts', 1),
	(0, 'profile_view_own', 1),
	(0, 'profile_view_any', 1),
	(0, 'pm_read', 1),
	(0, 'pm_send', 1),
	(0, 'calendar_view', 1),
	(0, 'view_stats', 1),
	(0, 'who_view', 1),
	(0, 'profile_identity_own', 1),
	(0, 'profile_extra_own', 1),
	(0, 'profile_remove_own', 1),
	(0, 'profile_server_avatar', 1),
	(0, 'profile_upload_avatar', 1),
	(0, 'profile_remote_avatar', 1),
	(0, 'karma_edit', 1),
	(2, 'view_mlist', 1),
	(2, 'search_posts', 1),
	(2, 'profile_view_own', 1),
	(2, 'profile_view_any', 1),
	(2, 'pm_read', 1),
	(2, 'pm_send', 1),
	(2, 'calendar_view', 1),
	(2, 'view_stats', 1),
	(2, 'who_view', 1),
	(2, 'profile_identity_own', 1),
	(2, 'profile_extra_own', 1),
	(2, 'profile_remove_own', 1),
	(2, 'profile_server_avatar', 1),
	(2, 'profile_upload_avatar', 1),
	(2, 'profile_remote_avatar', 1),
	(2, 'profile_title_own', 1),
	(2, 'calendar_post', 1),
	(2, 'calendar_edit_any', 1),
	(2, 'karma_edit', 1),
	(2, 'access_mod_center', 1);
/*!40000 ALTER TABLE `smf_permissions` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_permission_profiles
CREATE TABLE IF NOT EXISTS `smf_permission_profiles` (
  `id_profile` smallint(5) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_profile`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_permission_profiles: 4 rows
/*!40000 ALTER TABLE `smf_permission_profiles` DISABLE KEYS */;
INSERT INTO `smf_permission_profiles` (`id_profile`, `profile_name`) VALUES
	(1, 'default'),
	(2, 'no_polls'),
	(3, 'reply_only'),
	(4, 'read_only');
/*!40000 ALTER TABLE `smf_permission_profiles` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_personal_messages
CREATE TABLE IF NOT EXISTS `smf_personal_messages` (
  `id_pm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pm_head` int(10) unsigned NOT NULL DEFAULT '0',
  `id_member_from` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_by_sender` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `from_name` varchar(255) NOT NULL DEFAULT '',
  `msgtime` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  PRIMARY KEY (`id_pm`),
  KEY `id_member` (`id_member_from`,`deleted_by_sender`),
  KEY `msgtime` (`msgtime`),
  KEY `id_pm_head` (`id_pm_head`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_personal_messages: 0 rows
/*!40000 ALTER TABLE `smf_personal_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_personal_messages` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_pm_recipients
CREATE TABLE IF NOT EXISTS `smf_pm_recipients` (
  `id_pm` int(10) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `labels` varchar(60) NOT NULL DEFAULT '-1',
  `bcc` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_read` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_new` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pm`,`id_member`),
  UNIQUE KEY `id_member` (`id_member`,`deleted`,`id_pm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_pm_recipients: 0 rows
/*!40000 ALTER TABLE `smf_pm_recipients` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_pm_recipients` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_pm_rules
CREATE TABLE IF NOT EXISTS `smf_pm_rules` (
  `id_rule` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_member` int(10) unsigned NOT NULL DEFAULT '0',
  `rule_name` varchar(60) NOT NULL,
  `criteria` text NOT NULL,
  `actions` text NOT NULL,
  `delete_pm` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_or` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rule`),
  KEY `id_member` (`id_member`),
  KEY `delete_pm` (`delete_pm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_pm_rules: 0 rows
/*!40000 ALTER TABLE `smf_pm_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_pm_rules` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_polls
CREATE TABLE IF NOT EXISTS `smf_polls` (
  `id_poll` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL DEFAULT '',
  `voting_locked` tinyint(1) NOT NULL DEFAULT '0',
  `max_votes` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `expire_time` int(10) unsigned NOT NULL DEFAULT '0',
  `hide_results` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `change_vote` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `guest_vote` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `num_guest_voters` int(10) unsigned NOT NULL DEFAULT '0',
  `reset_poll` int(10) unsigned NOT NULL DEFAULT '0',
  `id_member` mediumint(8) NOT NULL DEFAULT '0',
  `poster_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_poll`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_polls: 0 rows
/*!40000 ALTER TABLE `smf_polls` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_polls` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_poll_choices
CREATE TABLE IF NOT EXISTS `smf_poll_choices` (
  `id_poll` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_choice` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `label` varchar(255) NOT NULL DEFAULT '',
  `votes` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_poll`,`id_choice`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_poll_choices: 0 rows
/*!40000 ALTER TABLE `smf_poll_choices` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_poll_choices` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_scheduled_tasks
CREATE TABLE IF NOT EXISTS `smf_scheduled_tasks` (
  `id_task` smallint(5) NOT NULL AUTO_INCREMENT,
  `next_time` int(10) NOT NULL DEFAULT '0',
  `time_offset` int(10) NOT NULL DEFAULT '0',
  `time_regularity` smallint(5) NOT NULL DEFAULT '0',
  `time_unit` varchar(1) NOT NULL DEFAULT 'h',
  `disabled` tinyint(3) NOT NULL DEFAULT '0',
  `task` varchar(24) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_task`),
  UNIQUE KEY `task` (`task`),
  KEY `next_time` (`next_time`),
  KEY `disabled` (`disabled`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_scheduled_tasks: 9 rows
/*!40000 ALTER TABLE `smf_scheduled_tasks` DISABLE KEYS */;
INSERT INTO `smf_scheduled_tasks` (`id_task`, `next_time`, `time_offset`, `time_regularity`, `time_unit`, `disabled`, `task`) VALUES
	(1, 1316865600, 0, 2, 'h', 0, 'approval_notification'),
	(2, 1317427200, 0, 7, 'd', 0, 'auto_optimize'),
	(3, 1316908860, 60, 1, 'd', 0, 'daily_maintenance'),
	(5, 1316908800, 0, 1, 'd', 0, 'daily_digest'),
	(6, 1317427200, 0, 1, 'w', 0, 'weekly_digest'),
	(7, 1316962860, 140494, 1, 'd', 0, 'fetchSMfiles'),
	(8, 0, 0, 1, 'd', 1, 'birthdayemails'),
	(9, 1317427200, 0, 1, 'w', 0, 'weekly_maintenance'),
	(10, 0, 120, 1, 'd', 1, 'paid_subscriptions');
/*!40000 ALTER TABLE `smf_scheduled_tasks` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_sessions
CREATE TABLE IF NOT EXISTS `smf_sessions` (
  `session_id` char(32) NOT NULL,
  `last_update` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_sessions: 0 rows
/*!40000 ALTER TABLE `smf_sessions` DISABLE KEYS */;
INSERT INTO `smf_sessions` (`session_id`, `last_update`, `data`) VALUES
	('1vc9ipl7d6d4qkrhqtjssrt5u7', 1316857119, 'USER_AGENT|s:106:"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.186 Safari/535.1";admin_time|i:1316855538;session_value|s:32:"0a4ded7055ab4643ee4d0baa1bafc818";session_var|s:8:"d0e08796";id_msg_last_visit|s:1:"1";mc|a:7:{s:4:"time";i:1316856074;s:2:"id";s:1:"1";s:2:"gq";s:3:"1=1";s:2:"bq";s:3:"1=1";s:2:"ap";a:1:{i:0;i:0;}s:2:"mb";a:0:{}s:2:"mq";s:3:"0=1";}rc|a:3:{s:2:"id";s:1:"1";s:4:"time";i:1316856074;s:7:"reports";s:1:"0";}log_time|i:1316857119;timeOnlineUpdated|i:1316857119;unread_messages|i:0;old_url|s:34:"http://localhost/public/webboard/?";'),
	('t7vjru61ltc6ihmqh6cl7178d3', 1316856106, 'session_value|s:32:"6938790c611baa7a7ba62a7eac01ada3";session_var|s:11:"c25f03ef8bb";mc|a:7:{s:4:"time";i:1316856105;s:2:"id";i:0;s:2:"gq";s:3:"0=1";s:2:"bq";s:3:"0=1";s:2:"ap";a:0:{}s:2:"mb";a:0:{}s:2:"mq";s:3:"0=1";}ban|a:5:{s:12:"last_checked";i:1316856105;s:9:"id_member";i:0;s:2:"ip";s:9:"127.0.0.1";s:3:"ip2";s:9:"127.0.0.1";s:5:"email";s:0:"";}log_time|i:1316856106;timeOnlineUpdated|i:1316856106;old_url|s:42:"http://localhost/public/webboard/index.php";USER_AGENT|s:106:"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.186 Safari/535.1";');
/*!40000 ALTER TABLE `smf_sessions` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_settings
CREATE TABLE IF NOT EXISTS `smf_settings` (
  `variable` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`variable`(30))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_settings: 176 rows
/*!40000 ALTER TABLE `smf_settings` DISABLE KEYS */;
INSERT INTO `smf_settings` (`variable`, `value`) VALUES
	('smfVersion', '2.0.1'),
	('news', 'SMF - Just Installed!'),
	('compactTopicPagesContiguous', '5'),
	('compactTopicPagesEnable', '1'),
	('enableStickyTopics', '1'),
	('todayMod', '1'),
	('karmaMode', '0'),
	('karmaTimeRestrictAdmins', '1'),
	('enablePreviousNext', '1'),
	('pollMode', '1'),
	('enableVBStyleLogin', '1'),
	('enableCompressedOutput', '1'),
	('karmaWaitTime', '1'),
	('karmaMinPosts', '0'),
	('karmaLabel', 'Karma:'),
	('karmaSmiteLabel', '[smite]'),
	('karmaApplaudLabel', '[applaud]'),
	('attachmentSizeLimit', '128'),
	('attachmentPostLimit', '192'),
	('attachmentNumPerPostLimit', '4'),
	('attachmentDirSizeLimit', '10240'),
	('attachmentUploadDir', 'C:\\Workspace\\Benz\\PHP\\7Dot\\7Dot\\public\\webboard/attachments'),
	('attachmentExtensions', 'doc,gif,jpg,mpg,pdf,png,txt,zip'),
	('attachmentCheckExtensions', '0'),
	('attachmentShowImages', '1'),
	('attachmentEnable', '1'),
	('attachmentEncryptFilenames', '1'),
	('attachmentThumbnails', '1'),
	('attachmentThumbWidth', '150'),
	('attachmentThumbHeight', '150'),
	('censorIgnoreCase', '1'),
	('mostOnline', '2'),
	('mostOnlineToday', '2'),
	('mostDate', '1316856706'),
	('allow_disableAnnounce', '1'),
	('trackStats', '1'),
	('userLanguage', '1'),
	('titlesEnable', '1'),
	('topicSummaryPosts', '15'),
	('enableErrorLogging', '1'),
	('max_image_width', '0'),
	('max_image_height', '0'),
	('onlineEnable', '0'),
	('cal_enabled', '0'),
	('cal_maxyear', '2020'),
	('cal_minyear', '2008'),
	('cal_daysaslink', '0'),
	('cal_defaultboard', ''),
	('cal_showholidays', '1'),
	('cal_showbdays', '1'),
	('cal_showevents', '1'),
	('cal_showweeknum', '0'),
	('cal_maxspan', '7'),
	('smtp_host', ''),
	('smtp_port', '25'),
	('smtp_username', ''),
	('smtp_password', ''),
	('mail_type', '0'),
	('timeLoadPageEnable', '0'),
	('totalMembers', '1'),
	('totalTopics', '1'),
	('totalMessages', '1'),
	('simpleSearch', '0'),
	('censor_vulgar', ''),
	('censor_proper', ''),
	('enablePostHTML', '0'),
	('theme_allow', '1'),
	('theme_default', '1'),
	('theme_guests', '1'),
	('enableEmbeddedFlash', '0'),
	('xmlnews_enable', '1'),
	('xmlnews_maxlen', '255'),
	('hotTopicPosts', '15'),
	('hotTopicVeryPosts', '25'),
	('registration_method', '0'),
	('send_validation_onChange', '0'),
	('send_welcomeEmail', '1'),
	('allow_editDisplayName', '1'),
	('allow_hideOnline', '1'),
	('guest_hideContacts', '1'),
	('spamWaitTime', '5'),
	('pm_spam_settings', '10,5,20'),
	('reserveWord', '0'),
	('reserveCase', '1'),
	('reserveUser', '1'),
	('reserveName', '1'),
	('reserveNames', 'Admin\nWebmaster\nGuest\nroot'),
	('autoLinkUrls', '1'),
	('banLastUpdated', '0'),
	('smileys_dir', 'C:\\Workspace\\Benz\\PHP\\7Dot\\7Dot\\public\\webboard/Smileys'),
	('smileys_url', 'http://localhost/public/webboard/Smileys'),
	('avatar_directory', 'C:\\Workspace\\Benz\\PHP\\7Dot\\7Dot\\public\\webboard/avatars'),
	('avatar_url', 'http://localhost/public/webboard/avatars'),
	('avatar_max_height_external', '65'),
	('avatar_max_width_external', '65'),
	('avatar_action_too_large', 'option_html_resize'),
	('avatar_max_height_upload', '65'),
	('avatar_max_width_upload', '65'),
	('avatar_resize_upload', '1'),
	('avatar_download_png', '1'),
	('failed_login_threshold', '3'),
	('oldTopicDays', '120'),
	('edit_wait_time', '90'),
	('edit_disable_time', '0'),
	('autoFixDatabase', '1'),
	('allow_guestAccess', '1'),
	('time_format', '%B %d, %Y, %I:%M:%S %p'),
	('number_format', '1234.00'),
	('enableBBC', '1'),
	('max_messageLength', '20000'),
	('signature_settings', '1,300,0,0,0,0,0,0:'),
	('autoOptMaxOnline', '0'),
	('defaultMaxMessages', '15'),
	('defaultMaxTopics', '20'),
	('defaultMaxMembers', '30'),
	('enableParticipation', '1'),
	('recycle_enable', '0'),
	('recycle_board', '0'),
	('maxMsgID', '1'),
	('enableAllMessages', '0'),
	('fixLongWords', '0'),
	('knownThemes', '1,2,3'),
	('who_enabled', '1'),
	('time_offset', '0'),
	('cookieTime', '60'),
	('lastActive', '15'),
	('smiley_sets_known', 'default,aaron,akyhne'),
	('smiley_sets_names', 'Alienine\'s Set\nAaron\'s Set\nAkyhne\'s Set'),
	('smiley_sets_default', 'default'),
	('cal_days_for_index', '7'),
	('requireAgreement', '1'),
	('unapprovedMembers', '0'),
	('default_personal_text', ''),
	('package_make_backups', '1'),
	('databaseSession_enable', '1'),
	('databaseSession_loose', '1'),
	('databaseSession_lifetime', '2880'),
	('search_cache_size', '50'),
	('search_results_per_page', '30'),
	('search_weight_frequency', '30'),
	('search_weight_age', '25'),
	('search_weight_length', '20'),
	('search_weight_subject', '15'),
	('search_weight_first_message', '10'),
	('search_max_results', '1200'),
	('search_floodcontrol_time', '5'),
	('permission_enable_deny', '0'),
	('permission_enable_postgroups', '0'),
	('mail_next_send', '0'),
	('mail_recent', '0000000000|0'),
	('settings_updated', '0'),
	('next_task_time', '1316865600'),
	('warning_settings', '1,20,0'),
	('warning_watch', '10'),
	('warning_moderate', '35'),
	('warning_mute', '60'),
	('admin_features', ''),
	('last_mod_report_action', '0'),
	('pruningOptions', '30,180,180,180,30,0'),
	('cache_enable', '1'),
	('reg_verification', '1'),
	('visual_verification_type', '3'),
	('enable_buddylist', '1'),
	('birthday_email', 'happy_birthday'),
	('dont_repeat_theme_core', '1'),
	('dont_repeat_smileys_20', '1'),
	('dont_repeat_buddylists', '1'),
	('attachment_image_reencode', '1'),
	('attachment_image_paranoid', '0'),
	('attachment_thumb_png', '1'),
	('avatar_reencode', '1'),
	('avatar_paranoid', '0'),
	('global_character_set', 'UTF-8'),
	('globalCookies', '1'),
	('localCookies', '1'),
	('default_timezone', 'Etc/GMT-1'),
	('memberlist_updated', '1316855538'),
	('latestMember', '1'),
	('latestRealName', 'admin'),
	('rand_seed', '1441629715'),
	('mostOnlineUpdated', '2011-09-24');
/*!40000 ALTER TABLE `smf_settings` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_smileys
CREATE TABLE IF NOT EXISTS `smf_smileys` (
  `id_smiley` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(30) NOT NULL DEFAULT '',
  `filename` varchar(48) NOT NULL DEFAULT '',
  `description` varchar(80) NOT NULL DEFAULT '',
  `smiley_row` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `smiley_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_smiley`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_smileys: 22 rows
/*!40000 ALTER TABLE `smf_smileys` DISABLE KEYS */;
INSERT INTO `smf_smileys` (`id_smiley`, `code`, `filename`, `description`, `smiley_row`, `smiley_order`, `hidden`) VALUES
	(1, ':)', 'smiley.gif', 'Smiley', 0, 0, 0),
	(2, ';)', 'wink.gif', 'Wink', 0, 1, 0),
	(3, ':D', 'cheesy.gif', 'Cheesy', 0, 2, 0),
	(4, ';D', 'grin.gif', 'Grin', 0, 3, 0),
	(5, '>:(', 'angry.gif', 'Angry', 0, 4, 0),
	(6, ':(', 'sad.gif', 'Sad', 0, 5, 0),
	(7, ':o', 'shocked.gif', 'Shocked', 0, 6, 0),
	(8, '8)', 'cool.gif', 'Cool', 0, 7, 0),
	(9, '???', 'huh.gif', 'Huh?', 0, 8, 0),
	(10, '::)', 'rolleyes.gif', 'Roll Eyes', 0, 9, 0),
	(11, ':P', 'tongue.gif', 'Tongue', 0, 10, 0),
	(12, ':-[', 'embarrassed.gif', 'Embarrassed', 0, 11, 0),
	(13, ':-X', 'lipsrsealed.gif', 'Lips Sealed', 0, 12, 0),
	(14, ':-\\', 'undecided.gif', 'Undecided', 0, 13, 0),
	(15, ':-*', 'kiss.gif', 'Kiss', 0, 14, 0),
	(16, ':\'(', 'cry.gif', 'Cry', 0, 15, 0),
	(17, '>:D', 'evil.gif', 'Evil', 0, 16, 1),
	(18, '^-^', 'azn.gif', 'Azn', 0, 17, 1),
	(19, 'O0', 'afro.gif', 'Afro', 0, 18, 1),
	(20, ':))', 'laugh.gif', 'Laugh', 0, 19, 1),
	(21, 'C:-)', 'police.gif', 'Police', 0, 20, 1),
	(22, 'O:-)', 'angel.gif', 'Angel', 0, 21, 1);
/*!40000 ALTER TABLE `smf_smileys` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_spiders
CREATE TABLE IF NOT EXISTS `smf_spiders` (
  `id_spider` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `spider_name` varchar(255) NOT NULL DEFAULT '',
  `user_agent` varchar(255) NOT NULL DEFAULT '',
  `ip_info` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_spider`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_spiders: 19 rows
/*!40000 ALTER TABLE `smf_spiders` DISABLE KEYS */;
INSERT INTO `smf_spiders` (`id_spider`, `spider_name`, `user_agent`, `ip_info`) VALUES
	(1, 'Google', 'googlebot', ''),
	(2, 'Yahoo!', 'slurp', ''),
	(3, 'MSN', 'msnbot', ''),
	(4, 'Google (Mobile)', 'Googlebot-Mobile', ''),
	(5, 'Google (Image)', 'Googlebot-Image', ''),
	(6, 'Google (AdSense)', 'Mediapartners-Google', ''),
	(7, 'Google (Adwords)', 'AdsBot-Google', ''),
	(8, 'Yahoo! (Mobile)', 'YahooSeeker/M1A1-R2D2', ''),
	(9, 'Yahoo! (Image)', 'Yahoo-MMCrawler', ''),
	(10, 'MSN (Mobile)', 'MSNBOT_Mobile', ''),
	(11, 'MSN (Media)', 'msnbot-media', ''),
	(12, 'Cuil', 'twiceler', ''),
	(13, 'Ask', 'Teoma', ''),
	(14, 'Baidu', 'Baiduspider', ''),
	(15, 'Gigablast', 'Gigabot', ''),
	(16, 'InternetArchive', 'ia_archiver-web.archive.org', ''),
	(17, 'Alexa', 'ia_archiver', ''),
	(18, 'Omgili', 'omgilibot', ''),
	(19, 'EntireWeb', 'Speedy Spider', '');
/*!40000 ALTER TABLE `smf_spiders` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_subscriptions
CREATE TABLE IF NOT EXISTS `smf_subscriptions` (
  `id_subscribe` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `cost` text NOT NULL,
  `length` varchar(6) NOT NULL DEFAULT '',
  `id_group` smallint(5) NOT NULL DEFAULT '0',
  `add_groups` varchar(40) NOT NULL DEFAULT '',
  `active` tinyint(3) NOT NULL DEFAULT '1',
  `repeatable` tinyint(3) NOT NULL DEFAULT '0',
  `allow_partial` tinyint(3) NOT NULL DEFAULT '0',
  `reminder` tinyint(3) NOT NULL DEFAULT '0',
  `email_complete` text NOT NULL,
  PRIMARY KEY (`id_subscribe`),
  KEY `active` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_subscriptions: 0 rows
/*!40000 ALTER TABLE `smf_subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `smf_subscriptions` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_themes
CREATE TABLE IF NOT EXISTS `smf_themes` (
  `id_member` mediumint(8) NOT NULL DEFAULT '0',
  `id_theme` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `variable` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`id_theme`,`id_member`,`variable`(30)),
  KEY `id_member` (`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_themes: 31 rows
/*!40000 ALTER TABLE `smf_themes` DISABLE KEYS */;
INSERT INTO `smf_themes` (`id_member`, `id_theme`, `variable`, `value`) VALUES
	(0, 1, 'name', 'SMF Default Theme - Curve'),
	(0, 1, 'theme_url', 'http://localhost/public/webboard/Themes/default'),
	(0, 1, 'images_url', 'http://localhost/public/webboard/Themes/default/images'),
	(0, 1, 'theme_dir', 'C:\\Workspace\\Benz\\PHP\\7Dot\\7Dot\\public\\webboard/Themes/default'),
	(0, 1, 'show_bbc', '1'),
	(0, 1, 'show_latest_member', '1'),
	(0, 1, 'show_modify', '1'),
	(0, 1, 'show_user_images', '1'),
	(0, 1, 'show_blurb', '1'),
	(0, 1, 'show_gender', '0'),
	(0, 1, 'show_newsfader', '0'),
	(0, 1, 'number_recent_posts', '0'),
	(0, 1, 'show_member_bar', '1'),
	(0, 1, 'linktree_link', '1'),
	(0, 1, 'show_profile_buttons', '1'),
	(0, 1, 'show_mark_read', '1'),
	(0, 1, 'show_stats_index', '1'),
	(0, 1, 'linktree_inline', '0'),
	(0, 1, 'show_board_desc', '1'),
	(0, 1, 'newsfader_time', '5000'),
	(0, 1, 'allow_no_censored', '0'),
	(0, 1, 'additional_options_collapsable', '1'),
	(0, 1, 'use_image_buttons', '1'),
	(0, 1, 'enable_news', '1'),
	(0, 1, 'forum_width', '90%'),
	(0, 2, 'name', 'Core Theme'),
	(0, 2, 'theme_url', 'http://localhost/public/webboard/Themes/core'),
	(0, 2, 'images_url', 'http://localhost/public/webboard/Themes/core/images'),
	(0, 2, 'theme_dir', 'C:\\Workspace\\Benz\\PHP\\7Dot\\7Dot\\public\\webboard/Themes/core'),
	(-1, 1, 'display_quick_reply', '1'),
	(-1, 1, 'posts_apply_ignore_list', '1');
/*!40000 ALTER TABLE `smf_themes` ENABLE KEYS */;


# Dumping structure for table 7dot.smf_topics
CREATE TABLE IF NOT EXISTS `smf_topics` (
  `id_topic` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `is_sticky` tinyint(4) NOT NULL DEFAULT '0',
  `id_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_first_msg` int(10) unsigned NOT NULL DEFAULT '0',
  `id_last_msg` int(10) unsigned NOT NULL DEFAULT '0',
  `id_member_started` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_member_updated` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_poll` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id_previous_board` smallint(5) NOT NULL DEFAULT '0',
  `id_previous_topic` mediumint(8) NOT NULL DEFAULT '0',
  `num_replies` int(10) unsigned NOT NULL DEFAULT '0',
  `num_views` int(10) unsigned NOT NULL DEFAULT '0',
  `locked` tinyint(4) NOT NULL DEFAULT '0',
  `unapproved_posts` smallint(5) NOT NULL DEFAULT '0',
  `approved` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_topic`),
  UNIQUE KEY `last_message` (`id_last_msg`,`id_board`),
  UNIQUE KEY `first_message` (`id_first_msg`,`id_board`),
  UNIQUE KEY `poll` (`id_poll`,`id_topic`),
  KEY `is_sticky` (`is_sticky`),
  KEY `approved` (`approved`),
  KEY `id_board` (`id_board`),
  KEY `member_started` (`id_member_started`,`id_board`),
  KEY `last_message_sticky` (`id_board`,`is_sticky`,`id_last_msg`),
  KEY `board_news` (`id_board`,`id_first_msg`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table 7dot.smf_topics: 1 rows
/*!40000 ALTER TABLE `smf_topics` DISABLE KEYS */;
INSERT INTO `smf_topics` (`id_topic`, `is_sticky`, `id_board`, `id_first_msg`, `id_last_msg`, `id_member_started`, `id_member_updated`, `id_poll`, `id_previous_board`, `id_previous_topic`, `num_replies`, `num_views`, `locked`, `unapproved_posts`, `approved`) VALUES
	(1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);
/*!40000 ALTER TABLE `smf_topics` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
