<?php
//<Request>
//<SheetDiff bookRevId="999" after="10" gridSessionId="1307155468133" cseq="12"/>
//<SheetRename bookRevId="999" sheetId="1" name="工作表A" gridSessionId="1307155468133" cseq="13"/>
//</Request>
//({"commandResponses":[
//  { "type": 4, "subCommands": [ { "type": 14, "seq": 78 } ] },
//  { "type": 0, "subCommands": [
//      { "type": 0 },
//      { "type": 4, "subCommands": [
//          { "type": 9, "seq": 79, "gridId": "1307356533271", "sheetId": 98964542, "operation": 3, "sheets": [
//              { "id": 98484960, "name": "Sheet1", "gridLinesVisible": 1, "hidden": 0 },
//              { "id": 98484961, "name": "Sheet2", "gridLinesVisible": 1, "hidden": 0 },
//              { "id": 98484962, "name": "Sheet3", "gridLinesVisible": 1, "hidden": 0 },
//              { "id": 98964542, "name": "xxx", "gridLinesVisible": 1, "hidden": 0 } ] },
//              { "type": 14, "seq": 80 } ] } ] }]})
class SheetRename extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $sheetid = (string) $parr->sheetId[0] - 1;
        $value = (string) $parr->name[0];

        $val = $this->SetSheetReName($sheetid,$value);

        $sheetsin = $this->GetSheetNameIndex();

        $sheetid=count($sheetsin[sheets]);  // new sheet ID

        $sheets[type] = 9;   //sheets name index
        $sheets[gridId] = (string) $parr->gridSessionId[0];
        $sheets[operation] = 0;

        $sheets[sheetId] = $sheetid;
        $sheets[seq] = (string) $parr->cseq[0];
        $sheets[sheets] = $sheetsin[sheets];

        $rsend[type] = 14;
        $rsend[seq] = (string) $parr->cseq[0];

        $rsasheet[type] = 4;
        $rsasheet[subCommands][] = $sheets;
        $rsasheet[subCommands][] = $rsend;

        $rsnsid[type] = 0;
        $rsnsid[sheetId] = $sheetid;

        $rsarr[type] = 0;
        $rsarr[subCommands][] = $rsnsid;
        $rsarr[subCommands][] = $rsasheet;

        return $rsarr;
    }

}

$pcmd = new SheetRename();
?>