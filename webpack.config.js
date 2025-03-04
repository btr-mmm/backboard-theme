const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

const nodeModulesPath = path.resolve(__dirname, 'node_modules');

module.exports = [
  {
    entry: {
      main: ['./src/js/main.js', './src/css/main.scss'],
    },
    output: {
      filename: './dist/bundle.min.js',
      path: path.resolve(__dirname),
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          loader: 'babel-loader',
        },
        {
          test: /\.(sass|scss)/,
          use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            {
              loader: 'sass-loader',
              options: {
                sassOptions: {
                  includePaths: [
                    nodeModulesPath,
                    path.resolve(__dirname, 'src/css'),
                  ],
                  loadPaths: [path.resolve(__dirname, 'src/css')],
                },
              },
            },
          ],
        },
        {
          test: /\.(png|jpe?g|gif|svg|webp)$/i,
          type: 'asset/resource',
          generator: {
            filename: 'dist/assets/images/[name][ext]',
          },
        },
      ],
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: './dist/main.min.css',
      }),
    ],
    optimization: {
      minimizer: [`...`, new CssMinimizerPlugin()],
    },
  },
];

