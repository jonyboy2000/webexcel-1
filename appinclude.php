<?php

// Session must be enabled to store the API session key
session_start();

include_once 'client/editgrid.php';

// Replace with your app key
$appKey = 'e12fdbfaa9066ad4bed27323';
$sess='pM9ZlDGatrgavnXQlZ2biUQz5mI';
// Create an RPC client
$client = new EditGrid($sess);

if ($authToken == $_SESSION['authToken']) {

    // Segment: Obtain Session Key

    // Forget auth token
    unset($_SESSION['authToken']);

    // Obtain session key
    $result = $client->call('auth.getSessionKey', array(appKey => $appKey, token => $authToken));
    if ($result->hasError()) trigger_error($result->getError()->toString(), E_USER_ERROR);

    // Put session key in session
    $_SESSION['sessionKey'] = $result->getValue();

    // Redirect to self
    EditGridUtil::redirect(EditGridUtil::getPageUrl());

} else if (!$client->getSessionKey()) {

    // Segment: Obtain Auth Token

    // Obtain auth token
    $result = $client->call('auth.createToken', array(
        appKey => $appKey,
        onSuccess => EditGridUtil::getPageUrl()
    ));
    if ($result->hasError()) trigger_error($result->getError()->toString(), E_USER_ERROR);

    // Put auth token in session
    $authToken = $_SESSION['authToken'] = $result->getValue();

    // Redirect to login gateway
    EditGridUtil::redirect($client->createLoginUrl($authToken));

}

?>
