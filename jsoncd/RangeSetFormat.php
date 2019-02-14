<?php

//<Request>
//<SheetDiff bookRevId="17156060" after="411" gridSessionId="1308317797462" cseq="8"></SheetDiff>
//<RangeSetFormat bookRevId="17156060" sheetId="99792357" range="R1C2:R1C2" format="@" gridSessionId="1308317797462" cseq="9"></RangeSetFormat>
//</Request>
//({"commandResponses":[
//{ "type": 4, "subCommands": [ { "type": 14, "seq": 411 } ] },
//{ "type": 0, "subCommands": [ { "type": 0 },
//  { "type": 4, "subCommands": [
//      { "type": 6, "sheetId": 99792357, "startCol": 2, "startRow": 1, "endCol": 2, "endRow": 1, "gridId": "1308317797462", "clearType": 2, "seq": 412 },
//      { "type": 5, "sheetId": 99792357, "startCol": 2, "startRow": 1, "endCol": 2, "endRow": 1, "_mask": 0, "_style": 0, "mask": 0, "style": 0, "fontSize": 14.000000, "format": "@", "seq": 413, "gridId": "1308317797462" },
//      { "type": 11, "seq": 414, "is_undo": 1, "gridId": "1308317797462" },{ "type": 13, "seq": 415, "is_undo": 0, "gridId": "1308317797462" },
//      { "type": 2, "sheetId": 99792357, "col": 2, "row": 1, "vtype": 60, "text": "121111111111111asdfadfsf", "rit": 1, "nit": 1, "color": 0, "errors": [ ], "seq": 416, "gridId": "1308317797462" },
//      { "type": 14, "seq": 416 } ] } ] }]})


class RangeSetFormat extends ProcessCMD {

    public function RsData($curSeq) {
        $parr = $this->parr[parr];
        $rang = (string) $parr->range[0];
        $sheetid = (string) $parr->sheetId[0] + 0;

        $format = (string) $parr->format[0];

        $rs = $this->SetFormat($sheetid, $rang, $format);

        $sub[type] = 4;
        $i = $parr->cseq[0] + 1;
        if ($i <= $curSeq) {
            $i = $curSeq;
        }
        foreach ($rs as $row) {
            $row[type] = 6;
            $row[sheetId] = $sheetid;
            $row[seq] = $i;
            $row[gridId] = (string) $parr->gridSessionId[0];
            $row[clearType] = 2;
            $sub[subCommands][] = $row;
            $i++;
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

$pcmd = new RangeSetFormat($seq);
?>