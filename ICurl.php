<?php

interface ICurl {

	const GET_REQUEST   = 0;
	const POST_REQUEST  = 1;
	const PUT_REQUEST   = 2;
	const PATCH_REQUEST = 3;

	public function sendRequest($url);

	public function sendGetRequest($url);
	public function sendPostRequest($url, array $params = array());
	public function sendPutRequest();
	public function sendPatchRequest();

	public function introduce();
}

