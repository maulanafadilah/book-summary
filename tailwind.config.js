/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        "primary" : "#011D35",
        "secondary" : "#4B4C4E",
        "tertiary" : "#C3E7FF",
        "quarternary" : "#F1F4F9",
      },
      fontFamily: {
        "Poppins": "Poppins, sans-serif"
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('@tailwindcss/line-clamp'),
  ],
}
