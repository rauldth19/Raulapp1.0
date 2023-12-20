/** @type {import('tailwindcss').Config} */
module.exports = {

  darkMode: "class",

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
          Leckerli: ['Leckerli One'],
          Work: ['Work Sans'],
        }
    },
  },
  plugins: [],
}
