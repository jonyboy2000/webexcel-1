<?php

//({"commandResponses":[{ "type": 4, "subCommands": [ { "type": 14, "seq": 56 } ] },{ "type": 16, "bookId": 16394125, "sheetId": 93195745, "fromCol": 0, "fromRow": 0, "toCol": 255, "toRow": 127, "subCommands": [ { "type": 5, "sheetId": 93195745, "startCol": 0, "startRow": 0, "endCol": 255, "endRow": 127, "_mask": 15359, "_style": 2048, "mask": 127, "style": 0, "fontName": "Arial", "fontSize": 10.000000, "fontColor": 0, "format": "General", "btop": 0, "bbottom": 0, "bleft": 0, "bright": 0, "def": 1 }, { "type": 17, "sheetId": 93195745, "list": [ ] } ] },{ "type": 16, "bookId": 16394125, "sheetId": 93195746, "fromCol": 0, "fromRow": 0, "toCol": 255, "toRow": 127, "subCommands": [ { "type": 5, "sheetId": 93195746, "startCol": 0, "startRow": 0, "endCol": 255, "endRow": 127, "_mask": 15359, "_style": 2048, "mask": 127, "style": 0, "fontName": "Arial", "fontSize": 10.000000, "fontColor": 0, "format": "General", "btop": 0, "bbottom": 0, "bleft": 0, "bright": 0, "def": 1 }, { "type": 17, "sheetId": 93195746, "list": [ ] } ] }]})
//exit;
//type=10001
//GetBookInfo 取得文件头消息
class SetMultiColSize extends ProcessCMD {

    public function RsData() {
        $parr = $this->parr[parr];
        $sheetid = (string) $parr->sheetId[0] - 1;
        $rowf = (string) $parr->f0[0] + 0;
        $rowt = (string) $parr->t0[0] + 0;
        $value = (string) $parr->s0[0] + 0;

        $this->SetColSize($sheetid,$rowf, $rowt, $value);
        $dsub = null;
        $dsub[type] = 3;
        $dsub[sheetId] = $sheetid+1;

        $dsub[f0] = $rowf;
        $dsub[t0] = $rowt;
        $dsub[isCol] = 0;   //0 row行高   1 col列高

        $dsub[size] = $value;

        $dsub[seq] = (string) $parr->cseq[0] + 0;
        $dsub[gridId] = (string) $parr->gridSessionId[0];

        $sub[type] = 4;
        $sub[subCommands][] = $dsub;

        $rsarr[type] = 0;   //此处为要套上一层,公式刷新，不能修改，否则公式不能显示为结果 Elvin 2011-06-03
        $rsarr[subCommands][] = $sub;
        return $rsarr;
        /* <Request>
          <SetMultiColSize bookRevId="999" sheetId="1" length="1" f0="1" t0="1" s0="99" gridSessionId="1307088776374" cseq="7"></SetMultiColSize>
          </Request>
          /*
          { "type": 0, "subCommands": [
          { "type": 4, "subCommands": [
          { "type": 3, "sheetId": 98484960, "isCol": 0, "start": 1, "end": 1, "size": 31, "seq": 44, "gridId": "1307060118304" },
         */
    }

}

$pcmd = new SetMultiColSize();
?>