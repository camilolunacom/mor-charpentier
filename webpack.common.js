const path = require('path');
const CopyPlugin = require('copy-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
  entry: './src/index.js',
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'dist')
  },
  plugins: [
    new CleanWebpackPlugin(),
    new CopyPlugin([
      { from: 'src/assets', to: 'assets' },
      { from: 'src/general', to: '.' },
      { from: 'src/partials', to: 'partials' },
      { from: 'src/archives', to: '.' },
      { from: 'src/singles', to: '.' }
    ]),
  ],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          'css-loader',
          'postcss-loader',
          'sass-loader'
        ]
      }
    ]
  }
};
