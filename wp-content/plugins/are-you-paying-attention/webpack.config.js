const defaultConfig = require("@wordpress/scripts/config/webpack.config.js");

module.exports = {
  ...defaultConfig,
  entry: {
    index: "./src/index.js",
    frontend: "./src/frontend.js",
  },
};
