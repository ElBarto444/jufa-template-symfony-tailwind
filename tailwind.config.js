/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./node_modules/flowbite/**/*.js",
  ],

  theme: {
    colors: {
      primary: "#f7f8f9",
      secondary: "#fc9418",
      tertiary: "#16056b",
      dark: "#2F4144",
      light: "#FFFFFF",
      gray: "#d7d7d7",
      nightblue: '#16056b',
    },
    extend: {
      fontFamily: {
        title: ["Nunito, Bold", "sans-serif"],
        // text: ["Roboto", "sans-serif"],
      },
    },
  },
  plugins: [require("flowbite/plugin")],
};
