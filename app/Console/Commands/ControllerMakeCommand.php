<?php

namespace App\Console\Commands;

use App\Domains\Shared\Enums\AppTypesEnum;
use App\Domains\Shared\Enums\DomainTypesEnum;
use Illuminate\Routing\Console\ControllerMakeCommand as ConsoleControllerMakeCommand;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'make-app:controller')]
class ControllerMakeCommand extends ConsoleControllerMakeCommand
{
    /**
     * The name of argument name.
     *
     * @var string
     */
    protected $argumentName = 'name';

    /**
     * The name of argument App.
     *
     * @var string
     */
    protected $argumentApp = 'app';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make-app:controller';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     *
     * @deprecated
     */
    protected static $defaultName = 'make-app:controller';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        parent::handle();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the controller class.'],
            ['app', InputArgument::REQUIRED, 'The name of app will be used.'],
            ['group', InputArgument::REQUIRED, 'The name of group will be used.'],
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $app = $this->argument('app');
        if (in_array(Str::lower($app), AppTypesEnum::getValues()) === false) {
            throw new InvalidArgumentException(
                'please choose one of the apps '.implode(',', AppTypesEnum::getValues())
            );
        }
        $group = $this->argument('group');
        if (in_array(Str::lower($group), DomainTypesEnum::getValues()) === false) {
            throw new InvalidArgumentException(
                'please choose one of the domains '.implode(',', DomainTypesEnum::getValues())
            );
        }

        return $rootNamespace.'\Src\\'.(Str::title($app)).'\\'.(Str::title($group)).'\\Controllers';
    }
}
