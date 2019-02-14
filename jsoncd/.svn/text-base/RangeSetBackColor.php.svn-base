<?php
//设定背景颜色   未能正确设定  2013-10-31 Elvin
//<?xml version="1.0"? >
//<Request>
//<SheetDiff bookRevId="16394125" after="3" gridSessionId="1303366124320" cseq="8"/>
//<RangeSetFontColor bookRevId="16394125" sheetId="1" range="R10C4:R10C4" fontColor="-1" gridSessionId="1303366124320" cseq="9"/>
//</Request>
//({"commandResponses":[{ "type": 4, "subCommands": [ { "type": 14, "seq": 56 } ] },{ "type": 0, "subCommands": [ { "type": 0 }, { "type": 4, "subCommands": [ { "type": 11, "seq": 57, "is_undo": 1, "gridId": "1303187699687" },{ "type": 13, "seq": 58, "is_undo": 0, "gridId": "1303187699687" },
//{ "type": 2, "sheetId": 93195744, "col": 0, "row": 2, "vtype": 40, "text": "12", "rit": 1, "nit": 1, "color": 0, "errors": [ ], "seq": 59, "gridId": "1303187699687" },
//{ "type": 14, "seq": 59 } ] } ] }]})
class RangeSetBackColor extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $cr = $this->RangeToCR((string) $parr->range[0]);

        $rs = $this->FileXml->Sheets[0]->Sheet[0]->Styles[0];

        for ($ri = $cr[startRow]; $ri <= $cr[endRow]; $ri++) {
            $row = $ri;
            for ($ci = $cr[startCol]; $ci <= $cr[endCol]; $ci++) {
                $col = $ci;

                $sa = 0;
                foreach ($rs as $StyleRegion) {
                    $tcol = $StyleRegion[Col] + 0;
                    $trow = $StyleRegion[Row] + 0;
                    if ($trow == $row and $tcol == $col) {
                        $StyleReg = $StyleRegion;
                        $sa = 1;
                    }
                }
                if ($sa == 0) {
                    $StyleReg = $rs->addChild('StyleRegion', '');
                    $StyleReg[Row] = $row;
                    $StyleReg[Col] = $col;
                    //$StyleReg[endCol] = $cr[endCol];
                    //$StyleReg[endRow] = $cr[endRow];
                }

                $fc = (string) $parr->backColor[0];
                if ($fc == '-1') {
                    $fc = '0:0:0';
                    unset($StyleReg->Style->Back[0]);
                } else {
                    $rgb[B] = dechex(intval($fc / 65536));
                    $rgb[G] = dechex(intval(($fc - $rgb[B] * 65536) / 256));
                    $rgb[R] = dechex(intval(($fc - $rgb[B] * 65536 - $rfb[G] * 256)));
//print_r($rgb);exit;
                    $StyleReg->Style->Back[0] = '' . $rgb[R] . ':' . $rgb[G] . ':' . $rgb[B] . '';
                }
            }
        }

       $this->rsarray = null;

        $sub = null;
        $dsub[type] = 2;
        $dsub[sheetId] = (string) $parr->sheetId[0];

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

        $this->rsarray[commandResponses][] = $sub;
        return $sub;
    }

}

$pcmd = new RangeSetBackColor();
?>