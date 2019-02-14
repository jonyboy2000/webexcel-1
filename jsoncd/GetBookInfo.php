<?php

//({"commandResponses":[{"type":10001,"values":{"bookRevId":16394125,"isPublicReadable":0,"isCurrRev":1,"orgName":"user","workspaceId":355635,"currRevId":16394125,"isProtectWrite":0,"isProtectRead":0,"isPersisted":1,"path":"user/linzhai/12345","workspaceName":"linzhai","bookId":4368307,"licenseType":"none","orgId":1,"bookName":"12345","isPublicWritable":0}},{"type":10002,"values":{"macroEnabled":null,"remoteDataUpgraded":1,"isEnableChat":1,"userId":343182,"locale":{},"isOrgAdminRealised":0,"isFormalReadable":1,"isOwner":1,"isLogin":1,"isPasswordLocked":0,"userName":"linzhai","verticalAlign":0,"warnPasteOverwrite":1,"isReadOnly":0,"textOverflow":1}},{ "type": 20, "subCommands": [ { "type": 15, "seq": 56, "subCommands": [ { "type": 9, "sheets": [ { "id": 93195744, "name": "Sheet1", "gridLinesVisible": 1, "hidden": 0, "extentCol": 0, "extentRow": 2, "numCell": 1, "numStyle": 11 }, { "id": 93195745, "name": "Sheet2", "gridLinesVisible": 1, "hidden": 0, "extentCol": 0, "extentRow": 0, "numCell": 0, "numStyle": 1 }, { "id": 93195746, "name": "Sheet3", "gridLinesVisible": 1, "hidden": 0, "extentCol": 0, "extentRow": 0, "numCell": 0, "numStyle": 1 } ] }, { "type": 3, "sheetId": 93195744, "isCol": 1, "start": 0, "end": 255, "size": 85 }, { "type": 3, "sheetId": 93195744, "isCol": 0, "start": 0, "end": 65535, "size": 17 }, { "type": 3, "sheetId": 93195745, "isCol": 1, "start": 0, "end": 255, "size": 85 }, { "type": 3, "sheetId": 93195745, "isCol": 0, "start": 0, "end": 65535, "size": 17 }, { "type": 3, "sheetId": 93195746, "isCol": 1, "start": 0, "end": 255, "size": 85 }, { "type": 3, "sheetId": 93195746, "isCol": 0, "start": 0, "end": 65535, "size": 17 } ] }, { "type": 16, "bookId": 16394125, "sheetId": 93195744, "fromCol": 0, "fromRow": 0, "toCol": 255, "toRow": 127, "subCommands": [ { "type": 2, "sheetId": 93195744, "col": 0, "row": 2, "vtype": 40, "text": "5", "rtext": "5", "ntext": "5", "color": 0, "errors": [ ] }, { "type": 5, "sheetId": 93195744, "startCol": 0, "startRow": 0, "endCol": 255, "endRow": 127, "_mask": 15359, "_style": 2048, "mask": 127, "style": 0, "fontName": "Arial", "fontSize": 10.000000, "fontColor": 0, "format": "General", "btop": 0, "bbottom": 0, "bleft": 0, "bright": 0, "def": 1 }, { "type": 17, "sheetId": 93195744, "list": [ { "startCol": 2, "startRow": 1, "endCol": 3, "endRow": 1 } ] } ] } ] },{"type":500,"linkSheetIds":[]},{"type":0}]})
//exit;
//命令输入格式
//<?xml version="1.0" ? >
//<Request>
//<GetBookInfo bookRevId="16394125" gridSessionId="1303086130050" cseq="1"/>
//<GetBookSessionInfo bookRevId="16394125" gridSessionId="1303086130050" cseq="2"/>
//<CheckOutLayoutAndFirstRange bookRevId="16394125" sheetId="-1" range="R0C0:R127C255" gridSessionId="1303086130050" cseq="3"/>
//<CheckOutSheetLink bookRevId="16394125" gridSessionId="1303086130050" cseq="4"/>
//<KeepAlive bookRevId="16394125" gridSessionId="1303086130050" cseq="5"/>
//</Request>
//type=10001
//GetBookInfo 取得文件头消息   
//setBookInfo
//echo $this->FileXml->asXML();exit;
//{"type":10001,"values":{"bookRevId":3727453,"isPublicReadable":1,"isCurrRev":1,"orgName":"tnc","workspaceId":96504,"currRevId":3727453,"isProtectWrite":1,"isProtectRead":0,"isPersisted":1,"path":"tnc/developer/Grid_API_setBackColor","workspaceName":"developer","bookId":863919,"licenseType":"none","orgId":2,"bookName":"Grid API setBackColor","isPublicWritable":1}},
class GetBookinfo extends ProcessCMD {

    public function RsData() {
        $rs[type] = 10001;
        $values[bookRevId] = $this->bookRevId;
        $values[isPublicReadable] = 1;
        $values[isCurrRev] = 1;
        $values[orgName] = 'tnc';
        $values[workspaceId] = $this->workspaceId;
        $values[currRevId] = $this->bookRevId;
        $values[isProtectWrite] = 0;
        $values[isProtectRead] = 0;
        $values[isPersisted] = 1;
        $values[path] = $this->path;
        $values[workspaceName] = $this->workspaceName;
        $values[bookId] = $this->bookId;
        $values[licenseType] = 'none';
        $values[orgId] = 2;
        $values[bookName] = $this->bookName;
        $values[isPublicWritable] = 1;
        $rs[values] = $values;
        return $rs;
    }
}
$pcmd=new GetBookinfo();

//$cmdverfile = "./$this->bookRevId/GetBookSessionInfo.php";
//require_once($cmdverfile);
//$cmdverfile = "./$this->bookRevId/CheckOutLayoutAndFirstRange.php";
//require_once($cmdverfile);
//$jsstr =json_encode($this->rsarray);
//$rsstr=$jsstr;
//$rsstr.='})';
//echo '('.$rsstr.')';
//$this->rsarray = null;
//exit;
?>
