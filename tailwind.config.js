/** @type {import('tailwindcss').Config} */

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
    darkMode: "class", // Mengganti darkMode dari "media" ke "class", karena hanya dapat memiliki satu nilai
};
