<?php
namespace Apitest\Controller;

use Apitude\Core\API\Controller\AbstractCrudController;

class PersonController extends AbstractCrudController
{
    protected $apiRecordType = 'Apitest.Entities.Person';
}
