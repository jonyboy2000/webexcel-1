<?php

//返回第一页 0-127 0-255 的资料
//type=20 isLayoutFirstRange=1
//subCommands 15 // sheets 信息
//subCommands 9  设定 sheets  3 sheetid 行isCol=1 0-255 列isCol=0 0-65535
//({"commandResponses":[
//{ "type": 20, "subCommands": [
//{ "type": 15, "seq": 44, "subCommands": [
//{ "type": 9, "sheets": [{ "id": 93195744, "name": "Sheet1", "gridLinesVisible": 1, "hidden": 0, "extentCol": 4, "extentRow": 10, "numCell": 11, "numStyle": 11 }, { "id": 93195745, "name": "Sheet2", "gridLinesVisible": 1, "hidden": 0, "extentCol": 0, "extentRow": 0, "numCell": 0, "numStyle": 1 }, { "id": 93195746, "name": "Sheet3", "gridLinesVisible": 1, "hidden": 0, "extentCol": 0, "extentRow": 0, "numCell": 0, "numStyle": 1 }] },
//{ "type": 3, "sheetId": 93195744, "isCol": 1, "start": 0, "end": 255, "size": 85 },
//{ "type": 3, "sheetId": 93195744, "isCol": 0, "start": 0, "end": 65535, "size": 17 },
//subCommands 16 // sheets 内容
//{ "type": 16, "bookId": 16394125, "sheetId": 93195744, "fromCol": 0, "fromRow": 0, "toCol": 255, "toRow": 127, "subCommands": [
//subCommands 2  //单元格内容
//{ "type": 2, "sheetId": 93195744, "col": 0, "row": 2, "vtype": 40, "text": "5", "rtext": "5", "ntext": "5", "color": 0, "errors": [] },
//{ "type": 2, "sheetId": 93195744, "col": 1, "row": 2, "vtype": 40, "text": "13", "rtext": "13", "ntext": "13", "color": 0, "errors": [] },
//subCommands 5  //样式
//{ "type": 5, "sheetId": 93195744, "startCol": 0, "startRow": 0, "endCol": 255, "endRow": 127, "_mask": 15359, "_style": 2048, "mask": 127, "style": 0, "fontName": "Arial", "fontSize": 10.000000, "fontColor": 0, "format": "General", "btop": 0, "bbottom": 0, "bleft": 0, "bright": 0, "def": 1 },
//{ "type": 5, "sheetId": 93195744, "startCol": 1, "startRow": 2, "endCol": 1, "endRow": 2, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "backColor": 16711680 },
//{ "type": 17, "sheetId": 93195744, "list": [{ "startCol": 2, "startRow": 1, "endCol": 3, "endRow": 1 }] }] }] },
//第一次取得文件内容 CheckOutLayoutAndFirstRange
//echo $this->FileXml->asXML();exit;
//返回  sheets 列表
//({"commandResponses":[
//  {"type":10001,"values":{"bookRevId":17156060,"isPublicReadable":1,"isCurrRev":1,"orgName":"user","workspaceId":355635,"currRevId":17156060,"isProtectWrite":0,"isProtectRead":0,"isPersisted":1,"path":"user/linzhai/AXAX","workspaceName":"linzhai","bookId":4526854,"licenseType":"none","orgId":1,"bookName":"AXAX","isPublicWritable":1}},
//  {"type":10002,"values":{"macroEnabled":null,"remoteDataUpgraded":1,"isEnableChat":1,"userId":-1,"locale":{},"isOrgAdminRealised":null,"isFormalReadable":1,"isOwner":0,"isLogin":null,"isPasswordLocked":0,"userName":"anonymous","verticalAlign":0,"warnPasteOverwrite":0,"isReadOnly":0,"textOverflow":1}},
//  { "type": 20, "subCommands": [ { "type": 15, "seq": 210, "subCommands": [
//      { "type": 9, "sheets": [ { "id": 98484961, "name": "Sheet2", "gridLinesVisible": 1, "hidden": 0, "extentCol": 1, "extentRow": 1, "numCell": 1, "numStyle": 11 },
//      { "id": 98484962, "name": "Sheet3", "gridLinesVisible": 1, "hidden": 0, "extentCol": 0, "extentRow": 0, "numCell": 0, "numStyle": 1 } ] }, { "type": 3, "sheetId": 98484961, "isCol": 1, "start": 0, "end": 255, "size": 85 },
//      { "type": 3, "sheetId": 98484961, "isCol": 0, "start": 0, "end": 65535, "size": 17 }, { "type": 3, "sheetId": 98484961, "isCol": 0, "start": 1, "end": 1, "size": 35 },
//      { "type": 3, "sheetId": 98484961, "isCol": 0, "start": 2, "end": 2, "size": 33 }, { "type": 3, "sheetId": 98484962, "isCol": 1, "start": 0, "end": 255, "size": 85 },
//      { "type": 3, "sheetId": 98484962, "isCol": 0, "start": 0, "end": 65535, "size": 17 } ] },
//      { "type": 16, "bookId": 17156060, "sheetId": 98484961, "fromCol": 0, "fromRow": 0, "toCol": 255, "toRow": 127, "subCommands": [
//          { "type": 2, "sheetId": 98484961, "col": 1, "row": 1, "vtype": 40, "text": "12", "rtext": "12", "ntext": "12", "color": 0, "errors": [ ] }, { "type": 3, "sheetId": 98484961, "isCol": 0, "start": 1, "end": 1, "size": 35 },
//          { "type": 3, "sheetId": 98484961, "isCol": 0, "start": 2, "end": 2, "size": 33 },
//          { "type": 5, "sheetId": 98484961, "startCol": 0, "startRow": 0, "endCol": 255, "endRow": 127, "_mask": 15359, "_style": 2048, "mask": 127, "style": 0, "fontName": "Arial", "fontSize": 10.000000, "fontColor": 0, "format": "General", "btop": 0, "bbottom": 0, "bleft": 0, "bright": 0, "def": 1 },
//          { "type": 5, "sheetId": 98484961, "startCol": 1, "startRow": 1, "endCol": 1, "endRow": 1, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "fontSize": 20.000000, "btop": 1, "bcolortop": 0, "bbottom": 1, "bcolorbottom": 0, "bleft": 1, "bcolorleft": 0, "bright": 1, "bcolorright": 0 },
//          { "type": 17, "sheetId": 98484961, "list": [ ] } ] } ] },
//          {"type":500,"linkSheetIds":[]},{"type":0}]})

class CheckoutLayoutAndFirstRange extends ProcessCMD {

    public function RsData() {
        $firstsheetid = $this->FileXml->UIData[SelectedTab] + 0;
        $sheetid = $firstsheetid;

        $sheetsin = $this->GetSheetNameIndex();

        $sheets[type] = 9;   //sheets name index
        $sheets[sheets] = $sheetsin[sheets];
        $sheetstotal = 0;  //sheets 合计
        foreach ($sheetsin[info] as $sinfo) {
            $sinfo[type] = 3;   // sheets  cols rows
            $sinfolist[] = $sinfo;
            $sheetstotal++;
        }

        $rs15[type] = 15;
        $rs15[seq] = (string) $parr->cseq[0] + 0;
        $rs15[subCommands][] = $sheets;
        $rs15[subCommands][] = $sinfolist;

        //下面这么是清除一些格式 要不然表格显示出来一半
        $cells[] = array("type" => 5, "sheetId" => $sheetid + 1, "startCol" => 0, "startRow" => 0, "endCol" => 255, "endRow" => 127, "_mask" => 15359, "_style" => 2080, "mask" => 127, "style" => 0, "fontName" => "Arial", "fontSize" => 10.000000, "fontColor" => 0, "format" => "General", "btop" => 0, "bbottom" => 0, "bleft" => 0, "bright" => 0, "def" => 1);

        $CellStyles = $this->GetSheetCellStyle($sheetid);  //取得行列样式
        foreach ($CellStyles as $cell) {
            $cell[type] = 5;   // sheets  cols rows
            $cells[] = $cell;
        }

        $colrowval = $this->GetSheetCellVals($sheetid);   //取得行列数据
        foreach ($colrowval as $cell) {
            $cell[type] = 2;   // sheets  cols rows
            $cells[] = $cell;
        }

        $CellRowHight = $this->GetSheetRowsHight($sheetid);  //取得行高
        foreach ($CellRowHight as $cell) {
            $cell[type] = 3;   // sheets  cols rows
            $cells[] = $cell;
        }
        $CellColwHight = $this->GetSheetColsHight($sheetid);  //取得列高
        foreach ($CellColwHight as $cell) {
            $cell[type] = 3;   // sheets  cols rows
            $cells[] = $cell;
        }
        $vallist = $this->GetMergeCells($sheetid);
        if (!empty($vallist)) {  //没有合并单元格
            $dsub17[type] = 17;  //合并单元格
            $dsub17[sheetId] = $sheetid + 1;
            $dsub17['list'] = $vallist;
            $cells[] = $dsub17;
        }

        $rs16[type] = 16;
        $rs16[bookId] = $this->bookId;
        $rs16[sheetId] = $sheetid + 1;
        $rs16[fromCol] = 0;
        $rs16[fromRow] = 0;
        $rs16[toCol] = 255;
        $rs16[toRow] = 127;
        $rs16[subCommands] = $cells;

        $rs20[type] = 20;
        $rs20[subCommands][] = $rs15;
        $rs20[subCommands][] = $rs16;
        return $rs20;
    }

}

$pcmd = new CheckoutLayoutAndFirstRange();
?>
