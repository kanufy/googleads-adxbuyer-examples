<?php
/*
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// Require the base class.
require_once __DIR__ . "/../BaseExample.php";

/**
 * This example illustrates how to create a new invitation.
 */
class CreateInvitation extends BaseExample
{

    /**
     *
     * @see BaseExample::getInputParameters()
     */
    protected function getInputParameters()
    {
        return array(
            array(
                'name' => 'account_id',
                'display' => 'Account id',
                'required' => true
            ),
            array(
                'name' => 'client_account_id',
                'display' => 'Client Account id',
                'required' => true
            ),
            array(
                'name' => 'client_email',
                'display' => 'Client eMail',
                'required' => true
            )
        );
    }

    /**
     *
     * @see BaseExample::run()
     */
    public function run()
    {
        $values = $this->formValues;

        $invitation = new
            Google_Service_AdExchangeBuyerII_ClientUserInvitation();
        $invitation->email = $values['client_email'];

        $result = $this->service->accounts_clients_invitations->create(
            $values['account_id'], $values['client_account_id'], $invitation);

        print '<h2>Creating Invitation</h2>';
        $this->printResult($result);
    }

    /**
     *
     * @see BaseExample::getClientType()
     */
    function getClientType()
    {
        return ClientType::AdExchangeBuyerII;
    }

    /**
     *
     * @see BaseExample::getName()
     */
    public function getName()
    {
        return 'Client Access: Create Invitation';
    }
}

