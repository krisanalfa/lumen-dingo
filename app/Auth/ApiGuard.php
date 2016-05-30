<?php

namespace App\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\TokenGuard;
use Illuminate\Contracts\Auth\UserProvider;

class ApiGuard extends TokenGuard
{
    /**
     * Create a new authentication guard.
     *
     * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(UserProvider $provider, Request $request)
    {
        $this->request = $request;
        $this->provider = $provider;
    }

    /**
     * Log a user into the application without sessions or cookies.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function once(array $credentials = [])
    {
        return $this->validate($credentials);
    }

    /**
     * Log the given user ID into the application without sessions or cookies.
     *
     * @param  mixed  $id
     * @return bool
     */
    public function onceUsingId($id)
    {
        if (! is_null($user = $this->provider->retrieveById($id))) {
            $this->setUser($user);

            return true;
        }

        return false;
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        if ($user = $this->provider->retrieveByCredentials($credentials)) {
            return $this->provider->validateCredentials($user, $credentials);
        }

        return false;
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        // If we've already retrieved the user for the current request we can just
        // return it back immediately. We do not want to fetch the user data on
        // every call to this method because that would be tremendously slow.
        if (! is_null($this->user)) {
            return $this->user;
        }

        $credentials = $this->getTokenForRequest();

        if (! empty($credentials)) {
            if ($user = $this->provider->retrieveByCredentials($credentials)) {
                return $this->provider->validateCredentials($user, $credentials)
                    ? $this->user = $user
                    : $this->user = null;
            }
        }
    }
}
