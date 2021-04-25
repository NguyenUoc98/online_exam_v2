module.exports = {
    important: true,
    future: {
        // removeDeprecatedGapUtilities: true,
        // purgeLayersByDefault: true,
    },
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {},
        maxHeight: {
            '48': '12rem',
            '52': '13rem',
            '56': '14rem',
            '60': '15rem',
            '64': '18rem',
            '72': '18rem',
            '80': '20rem',
            '96': '24rem',
            'screen': '450px',
        },
        height: {
            '10': '2.5rem',
            '12': '3rem',
            '16': '4rem',
            '20': '5rem',
            '24': '6rem',
            '32': '8rem',
            '40': '10rem',
            '48': '12rem',
            '52': '13rem',
            '56': '14rem',
            '60': '15rem',
            '64': '18rem',
            '72': '18rem',
            '80': '20rem',
            '96': '24rem',
            'available': '-webkit-fill-available'
        }
    },
    variants: {},
    plugins: [],
}
