# Livewire3 Notify

**Livewire3 Notify** is a [Livewire3](https://livewire.laravel.com) binding for [SimpleNotify](https://github.com/simple-notify/simple-notify). That's it.

## Installation

You have to install both SimpleNotify and this library:

```bash
npm i simple-notify
composer require lbreda/livewire3-notify
```

Then you should include the SimpleNotify scripts in your `app.js` (or equivalent):

```javascript
import Notify from 'simple-notify'
import 'simple-notify/dist/simple-notify.css'
window.Notify = Notify
```

And this library component in your main layout:
```html
<html>
<head>
    ...
    @simpleNotify()
</head>
<body>
...

</body>
</html>
```

## Usage
You can simply dispatch the `notify` event inside your Livewire application. You can set the Simple Notify parameters ([here is a reference](https://github.com/simple-notify/simple-notify)) in the payload.

For example, you can use it in a component method:

```php
#[On('test')]
public function test(): void
{
    $this->dispatch('notify', ['status' => 'error', 'title' => 'Error', 'text' => 'Send halp']);
}
```

or you can dispatch it via the DOM in a view:

```html
<div>
    <button type="button" wire:click="$dispatch('notify', {status: 'error', title: 'Error', text: 'Send halp'})">Notify</button>
</div>
```

# Setting the default configuration

You can export the default configuration via:

```bash
 php artisan vendor:publish --provider 'LBreda\Livewire3Notify\Providers\SimpleNotifyServiceProvider'
```

You'll find a `simple-notify.php` file in your `config` directory. Customise it as you like.

Happy coding!
