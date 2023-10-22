<?php

namespace App\Console\Commands;

use App\Domains\Shared\Enums\DomainTypesEnum;
use BenSampo\Enum\Commands\MakeEnumCommand;
use InvalidArgumentException;
use Str;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'make-app:enum')]
class EnumMakeCommand extends MakeEnumCommand
{
    /**
     * The name of argument name.
     *
     * @var string
     */
    protected $argumentName = 'name';

    /**
     * The name of argument Domain.
     *
     * @var string
     */
    protected $argumentApp = 'domain';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make-app:enum';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     *
     * @deprecated
     */
    protected static $defaultName = 'make-app:enum';

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
            ['name', InputArgument::REQUIRED, 'The name of the Enum class.'],
            ['domain', InputArgument::REQUIRED, 'The name of Domain will be used.'],
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $domain = $this->argument('domain');
        if (in_array(Str::lower($domain), DomainTypesEnum::getValues()) === false) {
            throw new InvalidArgumentException(
                'please choose one of the domains '.implode(',', DomainTypesEnum::getValues())
            );
        }

        return $rootNamespace.'\Domains\\'.(Str::title($domain)).'\\Enums';
    }
}
