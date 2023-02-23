/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**.*.blade.php", "./resources/**/*.js"],
  theme: {
      extend: {
        backgroundImage:{
        //v'main-background':"url('~/images/mountain.jpg')",
        'main-background': "url('/images/mountain.jpg')",
        }
      },
  },
  plugins: [],
};
