<?php

namespace Kata\UI\Console;

use Kata\Menu\Menu;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class MainConsoleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('explorer:main')
            ->setDescription('Inicia la aplicación')
            ->setHelp('Inicia la aplicación mostrando el menú principal');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $menu = new Menu();

        /** @var QuestionHelper $helper */
        $helper = $this->getHelper('question');

        do {
            $output->write($menu->renderMap());
            $question = new ChoiceQuestion(
                'Elige una opción',
                $menu->getArrayOfCommandsTitle()
            );
            $question->setErrorMessage('La opción %s no es válida');

            $option = $helper->ask($input, $output, $question);
            $menu->execute(intval(substr($option, 0, 1)) -1);
        } while (false === $menu->isClosed());

        $output->write('Fin de la aplicación' . PHP_EOL . PHP_EOL);
    }
}
