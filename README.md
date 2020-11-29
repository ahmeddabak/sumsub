# Sumsub

Sumsub KYC implementation for Laravel

## Installation

Use composer to install the package.

```bash
composer require ahmeddabak/sumsub
```

## Usage

Add the user name and password to your ```.env``` file

```dotenv
SUMSUB_APP_TOKEN=YOUR_APP_TOKEN
SUMSUB_SECRET_KEY=YOUR_SECRET_KEY
```

Then in your blade add the view component anywhere in the page body

```html
<body>
    <x-sumsub-websdk flow="STEP-1" user-id="USER_EXTERNAL_ID"/>
</body>
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE)
