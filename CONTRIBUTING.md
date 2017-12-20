## Local Development Setup

You may use your preferred local development environment for this project. Below are the steps to setup the AMP theme in your WP local install:

1. `git clone https://github.com/xwp/wp-amp-theme amp` to clone the [AMP theme repository](https://github.com/xwp/wp-amp-theme) in your `themes` directory.
2. `cd amp` and `npm install` to install the [dev-lib](https://github.com/xwp/wp-dev-lib) which is used to run code sniffers (WPCS, ESLint) and PHPUnit in a pre-commit hook (macOS/Linux only) as well as on Travis. If you are working in a macOS or Linux environment, it is advised to install the pre-commit hook `./node_modules/wp-dev-lib/install-pre-commit-hook.sh` which will run the code sniffers and PHPUnit (if possible) locally before staged changes are committed (More info [here](https://github.com/xwp/wp-dev-lib/blob/master/readme.md)).

## Branching Strategy
The branching strategy should follow [GitFlow](https://datasift.github.io/gitflow/IntroducingGitFlow.html) schema. The upcoming releases are managed in this repository [Projects](https://github.com/xwp/wp-amp-theme/projects). Here is what a development cycle typically looks like:

1. Issues to be completed for the upcoming release are added in the "To Do" column.
2. Once the acceptance criterias are completed, this issue is assigned (may be self-assigned) and moved to the "In Progress" column.
3. A git branch off `develop` is created named using the issue number (eg. feature/123)
4. Once development is completed, a PR against `develop` is created, a reviewer is added and the issue is moved to the "Ready for Review" column.
5. Once code review is completed, the issue may go back to "In Progress" if changes need to be applied or moved to "QA" and its status change to "closed" if approved.
6. Once in QA, the issue may be "reopened" and go back to "In Progress" if items are needing to be addressed, or moved to "Merge Ready" if the issue passes QA.
7. The branch is merged into the `develop` and removed. The issue is then moved to the "Done" column.

## Code Standards
Code must follow the WPCS, ESlint according the repo config files. All code will have extensive inline documentation appropriated to each language used.

## Integration Tests
PHPUnit is used to write AMP plugin integration tests. The WordPress Automated Testing Suite needs to be setup in order to run the tests. Instructions may be found [here](https://make.wordpress.org/core/handbook/testing/automated-testing/phpunit/) for PHP and [here](https://make.wordpress.org/core/handbook/testing/automated-testing/qunit/) for JavaScript.

Please run these tests in an environment with WordPress unit tests installed, like [VVV](https://github.com/Varying-Vagrant-Vagrants/VVV).

Run tests:

``` bash
$ phpunit
```

Run tests with an HTML coverage report:

``` bash
$ phpunit --coverage-html /tmp/report
```

When you push a commit to your PR, Travis CI will run the PHPUnit tests and sniffs against the WordPress Coding Standards.
