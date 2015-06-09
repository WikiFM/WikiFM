<?php
# This file was automatically generated by the MediaWiki 1.17.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

$IP = "/var/www/WikiFM/mediawiki/";

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

# Mobile detection
$_SERVER['HTTP_X_DEVICE'] = $_SERVER['HTTP_USER_AGENT'];

ini_set('memory_limit', '64M');
$wgMaxShellMemory = 524288;

require_once( "$IP/extensions/googleAnalytics/googleAnalytics.php" );

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgMetaNamespace = "Project";

$wgCookieDomain = '.wikifm.org';

$wgSecureLogin	= true;
$wgCookieSecure = true;

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgUsePathInfo      = false; #required since v1.11.0
$wgScriptPath       = "";
$wgArticlePath      = "/$1";
$wgScript           = "$wgScriptPath/index.php";
$wgRedirectScript   = "$wgScriptPath/redirect.php";

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo             = "$wgStylePath/common/images/wiki.png";

$wgMainCacheType = CACHE_MEMCACHED;
$wgMemCachedServers = array(
    "127.0.0.1:11000", # one gig on this box
);

$wgCacheDirectory = "$IP/cache/";
$wgEnableSidebarCache = true;

## UPO means: this is also a user preference option

$wgEnableEmail      = false;
$wgEnableUserEmail  = true; # UPO

$wgEmergencyContact = "webmaster@kde.org";
$wgPasswordSender   = "webmaster@kde.org";

$wgEnotifUserTalk      = false; # UPO
$wgEnotifWatchlist     = false; # UPO
$wgEmailAuthentication = true;

## Database settings
require_once("$IP/../DatabaseSettings.php");

## Shared memory settings
$wgMainCacheType    = CACHE_NONE;
$wgMemCachedServers = array();

$wgEnableAPI = true;

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads  = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

$wgFileExtensions[] = 'pdf';
$wgFileExtensions[] = 'svg';
$wgFileExtensions[] = 'svgz';
$wgFileExtensions[] = 'tex';
$wgGroupPermissions['*']['upload'] = true;
#$wgGroupPermissions['Editor']['autopatrol'] = true;
$wgGroupPermissions['sysop']['meta'] = true;
# $wgGroupPermissions['user']['upload'] = true;

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons  = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;


## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

$wgUseSharedUploads = true;
$wgSharedUploadPath = 'http://pool.wikifm.org/images';
$wgSharedUploadDirectory = '$IP/images/';
$wgHashedSharedUploadDirectory = true;
$wgUploadNavigationUrl = "http://pool.wikifm.org/index.php/Special:Upload";
$wgUploadMissingFileUrl= "http://pool.wikifm.org/index.php/Special:Upload";

require_once "$IP/extensions/Interwiki/Interwiki.php";
$wgGroupPermissions['sysop']['interwiki'] = true;


## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = "vector";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = "Project:Copyright"; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl  = "http://creativecommons.org/licenses/by-sa/3.0/";
$wgRightsUrl  = "//www.wikifm.org/index.php/Project:Copyright";
$wgRightsText = "Creative Commons Attribution Share Alike 3.0 &amp; GNU FDL";
$wgRightsIcon = "{$wgStylePath}/common/images/cc-by-sa.pn";
$wgRightsIcon = "{$wgStylePath}/common/images/gfdlcc.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

$wgSVGConverter = 'inkscape';

# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = 512;


# End of automatically generated settings.
# Add more configuration options below.

# Highlight extension:
require_once("$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php");

# No TOC
#require_once("$IP/extensions/NoTOC/NoTOC.php");
$wgHooks['ParserClearState'][] = 'efMWNoTOC';
 
function efMWNoTOC($parser) {
    $parser->mShowToc = false;
    return true;
}


# Add subpage capabilities
$wgNamespacesWithSubpages = array_fill(0, 200, true);
$wgNamespacesWithSubpages[NS_USER] = true;

# Add parser functions (for if, else, ...)
require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );

# Bigger uploads
$wgMaxUploadSize = 2147483648;

# Protect only uploads
$wgUploadPath = "{$wgScriptPath}/images/uploads";
$wgUploadDirectory = "images/uploads";
$wgAllowExternalImagesFrom = array('http://www.wikifm.org/', 'http://www.pledgie.com');
$wgMathPath = "/images/math";
$wgMathDirectory = "images/math";
$wgTmpDirectory  = "images/tmp";

$wgUseETag = true;

# Don't sitemap files
#$wgSitemapNamespaces = array('0', '2', '3', '4', '6', '8');


require_once("extensions/Collection/Collection.php");
$wgGroupPermissions['user']['collectionsaveasuserpage'] = true;
$wgGroupPermissions['sysop']['collectionsaveascommunitypage'] = true;
$wgCollectionMWServeURL = ("http://tools.pediapress.com/mw-serve/");


# MathJax
require_once("$IP/extensions/Math/Math.php");
$wgUseMathJax = true;
$wgDefaultUserOptions['math'] = MW_MATH_MATHJAX;

$wgParserCacheType = CACHE_ACCEL; // # Don't break math rendering

# awesome editor
require_once( "$IP/extensions/WikiEditor/WikiEditor.php" );
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
$wgDefaultUserOptions['wikieditor-preview'] = 1;

# Captcha
require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" );

require_once( "$IP/extensions/ConfirmEdit/QuestyCaptcha.php");
$wgCaptchaClass = 'QuestyCaptcha';


$wgGroupPermissions['*']['skipcaptcha'] = false;
$wgGroupPermissions['user']['skipcaptcha'] = true;
$wgCaptchaTriggers['createaccount'] = true;
$wgCaptchaTriggers['edit'] = true;
$wgCaptchaTriggers['create'] = true;


# Vector yays
#require_once( "$IP/extensions/Vector/Vector.php" );
$wgDefaultUserOptions['useeditwarning'] = 1;
# gVectorFeatures['expandablesearch']['user'] = true;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = 'neverland';

$wgShowExceptionDetails = true; 


require_once("$IP/extensions/ContributionScores/ContributionScores.php");
$wgContribScoreIgnoreBots = true;          // Exclude Bots from the reporting - Can be omitted.
$wgContribScoreIgnoreBlockedUsers = true;  // Exclude Blocked Users from the reporting - Can be omitted.
$wgContribScoresUseRealName = true;        // Use real user names when available - Can be omitted. Only for MediaWiki 1.19 and later.
$wgContribScoreDisableCache = false;       // Set to true to disable cache for parser function and inclusion of table.

//Each array defines a report - 7,50 is "past 7 days" and "LIMIT 50" - Can be omitted.
$wgContribScoreReports = array(
    array(30,20),
    array(90,20));


include_once("$IP/extensions/EmbedVideo/EmbedVideo.php");

#require_once("$IP/extensions/MobileFrontend/MobileFrontend.php");

#$_SERVER['HTTP_X_DEVICE'] = $_SERVER['HTTP_USER_AGENT'];
#error_log("device from ls.php");
#error_log($_SERVER['HTTP_X_DEVICE']);

require_once("$IP/extensions/Cite/Cite.php");
$wgCiteEnablePopups = true; 

require_once( "$IP/extensions/LiquidThreads/LiquidThreads.php" );

require_once("$IP/extensions/Nuke/Nuke.php");

require_once( "$IP/extensions/Echo/Echo.php" );

require_once("$IP/extensions/FlaggedRevs/FlaggedRevs.php");
$wgGroupPermissions['sysop']['review'] = true; //allow administrators to review revisions
$wgFlaggedRevsOverride = false;

$wgAllowImageTag =true;

require_once("$IP/extensions/CategorySuggest/CategorySuggest.php");

//require_once("$IP/extensions/VisualEditor/VisualEditor.php")

#require_once( "$IP/extensions/SubPageList/SubPageList.php" );

$wgEnableDnsBlacklist = true;
$wgDnsBlacklistUrls = array( 'xbl.spamhaus.org', 'dnsbl.tornevall.org' );

require_once "$IP/extensions/UserMerge/UserMerge.php";
// By default nobody can use this function, enable for bureaucrat?
$wgGroupPermissions['sysop']['usermerge'] = true;

require_once "$IP/extensions/UniversalLanguageSelector/UniversalLanguageSelector.php";

require_once "$IP/skins/Neverland/Neverland.php";

