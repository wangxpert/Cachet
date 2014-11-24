# Cachet

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

Cachet is an open source PHP status page system using the Laravel framework.

For more information on why I started developing Cachet, check out my [blog post](http://james-brooks.uk/cachet/?utm_source=github&utm_medium=readme&utm_campaign=github-cachet). [A demo, deployed to Heroku](https://cachet.herokuapp.com).

**Currently in development. Things may change or break until a solid release has been announced.** Please feel free to contribute!

## Progress

![Current progress](https://dl.dropboxusercontent.com/u/7323096/Cachet.png)

[What's next for Cachet?](http://james-brooks.uk/whats-next-for-cachet/)

## Installation

See the [INSTALL.md](/INSTALL.md) document for more information. If you'd like to add more documentation, please create a Pull Request, I'd be happy to merge!

[Deploying to Heroku](/INSTALL.md#deploy-to-heroku) requires one-click to get started and no knowledge of PHP or Laravel afterwards.

## Current Features

- Uses SQLite/MySQL (ClearDB on Heroku).
- Report statuses on:
    + Incidents
    + Components
- Uses Bootstrap 3 for a easy to modify, smooth layout.

## Goals

- [ ] Configuration:
    - [ ] Individual sites.
    - [ ] Colours and themes.
- [ ] Incident reporting:
    - [ ] Manual.
    - [ ] Third-party integration to automatically create incidents.
- [ ] Incident report templates.
- [ ] RESTful API.
- [ ] Web Hooks.
- [ ] Administration panel:
    - [ ] Create new incidents.
    - [ ] Add components.
    - [ ] Report on components.
- [ ] Third party integration:
    - [ ] Connect to third-party services and auto report using the API.
    - [ ] Add components via third-party sources.
- [x] Heroku Button Support [#5](https://github.com/jbrooksuk/Cachet/issues/5)

# License

[MIT license](http://jbrooksuk.mit-license.org)
