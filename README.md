# Laravel Nova Autocomplete Field

An autocomplete / autosuggestion field for Laravel Nova 4.0

## Installation

1. **Install via Composer:**

   ```bash
   composer require mxms/autocomplete
   ```

## Usage

2. **Populating autosuggestions:**

    ```php
    use Mxms\Autocomplete\Autocomplete;

    public function fields(NovaRequest $request)
    {
        $userNames = User::pluck('name')->toArray();
        return [
            Autocomplete::make('User', 'user')->items($userNames)
        ];
    }
    ```

## License

The MIT License (MIT).