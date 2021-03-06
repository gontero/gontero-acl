<?php
namespace GonteroAclTest\Auth;

use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Result as AuthenticationResult;

use GonteroAcl\Factory\Role;

class TestAdapter extends AbstractAdapter
{
    /**
     * {@inheritdoc}
     */
    public function authenticate()
    {
        if($this->getIdentity() == 1) {
            return new AuthenticationResult(
                AuthenticationResult::SUCCESS,
                new \GonteroAclTest\Entity\User(array(Role::factory('admin'))),
                array('Authentication successful.')
            );
        }

        if($this->getIdentity() == 2) {
            return new AuthenticationResult(
                AuthenticationResult::SUCCESS,
                new \GonteroAclTest\Entity\User(array(Role::factory('user'))),
                array('Authentication successful.')
            );
        }

        return new AuthenticationResult(
            AuthenticationResult::FAILURE_IDENTITY_NOT_FOUND,
            null,
            array('Authentication failure.')
        );
    }
    
}