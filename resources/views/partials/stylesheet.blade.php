<style type="text/css">
body.status-page {
    background-color: {{ $theme_background_color }};
    color: {{ $theme_text_color }};
}
.reds { color: {{ $theme_reds }}; }
.blues { color: {{ $theme_blues }}; }
.greens { color: {{ $theme_greens }}; }
.yellows { color: {{ $theme_yellows }}; }
.oranges { color: {{ $theme_oranges }}; }
.metrics { color: {{ $theme_metrics }}; }
.links { color: {{ $theme_links }}; }

/**
 * Alert overrides.
 */
.alert {
    background-color: {{ $theme_yellows }};
    border-color: {{ color_darken($theme_yellows, -0.1) }};
    color: {{ color_contrast($theme_yellows) }};
}
.alert.alert-success {
    background-color: {{ $theme_greens }};
    border-color: {{ color_darken($theme_greens, -0.1) }};
    color: {{ color_contrast($theme_greens) }};
}
.alert.alert-info {
    background-color: {{ $theme_blues }};
    border-color: {{ color_darken($theme_blues, -0.1) }};
    color: {{ color_contrast($theme_blues) }};
}
.alert.alert-danger {
    background-color: {{ $theme_reds }};
    border-color: {{ color_darken($theme_reds, -0.1) }};
    color: {{ color_contrast($theme_reds) }};
}

/**
 * Button Overrides
 */
.btn.links {
    color: {{ color_darken($theme_yellows, -0.3) }};
}
.btn.btn-success {
    background-color: {{ $theme_greens }};
    border-color: {{ color_darken($theme_greens, -0.1) }};
    color: {{ color_contrast($theme_greens) }};
}
.btn.btn-success.links {
    color: {{ color_darken($theme_greens, -0.3) }};
}
.btn.btn-info {
    background-color: {{ $theme_blues }};
    border-color: {{ color_darken($theme_blues, -0.1) }};
    color: {{ color_contrast($theme_blues) }};
}
.btn.btn-info.links {
    color: {{ color_darken($theme_blues, -0.3) }};
}
.btn.btn-danger {
    background-color: {{ $theme_reds }};
    border-color: {{ color_darken($theme_reds, -0.1) }};
    color: {{ color_contrast($theme_reds) }};
}
.btn.btn-danger.links {
    color: {{ color_darken($theme_reds, -0.3) }};
}

/**
 * Background fills Overrides
 */
.component {
    background-color: {{ $theme_background_fills }};
    border-color: {{ color_darken($theme_background_fills, -0.1) }};
}
.sub-component {
    background-color: {{ $theme_background_fills }};
    border-color: {{ color_darken($theme_background_fills, -0.1) }};
}
.incident {
    background-color: {{ $theme_background_fills }};
    border-color: {{ color_darken($theme_background_fills, -0.1) }};
}
.status-icon {
    background-color: {{ $theme_background_fills }};
    border-color: {{ color_darken($theme_background_fills, -0.1) }};
}
.panel.panel-message:after {
    border-left-color: {{ $theme_background_fills }};
    border-right-color: {{ $theme_background_fills }};
}
.footer {
    background-color: {{ $theme_background_fills }};
}
</style>
