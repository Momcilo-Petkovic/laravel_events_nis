module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/**/**/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {

        colors: {
          "bookmark-pink": "#fe06ef",
          "bookmark-purple": "#c084fc",
          "bookmark-purple-dark": "#964ae3",
          "bookmark-red": "#FA5959",
          "bookmark-blue": "#242A45",
          "bookmark-blue-hover": "#5866a7",
          "bookmark-grey": "#9194A2",
          "bookmark-white": "#f7f7f7",
          "bookmark-yellow": "#edfe06",
          "logo-outer": "#b22db6",
          "logo-inner": "#fdaafb",
          "login-purple":"#84259e",
        }
        
      },

      fontFamily: {
        Poppins: ["Poppins, sans-serif"],
    },
    
    
    container: {
        center: true,
        padding: "1rem",
        screens : {
            // lg: "1124px",
            // xl: "1124px",
            // "2xl": "1124px",
            lg: "1536px",
            xl: "1536px",
            "2xl": "1536px",
        }
      },
    },
    plugins: [require('@tailwindcss/forms')],
  }