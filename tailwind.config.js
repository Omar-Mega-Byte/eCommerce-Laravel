/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',  // All Blade templates
        './resources/js/**/*.vue',           // All Vue components
        './public/**/*.html',                // Any HTML files in the public directory
        './resources/js/**/*.js',            // Any JS files that may contain template literals
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
