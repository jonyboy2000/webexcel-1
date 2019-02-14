<?php

session_start();
$xmlstr = file_get_contents("php://input");
//echo __FILE__;include('../debug.php');exit;
$t_path = $_GET[fna];

$fp = explode('/', $t_path);
$sid = $fp[2];   //session ID
$bookvid = $fp[3]; //versionid
$fname = $_SESSION['fpath'];
$fhome = $_SESSION['fhome'];

$cmdverfile = "./jsoncd/file.class.php";
$uid = $_SESSION[uid];
require_once($cmdverfile);

class Action {

    public $bookName;
    protected $FileName;
    public $bookId;
    protected $sheetId;
    public $workspaceId;
    public $workspaceName;
    protected $FileXml;
    public $bookRevId = 0;
    protected $SavePath = './user/';
    protected $rsarray;

    public function addRsarray($arry) {
        $type = $arry['type'];
        if (!is_null($type)) {
            $this->rsarray['commandResponses'][] = $arry;
            return;
        }
        foreach ($arry as $rsarr) {
            $this->rsarray['commandResponses'][] = $rsarr;
        }
        return;
    }

    public function GetRsArray() {
        return '(' . json_encode($this->rsarray) . ')';
    }

    public function SetDefPath($dir) {
        if (!empty($dir)) {
            $this->SavePath = $dir;
        }
    }

    public function GetDefPath() {
        return $this->SavePath;
    }

    public function loadstr() {
        return $this->FileXml;
    }

    public function LoadFile($fid) {
        $fname = $this->SavePath . $fid;
        if (is_file($fname)) {
            $this->FileName = $fname;
        } else {
            $this->FileName = $this->SavePath . 'demo.xml';
        }
        if (is_file($this->FileName)) {
            $this->FileXml = simplexml_load_file($this->FileName);
        } else {
            return false;
        }
        return true;
    }

    public function SaveFile($data) {
        file_put_contents($this->FileName, $data);
    }

    public function SaveChangeFile($data) {
        $content = $data;
        $bn = basename($this->FileName);
        $fp = dirname($this->FileName);
        $changname = $fp . '/.' . $bn . '.alive';
        if ($content) {
            $fp = fopen($changname, 'a');
            fwrite($fp, $content . "\n");
            fclose($fp);
        }
    }

    public function processjsonp($cmdstr, $jsonp) {
        $cmdxml = simplexml_load_string($cmdstr);
        $i = 0;
        foreach ($cmdxml->children() as $resqu) {
            $cmd[$i][cmd] = $resqu->getName();
            $cmd[$i][parr] = $resqu->attributes();
            $cmd[$i][jsonp] = $jsonp;
            $i++;
        }
        return $cmd;
    }

}

$xfs = new Action();
if (!empty($fhome)) {
    $xfs->SetDefPath("../" . $fhome . "/");
}
if ($xfs->LoadFile($fname)) {
    $xfs->bookId = $bookvid;
    $xfs->bookrevId = $bookvid;
    $xfs->workspaceId = 'admin';
    $xfs->workspaceName = $uid;
}
$cmd = $xfs->processjsonp($xmlstr, $jsonp);  // 命令列表!

foreach ($cmd as $cmdli) {
    $cmdlina = $cmdli[cmd];
    if (!empty($cmdlina)) {
        $cmdverfile = "./jsoncd/$cmdlina.php";
        if (!is_file($cmdverfile)) {
            $pcmd = new ProcessCMD();
        } else {
            require_once($cmdverfile);  //注意 每个文件 最后一行 ????$pcmd = new 命令();
        }

        $pcmd->bookId = $xfs->bookId;
        $pcmd->bookrevId = $xfs->bookrevId;
        $pcmd->workspaceId = $xfs->workspaceId;
        $pcmd->workspaceName = $xfs->workspaceName;
        $pcmd->bookName = $xfs->bookName;   //未写
        $pcmd->path = $xfs->GetDefPath();

        $pcmd->loadxml($xfs->loadstr());  //加载  xml 内容
        $pcmd->LoadParr($cmdli);  //加载  xml 内容
        //echo $seq;exit;
        $rsarray = $pcmd->RsData($seq);
        $oseq = $seq;
        $seq = $pcmd->GetSeq();
        if ($seq < $oseq) {
            $seq = $oseq;
        } else {
            $oseq = $seq;
        }
        $xfs->addRsarray($rsarray);
    }
}
if ($pcmd->IsSave) {
    $xfs->SaveFile($pcmd->SaveXml());
    $change = $seq . '=' . $xfs->GetRsArray();
    $xfs->SaveChangeFile($change);
}
echo $xfs->GetRsArray();
exit;
?>
