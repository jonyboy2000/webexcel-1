<?php

//<Request>
//<SheetDiff bookRevId="999" after="18" gridSessionId="1308666940097" cseq="20"></SheetDiff>
//</Request>
class SheetDiff extends ProcessCMD {

    public function RsData($curSeq) {
        $parr = $this->parr[parr];
        $gId = (string) $parr->gridSessionId[0];
        $fname = $_SESSION['fpath'];
        $fhome = $_SESSION['fhome'];
        $f = '../' . $fhome . '/' . $fname;
        $bn = basename($f);
        $fp = dirname($f);

        $changname = $fp . '/.' . $bn . '.alive';

        if (is_file($file)) {
            $file = fopen($changname, 'r');
            while (!feof($file)) {
                $data = fgets($file);
                $content = split('=', $data);
                if ($seq <= $content[0]) {
                    $rs = $content[1];
                    $fa = strpos($rs, '"gridId":"', 0);
                    if ($fa) {
                        $xa = substr($rs, $fa + 10, 13);
                    }
                    echo str_replace($xa, $gId, $rs);
                    fclose($file);
                    exit;
                }
            }
            fclose($file);
        }
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

}

$pcmd = new SheetDiff();
?>