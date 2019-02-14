<?php

class EditGrid
{
	const defaultServerUrl = 'http://www.editgrid.com/';
	const endpointPath = 'api/v1/rpc';

	private $sessionKey;
	private $serverUrl;

	/**
	 * Constructs the client.
	 *
	 * The following options are available:
	 *
	 * <ul>
	 *   <li><code>SERVER_URL</code> - Override the default server url./li>
	 * </ul>
	 *
	 * @param string $sessionKey	A session key, or NULL if there is not.
	 * @param array $options		An associative array of options.
	 */
	public function __construct($sessionKey=NULL, $options=array()) {

		$this->sessionKey	= $sessionKey;
		$this->serverUrl	= isset($options['SERVER_URL']) ? $options['SERVER_URL'] : self::defaultServerUrl;

	}

	/**
	 * Gets the server url this client is connecting to.
	 * @return string	The server url.
	 */
	public function getServerUrl() {

		return $this->serverUrl;

	}

	private function getEndpointUrl() {

		return $this->serverUrl . self::endpointPath;

	}

	/**
	 * Sets the session key this client is using.
	 * @param string $sessionKey	The session key.
	 */
	public function setSessionKey($sessionKey) {

		$this->sessionKey = $sessionKey;

	}

	/**
	 * Gets the session key this client is using.
	 * @return string	The session key.
	 */
	public function getSessionKey() {

		return $this->sessionKey;

	}

	/**
	 * Calls an API method.
	 *
	 * Makes an API method call, passing in the parameters and a request body when updating or querying.
	 *
	 * The request body can be an XML string exactly as specified in the API documentation, or an object representation
	 * being built using the EditGridEntity class.
	 *
	 * Below are some examples in using the EditGridEntity class:
	 *
	 * // provide a workbook entity to update an existing workbook
	 *
	 * $result = $client->call(
	 *   "workbook.update",
	 *   array(workbook => "/user/david/wb1"),
	 *   new EditGridEntity("workbook", array(name => "wb2", isTemplate => 1))
	 * );
	 *
	 * // provide an array of cell entities to set a list of cells
	 *
	 * $result = $client->call(
	 *   "cell.set",
	 *   array(workbook => "/user/david/wb1", range => "Sheet1!A1:A2"),
	 *   array(new EditGridEntity("cell", array(input => "Row One")), new EditGridEntity("cell", array(input => "Row Two")))
	 * )
	 *
	 * @param string $method		The method name to call.
	 * @param array $params			An associative array of the parameters of the call.
	 * @param mixed $body			The body to post, if any.
	 * @return EditGridCallResult	The result of the method call.
	 */
	public function call($method, $params=array(), $body=NULL) {

		$result = $this->postRequest($method, $params, $body);
		$data = unserialize($result['content']);

		if ($result['status'] == 200) {

			return new EditGridCallResult($data);

		} else if ($result['status'] == 403) {

			return new EditGridCallResult(null, $data['error']);

		} else {

			trigger_error(sprintf("Remote server error: HTTP status code %d in response", $result['status']), E_USER_ERROR);

		}

	}

	private function postRequest($method, $params, $body) {

		$params['m'] = $method;
		$params['s'] = $this->sessionKey;
		$params['f'] = 'php';

		$nl = "\n";
		$indent = "  ";

		if (is_array($body)) {

			$xml = "<list>" . $nl;
			foreach ($body as $entry) $xml .= $entry->toXml($nl, $indent, 1);
			$xml .= "</list>" . $nl;
			$body = $xml;

		} else if (is_object($body)) {

			$body = $body->toXml($nl, $indent, 0);

		}

		$query = http_build_query($params);
		$url = $this->getEndpointUrl() . '?' . $query;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'EditGrid RPC Client (PHP)');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body ? $body : '');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:', 'Content-Type: text/xml'));

		$content = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if ($content) {

			curl_close($ch);

		} else {

			$error = curl_error($ch);

			curl_close($ch);

			trigger_error(sprintf("Error connecting to %s: %s", $this->getEndPointUrl(), $error), E_USER_ERROR);

		}

		return array('content' => $content, 'status' => $status);

	}

	/**
	 * Constructs a url for accessing the login gateway.
	 * @param string $authToken		The auth token.
	 * @return string				The url.
	 */
	public function createLoginUrl($authToken) {
		return $this->serverUrl . "logingw?token=$authToken";
	}

}

class EditGridUtil
{

	/**
	 * Gets the url of the current php page.
	 * @param boolean $incQuery	Include query string or not.
	 * @return string	The url.
	 */
	public static function getPageUrl($incQuery=false) {
		$url = 'http';
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') $url .= 's';
		$url .= '://' . $_SERVER['SERVER_NAME'];
		if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') $url .= ':' . $_SERVER['SERVER_PORT'];
		$url .= $_SERVER['PHP_SELF'];
		if ($incQuery) $url .= '?' . $_SERVER['QUERY_STRING'];
		return $url;
	}

	/**
	 * Redirect the browser to a different url by sending a location header.
	 * @param string $url	The url to redirect to.
	 */
	public static function redirect($url) {
		header("Location: " . $url);
	}

}

class EditGridEntity
{

	private $type;
	private $fields;

	public function __construct($type, $fields=array()) {

		$this->type	= $type;
		$this->fields = $fields;

	}

	public function getType() {

		return $this->type;

	}

	public function __get($name)
	{

		if (isset($this->fields[$name])) {
			return $this->fields[$name];
		}

	}

	public function __set($name, $val)
	{

		$this->fields[$name] = $val;

	}

	public function getFields()
	{

		return $this->fields;

	}

	public function toXml($nl="", $indent="", $depth=0)
	{

		$indent1 = str_repeat($indent, $depth);
		$indent2 = str_repeat($indent, $depth + 1);

		$xml = $indent1 . "<" . $this->type . ">" . $nl;
		foreach ($this->fields as $name => $value) $xml .= $indent2 . "<$name>$value</$name>" . $nl;
		$xml .= $indent1 . "</" . $this->type . ">" . $nl;
		return $xml;

	}

}

class EditGridCallResult
{

	private $value;
	private $error;

	public function __construct($data, $error=null) {

		if ($error) {

			$this->error = new EditGridCallError($error);

		} else {

			$this->error = null;

			if (isset($data['list']) && is_array($data['list'])) {

				$type = key($data['list']);
				$this->value = array();
				foreach ($data['list'][$type] as $fields) array_push($this->value, new EditGridEntity($type, $fields));

			} elseif (isset($data['value'])) {

				$this->value = $data['value'];

			} else {

				$type = key($data);
				$this->value = new EditGridEntity($type, $data[$type]);

			}

		}

	}

	/**
	 * Returns true if there is error.
	 * @return bool		true if there is error.
	 */
	public function hasError() {

		return $this->error != null;

	}

	/**
	 * Gets the error of the method call.
	 * @return object	The error.
	 */
	public function getError() {

		return $this->error;

	}

	/**
	 * Gets the value returned by the method call.
	 *
	 * The return value from method call will be returned as is if it's a scalar, or wrapped as a EditGridEntity
	 * if it's an entity, or wrapped as an array of EditGridEntity if it's a list of entities.
	 *
	 * @return mixed	The value returned by the method call.
	 */
	public function getValue() {

		return $this->value;

	}

}

class EditGridCallError
{

	private $code;
	private $message;
	private $detail;

	public function __construct($errorData) {

		$this->code = $errorData['code'];
		$this->message = $errorData['message'];
		$this->detail = $errorData['detail'];

	}

	public function getCode() {

		return $this->code;

	}

	public function getMessage() {

		return $this->message;

	}

	public function getDetail() {

		return $this->detail;

	}

	public function toString() {

		return $this->detail ? ($this->message . ': ' . $this->detail) : $this->message;

	}

	public function __toString() {

		return $this->toString();
	}

}

?>
