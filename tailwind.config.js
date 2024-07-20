/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/**/*.blade.php", // All Blade templates
        "./resources/js/**/*.vue", // All Vue components
        "./public/**/*.html", // Any HTML files in the public directory
        "./resources/js/**/*.js", // Any JS files that may contain template literals
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
    ],
    theme: {
        extend: {
            fontFamily: {
                roboto: ["Roboto", "sans-serif"],
                merriweather: ["Merriweather", "serif"],
                lobster: ["Lobster", "cursive"],
            },
        },
    },
    plugins: [],
};
