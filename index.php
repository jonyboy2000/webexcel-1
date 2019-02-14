<?php
$baseUrl = trim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
//保证为空时能返回可以使用的正常值
$baseUrl = empty($baseUrl) ? '/' : '/' .$baseUrl. '/';
//echo __FILE__;include('./debug.php');exit;
$fsv = get_domain();
$sv = $fsv . $baseUrl;
//echo $sv;
$cdir = dirname(__FILE__);
$t_path = $_GET[fpath];
$t_home = $_GET[fhome];
$fp = explode('/', $t_path);
$userid = $fp[0];   //要结合  .htaccess 使用 
if (!empty($userid)) {
    $bokpath = strpos($t_path, $userid) + strlen($userid);  //当前用户路径
}
$booknaid = substr($t_path, $bokpath + 1);
if (empty($booknaid)) {
    $booknaid = $t_path;
}
session_start();
$_SESSION['fpath'] = $t_path;  //完整文件路径
$_SESSION['fhome'] = $t_home;  //当前目录 user  fact
//$_SESSION[sessionId]=$sessionId;
$_SESSION['bookid'] = (string) $booknaid;
if (empty($_SESSION['uid'])) {
    $_SESSION['uid'] = $userid;
}
$filid = '999';

//echo __FILE__;include('./debug.php');exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type"/>
        <meta content="IE=EmulateIE7" http-equiv="X-UA-Compatible"/>
        <meta content="25260" name="EditGrid-Revision"/>
        <meta content="2011-02-06 17:16:22 +0800 (Sun, 06 Feb 2011)" name="EditGrid-Last-Changed-Date"/>
        <meta content="A web-based online spreadsheet with real-time collaboration features" name="description"/>
        <meta content="spreadsheet, online, web-based, real-time, collaboration" name="keywords"/>
        <meta content="4368307" name="BookId"/>
        <meta content="16394125" name="BookRevId"/>
        <meta content="93195744(0),93195745(1),93195746(2)" name="SheetIdList"/>
        <meta content="none" name="TokenStatus"/>
        <title><?php echo (string) $booknaid; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $sv; ?>static/style/default.css"/>
        <style type="text/css">
            body {overflow: hidden}
        </style>
        <script type="text/javascript"  >
            var editgrida = {};
            editgrida.config = {
                "isRemoteGrid":0,
                "oooc_url":1,
                "gridletHost":"192.168.1.22",
                "staticUrl":"./static/",
                "defaultFont":"Arial",
                "docFunctionBase":"doc/function/",
                "hideMenuItems":[],
                "initialSessionId":'<?php echo $sessionId; ?>',
                "enableRemoteData":1,
                "enableVerticalAlign":0,
                "gridletBaseUrl":"http://192.168.1.22/editgrid/",
                "revUrl":"http://192.168.1.22/editgrid/",
                "gridletDebug":0,
                "gridletEnabled":1,
                "timingSheetDiff":15000,
                "gridEventdUrl":"http://192.168.1.22/editgrid/",
                "profileUrl":"./js",
                "SidePaneChat":0,
                "baseUrl":"http://192.168.1.22/editgrid/",
                "timingKeepAlive":240000,
                "acceptFonts":{"Garamond":"Garamond","Geneva":"Geneva","Century Gothic":"Century Gothic","Arial":"Arial","Times New Roman":"Times New Roman","Tahoma":"Tahoma","Georgia":"Georgia","Trebuchet MS":"Trebuchet MS","Comic Sans MS":"Comic Sans MS","Verdana":"Verdana","Courier New":"Courier New"}};
            var editgrid = {};
            editgrid.config = {
                "isRemoteGrid":0,
                "oooc_url":1,
                "gridletHost":"<?php echo $fsv; ?>",
                "staticUrl":"<?php echo $sv; ?>/static/",
                "defaultFont":"Arial",
                "docFunctionBase":"<?php echo $sv; ?>/doc/function/",
                "hideMenuItems":[],
                "initialSessionId":"<?php echo $sessionId; ?>",
                "enableRemoteData":1,
                "enableVerticalAlign":0,
                "gridletBaseUrl":"<?php echo $sv; ?>",
                //                "chatEventdUrl":"<?php echo $sv; ?>",
                "revUrl":"<?php echo $sv; ?>",
                "gridletDebug":0,
                "gridletEnabled":1,
                "timingSheetDiff":150000,
                "gridEventdUrl":"",//<?php echo $sv; ?>
                "profileUrl":"<?php echo $sv; ?>js/",
                "SidePaneChat":0,
                "baseUrl":"<?php echo $sv; ?>",
                "eventdClientFactory":"eventd.createCrossDomainClient",
                "timingKeepAlive":240000,
                "acceptFonts":{
                    "Garamond":"Garamond",
                    "Geneva":"Geneva",
                    "Century Gothic":"Century Gothic",
                    "Arial":"Arial",
                    "Times New Roman":"Times New Roman",
                    "Tahoma":"Tahoma",
                    "Georgia":"Georgia",
                    "Trebuchet MS":"Trebuchet MS",
                    "Comic Sans MS":"Comic Sans MS",
                    "Verdana":"Verdana",
                    "Courier New":"Courier New"
                }
            };
        </script>
        <script type="text/javascript" src="<?php echo $sv; ?>js/grid.js" ></script>
        <script type="text/javascript" src="<?php echo $sv; ?>js/zh_cn.js" ></script>
    </head>
    <body>
        <div id="gridContainer" style="width: 100%" ></div>
        <script type="text/javascript">
            //<![CDATA[
            grid = new editgrid.Grid();
            grid.revision = "25246";
            gridControl = new editgrid.EditGridControl(grid);
            var gridContainer = std.dom.element('gridContainer');
            layout = grid.getStandardLayout();
            layout.setResizeHandler(new editgrid.layout.HomeResizeHandler());
            layout.doLayout(gridContainer, grid);
            grid.setCaptureDocumentFocus(true);
            grid.loadBook(<?php echo $filid; ?>);
            //]]>
        </script>
    </body>
</html>
<?php

function get_domain() {
    /* 协议 */
//        $protocol = $this->http();
    $protocol ='http://';

    /* 域名或IP地址 */
    if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
        $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
    } elseif (isset($_SERVER['HTTP_HOST'])) {
        $host = $_SERVER['HTTP_HOST'];
    } else {
        /* 端口 */
        if (isset($_SERVER['SERVER_PORT'])) {
            $port = ':' . $_SERVER['SERVER_PORT'];

            if ((':80' == $port && 'http://' == $protocol) || (':443' == $port && 'https://' == $protocol)) {
                $port = '';
            }
        } else {
            $port = '';
        }

        if (isset($_SERVER['SERVER_NAME'])) {
            $host = $_SERVER['SERVER_NAME'] . $port;
        } elseif (isset($_SERVER['SERVER_ADDR'])) {
            $host = $_SERVER['SERVER_ADDR'] . $port;
        }
    }

    return $protocol . $host;
}
?>
