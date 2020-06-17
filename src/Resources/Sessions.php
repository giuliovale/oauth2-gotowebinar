<?php

namespace DalPraS\OAuth2\Client\Resources;

use DalPraS\OAuth2\Client\Decorators\AccessTokenDecorator;

class Sessions extends \DalPraS\OAuth2\Client\Resources\AuthenticatedResourceAbstract {

    /**
     * Retrieves details for all past sessions of a specific webinar.
     * https://api.getgo.com/G2W/rest/v2/organizers/{organizerKey}/webinars/{webinarKey}/sessions
     *
     * @param int $webinarKey
     * @return array
		 *[
		 *  "_embedded": [
		 *    "sessionInfoResources": [
		 *      [
		 *        "sessionKey": "string",
		 *        "webinarKey": "string",
		 *        "webinarName": "string",
		 *        "startTime": "2020-06-17T09:58:53.811Z",
		 *        "endTime": "2020-06-17T09:58:53.811Z",
	   *        "registrantsAttended": 0,
		 *        "registrantCount": 0,
		 *        "accountKey": "string",
		 *        "creatingOrganizerKey": "string",
		 *        "creatingOrganizerName": "string",
		 *        "startingOrganizerKey": "string",
		 *        "startingOrganizerName": "string",
		 *        "totalPollCount": 0,
		 *        "timeZone": "string",
		 *        "experienceType": "string",
		 *        "webinarID": "string"
		 *      ]
		 *    ]
		 *  ],
		 *  "page": [
		 *    "size": 0,
		 *    "totalElements": 0,
		 *    "totalPages": 0,
		 *    "number": 0
		 *  ]
		 *]
     */
    public function getWebinarSessions($webinarKey):array {
        $url = $this->provider->domain . '/G2W/rest/v2/organizers/' . (new AccessTokenDecorator($this->accessToken))->getOrganizerKey() . '/webinars/' . $webinarKey . '/sessions';
				$request  = $this->provider->getAuthenticatedRequest('GET', $url, $this->accessToken);
        return $this->provider->getParsedResponse($request);
    }


}