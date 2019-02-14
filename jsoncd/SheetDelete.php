<?php
//<Request>
//<SheetDiff bookRevId="17156060" after="72" gridSessionId="1307284466429" cseq="47"></SheetDiff>
//<SheetDelete bookRevId="17156060" sheetId="98967027" gridSessionId="1307284466429" cseq="48"></SheetDelete>
//</Request>
//({"commandResponses":[{ "type": 4, "subCommands": [ { "type": 14, "seq": 72 } ] },
//{ "type": 0, "subCommands": [
//  { "type": 0 },
//  { "type": 4, "subCommands": [
//      { "type": 9, "seq": 73, "gridId": "1307284466429", "sheetId": 98967027, "operation": 1, "sheets": [
//          { "id": 98484960, "name": "Sheet1", "gridLinesVisible": 1, "hidden": 0 },
//          { "id": 98484961, "name": "Sheet2", "gridLinesVisible": 1, "hidden": 0 },
//          { "id": 98484962, "name": "Sheet3", "gridLinesVisible": 1, "hidden": 0 },
//          { "id": 98964542, "name": "Sheetb", "gridLinesVisible": 1, "hidden": 0 } ] },
//      { "type": 2, "sheetId": 98484960, "col": 3, "row": 5, "errors": [ ], "seq": 74, "gridId": "1307284466429" },
//      { "type": 14, "seq": 74 } ] } ] }]})
class SheetDelete extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $sheetId = (string) $parr->sheetId[0];

        $val = $this->SheetDelete($sheetId);

        $sheetsin = $this->GetSheetNameIndex();

        $sheetid=count($sheetsin[sheets]);  // new sheet ID

        $sheets[type] = 9;   //sheets name index
        $sheets[gridId] = (string) $parr->gridSessionId[0];
        $sheets[operation] = 0;

        $sheets[sheetId] = $sheetid;
        $sheets[seq] = (string) $parr->cseq[0];
        $sheets[sheets] = $sheetsin[sheets];
        $sheetstotal = 0;  //sheets 合计
        foreach ($sheetsin[info] as $sinfo) {
            $sinfo[type] = 3;   // sheets  cols rows
            $sinfolist[] = $sinfo;
            $sheetstotal++;
        }

        $rsend[type] = 14;
        $rsend[seq] = (string) $parr->cseq[0]+1;
        //{ "type": 2, "sheetId": 98484960, "col": 3, "row": 5, "errors": [ ], "seq": 74, "gridId": "1307284466429" },
        $rcur[type] = 2;
        $rcur[sheetId] = 1;
        $rcur[col] = 1;
        $rcur[row] = 1;
        $rcur[gridId] = (string) $parr->gridSessionId[0];
        $rcur[errors] = array();
        $rcur[seq] = (string) $parr->cseq[0]+1;
        
        $rsasheet[type] = 4;
        $rsasheet[subCommands][] = $sheets;
        $rsasheet[subCommands][] = $rcur;
        $rsasheet[subCommands][] = $rsend;

        $rsnsid[type] = 0;
        $rsnsid[sheetId] = $sheetid;

        $rsarr[type] = 0;
        $rsarr[subCommands][] = $rsnsid;
        $rsarr[subCommands][] = $rsasheet;

        return $rsarr;
    }

}

$pcmd = new SheetDelete();
?>