<?php

//<Request>
//<SheetDiff bookRevId="999" after="1018" gridSessionId="1307362685660" cseq="1018"></SheetDiff>
//<UnmergeCells bookRevId="999" sheetId="1" range="R4C1:R5C4" gridSessionId="1307362685660" cseq="1019"></UnmergeCells>
//</Request>
//({"commandResponses":[
//  { "type": 4, "subCommands": [ { "type": 14, "seq": 91 } ] },
//  { "type": 0, "subCommands": [
//      { "type": 0 },
//      { "type": 4, "subCommands": [
//          { "type": 11, "seq": 92, "is_undo": 1, "gridId": "1307370860537" },
//          { "type": 13, "seq": 93, "is_undo": 0, "gridId": "1307370860537" },
//          { "type": 18, "sheetId": 98484960, "list": [
//              { "startCol": 1, "startRow": 1, "endCol": 2, "endRow": 1 } ], "gridId": "1307370860537" },
//      { "type": 14, "seq": 94 } ] } ] }]})
//({"commandResponses":[
//  {"type":4,"subCommands":[{"type":14,"seq":90}]},
//  {"type":0,"subCommands":[
//      {"type":0},
//      {"type":4,"subCommands":[
//          {"type":18,"sheetId":"1","list":
//              {"startCol":2,"startRow":4,"endCol":4,"endRow":4},"gridId":"1307371587501"},
//          {"type":14,"seq":92}]}]}]})

class UnmergeCells extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $sheetid = (string) $parr->sheetId[0];
        $value = (string) $parr->range[0];

        $val = $this->SetUnmergeCells($sheetid, $value);

        $cr = $this->RangeToCR($value);
        $dsub18[type] = 18;
        $dsub18[sheetId] = $sheetid;
        $dsub18['list'][] = array("startCol" => $cr[startCol], "startRow" => $cr[startRow], "endCol" => $cr[endCol], "endRow" => $cr[endRow]);
        $dsub18[gridId] = (string) $parr->gridSessionId[0];

        $dsub14[type] = 14;
        $dsub14[seq] = (string) $parr->cseq[0] + 1;


        $ch[type] = 4;
        $ch[subCommands][] = $dsub18;
        $ch[subCommands][] = $dsub14;

        $rs[type] = 0;

        $rsarr[type] = 0;
        $rsarr[subCommands][] = $rs;
        $rsarr[subCommands][] = $ch;

        return $rsarr;
    }

}

$pcmd = new UnmergeCells();
?>