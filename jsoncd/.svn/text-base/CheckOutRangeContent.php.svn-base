<?php

//<Request>
//<SheetDiff bookRevId="999" after="8" gridSessionId="1307784160102" cseq="10"></SheetDiff>
//<CheckOutRangeContent bookRevId="999" sheetId="1" range="R128C0:R143C255" gridSessionId="1307784160102" cseq="11"></CheckOutRangeContent>
//</Request>

class CheckOutrangeContent extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $sheetid = (string) $parr->sheetId[0] - 1;
        $range = (string) $parr->range[0];
        //R128C0:R143C255

        $cells[] = array("type" => 5, "sheetId" => $sheetid + 1, "startCol" => 0, "startRow" => 0, "endCol" => 255, "endRow" => 127, "_mask" => 15359, "_style" => 2048, "mask" => 127, "style" => 0, "fontName" => "Arial", "fontSize" => 10.000000, "fontColor" => 0, "format" => "General", "btop" => 0, "bbottom" => 0, "bleft" => 0, "bright" => 0, "def" => 1);
        $CellStyles = $this->GetSheetCellStyle($sheetid);  //取得行列样式
        foreach ($CellStyles as $cell) {
            $cell[type] = 5;   // sheets  cols rows
            $cells[] = $cell;
        }

        $colrowval = $this->GetSheetCellVals($sheetid);   //取得行列数据
        foreach ($colrowval as $cell) {
            $cell[type] = 2;   // sheets  cols rows
            $cells[] = $cell;
        }
        
        $CellRowHight = $this->GetSheetRowsHight($sheetid);  //取得行高
        foreach ($CellRowHight as $cell) {
            $cell[type] = 3;   // sheets  cols rows
            $cells[] = $cell;
        }
        $CellColwHight = $this->GetSheetColsHight($sheetid);  //取得列高
        foreach ($CellColwHight as $cell) {
            $cell[type] = 3;   // sheets  cols rows
            $cells[] = $cell;
        }
        $vallist = $this->GetMergeCells($sheetid);
        if (!empty($vallist)) {  //没有合并单元格
            $dsub17[type] = 17;  //合并单元格
            $dsub17[sheetId] = $sheetid;
            $dsub17['list'] = $vallist;
            $dsub17[gridId] = (string) $parr->gridSessionId[0];
            $cells[] = $dsub17;
        }

        $rs16[type] = 16;
        $rs16[bookId] = $this->bookId;
        $rs16[sheetId] = $sheetid + 1;
        $rs16[fromCol] = 0;
        $rs16[fromRow] = 0;
        $rs16[toCol] = 255;
        $rs16[toRow] = 127;
        $rs16[subCommands] = $cells;

        $rs20[type] = 20;
        $rs20[subCommands][] = $rs16;
        return $rs20;
    }

}

$pcmd = new CheckOutrangeContent();
?>
