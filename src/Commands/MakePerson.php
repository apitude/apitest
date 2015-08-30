<?php
namespace Apitest\Commands;


use Apitest\Entities\Person;
use Apitude\Core\Commands\BaseCommand;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakePerson extends BaseCommand
{
    public function __construct()
    {
        parent::__construct('person:create');
        $this->addOption('firstName', 'f', InputOption::VALUE_REQUIRED, 'First Name', 'Bobby');
        $this->addOption('lastName', 'l', InputOption::VALUE_REQUIRED, 'Last Name', 'McBob');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $this->getSilexApplication();

        $p = new Person();
        $p->setFirstName($input->getOption('firstName'))
            ->setLastName($input->getOption('lastName'));

        /** @var EntityManagerInterface $em */
        $em = $app['orm.em'];
        $em->persist($p);
        $em->flush();
        $output->writeln('Created person with id: '.$p->getId());
    }
}
