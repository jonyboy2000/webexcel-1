<?php

//                                                                              上1   上下0  下1 下上0 左1  左右0  右1 右左0
//({"commandResponses":[{ "type": 4, "subCommands": [ { "type": 14, "seq": 230 } ] },{ "type": 0, "subCommands": [ { "type": 0 }, { "type": 4, "subCommands": [ { "type": 5, "sheetId": 1, "startCol": 6, "startRow": 5, "endCol": 6, "endRow": 5, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "btop": 1, "bcolortop": 0, "seq": 231, "gridId": "1307884405150" },{ "type": 5, "sheetId": 1, "startCol": 6, "startRow": 4, "endCol": 6, "endRow": 4, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bbottom": 0, "seq": 232, "gridId": "1307884405150" },{ "type": 5, "sheetId": 1, "startCol": 6, "startRow": 5, "endCol": 6, "endRow": 5, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bbottom": 1, "bcolorbottom": 0, "seq": 233, "gridId": "1307884405150" },{ "type": 5, "sheetId": 1, "startCol": 6, "startRow": 6, "endCol": 6, "endRow": 6, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "btop": 0, "seq": 234, "gridId": "1307884405150" },{ "type": 5, "sheetId": 1, "startCol": 6, "startRow": 5, "endCol": 6, "endRow": 5, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bleft": 1, "bcolorleft": 0, "seq": 235, "gridId": "1307884405150" },{ "type": 5, "sheetId": 1, "startCol": 5, "startRow": 5, "endCol": 5, "endRow": 5, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bright": 0, "seq": 236, "gridId": "1307884405150" },{ "type": 5, "sheetId": 1, "startCol": 6, "startRow": 5, "endCol": 6, "endRow": 5, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bright": 1, "bcolorright": 0, "seq": 237, "gridId": "1307884405150" },{ "type": 5, "sheetId": 1, "startCol": 7, "startRow": 5, "endCol": 7, "endRow": 5, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bleft": 0, "seq": 238, "gridId": "1307884405150" },{ "type": 11, "seq": 239, "is_undo": 1, "gridId": "1307884405150" },{ "type": 13, "seq": 240, "is_undo": 0, "gridId": "1307884405150" },{ "type": 14, "seq": 240 } ] } ] }]})
//exit;
//设定表格边线
//<Request>
//<RangeSetBorder bookRevId="999" sheetId="1" range="R2C5:R6C6" topType="1" topColor="0" bottomType="1" bottomColor="0" leftType="1" leftColor="0" rightType="1" rightColor="0" horiType="1" horiColor="0" vertType="1" vertColor="0" gridSessionId="1307755081308" cseq="11"></RangeSetBorder>
//</Request>
//({"commandResponses":[
//  { "type": 4, "subCommands": [ { "type": 14, "seq": 164 } ] },
//  { "type": 0, "subCommands": [
//      { "type": 0 },
//      { "type": 4, "subCommands": [
//          { "type": 5, "sheetId": 98484961, "startCol": 4, "startRow": 8, "endCol": 4, "endRow": 8, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "btop": 1, "bcolortop": 0, "seq": 165, "gridId": "1307763125137" },
//          { "type": 5, "sheetId": 98484961, "startCol": 4, "startRow": 7, "endCol": 4, "endRow": 7, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bbottom": 0, "seq": 166, "gridId": "1307763125137" },
//          { "type": 5, "sheetId": 98484961, "startCol": 4, "startRow": 8, "endCol": 4, "endRow": 8, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bbottom": 1, "bcolorbottom": 0, "seq": 167, "gridId": "1307763125137" },
//          { "type": 5, "sheetId": 98484961, "startCol": 4, "startRow": 9, "endCol": 4, "endRow": 9, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "btop": 0, "seq": 168, "gridId": "1307763125137" },
//          { "type": 5, "sheetId": 98484961, "startCol": 4, "startRow": 8, "endCol": 4, "endRow": 8, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bleft": 1, "bcolorleft": 0, "seq": 169, "gridId": "1307763125137" },
//          { "type": 5, "sheetId": 98484961, "startCol": 3, "startRow": 8, "endCol": 3, "endRow": 8, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bright": 0, "seq": 170, "gridId": "1307763125137" },
//          { "type": 5, "sheetId": 98484961, "startCol": 4, "startRow": 8, "endCol": 4, "endRow": 8, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bright": 1, "bcolorright": 0, "seq": 171, "gridId": "1307763125137" },
//          { "type": 5, "sheetId": 98484961, "startCol": 5, "startRow": 8, "endCol": 5, "endRow": 8, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "bleft": 0, "seq": 172, "gridId": "1307763125137" },
//          { "type": 11, "seq": 173, "is_undo": 1, "gridId": "1307763125137" },
//          { "type": 13, "seq": 174, "is_undo": 0, "gridId": "1307763125137" },
//          { "type": 14, "seq": 174 } ] } ] }]})
//({"commandResponses":[
//  {"type":4, "subCommands":[{"type":14, "seq":30}]},
//  {"type":0, "subCommands":[{"type":0},
//  {"type":4, "subCommands":[
//      {"startCol":5, "startRow":4, "endCol":5, "endRow":4, "_mask":0, "_style":0, "mask":0, "style":0, "type":5, "sheetId":"1", "seq":31, "gridId":"1307772637566"},
//      {"startCol":5, "startRow":4, "endCol":5, "endRow":4, "_mask":0, "_style":0, "mask":0, "style":0, "bbottom":1, "bcolorbottom":0, "type":5, "sheetId":"1", "seq":32, "gridId":"1307772637566"},
//      {"startCol":5, "startRow":4, "endCol":5, "endRow":4, "_mask":0, "_style":0, "mask":0, "style":0, "bleft":1, "bcolorleft":0, "type":5, "sheetId":"1", "seq":33, "gridId":"1307772637566"},
//      {"startCol":5, "startRow":4, "endCol":5, "endRow":4, "_mask":0, "_style":0, "mask":0, "style":0, "bright":1, "bcolorright":0, "type":5, "sheetId":"1", "seq":34, "gridId":"1307772637566"},
//      {"type":14, "seq":36}]},
//      {"type":14, "seq":36}]}]})
class RangeSetBorder extends ProcessCMD {

    public function RsData($curSeq) {
        $parr = $this->parr[parr];
        $rang = (string) $parr->range[0];
        $sheetid = (string) $parr->sheetId[0] + 0;

        $border[topType] = $parr->topType[0] + 0;
        $border[topColor] = $parr->topColor[0] + 0;
        $border[bottomType] = $parr->bottomType[0] + 0;
        $border[bottomColor] = $parr->bottomColor[0] + 0;
        $border[leftType] = $parr->leftType[0] + 0;
        $border[leftColor] = $parr->leftColor[0] + 0;
        $border[rightType] = $parr->rightType[0] + 0;
        $border[rightColor] = $parr->rightColor[0] + 0;
        $border[horiType] = $parr->horiType[0] + 0;
        $border[horiColor] = $parr->horiColor[0] + 0;
        $border[vertType] = $parr->vertType[0] + 0;
        $border[vertColor] = $parr->vertColor[0] + 0;

        $rs = $this->SetBorder($sheetid, $rang, $border);

        $sub[type] = 4;
        $i = $parr->cseq[0] + 1;
        if ($i <= $curSeq) {
            $i = $curSeq;
        }
        foreach ($rs as $row) {
            $row[type] = 5;
            $row[sheetId] = $sheetid;
            $row[seq] = $i;
            $row[gridId] = (string) $parr->gridSessionId[0];
            $sub[subCommands][] = $row;
            $i++;
        }
        $sub14[type] = 14;
        $sub14[seq] = $i + 1;
        $sub[subCommands][] = $sub14;

        $asub[type] = 0;
        $subcmd[type] = 0;
        $subcmd[subCommands][] = $asub;
        $subcmd[subCommands][] = $sub;

        return $subcmd;
    }

}

$pcmd = new RangeSetBorder($seq);
?>