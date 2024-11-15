module.exports = {
  content: [
    "./src/**/*.{html,js}",        // If your HTML and JS are inside the `src` folder
    "./**/*.php",                  // If you're using PHP files as well (in a WordPress theme)
    "./*.{html,js,php}",            // If there are any files in the root theme directory
    "./assets/**/*.{js,css}",      // If you have an assets folder (containing JS or CSS)
  ],
  theme: {
    extend: {
      colors: {
        green: "#196136",
        darkGrreen:"#132b1b",
        lightGreen:"#f4c72c",
        yellow: "#f7ca16",
        textDarkGreen:"#051905",
        lightGray: "#e6e6e6",
        gray200:"#828c82",
        greenHover:"#028753",
        fadeBlue:"#1d3757",
        starColor: "#f3c72b",
        heartColor: "#ff3636"
      },
      fontFamily: {
        montserrat: ["Montserrat", "sans-serif"],
        philosopher: ["Philosopher", "sans-serif"],
      }
    },
  },
  plugins: [],
};
