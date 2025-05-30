const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: { sans: ['Inter', ...defaultTheme.fontFamily.sans] },
    },
  },
  safelist: [
    { pattern: /^(btn|alert|badge|card|table|navbar|dropdown|modal|input)/ },
  ],
  plugins: [
    require('daisyui'),
  ],
  daisyui: {
    themes: ['dark'],
    logs: true,
  },
};
