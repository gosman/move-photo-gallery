module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            "colors": {
                transparent: 'transparent',
                current: 'currentColor',
                'white': '#ffffff',
                "move": {
                    "50": "#32c6b4",
                    "100": "#28bcaa",
                    "200": "#1eb2a0",
                    "300": "#14a896",
                    "400": "#0a9e8c",
                    "500": "#009482",
                    "600": "#008a78",
                    "700": "#00806e",
                    "800": "#007664",
                    "900": "#006c5a"
                }
            }
        },
    },
    plugins: [],
}
