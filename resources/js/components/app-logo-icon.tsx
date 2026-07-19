type AppLogIconProps = Pick<HTMLDivElement, "className">

export default function AppLogoIcon(props: AppLogIconProps) {
    return <div {...props}>
        <a href="https://github.com/spatie/laravel-event-sourcing">
            laravel-event-sourcing
        </a> Playground
    </div>;
}
