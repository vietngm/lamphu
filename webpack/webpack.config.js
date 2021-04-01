const webpack = require("webpack");
const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
module.exports = {
  mode: process.env.NODE_ENV === "production" ? "production" : "development",
  entry: path.resolve("./src/scripts/main.js"),
  output: {
    path: path.resolve(__dirname, "../dist/assets"),
    filename: "js/[name].js",
  },
  // devServer: {
  //   contentBase: path.join(__dirname, '/lengoc/dist/'),
  //   compress: true,
  //   port: 3000
  // },
  module: {
    rules: [
      {
        test: require.resolve("jquery"),
        use: [
          {
            loader: "expose-loader",
            options: "jQuery",
          },
          {
            loader: "expose-loader",
            options: "$",
          },
        ],
      },
      {
        test: /\.scss$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "css/[name].css",
            },
          },
          {
            loader: "extract-loader",
          },
          {
            loader: "css-loader?-url",
          },
          {
            loader: "postcss-loader",
          },
          {
            loader: "sass-loader",
          },
        ],
      },
      // {
      //   test: /\.(png|svg|jpg|gif)$/,
      //   use: ["file-loader"],
      // },
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"],
      },
    ],
  },
  plugins: [
    new BrowserSyncPlugin({
      host: "http://inlengoc",
      port: 3000,
      // server: { baseDir: ['/lengoc/dist/'] },
      proxy: "http://inlengoc",
      // open: true,
    }, {
      reload: true
    }),
  ],
};