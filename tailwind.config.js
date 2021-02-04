module.exports = {
    purge: ["**/*.twig"],
    darkMode: false,
    theme: {
        extend: {},
    },
    variants: {
        extend: {
            borderRadius: ['first']
        }
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
};
