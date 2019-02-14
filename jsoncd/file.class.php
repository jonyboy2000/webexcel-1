<?php

class ProcessCMD {

    public $bookName;
    protected $FileName;
    public $bookId = 000;
    protected $sheetId = 1;
    public $workspaceId;
    public $workspaceName;
    public $path;
    protected $FileXml;
    public $IsSave = false;
    public $bookRevId = 111110;
    protected $rsarray;
    protected $parr;
    protected $Seq;

    public function loadxml($xmlstr) {
        $this->FileXml = $xmlstr;
    }

    public function SaveXml() {
        return $this->FileXml->asXML();
    }

    public function LoadParr($parr) {
        $this->parr = $parr;
    }

    public function CRstrToCR($crstr) {  //pos=r2c3 to 数组
//R2C0
        $rsc = strpos($crstr, 'C');
        $cr[col] = substr($crstr, $rsc + 1) + 0;
        $cr[row] = substr($crstr, 1, ($rsc - 1)) + 0;
        return $cr;
    }

    public function RangeToCR($crstr) {  //rang='r2c2:r4c4' to 数组
//R10C4:R10C4
        $sstr = explode(':', $crstr);
        $scr = $this->CRstrToCR($sstr[0]);
        $ecr = $this->CRstrToCR($sstr[1]);
        $cr[startCol] = $scr[col] + 0;
        $cr[startRow] = $scr[row] + 0;
        $cr[endCol] = $ecr[col] + 0;
        $cr[endRow] = $ecr[row] + 0;
        return $cr;
    }

    public function RsData() {
        $parr = $this->parr[parr];
        $rsarray = null;
        $rs[type] = 14;
        $this->Seq = (string) $parr->after[0] + 0;
        $rs[seq] = (string) $parr->cseq[0] + 0;
        if ($rs[seq] < $this->Seq) {
            $rs[seq] = $this->Seq;
        } else {
            $this->Seq = $rs[seq];
        }
        $rsarray[type] = 4;
        $rsarray[subCommands][] = $rs;

        return $rsarray;
    }

    public function GetSeq() {
        return $this->Seq + 1;
    }

    public function SetCellValue($sheetid, $row, $col, $value) {
        $RsVale = array();
        $lv = substr($value, 0, 1);
        $RsVale[c] = $lv;
        $RsVale[t] = $value;
        if ($lv === '=') {
            if (stripos($value, 'SUM')) {
                $rs = $this->DofunctionSum($sheetid, $value);
                $value = $rs[sum];
                $xval = $rs[val];
            } else {
                $x = preg_replace('/([A-Za-z]+)([0-9]+)/', "$" . "this->GetCell($sheetid,$2-1,'$1')", $value);
                $x = '$xval' . $x . ';';
                eval($x);
            }
        }

        $RsVale[r] = $xval + 0;
        $RsVale[n] = $xval + 0;

        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Cells[0];
        $sa = 0;
        foreach ($rs as $cell) {  //修改
            $tcol = $cell[Col] + 0;
            $trow = $cell[Row] + 0;
            if ($trow == $row and $tcol == $col) {
                $cell[0] = $value;
                $cell[rtext] = '';
                if ($lv === '=') {
                    $cell[rtext] = $xval;
                    $cell[ntext] = $xval;
                }
                $sa = 1;  // 修改完成
            }
        }
        if ($sa == 0) { //新增
            $cell = $rs->addChild('Cell', '');
            $cell[Row] = $row;
            $cell[Col] = $col;
            $cell[0] = $value;
            $cell[rtext] = '';
            if ($lv === '=') {
                $cell[rtext] = $xval;
                $cell[ntext] = $xval;
            }
            $cell[ValueType] = '40';
        }
        $this->IsSave = true;
        return $RsVale;
    }

    protected function StrToNum($str) {   // AA 1 转换为  Row= 26(AA)  Col=0(1)
        $str = strtoupper($str);  //转成大写
        $res = 0;
        $len = strlen($str) - 1;
        for ($i = 0; $i <= $len; $i++) {
            $res = $res + (ord($str[$len - $i]) - 65) + ($len - $i) * 26;
        }
        return $res;  //row 坐标
    }

    public function GetCell($sheetid, $row, $colstr) {
        $col = $this->StrToNum($colstr);
        return $this->GetCellValue($sheetid, $row, $col);
    }

    public function DofunctionSum($sheetid, $fn) {
        $valu = 0;
        $lv = substr($fn, 0, 4);
        if ($lv <> '=SUM') {
            return $fn;
        }
        $str = substr($fn, 5, -1);
        $str = explode(':', $str);
        $len = count($str);
        $scell = $str[$len - 2];
        $ecell = $str[$len - 1];
        $cr[startRow] = preg_replace('/([A-Za-z]+)([0-9]+)/', "$2", $scell) - 1;
        $cr[startCol] = $this->StrToNum(preg_replace('/([A-Za-z]+)([0-9]+)/', "$1", $scell)) + 0;
        $cr[endRow] = preg_replace('/([A-Za-z]+)([0-9]+)/', "$2", $ecell) - 1;
        $cr[endCol] = $this->StrToNum(preg_replace('/([A-Za-z]+)([0-9]+)/', "$1", $ecell)) + 0;
        for ($ri = $cr[startRow]; $ri <= $cr[endRow]; $ri++) {
            for ($ci = $cr[startCol]; $ci <= $cr[endCol]; $ci++) {
                $valu = $valu + $this->GetCellValue($sheetid, $ri, $ci) + 0;
            }
        }
        $rs[sum] = '=SUM(' . $scell . ':' . $ecell . ')';
        $rs[val] = $valu;
        //print_r($rs);exit;
        return $rs;
    }

    public function GetCellValue($sheetid, $row, $col) {
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Cells[0];
        foreach ($rs as $cell) {  //修改
            $tcol = $cell[Col] + 0;
            $trow = $cell[Row] + 0;
            if ($trow == $row and $tcol == $col) {
                $value = (string) $cell[0] + 0;
                $lv = substr($value, 0, 1);
                if ($lv === '=') {
                    $value = (string) $row[rtext] + 0;
                }
            }
        }
        //echo $row . ':' . $col . '=' . $value . '<br/>';
        return $value + 0;
    }

    public function SetRowSize($sheetid, $row, $count, $value) {
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Rows[0];
        $defSize = $rs[DefaultSizePts];
        for ($i = 0; $i <= $count - $row + 1; $i++) {
            $sa = 0;
            $cllist = 0;
            foreach ($rs as $cell) {  //修改
                $trow = $cell[No] + 0;
                if ($trow == $row) {
                    if ($value == $defSize) {
                        unset($cell[0]);
                        $sa = 1;
                        break;
                    }
                    $cell[Unit] = $value;
                    $sa = 1;
                }
                $cllist++;
            }
            if ($sa == 0) { //新增
                $cell = $rs->addChild('RowInfo', '');
                $cell[No] = $row;
                $cell[Unit] = $value;
            }
            $row = $row + 1;
        }
        $this->IsSave = true;
    }

    public function SetColSize($sheetid, $row, $count, $value) {
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Cols[0];
        $defSize = $rs[DefaultSizePts];
        for ($i = 0; $i <= $count - $row + 1; $i++) {
            $sa = 0;
            $cllist = 0;
            foreach ($rs as $cell) {  //修改
                $trow = $cell[No] + 0;
                if ($trow == $row) {
                    if ($value == $defSize) {
                        unset($cell[0]);
                        $sa = 1;
                        break;
                    }
                    $cell[Unit] = $value;
                    $sa = 1;
                }
                $cllist++;
            }
            if ($sa == 0) { //新增
                $cell = $rs->addChild('ColInfo', '');
                $cell[No] = $row;
                $cell[Unit] = $value;
            }
            $row = $row + 1;
        }
        $this->IsSave = true;
    }

    public function GetSheetNameIndex() {
        $rs = $this->FileXml->SheetNameIndex[0]; //->SheetName;
        $i = 1;
        $sheets = array();
        foreach ($rs as $row) {
            $sheet[id] = $i;
            $sheet[name] = (string) $row;
            $sheet[gridLinesVisible] = 1;
            $sheet[hidden] = 0;
            $sheet[extentCol] = 0;
            $sheet[extentRow] = 0;
            $sheet[numCell] = 0;
            $sheet[numStyle] = 11;
            $sheets[sheets][] = $sheet;


            $shfo[sheetId] = $i;
            $shfo[isCol] = 1;
            $shfo[start] = 0;
            $shfo[end] = $row[Cols] + 0;
            $shfo[size] = 85;
            $sheets[info][] = $shfo;

            $shfo[sheetId] = $i;
            $shfo[isCol] = 0;
            $shfo[start] = 0;
            $shfo[end] = $row[Rows] + 0;
            $shfo[size] = 17;
            $sheets[info][] = $shfo;
            $i++;
        }
        return $sheets;
    }

    public function GetSheetCellVals($sheetid) {  //取得行列数据
        $colrowval = array(); //行列数据
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Cells[0];
        $sheetid = $sheetid + 1;
        $i = 0;
        foreach ($rs as $row) {
            $i++;
            if ($i >= 255) {
                break;
            };
            $ln = '';
//$ln[type] = 2;
            $ln[sheetId] = $sheetid;
            $ln[col] = $row[Col] + 0;
            $ln[row] = $row[Row] + 0;
            $ln[vtype] = $row[ValueType] + 0;
            $ln[text] = (string) $row[0];
            $lv = substr($ln[text], 0, 1);
            if ($lv === '=') {
                $ln[rtext] = (string) $row[rtext];
                $ln[ntext] = (string) $row[ntext];
            } else {
                $ln[rtext] = (string) $row[0];
                $ln[ntext] = (string) $row[0];
            }
            $ln[color] = 0;
            $ln[errors] = array();
            $colrowval[] = $ln;
        }
        return $colrowval;
    }

    public function GetSheetCellStyle($sheetid) {
        $cellSty = array();
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Styles[0];
        if (empty($rs)) {
            return $cellSty;
        }
        $sheetid = $sheetid + 1;
        $i = 0;
        foreach ($rs as $row) {
            $i++;
            if ($i >= 255) {
                break;
            };
            $colorar = '';
            $colorar[sheetId] = $sheetid;
            $colorar[startCol] = (string) $row[Col] + 0;
            $colorar[startRow] = (string) $row[Row] + 0;
            $colorar[endCol] = (string) $row[Col] + 0;
            $colorar[endRow] = (string) $row[Row] + 0;
            $colorar[_mask] = 0;
            $colorar[_style] = (string) $row->Style[_style];
            if (empty($colorar[_style])) {
                $colorar[_style] = 0;
            }
            $colorar[mask] = (string) $row->Style[mask];
            if (empty($colorar[mask])) {
                $colorar[mask] = 0;
            }
            $colorar[style] = 0;

            $border = $row->Style->StyleBorder[0];

            $colorar[btop] = $border[topType] + 0;
            $colorar[bcolortop] = $border[topColor] + 0;
            $colorar[bbottom] = $border[bottomType] + 0;
            $colorar[bcolorbottom] = $border[bottomColor] + 0;
            $colorar[bleft] = $border[leftType] + 0;
            $colorar[bcolorleft] = $border[leftColor] + 0;
            $colorar[bright] = $border[rightType] + 0;
            $colorar[bcolorright] = $border[rightColor] + 0;

            $colorar[format] = (string) $row->Style[format];
            if (empty($colorar[format])) {
                $colorar[format] = 'General';
            }

            $fsize = (string) $row->Style[0]->Font[Unit] + 0;  //自定义字体
            if ($fsize > 0) {
                $colorar[fontSize] = $fsize;
            }

            $co = (string) $row->Style->Back[0];
            if ($co <> 'FFFF:FFFF:FFFF' and $co <> '') {
                $co = explode(':', $co);
                $colorar[backColor] = hexdec($co[2]) * 65536 + 256 * hexdec($co[1]) + hexdec($co[0]);
            }

            $co = (string) $row->Style->Fore[0];
            if ($co <> '' and !empty($co)) {
                $co = explode(':', $co);
                $colorar[fontColor] = hexdec($co[2]) * 65536 + 256 * hexdec($co[1]) + hexdec($co[0]); //65280;//(string)$row->Style[Fore];
            }
            $cellSty[] = $colorar;
        }
        return $cellSty;
    }

    public function GetSheetRowsHight($sheetid) {  //取得行高
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Rows[0];
        $sheetid = $sheetid + 1;
        $cells = array();
        foreach ($rs as $cell) {  //修改
            $colsize[sheetId] = $sheetid;
            $colsize[isCol] = 0;
            $colsize[start] = $cell[No] + 0;
            if ($colsize[start] > 255) {
                break;
            }
            $colsize[end] = $cell[No] + 0;
            $colsize[size] = $cell[Unit] + 0;
            $cells[] = $colsize;
        }
        return $cells;
    }

    public function GetSheetColsHight($sheetid) {  //取得列高
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Cols[0];
        $sheetid = $sheetid + 1;
        $cells = array();
        foreach ($rs as $cell) {  //修改
            $colsize[sheetId] = $sheetid;
            $colsize[isCol] = 1;
            $colsize[start] = $cell[No] + 0;
            if ($colsize[start] > 127) {
                break;
            }
            $colsize[end] = $cell[No] + 0;
            $colsize[size] = $cell[Unit] + 0;
            $cells[] = $colsize;
        }
        return $cells;
    }

    public function SetSheetReName($sheetid, $sheetna) {
        $rs = $this->FileXml->SheetNameIndex[0]->SheetName[$sheetid];
        $rs[0] = $sheetna;
        $this->IsSave = true;
    }

    public function SheetAdd($sheetid, $sheetna) {
        $rs = $this->FileXml->SheetNameIndex[0];
//增加列表
//<SheetName Cols="256" Rows="65536">工作表A</SheetName>
        $cell = $rs->addChild('SheetName', '');
        $cell[Cols] = 256;
        $cell[Rows] = 65536;
        $cell[0] = $sheetna;

//增加内容
//<SheetName Cols="256" Rows="65536">工作表A</SheetName>
//
//<Sheet DisplayFormulas="0" HideZero="0" HideGrid="0" HideColHeader="0" HideRowHeader="0" DisplayOutlines="1" OutlineSymbolsBelow="1" OutlineSymbolsRight="1" Visibility="GNM_SHEET_VISIBILITY_VISIBLE" GridColor="0:0:0">

        $rs = $this->FileXml->Sheets[0];
        $sheet = $rs->addChild('Sheet', '');
        $sheetName = $sheet->addChild('Name', '');
        $sheetName[0] = $sheetna;
        $sheetSty = $sheet->addChild('Styles', '');
        $sheetStyReg = $sheetSty->addChild('StyleRegion', '');
        $sheetStyReg[Col] = 1;
        $sheetStyReg[Row] = 1;

        $sheetCols = $sheet->addChild('Cols', '');
        $sheetCols[DefaultSizePts] = 85;
        $sheetRows = $sheet->addChild('Rows', '');
        $sheetRows[DefaultSizePts] = 17;
        $sheetSelections = $sheet->addChild('Selections', '');
        $sheetSelections[CursorCol] = 3;
        $sheetSelections[CursorRow] = 10;
        $sheetCells = $sheet->addChild('Cells', '');
        $cell = $sheetCells->addChild('Cell', '');
//<Cell Row="0" Col="0" ValueType="40"> </Cell>   //要增加一行内容
        $cell[Row] = 0;
        $cell[Col] = 0;
        $cell[ValueType] = 40;
        $this->IsSave = true;
    }

    public function SheetDelete($sheetid) {
        $sheetid = $sheetid - 1;
        $rsin = $this->FileXml->SheetNameIndex[0];
        $i = 0;
        foreach ($rsin as $shna) {
            if ($i == $sheetid) {
                unset($shna[0]);
                break;
            }
            $i++;
        }
//print_r($rsin);exit;
        $rs = $this->FileXml->Sheets[0];
        $i = 0;
        foreach ($rs as $sheet) {
            if ($i == $sheetid) {
                unset($sheet[0]);
                break;
            }
            $i++;
        }
        $this->IsSave = true;

        return true;
    }

    public function SetMergeCells($sheetid, $value) {
        $sheetid = $sheetid - 1;
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->MergedRegions[0];
        if (empty($rs)) {
            $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->addChild('MergedRegions', '');
        }
        $add = 0;
        foreach ($rs as $find) {
            $olva = (string) $find[0];
            if ($olva == $value) {
                $add = 1;
                break;
            }
        }
        if ($add == 0) {
            $Merge = $rs->addChild('Merge', '');

            $cr = $this->RangeToCR($value);
            $Merge[0] = $value;
            $Merge[startCol] = $cr[startCol];
            $Merge[startRow] = $cr[startRow];
            $Merge[endCol] = $cr[endCol];
            $Merge[endRow] = $cr[endRow];
        }
        $this->IsSave = true;

        return true;
    }

    public function SetUnmergeCells($sheetid, $value) {
        $sheetid = $sheetid - 1;
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->MergedRegions[0];
        foreach ($rs as $Merge) {
            $cmg = (string) $Merge[0];
            if ($cmg == $value) {
                unset($Merge[0]);
                break;
            }
        }
        $this->IsSave = true;

        return true;
    }

    public function GetMergeCells($sheetid) {
        $sheetid = $sheetid - 1;
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->MergedRegions[0];
        if (empty($rs)) {
            return '';
        }
        foreach ($rs as $Merge) {
            $cr[] = array('startCol' => $Merge[startCol] + 0, 'startRow' => $Merge[startRow] + 0, 'endCol' => $Merge[endCol] + 0, 'endRow' => $Merge[endRow] + 0);
        }

        return $cr;
    }

    public function ClearRange($sheetid, $rang, $clearType) {
        $sheetid = $sheetid - 1;
        $cr = $this->RangeToCR($rang);
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Cells[0];
        for ($ri = $cr[startRow]; $ri <= $cr[endRow]; $ri++) {
            $row = $ri;
            for ($ci = $cr[startCol]; $ci <= $cr[endCol]; $ci++) {
                $col = $ci;
                foreach ($rs as $cell) {
                    $tcol = $cell[Col] + 0;
                    $trow = $cell[Row] + 0;
                    if ($trow == $row and $tcol == $col) {
                        unset($cell[0]);
                        break;
                    }
                }
            }
        }
        if ($clearType > 1) {
            $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Styles[0];
            for ($ri = $cr[startRow]; $ri <= $cr[endRow]; $ri++) {
                $row = $ri;
                for ($ci = $cr[startCol]; $ci <= $cr[endCol]; $ci++) {
                    $col = $ci;
                    foreach ($rs as $cell) {
                        $tcol = $cell[Col] + 0;
                        $trow = $cell[Row] + 0;
                        if ($trow == $row and $tcol == $col) {
                            unset($cell[0]);
                            break;
                        }
                    }
                }
            }
        }
        $this->IsSave = true;
    }

    public function SetFontSize($sheetid, $rang, $size) {
        $sheetid = $sheetid - 1;
        $cr = $this->RangeToCR($rang);
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Styles[0];

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
                }
                $fc = $size;
                $StyleReg->Style->Font[Unit] = $fc;
            }
        }

        $this->IsSave = true;
    }

    public function SetFormat($sheetid, $rang, $format) {
        //(string) $row->Style[format];
        $sheetid = $sheetid - 1;
        $cr = $this->RangeToCR($rang);
        $rsarr = array();
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Styles[0];
        for ($ri = $cr[startRow]; $ri <= $cr[endRow]; $ri++) {
            $row = $ri;
            for ($ci = $cr[startCol]; $ci <= $cr[endCol]; $ci++) {
                $bri = $bri + 1;
                $col = $ci;
                $sa = 0;
                foreach ($rs as $StyleRegion) {
                    $tcol = $StyleRegion[Col] + 0;
                    $trow = $StyleRegion[Row] + 0;
                    if ($trow == $row and $tcol == $col) {
                        $StyleReg = $StyleRegion;
                        $sa = 1;
                        break;
                    }
                }
                if ($sa == 0) {
                    $StyleReg = $rs->addChild('StyleRegion', '');
                    $StyleReg[Row] = $row;
                    $StyleReg[Col] = $col;
                }
                $StyleReg->Style[format] = $format;

                $cel[startCol] = $col;
                $cel[startRow] = $row;
                $cel[endCol] = $col;
                $cel[endRow] = $row;
                $cel[_mask] = 0;
                $cel[_style] = 0;
                $cel[mask] = 0;
                $cel[style] = 0;
                $cel[format] = $format;

                $rsarr[] = $cel;
                if ($bri > 1000) {
                    break;
                }
            }
        }
        $this->IsSave = true;
        return $rsarr;
    }

    public function SetBorder($sheetid, $rang, $border) {
        $sheetid = $sheetid - 1;
        $cr = $this->RangeToCR($rang);
        $rsarr = array();
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Styles[0];
        $eric = 0;
        if (($border[topType] == 0) and ($border[topColor] == 0) and ($border[bottomType] == 0) and ($border[bottomColor] == 0) and ($border[leftType] == 0) and ($border[leftColor] == 0) and ($border[rightType] == 0) and ($border[rightColor] == 0) and ($border[horiType] == 0) and ($border[horiColor] == 0)) {
            $eric = 1;
        }
        $bri = 0;
        for ($ri = $cr[startRow]; $ri <= $cr[endRow]; $ri++) {
            $row = $ri;
            for ($ci = $cr[startCol]; $ci <= $cr[endCol]; $ci++) {
                $bri = $bri + 1;
                $col = $ci;
                $sa = 0;
                foreach ($rs as $StyleRegion) {
                    $tcol = $StyleRegion[Col] + 0;
                    $trow = $StyleRegion[Row] + 0;
                    if ($trow == $row and $tcol == $col) {
                        $StyleReg = $StyleRegion;
                        $sa = 1;
                        $font = $StyleReg->Style->Font[Unit] + 0;
                        if ($font > 0 and $eric == 1) {
                            unset($StyleReg->Style->StyleBorder[0]);
                        }
                        if ($font == 0 and $eric == 1) {
                            unset($StyleReg[0]);
                        }
                        break;
                    }
                }
                if ($sa == 0) {
                    $StyleReg = $rs->addChild('StyleRegion', '');
                    $StyleReg[Row] = $row;
                    $StyleReg[Col] = $col;
                }
                if ($eric == 0) {
                    $StyleReg->Style->StyleBorder[topType] = $border[topType];
                    $StyleReg->Style->StyleBorder[topColor] = $border[topColor];
                    $StyleReg->Style->StyleBorder[bottomType] = $border[bottomType];
                    $StyleReg->Style->StyleBorder[bottomColor] = $border[bottomColor];
                    $StyleReg->Style->StyleBorder[leftType] = $border[leftType];
                    $StyleReg->Style->StyleBorder[leftColor] = $border[leftColor];
                    $StyleReg->Style->StyleBorder[rightType] = $border[rightType];
                    $StyleReg->Style->StyleBorder[rightColor] = $border[rightColor];
                    $StyleReg->Style->StyleBorder[horiType] = $border[horiType];
                    $StyleReg->Style->StyleBorder[horiColor] = $border[horiColor];
                    $StyleReg->Style->StyleBorder[vertType] = $border[vertType];
                    $StyleReg->Style->StyleBorder[vertColor] = $border[vertColor];
                }
                $cel[startCol] = $col;
                $cel[startRow] = $row;
                $cel[endCol] = $col;
                $cel[endRow] = $row;
                $cel[_mask] = 0;
                $cel[_style] = 0;
                $cel[mask] = 0;
                $cel[style] = 0;

                $cel[btop] = $border[topType];
                $cel[bcolortop] = $border[topColor];

                $cel[bbottom] = $border[bottomType];
                $cel[bcolorbottom] = $border[bottomColor];

                //左边的线
                $cel[bleft] = $border[leftType];
                $cel[bcolorleft] = $border[leftColor];

                //右边的线
                $cel[bright] = $border[rightType];
                $cel[bcolorright] = $border[rightColor];

                $rsarr[] = $cel;
                if ($bri > 1000) {
                    break;
                }
            }
            if ($bri > 1000) {
                break;
            }
        }
        $this->IsSave = true;
        return $rsarr;
    }

    public function SetStyle($sheetid, $rang, $mask, $_style) {
        //(string) $row->Style[format];
        $sheetid = $sheetid - 1;
        $cr = $this->RangeToCR($rang);
        $rsarr = array();
        $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Styles[0];
        for ($ri = $cr[startRow]; $ri <= $cr[endRow]; $ri++) {
            $row = $ri;
            for ($ci = $cr[startCol]; $ci <= $cr[endCol]; $ci++) {
                $bri = $bri + 1;
                $col = $ci;
                $sa = 0;
                foreach ($rs as $StyleRegion) {
                    $tcol = $StyleRegion[Col] + 0;
                    $trow = $StyleRegion[Row] + 0;
                    if ($trow == $row and $tcol == $col) {
                        $StyleReg = $StyleRegion;
                        $sa = 1;
                        break;
                    }
                }
                if ($sa == 0) {
                    $StyleReg = $rs->addChild('StyleRegion', '');
                    $StyleReg[Row] = $row;
                    $StyleReg[Col] = $col;
                }
                $StyleReg->Style[mask] = $mask;
                $StyleReg->Style[_style] = $_style;
                $cel[startCol] = $col;
                $cel[startRow] = $row;
                $cel[endCol] = $col;
                $cel[endRow] = $row;
                $cel[_mask] = $mask;
                $cel[_style] = $_style;
                $cel[mask] = $mask;
                $cel[style] = $mask;

                $rsarr[] = $cel;
                if ($bri > 1000) {
                    break;
                }
            }
        }
        $this->IsSave = true;
        return $rsarr;
    }

}

?>
