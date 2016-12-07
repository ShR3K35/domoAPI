<?php

use Symfony\Component\HttpFoundation\Request;
use SilexApi\User;
use SilexApi\State;

//Get state by id
$app->get('/api/state/{id}', function ($id, Request $request) use ($app) {
	$state = $app['dao.state']->find($id);
	if (!isset($state)) {
		$app->abort(404, 'State not exist');
	}

	$responseData = array(
		'id' => $state->getId(),
		'name' => $state->getName(),
		'type' => $state->getType(),
		'state' => $state->getState(),
		'req'	=> $state->getReq()
	);

	return $app->json($responseData);
})->bind('api_state');

// Create State
$app->post('/api/state/create', function (Request $request) use ($app) {
	if (!$request->request->has('state')) {
		return $app->json('Missing parameter: state', 400);
	}
	if (!$request->request->has('name')) {
		return $app->json('Missing parameter: name', 400);
	}
	if (!$request->request->has('type')) {
		return $app->json('Missing parameter: type', 400);
	}
	if (!$request->request->has('req')) {
		return $app->json('Missing parameter: req', 400);
	}

	$state = new State();
	$state->setName($request->request->get('name'));
	$state->setState($request->request->get('state'));
	$state->setReq($request->request->get('req'));
	$state->setType($request->request->get('type'));
	$app['dao.state']->save($state);

	$responseData = array(
		'id' => $state->getId(),
		'name' => $state->getName(),
		'state' => $state->getState(),
		'req' => $state->getReq(),
		'type' => $state->getType()

	);

	return $app->json($responseData, 201);
})->bind('api_state_add');

