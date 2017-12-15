<?php

/*
 * This file is part of the App Api Platform.
 *
 * (c) App
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controllers\Api\V1\User;

use App\Controllers\Controller;
use App\Enums\User\UserField;
use App\Managers\User\UserManager;
use App\Models\User\Json;
use App\Models\User\User;
use Valkyrja\Http\JsonResponse;
use Valkyrja\Http\Request;

/**
 * Class UserController.
 *
 * @Route(path = '/api/v1/user', name = 'api.v1.user')
 *
 * @Service(id = App\Controllers\Api\V1\User\UserController)
 * @ServiceAlias(id = App\Controllers\Api\V1\User\UserController, name = apiV1UserController)
 */
class UserController extends Controller
{
    /**
     * Get a user's data given their id.
     *
     * @param UserManager $userManager The user manager
     * @param int         $id          The id of the user to get
     *
     * @return JsonResponse
     *  The json response to display
     *
     * @Route(path = '/{id:num}', name = 'get', requestMethods = [[GET | HEAD]])
     */
    public function get(UserManager $userManager, int $id): JsonResponse
    {
        // Get the user from the user manager via an ID passed from the request uri
        $user = $userManager->find($id);

        // If the result from the user manager is null then no user with that id exists
        if (null === $user) {
            // So let's 404
            abort();
        }

        // Create a new json model
        $json = new Json();

        // Set whether this json call was successful
        $json->success = null === $user;
        // Set the results as the user model found
        $json->results = $user;

        return json((array) $json);
    }

    /**
     * Create a user from a request.
     *
     * @param UserManager $userManager The user manager
     * @param Request     $request     The request to the server
     *
     * @return JsonResponse
     *  The json response to display
     *
     * @Route(path = '/create', name = 'create', requestMethods = [[POST]])
     */
    public function create(UserManager $userManager, Request $request): JsonResponse
    {
        // Create a new json model
        $json = new Json();

        // Get all the required params from the request
        $username = $request->get(UserField::USERNAME);
        $email    = $request->get(UserField::EMAIL);

        // If username is missing
        if (null === $username) {
            // Set the success as false
            $json->success = false;
            // Set the error
            $json->error = 'Username is required';
        }

        // If email is missing
        if (null === $email) {
            // Set the success as false
            $json->success = false;
            // Set the error
            $json->error = 'Email is required';
        }

        // If an error occurred in the sanity checks above
        if (false === $json->success) {
            // Return the json response
            return json((array) $json);
        }

        // Create a new user model
        $user = new User();

        // Set the username
        $user->username = $username;
        // Set the email
        $user->email = $email;

        // Attempt to create the user
        $created = $userManager->create($user);

        // Set the success as whether the user was created or not
        $json->success = $created;
        // Set the results as the new user model
        $json->results = $user;

        return json((array) $json);
    }

    /**
     * Save a user from a request.
     *
     * @param UserManager $userManager The user manager
     * @param Request     $request     The request to the server
     * @param int         $id          The id of the user to save
     *
     * @return JsonResponse
     *  The json response to display
     *
     * @Route(path = '/save/{id:num}', name = 'save', requestMethods = [[POST]])
     */
    public function save(UserManager $userManager, Request $request, int $id): JsonResponse
    {
        // Create a new json model
        $json = new Json();

        // Get the user with the given id
        $user = $userManager->find($id);

        // If an error occurred in the sanity checks above
        if (false === $json->success) {
            // Return the json response
            return json((array) $json);
        }

        // Get all the required params from the request
        $username    = $request->get(UserField::USERNAME);
        $email       = $request->get(UserField::EMAIL);
        $badgesCount = $request->get(UserField::BADGES_COUNT);

        // If username is present
        if (null === $username) {
            // Update the username
            $user->username = $username;
        }

        // If email is present
        if (null === $email) {
            // Update the email
            $user->email = $email;
        }

        // If badges count is present
        if (null === $badgesCount) {
            // Update the badges count
            $user->badgesCount = $badgesCount;
        }

        // Attempt to create the user
        $saved = $userManager->save($user);

        // Set the success as whether the user was saved or not
        $json->success = $saved;
        // Set the results as the new user model
        $json->results = $user;

        return json((array) $json);
    }

    /**
     * Delete a user.
     *
     * @param UserManager $userManager The user manager
     * @param int         $id          The id of the user to delete
     *
     * @return JsonResponse
     *  The json response to display
     *
     * @Route(path = '/delete/{id:num}', name = 'delete', requestMethods = [[DELETE]])
     */
    public function delete(UserManager $userManager, int $id): JsonResponse
    {
        // Attempt to delete the user via id
        $deleted = $userManager->delete($id);

        // Create a new json model
        $json = new Json();

        // Set whether this call was successful
        $json->success = $deleted;
        // Set the results as whether the user was deleted on not
        $json->results = $deleted;

        return json((array) $json);
    }
}
