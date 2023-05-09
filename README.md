<div align="center">
    <a href="https://github.com/thiiagoms/narcissus">
        <img src="assets/img/narcissus.png" alt="Logo" width="80" height="80">
    </a>
    <h3 align="center">Narcisuss GitHub Bot :mage:</h3>
    <p float="left">
        <img
            src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"
            alt="PHP"
        >
    </p>
</div>

Narcissus is a small PHP CLI script that helps you unfollow users in your Github account who are not following you back.

### Dependencies :memo:
 * PHP7.4+
 * Composer

### Install :package:

01 -) Clone:
```bash
$ git clone https://github.com/thiiagoms/nacissus
```

02 -) Got to `narcissus` directory:
```bash
cd narcissus
$ narcissus
```

03 -) Add your `GITHUB_TOKEN` in `.env`, like:
```bash
narcissus $ cp .env.example .env
```

```dotenv
GITHUB_TOKEN=<YOUR-GITHUB-TOKEN-HERE>
```

04 -) Run `narcissus`
```shell
narcissus $ chmod +x narcissus
narcissus $ ./narcissus

                ███╗   ██╗ █████╗ ██████╗  ██████╗██╗███████╗███████╗██╗   ██╗███████╗
                ████╗  ██║██╔══██╗██╔══██╗██╔════╝██║██╔════╝██╔════╝██║   ██║██╔════╝
                ██╔██╗ ██║███████║██████╔╝██║     ██║███████╗███████╗██║   ██║███████╗
                ██║╚██╗██║██╔══██║██╔══██╗██║     ██║╚════██║╚════██║██║   ██║╚════██║
                ██║ ╚████║██║  ██║██║  ██║╚██████╗██║███████║███████║╚██████╔╝███████║
                ╚═╝  ╚═══╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝╚═╝╚══════╝╚══════╝ ╚═════╝ ╚══════╝
                
                => Tool to unfollow users that doesn't follow you on GitHub
                
                [*] Author: Thiago AKA thiiagoms
                [*] Repository: https://github.com/thiiagoms/narcissus
                
                => username: 
```

### Contributing

Contributions are welcome! Please feel free to submit a pull request.