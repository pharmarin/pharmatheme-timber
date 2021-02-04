module.exports = {
    purge: ["**/*.twig"],
    darkMode: false,
    theme: {
        extend: {},
    },
    variants: {
        extend: {
            borderRadius: ['first'],
            margin: ['first', 'last']
        }
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
};
