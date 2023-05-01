/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",],
  theme: {
    screens: {
      'sm': '768px', // Change this to set the breakpoint at 768 pixels
      'md': '1024px',
      'lg': '1280px',
      'xl': '1536px',
    },
    extend: {
      objectFill: {
        'fill': 'fill',
      },
      backgroundImage: {
        'login-standard': "url('../images/login_page.svg')",
        'login-rectangle': "url('../images/rectangle_2.svg')",
        'authentication-image': "url('../images/authentication.svg')"
      },
      backgroundColor: {
        'standard-purple': "#190B6F"
      },
      spacing: {
        formWidth: "400px",
        loginFormWidth: "500px",
        profilePadX: "200px",
        profilePadY: "80px",
        formY: "20px",
        formX: "40px",
        top80: "80px",
      },
      letterSpacing: {
        space: ".7rem",
      },
      colors: {
        softWhite: "rgba(255,255,255,.8)",
        clifford: "#da373d",
        standardPurple: "#190B6F",
        BgstandardPurple: "#190B6F",
        links: "rgb(37, 150, 190)"
      },
    },
  }, variants: {
    objectFit: ['responsive'], // Add this line if you want to use the object-fit utility as well
  },
  plugins: [],
}

