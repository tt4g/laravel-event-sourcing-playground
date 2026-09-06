type AppLogIconProps = Pick<HTMLDivElement, "className">

export default function AppLogoIcon(props: AppLogIconProps) {
    return <div {...props}>
        laravel-event-sourcing Playground
    </div>;
}
