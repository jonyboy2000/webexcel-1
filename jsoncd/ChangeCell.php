<?php

class ChangeCell extends ProcessCMD {

    public function RsData($curSeq) {
        $parr = $this->parr[parr];
        $sheetid = (string) $parr->sheetId[0] - 1;
        $cr = $this->CRstrToCR((string) $parr->pos[0]);

        $i = $parr->cseq[0] + 0;
        //if ($i <= $curSeq) {
        //$i = $curSeq;
        //}

        $col = $cr[col] + 0;
        $row = $cr[row] + 0;
        $value = (string) $parr->s[0];
		//echo $value;exit;
        $val = $this->SetCellValue($sheetid, $row, $col, $value);

        $dsub = null;
        $dsub[type] = 2;
        $dsub[sheetId] = $sheetid + 1;

        $dsub[col] = $col;
        $dsub[row] = $row;
        $dsub[vtype] = 40;  //默认 数字格式

        $dsub[text] = $val[t];
        $dsub[rtext] = $val[t];
        $dsub[ntext] = $val[t];
        if ($val[c] == '=') {
            $dsub[rtext] = "$val[r]";
            $dsub[ntext] = "$val[n]";
        }
        $dsub[color] = 0;
        $dsub[errors] = array();
        $dsub[seq] = $i;
        $dsub[gridId] = (string) $parr->gridSessionId[0];

        $sub[type] = 4;
        /*  更新 单元格 要注意 seq 不一样才会更新
        $dsuba = $dsub;
        $dsuba[col] = $col+2;
        $dsuba[row] = $row+2;
        $dsuba[vtype] = 40;  //默认 数字格式
        $dsuba[text] = $val[t];
        $dsuba[rtext] = $val[t];
        $dsuba[ntext] = $val[t];
        $dsuba[seq] = $i+1;
        $sub[subCommands][] = $dsuba;
         */
        $sub[subCommands][] = $dsub;

        $rsarr[type] = 4;   //此处为要套上一层,公式刷新，不能修改，否则公式不能显示为结果 Elvin 2011-06-03
        $rsarr[subCommands][] = $sub;
        return $rsarr;
    }

}

$pcmd = new ChangeCell();
?>