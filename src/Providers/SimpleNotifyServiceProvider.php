<?php

namespace LBreda\Livewire3Notify\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SimpleNotifyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/simple-notify.php' => config_path('simple-notify.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/../../config/simple-notify.php', 'simple-notify'
        );

        Blade::directive('simpleNotify', function () {
            $settings = json_encode(config("simple-notify"));
            return <<<blade
                       <script>
                       document.addEventListener('livewire:init', () => {
                           Livewire.on('notify', (eventSettings) => {
                               let settings = {...JSON.parse('$settings'), ...eventSettings}
                               new window.Notify(settings)
                           })
                           
                       })
                       </script>
                   blade;
        });
    }
}