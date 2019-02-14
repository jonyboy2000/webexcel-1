<?php

//({"commandResponses":[{ "type": 4, "subCommands": [ { "type": 14, "seq": 56 } ] },{ "type": 16, "bookId": 16394125, "sheetId": 93195745, "fromCol": 0, "fromRow": 0, "toCol": 255, "toRow": 127, "subCommands": [ { "type": 5, "sheetId": 93195745, "startCol": 0, "startRow": 0, "endCol": 255, "endRow": 127, "_mask": 15359, "_style": 2048, "mask": 127, "style": 0, "fontName": "Arial", "fontSize": 10.000000, "fontColor": 0, "format": "General", "btop": 0, "bbottom": 0, "bleft": 0, "bright": 0, "def": 1 }, { "type": 17, "sheetId": 93195745, "list": [ ] } ] },{ "type": 16, "bookId": 16394125, "sheetId": 93195746, "fromCol": 0, "fromRow": 0, "toCol": 255, "toRow": 127, "subCommands": [ { "type": 5, "sheetId": 93195746, "startCol": 0, "startRow": 0, "endCol": 255, "endRow": 127, "_mask": 15359, "_style": 2048, "mask": 127, "style": 0, "fontName": "Arial", "fontSize": 10.000000, "fontColor": 0, "format": "General", "btop": 0, "bbottom": 0, "bleft": 0, "bright": 0, "def": 1 }, { "type": 17, "sheetId": 93195746, "list": [ ] } ] }]})
//exit;
//type=10001
//<?xml version="1.0" ? >
//<Request>
//<SheetDiff bookRevId="999" after="13" gridSessionId="1307163703078" cseq="14"></SheetDiff>
//<SheetAdd bookRevId="999" sheetPos="2" name="Sheeq" gridSessionId="1307163703078" cseq="15"></SheetAdd>
//</Request>
//({"commandResponses":[{ "type": 4, "subCommands": [ { "type": 14, "seq": 68 } ] },
//{ "type": 0, "subCommands": [ { "type": 0, "sheetId": 98967027 },
//{ "type": 4, "subCommands": [
//   { "type": 9, "seq": 69, "gridId": "1307284466429", "sheetId": 98967027, "operation": 0, "sheets": [
//      { "id": 98484960, "name": "Sheet1", "gridLinesVisible": 1, "hidden": 0 },
//      { "id": 98484961, "name": "Sheet2", "gridLinesVisible": 1, "hidden": 0 },
//      { "id": 98484962, "name": "Sheet3", "gridLinesVisible": 1, "hidden": 0 },
//      { "id": 98964542, "name": "Sheetb", "gridLinesVisible": 1, "hidden": 0 },
//      { "id": 98967027, "name": "Sheetc", "gridLinesVisible": 1, "hidden": 0 } ] },
//      { "type": 14, "seq": 69 } ] } ] }]})
class SheetAdd extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $value = (string) $parr->name[0];
        $sheetPos = (string) $parr->sheetPos[0];

        $val = $this->SheetAdd($sheetPos, $value);

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

$pcmd = new SheetAdd();
?>