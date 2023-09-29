const path = require('path');
const TerserPlugin = require("terser-webpack-plugin");

module.exports = {
    entry: './wp-content/themes/aciana/js/bootstrap.js',
    mode: 'production',
    output: {
        filename: 'bootstrap.min.js',
        path: path.resolve(__dirname, 'wp-content/themes/aciana/js')
    },
    optimization: {
        minimizer: [
            (compiler) => {
                new TerserPlugin({
                    terserOptions: {
                        format: {
                            comments: false
                        }
                    },
                    extractComments: false
                }).apply(compiler);
            }
        ],
    },
    module: {
        rules: [
            {
                test: /\.(scss)$/,
                use: [
                    {
                        loader: 'style-loader'
                    },
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: () => [
                                    require('autoprefixer')
                                ]
                            }
                        }
                    },
                    {
                        loader: 'sass-loader'
                    }
                ]
            }
        ]
    }
}