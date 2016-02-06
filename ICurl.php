<?php

interface ICurl {

	const GET_REQUEST   = 0;
	const POST_REQUEST  = 1;
	const PUT_REQUEST   = 2;
	const PATCH_REQUEST = 3;

	public function sendRequest();

	public function sendGetRequest();
	public function sendPostRequest();
	public function sendPutRequest();
	public function sendPatchRequest();

	public function introduce();
}

