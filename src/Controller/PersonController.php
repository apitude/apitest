<?php
namespace Apitest\Controller\Controller;

use Apitude\Core\API\Controller\AbstractCrudController;

class PersonController extends AbstractCrudController
{
    protected $apiRecordType = 'Apitest.Entities.Person';
}
