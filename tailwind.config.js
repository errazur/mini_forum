module.exports = {
  purge: [],
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: 'media',
  theme: {
    extend: {
        textOpacity: ['dark']
    },
  },
  variants: {
    extend: {
      padding: ['hover'],
      backgroundColor: ['hover'],
      backgroundColor: ['active'],
      divideColor: ['group-hover'],
    },
  },
  plugins: [],
}
