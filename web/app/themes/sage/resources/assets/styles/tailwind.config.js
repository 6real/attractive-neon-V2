module.exports = {
  purge: {
    enabled: true,
    content: ['./resources/views/**/*.php', './resources/views/*.php', './resources/views/**/**/*.php', './app/*.php' ],
  },
  theme: {
    important: true,
    extend: {
      colors: {
        primary: '#f91fff',
        'primary-hover': '#f166f5',
        white: '#fff',
        grey: '#eaebef',
        gray: {
          100: '#f7fafc',
          200: '#edf2f7',
          300: '#e2e8f0',
          400: '#cbd5e0',
          500: '#a0aec0',
          600: '#718096',
          700: '#4a5568',
          800: '#2d3748',
          900: '#1a202c',
        },
        transparent: 'transparent',
      },
      shadows: {
        outline: '0 0 0 3px rgba(82,93,220,0.3)',
      },
      container: {
        center: true,
        padding: '1rem',
      },
      maxHeight: {
        '4': '2.5rem',
      },
    },

  },
  plugins: [],
}
