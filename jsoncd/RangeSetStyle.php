<?php

//<Request>
//<SheetDiff bookRevId="17156060" after="438" gridSessionId="1308318518862" cseq="28"></SheetDiff>
//<RangeSetStyle bookRevId="17156060" sheetId="99792357" range="R1C2:R1C2" mask="32" value="2080" gridSessionId="1308318518862" cseq="29"></RangeSetStyle>
//</Request>
//({"commandResponses":[{ "type": 4, "subCommands": [ { "type": 14, "seq": 438 } ] },
//  { "type": 0, "subCommands": [ { "type": 0 }, { "type": 4, "subCommands": [
//      { "type": 5, "sheetId": 99792357, "startCol": 2, "startRow": 1, "endCol": 2, "endRow": 1, "_mask": 32, "_style": 32, "mask": 32, "style": 32, "seq": 439, "gridId": "1308318518862" },
//      { "type": 11, "seq": 440, "is_undo": 1, "gridId": "1308318518862" },
//      { "type": 13, "seq": 441, "is_undo": 0, "gridId": "1308318518862" },
//      { "type": 14, "seq": 441 } ] } ] }]})


class RangeSetStyle extends ProcessCMD {

    public function RsData($curSeq) {
        $parr = $this->parr[parr];
        $rang = (string) $parr->range[0];
        $sheetid = (string) $parr->sheetId[0] + 0;

        $mask = (string) $parr->mask[0];
        $value = (string) $parr->value[0];  // 2048 自动隐藏  2080不自动隐藏

        $rs = $this->SetStyle($sheetid, $rang, $mask,$value);

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

$pcmd = new RangeSetStyle($seq);
?>