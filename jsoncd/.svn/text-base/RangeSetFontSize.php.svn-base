<?php

//设定字体颜色   未考虑到 重复的问题  2011-04-21 Kevin
//<Request>
//<SheetDiff bookRevId="999" after="25" gridSessionId="1307372285392" cseq="26"/>
//<RangeSetFontSize bookRevId="999" sheetId="1" range="R4C3:R4C3" fontSize="14" gridSessionId="1307372285392" cseq="27"/>
//</Request>
//({"commandResponses":[{ "type": 4, "subCommands": [ { "type": 14, "seq": 56 } ] },{ "type": 0, "subCommands": [ { "type": 0 }, { "type": 4, "subCommands": [ { "type": 11, "seq": 57, "is_undo": 1, "gridId": "1303187699687" },{ "type": 13, "seq": 58, "is_undo": 0, "gridId": "1303187699687" },
//{ "type": 2, "sheetId": 93195744, "col": 0, "row": 2, "vtype": 40, "text": "12", "rit": 1, "nit": 1, "color": 0, "errors": [ ], "seq": 59, "gridId": "1303187699687" },
//{ "type": 14, "seq": 59 } ] } ] }]})
class RangeSetFontSize extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $cr = (string) $parr->range[0];
        $sheetid = $sheetid = (string) $parr->sheetId[0];
        $fsize=(string) $parr->fontSize[0];
        $this->SetFontSize($sheetid, $cr,$fsize);
        
        $sub[type] = 0;
        $subcmd[type] = 0;
        $subcmd[subCommands][] = $sub;

        $sub = null;
        $dsub[type] = 2;
        $dsub[sheetId] = $sheetid;

        $dsub[col] = $col;
        $dsub[row] = $row;
        $dsub[vtype] = 40;
        $dsub[text] = (string) $parr->s[0];
        $dsub[rit] = 1;
        $dsub[nit] = 1;
        $dsub[color] = 0;
        $dsub[errors] = array();
        $dsub[seq] = (string) $parr->cseq[0] + 0;
        $dsub[gridId] = (string) $parr->gridSessionId[0];

        $sub[type] = 4;
        $sub[subCommands] = $dsub;

        return $sub;
    }

}

$pcmd = new RangeSetFontSize();
?>