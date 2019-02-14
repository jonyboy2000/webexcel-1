<?php

//<Request>
//<SheetDiff bookRevId="17156060" after="74" gridSessionId="1307341149540" cseq="12"></SheetDiff>
//<MergeCells bookRevId="17156060" sheetId="98484960" range="R1C1:R1C2" gridSessionId="1307341149540" cseq="13"></MergeCells>
//</Request>
//({"commandResponses":[
//  { "type": 4, "subCommands": [ { "type": 14, "seq": 74 } ] },
//  { "type": 0, "subCommands": [
//      { "type": 0 },
//      { "type": 4, "subCommands": [
//          { "type": 6, "sheetId": 98484960, "startCol": 1, "startRow": 1, "endCol": 2, "endRow": 1, "gridId": "1307341149540", "clearType": 7, "seq": 75 },
//          { "type": 11, "seq": 76, "is_undo": 1, "gridId": "1307341149540" },
//          { "type": 13, "seq": 77, "is_undo": 0, "gridId": "1307341149540" },
//          { "type": 17, "sheetId": 98484960, "list": [ { "startCol": 1, "startRow": 1, "endCol": 2, "endRow": 1 } ], "gridId": "1307341149540" },
//          { "type": 14, "seq": 78 } ] } ] }]})
//({"commandResponses":[
//  {"type":4,"subCommands":[{"type":14,"seq":70}]},
//  {"type":0,"subCommands":[
//      {"type":0},
//      {"type":4,"subCommands":[
//          {"type":6,"sheetId":"1","startCol":1,"startRow":1,"endCol":2,"endRow":1,"clearType":7,"seq":71,"gridId":"1307343243605"},
//          {"type":17,"sheetId":"1","list":[{"startCol":1,"startRow":1,"endCol":2,"endRow":1}],"gridId":"1307343243605"},
//          {"type":14,"seq":72}]}]}]})

class MergeCells extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $sheetid = (string) $parr->sheetId[0];
        $value = (string) $parr->range[0];

        $val = $this->SetMergeCells($sheetid, $value);

        $vallist = $this->GetMergeCells($sheetid);

        $cr = $this->RangeToCR($value);
        $dsub6[type] = 6;
        $dsub6[sheetId] = $sheetid;
        $dsub6[startCol] =$cr[startCol] ;
        $dsub6[startRow] =$cr[startRow];
        $dsub6[endCol] = $cr[endCol];
        $dsub6[endRow] = $cr[endRow];
        $dsub6[clearType] = 7;
        $dsub6[seq] = (string) $parr->cseq[0] + 0;
        $dsub6[gridId] = (string) $parr->gridSessionId[0];

        $dsub17[type] = 17;
        $dsub17[sheetId] = $sheetid;
        $dsub17['list'] = $vallist;
        $dsub17[gridId] = (string) $parr->gridSessionId[0];

        $dsub14[type] = 14;
        $dsub14[seq] = (string) $parr->cseq[0] + 1;


        $ch[type] = 4;
        $ch[subCommands][] = $dsub6;
        if (!empty($vallist)) {  //没有合并单元格
            $ch[subCommands][] = $dsub17;
        }
        $ch[subCommands][] = $dsub14;

        $rs[type] = 0;

        $rsarr[type] = 0;
        $rsarr[subCommands][] = $rs;
        $rsarr[subCommands][] = $ch;

        return $rsarr;
    }

}

$pcmd = new MergeCells();
?>