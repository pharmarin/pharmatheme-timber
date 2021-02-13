const colors = require('tailwindcss/colors')

module.exports = {
  purge: ["**/*.twig"],
  darkMode: false,
  theme: {
    extend: {
        colors: {
            green: colors.green,
            teal: colors.teal
        }
    }
  },
  variants: {
    extend: {
      borderRadius: ["first"],
      margin: ["first", "last"],
    },
  },
  plugins: [require("@tailwindcss/typography")],
};
