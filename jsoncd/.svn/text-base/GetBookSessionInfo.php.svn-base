<?php

//type=10002
//GetBookSessioninfo 取得Session消息 
//setBookSessionInfo
//{"type":10002, "values":{"macroEnabled":null, "remoteDataUpgraded":1, "isEnableChat":1, "userId":343182, "locale":{}, "isOrgAdminRealised":0, "isFormalReadable":1, "isOwner":1, "isLogin":1, "isPasswordLocked":0, "userName":"linzhai", "verticalAlign":0, "warnPasteOverwrite":1, "isReadOnly":0, "textOverflow":1}},
class GetBookSessioninfo extends ProcessCMD {

    public function RsData() {
        $rs[type] = 10002;
        $values[macroEnabled] = null;
        $values[remoteDataUpgraded] = 0;
        $values[isEnableChat] = 1;
        $values[userId] = -1;
        $values[locale] = array();
        $values[isOrgAdminRealised] = null;
        $values[isFormalReadable] = 1;
        $values[isOwner] = 0;
        $values[isLogin] = null;
        $values[isPasswordLocked] = 0;
        $values[userName] = 'anonymous';
        $values[verticalAlign] = 0;
        $values[warnPasteOverwrite] = 0;
        $values[isReadOnly] = 0;
        $values[textOverflow] = 1;

        $rs[values] = $values;
        return $rs;
    }

}

$pcmd = new GetBookSessioninfo();
//echo json_encode($rs);
?>
