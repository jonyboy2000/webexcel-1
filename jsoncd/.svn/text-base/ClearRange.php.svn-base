<?php

//<Request>
//<SheetDiff bookRevId="17156060" after="114" gridSessionId="1307373881034" cseq="10"></SheetDiff>
//<ClearRange bookRevId="17156060" sheetId="98484961" range="R2C1:R2C1" clearType="7" gridSessionId="1307373881034" cseq="11"></ClearRange>
//</Request>   clearType="7"清除全部 clearType="1"清除内容
class ClearRange extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $sheetid = (string) $parr->sheetId[0];
        $rang = (string) $parr->range[0];
        $clearType = $parr->clearType[0] + 0;

        $this->ClearRange($sheetid, $rang, $clearType);
        /*
          $cr = $this->RangeToCR((string) $parr->range[0]);
          $rs = $this->FileXml->Sheets[0]->Sheet[$sheetid]->Cells[0];
          for ($ri = $cr[startRow]; $ri <= $cr[endRow]; $ri++) {
          $row = $ri;
          for ($ci = $cr[startCol]; $ci <= $cr[endCol]; $ci++) {
          $col = $ci;
          foreach ($rs as $cell) {
          $tcol = $cell[Col] + 0;
          $trow = $cell[Row] + 0;
          if ($trow == $row and $tcol == $col) {
          unset($rs->Cell[0]);   break;
          }
          }
          }
          }
          $this->IsSave = true;
         */
        $sub = null;
        $dsub[type] = 6;
        $dsub[sheetId] = $sheetid;
        $cr = $this->RangeToCR($rang);
        $dsub[startCol] = $cr[startCol];
        $dsub[startRow] = $cr[startRow];
        $dsub[endCol] = $cr[endCol];
        $dsub[endRow] = $cr[endRow];
        $dsub[clearType] = $clearType;
        $dsub[seq] = (string) $parr->cseq[0] + 0;
        $dsub[gridId] = (string) $parr->gridSessionId[0];

        $sub[type] = 4;
        $sub[subCommands][] = $dsub;

        return $sub;
    }

}

$pcmd = new ClearRange();
?>