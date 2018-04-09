<?php

namespace Ansezz\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Ansezz\Modules\Commands\CommandMakeCommand;
use Ansezz\Modules\Commands\ControllerMakeCommand;
use Ansezz\Modules\Commands\DisableCommand;
use Ansezz\Modules\Commands\DumpCommand;
use Ansezz\Modules\Commands\EnableCommand;
use Ansezz\Modules\Commands\EventMakeCommand;
use Ansezz\Modules\Commands\FactoryMakeCommand;
use Ansezz\Modules\Commands\InstallCommand;
use Ansezz\Modules\Commands\JobMakeCommand;
use Ansezz\Modules\Commands\ListCommand;
use Ansezz\Modules\Commands\ListenerMakeCommand;
use Ansezz\Modules\Commands\MailMakeCommand;
use Ansezz\Modules\Commands\MiddlewareMakeCommand;
use Ansezz\Modules\Commands\MigrateCommand;
use Ansezz\Modules\Commands\MigrateRefreshCommand;
use Ansezz\Modules\Commands\MigrateResetCommand;
use Ansezz\Modules\Commands\MigrateRollbackCommand;
use Ansezz\Modules\Commands\MigrateStatusCommand;
use Ansezz\Modules\Commands\MigrationMakeCommand;
use Ansezz\Modules\Commands\ModelMakeCommand;
use Ansezz\Modules\Commands\ModuleMakeCommand;
use Ansezz\Modules\Commands\NotificationMakeCommand;
use Ansezz\Modules\Commands\PolicyMakeCommand;
use Ansezz\Modules\Commands\ProviderMakeCommand;
use Ansezz\Modules\Commands\PublishCommand;
use Ansezz\Modules\Commands\PublishConfigurationCommand;
use Ansezz\Modules\Commands\PublishMigrationCommand;
use Ansezz\Modules\Commands\PublishTranslationCommand;
use Ansezz\Modules\Commands\RequestMakeCommand;
use Ansezz\Modules\Commands\ResourceMakeCommand;
use Ansezz\Modules\Commands\RouteProviderMakeCommand;
use Ansezz\Modules\Commands\RuleMakeCommand;
use Ansezz\Modules\Commands\SeedCommand;
use Ansezz\Modules\Commands\SeedMakeCommand;
use Ansezz\Modules\Commands\SetupCommand;
use Ansezz\Modules\Commands\TestMakeCommand;
use Ansezz\Modules\Commands\UnUseCommand;
use Ansezz\Modules\Commands\UpdateCommand;
use Ansezz\Modules\Commands\UseCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * The available commands
     *
     * @var array
     */
    protected $commands = [
        CommandMakeCommand::class,
        ControllerMakeCommand::class,
        DisableCommand::class,
        DumpCommand::class,
        EnableCommand::class,
        EventMakeCommand::class,
        JobMakeCommand::class,
        ListenerMakeCommand::class,
        MailMakeCommand::class,
        MiddlewareMakeCommand::class,
        NotificationMakeCommand::class,
        ProviderMakeCommand::class,
        RouteProviderMakeCommand::class,
        InstallCommand::class,
        ListCommand::class,
        ModuleMakeCommand::class,
        FactoryMakeCommand::class,
        PolicyMakeCommand::class,
        RequestMakeCommand::class,
        RuleMakeCommand::class,
        MigrateCommand::class,
        MigrateRefreshCommand::class,
        MigrateResetCommand::class,
        MigrateRollbackCommand::class,
        MigrateStatusCommand::class,
        MigrationMakeCommand::class,
        ModelMakeCommand::class,
        PublishCommand::class,
        PublishConfigurationCommand::class,
        PublishMigrationCommand::class,
        PublishTranslationCommand::class,
        SeedCommand::class,
        SeedMakeCommand::class,
        SetupCommand::class,
        UnUseCommand::class,
        UpdateCommand::class,
        UseCommand::class,
        ResourceMakeCommand::class,
        TestMakeCommand::class,
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * @return array
     */
    public function provides()
    {
        $provides = $this->commands;

        return $provides;
    }
}
