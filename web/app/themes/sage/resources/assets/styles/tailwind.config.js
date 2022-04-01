const defaultTheme = require("tailwindcss/defaultTheme");

function withOpacity(variableName) {
  return ({ opacityValue }) => {
    if (opacityValue !== undefined) {
      return `rgba(var(${variableName}), ${opacityValue})`;
    }
    return `rgb(var(${variableName}))`;
  };
}

module.exports = {
  purge: {
    enabled: false,
    safelist: ['w-40','h-40'],
    content: [
      './resources/views/**/*.php',
      './resources/views/*.php',
      './resources/views/**/*.php',
      './resources/views/woocommerce/*.php',
      './resources/views/woocommerce/**/*.php',
      './resources/views/**/**/*.php',
      './resources/views/**/**/**/*.php',
      './app/*.php' ],
  },
  theme: {
    important: true,
    extend: {
      fontFamily:{
        primary:['Montserrat', "sans-serif"],
        secondary:['Poppins', "sans-serif"]
      },
      colors: {
        primary: withOpacity("--color-primary"),
        'primary-hover':'#e634ee',
        'primary-light':'#f78ffa',
        white: withOpacity("--color-white"),
        dark: withOpacity("--color-grey-dark"),
        medium: withOpacity("--color-grey-medium"),
        light: withOpacity("--color-grey-light"),
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
      scale: {
        '400': '4',
      }
    },

  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
  ],
}
