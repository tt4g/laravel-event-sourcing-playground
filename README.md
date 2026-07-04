[laravel-event-sourcing](https://github.com/spatie/laravel-event-sourcing) Playground.

## Development

Use [Dev Container](./.devcontainer/devcontainer.json) for development.

### Setup

```shell
$ composer run setup
```

### Debug

Launch FrankenPHP via laravel/octan with XDebug from the Visutl Studio Code
debugger.
See: [.vscode/launch.json](./.vscode/launch.json)

Visit `http://localhost:8000/`.

If you want to Vite dev server, run `npm run dev` in console.
You must do this before lunching Visutl Studio Code debugger.
Alternatively: run `npm run build` after updating assets.
